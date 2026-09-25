<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_index_page_is_accessible(): void
    {
        Task::create([
            'task_name' => 'Finish report',
            'description' => 'Submit the weekly progress report.',
            'status' => 'Completed',
            'due_date' => '2026-09-30',
        ]);

        $response = $this->get('/tasks');

        $response->assertOk()
            ->assertSee('Finish report')
            ->assertSee('Completed');
    }

    public function test_user_can_create_update_and_delete_task(): void
    {
        $createResponse = $this->post('/tasks', [
            'task_name' => 'Plan project milestones',
            'description' => 'Outline milestones for the next sprint.',
            'status' => 'Pending',
            'due_date' => '2026-10-05',
        ]);

        $createResponse->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'task_name' => 'Plan project milestones',
            'status' => 'Pending',
        ]);

        $task = Task::first();

        $updateResponse = $this->patch("/tasks/{$task->id}", [
            'task_name' => 'Plan project milestones',
            'description' => 'Outline milestones and prepare review meeting.',
            'status' => 'Completed',
            'due_date' => '2026-10-07',
        ]);

        $updateResponse->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'status' => 'Completed',
        ]);

        $deleteResponse = $this->delete("/tasks/{$task->id}");

        $deleteResponse->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}

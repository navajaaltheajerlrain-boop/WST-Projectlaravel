<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <header class="topbar">
            <div>
                <p class="eyebrow">Personal Planner</p>
                <h1>❤️ Task Manager ❤️</h1>
            </div>
        </header>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="panel">
            <h2>Add New Task</h2>

            <form action="{{ route('tasks.store') }}" method="POST" class="task-form">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="task_name">Task name</label>
                        <input id="task_name" name="task_name" type="text" value="{{ old('task_name') }}" required>
                        @error('task_name')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due date</label>
                        <input id="due_date" name="due_date" type="date" value="{{ old('due_date') }}" required>
                        @error('due_date')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Add task details...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="primary-btn">Save Task</button>
            </form>
        </section>

        <section class="panel">
            <div class="section-head">
                <h2>All Tasks</h2>
                <span class="count-badge">{{ $tasks->count() }} total</span>
            </div>

            @if ($tasks->isEmpty())
                <div class="empty-state">
                    No tasks added yet. Start by creating your first task.
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Due date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td><strong>{{ $task->task_name }}</strong></td>
                                    <td>{{ $task->description ?: '—' }}</td>
                                    <td>
                                        <span class="status-badge {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td>{{ $task->due_date->format('M d, Y') }}</td>
                                    <td class="action-cell">
                                        <a href="{{ route('tasks.edit', $task) }}" class="secondary-btn">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="danger-btn" onclick="return confirm('Delete this task?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</body>
</html>

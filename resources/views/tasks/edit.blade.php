<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $task->exists ? 'Edit Task' : 'Create Task' }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container narrow">
        <header class="topbar">
            <div>
                <p class="eyebrow">Task Details</p>
                <h1>{{ $task->exists ? 'Edit Task' : 'Add New Task' }}</h1>
            </div>
        </header>

        <section class="panel">
            <form action="{{ $task->exists ? route('tasks.update', $task) : route('tasks.store') }}" method="POST" class="task-form">
                @csrf
                @if ($task->exists)
                    @method('PUT')
                @endif

                <div class="form-grid">
                    <div class="form-group">
                        <label for="task_name">Task name</label>
                        <input id="task_name" name="task_name" type="text" value="{{ old('task_name', $task->task_name) }}" required>
                        @error('task_name')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due date</label>
                        <input id="due_date" name="due_date" type="date" value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}" required>
                        @error('due_date')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="button-row">
                    <button type="submit" class="primary-btn">{{ $task->exists ? 'Update Task' : 'Save Task' }}</button>
                    <a href="{{ route('tasks.index') }}" class="secondary-btn light">Back to Tasks</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>

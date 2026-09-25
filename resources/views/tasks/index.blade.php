@extends('layouts.app')

@section('content')

<?php
    $totalTasks = isset($tasks) ? count($tasks) : 0;
    $completedTasks = isset($tasks) ? collect($tasks)->where('status', 'Completed')->count() : 0;
    $pendingTasks = $totalTasks - $completedTasks;
?>

<!-- Hero Section -->
<div class="row align-items-center mb-5 pb-3 border-bottom border-light border-opacity-10">
    <div class="col-lg-8">
        <h1 class="display-4 fw-bold text-white editorial-title mb-2">My tasks.</h1>
        <p class="text-white-50 fs-6 mb-0">A refined sanctuary for the things worth getting done.</p>
    </div>
    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <div class="d-inline-flex gap-4 glass-panel px-4 py-2.5">
            <div class="text-center">
                <span class="d-block text-white-50 small text-uppercase" style="font-size: 0.7rem;">Open</span>
                <span class="fw-bold fs-5 text-white">{{ $pendingTasks }}</span>
            </div>
            <div class="vr bg-light opacity-25"></div>
            <div class="text-center">
                <span class="d-block text-white-50 small text-uppercase" style="font-size: 0.7rem;">Done</span>
                <span class="fw-bold fs-5 text-white">{{ $completedTasks }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Add Task Form -->
    <div class="col-lg-4">
        <div class="glass-panel p-4 sticky-top" style="top: 2rem;">
            <div class="mb-4">
                <span class="text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem; color: #8fb9a8;">01 : Creation</span>
                <h4 class="editorial-title text-white fs-4 mt-1 mb-0">Add a task</h4>
            </div>

            <form action="{{ url('/tasks') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-white-50 small fw-semibold text-uppercase" style="font-size: 0.7rem;">Task Title</label>
                    <input type="text" name="task_name" class="form-control" placeholder="What needs your attention?" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white-50 small fw-semibold text-uppercase" style="font-size: 0.7rem;">Notes <span class="text-muted lowercase">(optional)</span></label>
                    <textarea name="description" class="form-control" rows="3" placeholder="A little context goes a long way."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white-50 small fw-semibold text-uppercase" style="font-size: 0.7rem;">Due Date</label>
                    <input type="date" name="due_date" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label text-white-50 small fw-semibold text-uppercase" style="font-size: 0.7rem;">Status</label>
                    <select name="status" class="form-select">
                        <option value="Pending" selected>Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-editorial w-100 py-3 shadow-sm">
                    Add task
                </button>
            </form>
        </div>
    </div>

    <!-- Right Column: Current Task List -->
    <div class="col-lg-8">
        <div class="glass-panel p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-light border-opacity-10">
                <div>
                    <span class="text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem; color: #8fb9a8;">02 : Directory</span>
                    <h4 class="editorial-title text-white fs-4 mt-1 mb-0">Current list</h4>
                </div>
                <span class="badge bg-white bg-opacity-10 text-light px-3 py-1.5 rounded-pill fw-semibold" style="font-size: 0.75rem;">
                    {{ $totalTasks }} TASKS
                </span>
            </div>

            @if(isset($tasks) && count($tasks) > 0)
                <div class="d-flex flex-column gap-3">
                    @foreach($tasks as $task)
                    <div class="p-3.5 rounded-3 d-flex justify-content-between align-items-center" style="background: rgba(15, 28, 22, 0.6); border: 1px solid rgba(110, 163, 133, 0.1);">
                        <div class="d-flex align-items-start gap-3">
                            <div class="mt-1">
                                @if($task->status == 'Completed')
                                    <span class="text-dark rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 24px; height: 24px; background-color: #8fb9a8;"><i class="bi bi-check fs-7"></i></span>
                                @else
                                    <span class="border border-secondary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px;"></span>
                                @endif
                            </div>
                            <div>
                                <h6 class="fw-bold text-white mb-1 {{ $task->status == 'Completed' ? 'text-decoration-line-through text-white-50' : '' }}">{{ $task->task_name }}</h6>
                                <p class="text-white-50 small mb-2">{{ $task->description }}</p>
                                <div class="d-flex gap-2">
                                    @if($task->due_date)
                                        <span class="badge bg-black bg-opacity-30 text-white-50 border border-light border-opacity-10 px-2 py-1 small" style="font-size: 0.7rem;"><i class="bi bi-clock me-1"></i> Due {{ $task->due_date }}</span>
                                    @endif
                                    @if($task->status == 'Completed')
                                        <span class="badge bg-success bg-opacity-25 text-success px-2.5 py-1 small fw-semibold" style="font-size: 0.7rem;">COMPLETED</span>
                                    @else
                                        <span class="badge bg-warning bg-opacity-25 text-warning px-2.5 py-1 small fw-semibold" style="font-size: 0.7rem;">PENDING</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex gap-2">
                            <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn btn-sm btn-dark bg-opacity-50 border border-light border-opacity-10 text-light rounded-2 px-2.5" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ url('/tasks/' . $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-dark bg-opacity-50 border border-danger border-opacity-25 text-danger rounded-2 px-2.5" title="Delete" onclick="return confirm('Delete this task?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-5">
                    <div class="bg-black bg-opacity-30 text-white-50 d-inline-flex p-4 rounded-circle mb-3 border border-light border-opacity-10">
                        <i class="bi bi-journal-richtext fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-white editorial-title">No entries found</h5>
                    <p class="text-white-50 small mb-0">Your workspace is completely clear. Add your first task on the left.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
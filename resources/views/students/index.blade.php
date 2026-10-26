@extends('students.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2>Students Dashboard</h2>
        <p class="text-muted mb-0">Manage student records</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">All Students ({{ $students->count() }})</div>
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-primary">
                <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone ?: '—' }}</td>
                    <td>{{ $student->course }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center py-4">No students yet. Click Add Student to begin.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

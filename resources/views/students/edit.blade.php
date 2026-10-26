@extends('students.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white"><h4 class="mb-0">Edit Student</h4></div>
    <div class="card-body">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('PUT')
            @include('students.form')
        </form>
    </div>
</div>
@endsection

<div class="mb-3">
    <label class="form-label">Full Name *</label>
    <input name="name" class="form-control" value="{{ old('name', $student->name) }}" required maxlength="255">
</div>
<div class="mb-3">
    <label class="form-label">Email *</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required maxlength="255">
</div>
<div class="mb-3">
    <label class="form-label">Phone</label>
    <input name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" maxlength="30">
</div>
<div class="mb-3">
    <label class="form-label">Course *</label>
    <input name="course" class="form-control" value="{{ old('course', $student->course) }}" required maxlength="255">
</div>
<button class="btn btn-primary">Save Student</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>

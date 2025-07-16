@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Edit Daily Journal</h2>

    <form method="POST" action="{{ route('journals.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
            @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">MToday's Mood</label>
            <select name="mood" class="form-control @error('mood') is-invalid @enderror" required>
                <option value="">Choose the Mood</option>
                @foreach (['Happy', 'Sad', 'Angry', 'Calm', 'Anxious', 'Excited'] as $mood)
                    <option value="{{ $mood }}" {{ old('mood') == $mood ? 'selected' : '' }}>{{ $mood }}</option>
                @endforeach
            </select>
            @error('mood') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Today's Activities</label>
            @php
                $activityList = ['Study', 'Work', 'Exercise', 'Watch', 'Play Games', 'Eat', 'Sleep'];
            @endphp
            <div class="d-flex flex-wrap gap-3">
                @foreach ($activityList as $activity)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="activities[]" value="{{ $activity }}" id="activity_{{ $activity }}"
                        {{ is_array(old('activities')) && in_array($activity, old('activities')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="activity_{{ $activity }}">{{ $activity }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">To-Do List</label>
            <textarea name="to_do_list" class="form-control">{{ old('to_do_list') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Keep a Journal</button>
        </div>
    </form>
</div>
@endsection
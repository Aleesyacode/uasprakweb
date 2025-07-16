@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Edit Daily Journal</h2>

    <form method="POST" action="{{ route('journals.update', $journal->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                   value="{{ old('date', $journal->date) }}" required>
            @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Today's Mood</label>
            <select name="mood" class="form-control @error('mood') is-invalid @enderror" required>
                <option value="">Choose the Mood</option>
                @foreach (['Happy', 'Sad', 'Angry', 'Calm', 'Anxious', 'Excited'] as $mood)
                    <option value="{{ $mood }}" {{ old('mood', $journal->mood) == $mood ? 'selected' : '' }}>{{ $mood }}</option>
                @endforeach
            </select>
            @error('mood') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Today's Activities</label>
            @php
                $activityList = ['Study', 'Work', 'Exercise', 'Watch', 'Play Games', 'Eat', 'Sleep'];
                $selectedActivities = json_decode($journal->activities, true) ?? [];
            @endphp
            <div class="d-flex flex-wrap gap-3">
                @foreach ($activityList as $activity)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="activities[]" value="{{ $activity }}"
                               id="activity_{{ $activity }}"
                               {{ in_array($activity, old('activities', $selectedActivities)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="activity_{{ $activity }}">{{ $activity }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">To-Do List</label>
            <textarea name="to_do_list" class="form-control">{{ old('to_do_list', $journal->to_do_list) }}</textarea>
        </div>

        {{-- Catatan --}}
        <div class="mb-3">
            <label class="form-label">Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $journal->notes) }}</textarea>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Journals</button>
        </div>
    </form>
</div>
@endsection
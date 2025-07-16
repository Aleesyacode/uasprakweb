@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Detail Jurnal Harian</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($journal->date)->format('d M Y') }}</p>
            <p><strong>Mood Hari Ini:</strong> {{ $journal->mood }}</p>

            <p><strong>Aktivitas:</strong><br>
                @if ($journal->activities)
                    @foreach (json_decode($journal->activities, true) as $activity)
                        <span class="badge bg-primary">{{ $activity }}</span>
                    @endforeach
                @else
                    <em>Tidak ada</em>
                @endif
            </p>

            <p><strong>To-Do List:</strong><br>
                {{ $journal->to_do_list ?? '-' }}
            </p>

            <p><strong>Catatan:</strong><br>
                {{ $journal->notes ?? '-' }}
            </p>

            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('journals.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
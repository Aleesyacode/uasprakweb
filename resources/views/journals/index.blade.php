@extends('layouts.app')

@section('content')
<div class="container my-5">

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daily Journal List</h2>
        <a href="{{ route('journals.create') }}" class="btn btn-success">+ How's Your Day?</a>
    </div>

    <form action="{{ route('journals.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="search_date" class="form-label">Search by date</label>
            <input type="date" name="search_date" id="search_date" class="form-control" value="{{ request('search_date') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </div>
    </form>


    @if ($journals->isEmpty())
        <div class="alert alert-info">The database is empty. Agent, we need your first emotional report.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th style="width: 150px;">Date</th>
                        <th>Mood</th>
                        <th>Activity</th>
                        <th>Note</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($journal->date)->format('d M Y') }}</td>
                            <td>{{ $journal->mood }}</td>
                            <td>
                                @foreach (json_decode($journal->activities, true) as $activity)
                                    <span class="badge bg-primary">{{ $activity }}</span>
                                @endforeach
                            </td>
                            <td>{{ Str::limit($journal->notes, 50) }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i> Show
                                </a>
                                <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Update
                                </a>
                                <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau di hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
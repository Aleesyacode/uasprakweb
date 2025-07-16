@extends('layouts.app')

@push('styles')
<style>
    body {
        background-color: #8BBBD4;
        font-family: 'Poppins', sans-serif;
    }

    .card-custom {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .form-label {
        font-weight: 600;
    }

    .btn-primary {
        background-color: #8BBBD4;
        border: none;
    }

    .btn-primary:hover {
        background-color: #74a6c4;
    }

    .text-title {
        font-weight: 800;
        font-size: 24px;
        color: #1f2937;
        text-align: center;
        margin-bottom: 20px;
    }

    .register-container {
        margin-top: 60px;
    }
</style>
@endpush

@section('content')
<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom p-4">
                <div class="text-title">Begin Your Mission – Create Your S.H.I.E.L.D. Mood Profile</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Agent Codename</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            value="{{ old('username') }}" required autofocus>

                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Access Key</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Access Key</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register as an Agent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('base')

@section('title', 'Account Activation')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-3 mt-5">Account Activation</h1>

            @if (session()->has('warning'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('warning') }}
                </div>
            @endif

            <form method="POST" action="{{ route('app_activation_code', ['token' => $token]) }}">
                @csrf

                <div class="mb-3">
                    <label for="activation_code" class="form-label">Activation Code</label>
                    <input type="text" class="form-control" name="activation_code" id="activation_code" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="#">Change your email address</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#">Resend the activation code</a>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Activate</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

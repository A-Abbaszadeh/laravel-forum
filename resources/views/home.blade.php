@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <div class="navbar-brand">
                Home
            </div>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
</div>
@endsection

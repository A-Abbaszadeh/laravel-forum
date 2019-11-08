@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <div class="navbar-brand">
                Discussions
            </div>
            <a href="{{ route('discussions.create') }}" class="material-icons btn btn-primary float-right" style="font-size:20px" title="Add Discussion">
                library_add
            </a>
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

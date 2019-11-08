@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="navbar-brand">
                Discussions
            </div>
            <a href="{{ route('discussions.create') }}" class="material-icons btn btn-primary float-right" style="font-size:20px" title="Add Discussion">
                library_add
            </a>
        </div>
    </div>

    @foreach($discussions as $discussion)
        <div class="card mb-3">
            <div class="card-header">
                <div class="navbar-brand">
                    {{ $discussion->title }}
                </div>
                <a href="#" class="material-icons btn btn-primary float-right" style="font-size:20px" title="Edit Discussion">
                    edit
                </a>
            </div>
            <div class="card-body">
                {!! \Illuminate\Support\Str::limit($discussion->content,500,' ...') !!}
            </div>
        </div>
    @endforeach

    {{ $discussions->links() }}

@endsection

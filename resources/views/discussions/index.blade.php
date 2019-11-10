@extends('layouts.app')

@section('content')
{{--    <div class="card mb-3">
        <div class="card-header">
            <div class="navbar-brand">
                Discussions
            </div>
            <a href="{{ route('discussions.create') }}" class="material-icons btn btn-primary float-right" style="font-size:20px" title="Add Discussion">
                library_add
            </a>
        </div>
    </div>--}}

    @foreach($discussions as $discussion)
        <div class="card my-3">

            @include('partials.discussion-header')

            <div class="card-body">
                {{ $discussion->title }}
            </div>
        </div>
    @endforeach

    {{ $discussions->links() }}

@endsection

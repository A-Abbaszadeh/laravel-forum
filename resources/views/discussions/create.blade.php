@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="navbar-brand">
                Add Discussion
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('discussions.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="channels">Channels:</label>
                    <select name="channels" id="channels" class="form-control custom-select">
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Enter Content">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Create Discussion</button>
                </div>
            </form>
        </div>
    </div>
@endsection

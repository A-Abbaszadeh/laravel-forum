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
                    <label for="channel">Channels:</label>
                    <select name="channel" id="channels" class="form-control custom-select">
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="discussion_content">Content:</label>
                    <input id="discussion_content" type="hidden" name="discussion_content" value="{{ old('discussion_content') }}">
                    <trix-editor input="discussion_content"></trix-editor>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Create Discussion</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" integrity="sha256-vu9SAWhYz3+PNEdy/FtYE0QBaAS2e/cB7OcSWV28WcM=" crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" integrity="sha256-ZnHiEOG1mQVIQHeVGc+lHPvZjtCC8cWqNI7W1GpkN3I=" crossorigin="anonymous"></script>
@endsection
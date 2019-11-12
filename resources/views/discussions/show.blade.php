@extends('layouts.app')

@section('content')
    <div class="card">

        @include('partials.discussion-header')

        <div class="card-body">
            <h3 class="text-center">{{ $discussion->title }}</h3>
            <hr class="under-title">
            <div class="my-4">
                {!! $discussion->content !!}
            </div>
            @if($discussion->bestReply)
               <div class="card text-white bg-success">
                   <div class="card-header">
                       <div class="d-flex justify-content-between">
                           <div>
                               <img src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="avatar" width="40px" class="rounded-circle">
                               <span class="ml-2 font-weight-bold">
                                   {{ $discussion->bestReply->owner->name }}
                               </span>
                           </div>
                           <div>
                               <strong>
                                   Best Reply
                               </strong>
                           </div>
                       </div>
                   </div>

                   <div class="card-body">
                       <span class="card-text">
                           {!! $discussion->bestReply->content !!}
                       </span>
                   </div>
               </div>
            @endif
        </div>
    </div>

    {{-- Show replies --}}
    <div class="container">
        @foreach($discussion->replies()->orderBy('created_at', 'desc')->paginate(3) as $reply)
            <div class="card my-4 text-white bg-dark">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="{{ Gravatar::src($reply->owner->email) }}" alt="Avatar" width="40px" class="rounded-circle">
                            <span class="ml-2 font-weight-bold">
                                {{ $reply->owner->name }}
                            </span>
                        </div>

                        <div>
                            @if(auth()->user()->id == $discussion->user_id)
                                <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id ]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">Mark as best</button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <span class="card-text">{!! $reply->content !!}</span>
                </div>
                <div class="card-footer">
                    {{ $reply->created_at }}
                </div>
            </div>
        @endforeach

            {{ $discussion->replies()->paginate(3)->links() }}
    </div>


    <div class="card my-3">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                @csrf

                @auth()
                    <div class="form-group">
                        <input id="reply" type="hidden" name="reply_content" value="{{ old('reply_content') }}">
                        <trix-editor input="reply"></trix-editor>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="float-right btn btn-success">Send reply</button>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-info">Sign in to add reply</a>
                @endauth
            </form>
        </div>
    </div>
@endsection

@section('css')
    {{-- Trix-editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" integrity="sha256-vu9SAWhYz3+PNEdy/FtYE0QBaAS2e/cB7OcSWV28WcM=" crossorigin="anonymous" />

    {{-- Line under the title of discussion --}}
    <style>
        /* Gradient transparent - color - transparent */
        hr.under-title {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
    </style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" integrity="sha256-ZnHiEOG1mQVIQHeVGc+lHPvZjtCC8cWqNI7W1GpkN3I=" crossorigin="anonymous"></script>
@endsection



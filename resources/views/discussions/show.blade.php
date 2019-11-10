@extends('layouts.app')

@section('css')
    <style>
        /* Gradient transparent - color - transparent */
        hr.under-title {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
    </style>
@endsection

@section('content')
    <div class="card my-3">

        @include('partials.discussion-header')

        <div class="card-body">
            <h3 class="text-center">{{ $discussion->title }}</h3>
            <hr class="under-title">
            <div class="my-4">
                {!! $discussion->content !!}
            </div>
        </div>
    </div>

@endsection




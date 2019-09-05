<link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-justify">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                           <h2 class="title">{{ $question->title }}</h2> 
                        
                            <div class="ml-auto">
                                <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary ml-5">Back To Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex d-flex-column vote-controls mr-3">
                            <div>
                                <a href="" 
                                    title="This question is useful" 
                                    class="vote-up"
                                    onclick="event.preventDefault(); 
                                                document.getElementById('up-vote-question-{{ $question->id }}').submit();">
                                        <i class="material-icons md-46 text-primary {{ Auth::guest() ? 'off' : '' }}">
                                            arrow_drop_up
                                        </i>
                                </a>

                                <form id="up-vote-question-{{ $question->id }}" 
                                        action="/questions/{{ $question->id }}/vote" 
                                        method="post" 
                                        style="display: none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>  

                                <div class="votes-coutn md-10 text-muted text-center">
                                    {{ $question->votes_count }}
                                </div>

                                <div class="text-align-center">
                                    <a href="" 
                                        title="This question is not useful" 
                                        class=""
                                        onclick="event.preventDefault(); 
                                                document.getElementById('down-vote-question-{{ $question->id }}').submit();">
                                        <i class="material-icons md-46 text-primary {{ Auth::guest() ? 'off' : '' }}">
                                            arrow_drop_down
                                        </i>
                                    </a>
                                    <form id="down-vote-question-{{ $question->id }}" 
                                        action="/questions/{{ $question->id }}/vote" 
                                        method="post" 
                                        style="display: none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                    </form> 
                                </div>
                                <br>
                                

                                <div class="text-center">
                                <a href="" 
                                    title="Click to mark as Favorite (click again to undo)"
                                    onclick="event.preventDefault(); 
                                                document.getElementById('favorite-question-{{ $question->id }}').submit();">
                                    <i class="material-icons md-36 
                                    {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'text-star' : '') }}">star</i>
                                </a>
                                <form id="favorite-question-{{ $question->id }}" 
                                        action="/questions/{{ $question->id }}/favorites" 
                                        method="post" 
                                        style="display: none;">
                                    @csrf
                                    @if ($question->is_favorited)
                                        @method('DELETE')
                                    @endif
                                </form> 
                                <div class="text-center">
                                    <span class="favorites-count md-10 text-muted">
                                        {{ $question->favorites_count }}
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">
                                            {{ $question->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('answers._index', [
        'answers' => $question->answers,
        'answersCount' =>$question->answers_count
    ])

    @include('answers._create ')

</div>
@endsection

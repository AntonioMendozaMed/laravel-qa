<link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                       <div class="mt-3 ml-3">
                           <h2 class="title">All Questions</h2>
                       </div> 
                    
                        <div class="ml-auto mb-2" >
                            <a href="{{ route('questions.create' )}}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')

                    @foreach($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters my-auto">
                                <div class="vote mb-2">
                                    <strong>{{ $question->votes_count }}</strong> 
                                    
                                    <div class="tag"><i class="fa fa-thumbs-up"></i> {{ str_plural('vote', $question->votes_count)}}</div>
                                </div>
                                <div class="status {{ $question->status }} mb-2">
                                    <strong>{{ $question->answers_count }}</strong> 
                                    
                                    <div class="tag"><i class="fa fa-comment"></i> {{ str_plural('answer', $question->answers_count)}}</div>
                                </div>
                                <div class="view">
                                    {{ $question->views }}
                                    
                                    <div class="tag"><i class="fa fa-eye"></i> {{ str_plural('view', $question->views)}}</div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0">
                                        <a href="{{ $question->url }}">{{ $question->title }}</a>
                                    </h3>
                                    <div class="ml-auto">
                                        @if(Auth::user()->can('update-question', $question))
                                            <a href="{{ route('questions.edit', $question->id )}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endif
                                        @if(Auth::user()->can('delete-question', $question))
                                        <form method="post" action="{{ route('questions.destroy', $question->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                
                                <p class="lead">
                                    Asked by 
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ str_limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>






    <!-- <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-blog">
                <div class="card-image">
                    <a href="#pablo">
                        <img class="img" src="{{ asset('img/card-blog1.jpg') }}" />
                        <div class="card-title">
                            This Summer Will be Awesome
                        </div>
                    </a>
                </div>

                <div class="card-content">
                    <h6 class="category text-info">Fashion</h6>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-content content-info">
                    <h5 class="category-social">
                        <i class="fa fa-twitter"></i> Twitter
                    </h5>
                    <h4 class="card-title">
                        <a href="#pablo">"You Don't Have to Sacrifice Joy to Build a Fabulous Business and Life"</a>
                    </h4>
                    <div class="footer">
                        <div class="author">
                            <a href="#pablo">
                               <img src="{{ asset('img/kendall.jpg') }}" alt="..." class="avatar img-raised">
                               <span>Tania Andrew</span>
                            </a>
                        </div>
                       <div class="stats">
                            <i class="fa fa-heart"></i> 2.4K &middot;
                            <i class="fa fa-plus"></i> 45
                            <i class="material-icons">share</i> 45 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    

</div>
@endsection

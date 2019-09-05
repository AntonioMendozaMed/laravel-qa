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
                       <h2>Ask Question</h2> 
                    
                        <div class="ml-auto">
                            <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @include("questions._form_create", ['buttonText' => "Ask Question"])
                    </form>  
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

@extends('layout')

@section('content')
    <!-- Header -->
    <style type="text/css">
        header{
            background-image: url("/img/portfolio/bg_style.jpg");
        }
    </style>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <img class="img-responsive" src="{{asset('img/portfolio/profile.jpg')}}" alt=""> -->
                    <div class="intro-text">
                        <span class="name">Start Sifar</span>
                        <hr class="star-light">
                        <span class="skills">Web Developer - Graphic Artist - User Experience Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Portfolio</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            @if ($posts->count())
            @foreach($posts as $post)
            <div class="col-sm-4 portfolio-item">
                <a href="post/{{$post->id}}" class="portfolio-link" data-toggle="modal">
                    <!-- <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal"> -->
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/cabin.png" class="img-responsive" alt="">
                    <p>{{$post->title}} {{$post->created_at->toDateTimeString()}}</p>
                </a>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
@stop
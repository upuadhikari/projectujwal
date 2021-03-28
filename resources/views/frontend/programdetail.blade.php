@extends('master')

@section('content')

<div class="container container-row" id="product">
        <div class="product-image">
            <img src="images/siberian.png" alt="" class="product-pic">
        </div>

        <div class="product-details">
            <header>
                <div class="foot-er justify-content-end">
                    
                    @auth
                    <button type="button">
                    <span><a class="text-white px-3" href="/blog">Blog</a></span>
                  </button>
                    @else
                    <!-- <span><a class="text-white px-3" href="blog.html"></a></span> -->
                    @endauth
                </div>
                <h1 class="title">{{$program->name}}</h1>
                <span class="colorCat">author name</span>
                <div class="price">
                    <span class="current">price here</span>
                </div>
            </header>
            <article>
                <h5>Description</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </article>
        </div>
    </div>
   

@stop

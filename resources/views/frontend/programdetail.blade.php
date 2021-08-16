@extends('layouts.master')

@section('content')

<div class="container container-row" id="product">




    <div class="product-details">
        <header>
            <div class="foot-er justify-content-end">

                @auth
                <button type="button" class=" expert btn btn-danger">
                    Expert Contact
                </button>
                @else
                <!-- <span><a class="text-white px-3" href="blog.html"></a></span> -->
                @endauth
            </div>


            <h1 class="title">{{$program->name}}</h1>
        </header>
        <article>
            <h5>Description</h5>
            <p>{{$program->detail}}</p>
        </article>


    </div>

    <div>
        <form method="POST" action="{{url('/comment/'.$program->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Enter comment here</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Comment .." name="comment" required="true">
                <button class="btn btn-primary">Comment</button>
            </div>
        </form>

    </div>

    <div>
        <div class="row d-flex justify-content-center mt-100 mb-100">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Latest Comments</h4>
                    </div>
                    @foreach($comments as $comment)
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{asset('/images/'.$comment->user->profile_pic)}}" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <div class="comment-footer"> <span class=" time text-muted float-right">{{$comment->created_at}}</span>
                                    <h6 class="font-medium-username">{{$comment->user_name}}</h6>
                                    <span class="m-b-15 d-block comment">{{$comment->comment}}</span>

                                </div>
                                <form class="formmm" method="POST" action="{{url('/delete-comment/' .$comment->id)}}">
                                    @csrf
                                    <button class="edit">Edit </button>
                                    <button class=" del">Delete </button>
                                </form>
                            </div>
                        </div> <!-- Comment Row -->

                    </div> <!-- Card -->
                    @endforeach
                    <br>
                </div>
            </div>

        </div>
    </div>
</div>



@stop
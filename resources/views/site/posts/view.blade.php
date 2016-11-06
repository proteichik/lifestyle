@extends('layouts.site')

@section('content')
   <div class="single-page-artical">
       <div class="artical-content">
           <h3>{{ $post->title }}</h3>
           <img src="{{ asset($post->front_picture) }}" class="img-responsive" />
           <p><b>{{ $post->description }}</b></p>

           {!! $post->content !!}
       </div>

       <div class="artical-links">
           <ul>
               <li><small> </small><span>June 30, 2015</span></li>
               <li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
               <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
               <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
               <li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
           </ul>
       </div>

       <div class="comment-grid-top">
           <h3>Responses</h3>
           @foreach($comments as $comment)
               <div class="comments-top-top">
                   <div class="top-comment-right">
                       <ul>
                           <li><span class="left-at"><a href="#">{{ $comment->author }}</a></span></li>
                           <li><span class="right-at">June 30, 2015 at 10.30am</span></li>
                       </ul>
                       <p>{{ $comment->content }}</p>
                   </div>
                   <div class="clearfix"> </div>
               </div>
           @endforeach
       </div>

       <div class="artical-commentbox">
           <h3>leave a comment</h3>
           <div class="table-form">
               @include('site.comments.form.comment')
           </div>
       </div>
   </div>
@endsection
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
   </div>
@endsection
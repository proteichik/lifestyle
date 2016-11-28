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
           {{--<ul>--}}
               {{--<li><small> </small><span>{{ $post->created_at }}</span></li>--}}
               {{--<li><a href="#"><small class="admin"> </small><span></span></a></li>--}}
               {{--<li><a href="#"><small class="no"> </small><span></span></a></li>--}}
               {{--<li><a href="#"><small class="posts"> </small><span></span></a></li>--}}
               {{--<li><a href="#"><small class="link"> </small><span></span></a></li>--}}
           {{--</ul>--}}
       </div>

       <div class="comment-grid-top" id="comments">
           @if (count($post->comments) > 0)
               <h3>Responses</h3>
           @endif

           @foreach($post->comments as $comment)
               <div class="comments-top-top">
                   <div class="top-comment-right">
                       <ul>
                           <li><span class="left-at"><a href="#">{{ $comment->author }}</a></span></li>
                           <li><span class="right-at">{{ $comment->created_at->format('Y-m-d H:i:s') }}</span></li>
                           @can('delete', $comment)
                           <li>
                               <a href="{{ route('site.post.comment.delete', ['id' => $comment->id]) }}" class="comment-delete">Удалить</a>
                           </li>
                           @endcan
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
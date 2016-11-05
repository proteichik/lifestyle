@extends('layouts.site')

@section('content')
    <div class="blog">
        <div class="blog-left">
            @foreach($objects as $post)
                <div class="blog-left-grid">
                    {{-- Заголовок --}}
                    <div class="blog-left-grid-left">
                        <h3><a href="#">{{ $post->title }}</a></h3>
                        <p> {{ $post->created_at->format('Y-m-d H:i:s')  }} </p>
                    </div>

                    {{-- Комментарии --}}
                    <div class="blog-left-grid-right">
                        <a href="#" class="hvr-bounce-to-bottom non">20 Comments</a>
                    </div>
                    <div class="clearfix"> </div>

                    {{-- Картинка --}}
                    @if($post->front_picture)
                        <a href="#"><img src="{{ $post->front_picture }}" alt=" " class="img-responsive" /></a>
                    @endif
                    {{-- Краткое описание --}}
                    <p class="para">{{ $post->description }}</p>

                    {{-- Подробнее --}}
                    <div class="rd-mre">
                        <a href="{{ route('site.post', [$post->id]) }}" class="hvr-bounce-to-bottom quod">Читать </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="blog-right">

        </div>
        <div class="clearfix"></div>
    </div>
@endsection
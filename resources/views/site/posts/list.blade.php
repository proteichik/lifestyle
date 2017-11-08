@extends('layouts.site')

@section('content')
    <div class="blog">
        <div class="blog-left">
            @foreach($objects as $post)
                <div class="blog-left-grid">
                    {{-- Заголовок --}}
                    <div class="blog-left-grid-left">
                        <h3><a href="{{ route('site.post', [$post->id]) }}">{{ $post->title }}</a></h3>
                        <p> {{ $post->created_at->format('Y-m-d H:i:s')  }} |
                            <span>{{ $post->category->name }}</span>
                        </p>
                    </div>

                    {{-- Комментарии --}}
                    <div class="blog-left-grid-right">
                        <a href="{{ route('site.post', [$post->id, '#comments']) }}" class="hvr-bounce-to-bottom non">{{ count($post->comments) }} Comments</a>
                    </div>
                    <div class="clearfix"> </div>

                    {{-- Картинка --}}
                    @if($post->front_picture)
                        <a href="{{ route('site.post', [$post->id]) }}"><img src="{{ asset($post->front_picture) }}" alt=" " class="img-responsive img-title" /></a>
                    @endif
                    {{-- Краткое описание --}}
                    <p class="para">{{ $post->description }}</p>

                    {{-- Подробнее --}}
                    <div class="rd-mre">
                        <a href="{{ route('site.post', [$post->id]) }}" class="hvr-bounce-to-bottom quod">Читать </a>
                    </div>
                </div>
            @endforeach
            {{ $objects->links('vendor.pagination.simple-custom') }}
        </div>
        <div class="blog-right">
            <div class="pgs">
                <h3>Категории</h3>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('site.posts.by_category', [$category->id]) }}">{{ $category->name }} <span class="badge badge-pill badge-secondary">{{  $category->posts()->wherePublish(1)->count()}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
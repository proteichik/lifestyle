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
                            @if($post->subcategory instanceof \App\Subcategory)
                                <span>{{ $post->category->name }} <i class="fa fa-angle-double-right"></i> {{ $post->subcategory->name }}</span>
                            @else
                                <span>{{ $post->category->name }}</span>
                            @endif
                        </p>
                    </div>

                    {{-- Комментарии --}}
                    <div class="blog-left-grid-right">
                        <a href="{{ route('site.post', [$post->id, '#comments']) }}" class="hvr-bounce-to-bottom non">{{ count($post->publishedComments) }} Comments</a>
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
                            @if (count($category->subcategories) > 0)
                            <li><a href="{{ route('site.posts.by_category', [$category->id]) }}">{{ $category->name }} </a> <span class="label label-default pull-right">{{  $category->posts()->wherePublish(1)->count()}}</span>
                                <ul>
                                    @foreach($category->subcategories as $subcategory)
                                        <li class="subcat">
                                            <a href="{{ route('site.posts.by_category_and_subcategory', [$category->id, $subcategory->id]) }}">{{ $subcategory->name }}</a> <span class="label label-danger pull-right">{{  $subcategory->posts()->wherePublish(1)->count()}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                            <li><a href="{{ route('site.posts.by_category', [$category->id]) }}">{{ $category->name }} </a> <span class="label label-danger pull-right">{{  $category->posts()->wherePublish(1)->count()}}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
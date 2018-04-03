@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Просмотр комментария</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Автор: </b>{{ $object->author }}</p>
                            <p><b>Пост: </b>{{ $object->post->title }}</p>
                            <p><b>Текст: </b>{{ $object->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('admin.comments.approve', ['id' => $object->id]) }}" class="btn btn-success">Опубликовать</a>
                    <a href="{{ route('admin.comments.delete', ['id' => $object->id]) }}" class="btn btn-danger">Удалить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
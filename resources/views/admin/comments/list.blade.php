@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th width="5%">@sortablelink('id', 'id')</th>
            <th width="20%">@sortablelink('author', 'Автор')</th>
            <th width="25%">@sortablelink('post.title', 'Пост')</th>
            <th width="40%">@sortablelink('content', 'Текст')</th>
            <th width="10%">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($objects as $object)
            <tr>
                <td>{{ $object->id }}</td>
                <td>{{ $object->author }}</td>
                <td><a href="{{ route('site.post', ['id' => $object->post->id]) }}" target="_blank">{{ $object->post->title }}</a></td>
                <td>{{ substr($object->content, 0, 150)  }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.comments.view', ['id' => $object->id])  }}" type="button" class="btn btn-warning">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.comments.approve', ['id' => $object->id])  }}" type="button" class="btn btn-success" name="btn-approve">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.comments.delete', ['id' => $object->id])  }}" type="button" class="btn btn-danger" name="btn-delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="5">Пока комментариев нет</td>
        @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection

@section('javascripts')
    @parent
    <script src="{{ asset('js/approve_comments.js') }}"></script>
@endsection
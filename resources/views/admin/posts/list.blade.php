@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('id', 'id')</th>
                <th>@sortablelink('title', 'Заголовок')</th>
                <th>@sortablelink('name', 'Категория')</th>
                <th>@sortablelink('count_views', 'Просмотров')</th>
                <th>@sortablelink('created_at', 'Дата создания')</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($objects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->title }}</td>
                    <td>{{ $object->category->name }}</td>
                    <td>{{ $object->count_views }}</td>
                    <td>{{ $object->created_at }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.posts.update', ['id' => $object->id])  }}" type="button" class="btn btn-warning">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('admin.posts.delete', ['id' => $object->id])  }}" type="button" class="btn btn-danger" name="btn-delete">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="5">Пока публикаций нет</td>
            @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection
@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>@sortablelink('id', 'id')</th>
            <th>@sortablelink('name', 'Наименование')</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($objects as $object)
            <tr>
                <td>{{ $object->id }}</td>
                <td>{{ $object->name }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.tags.update', ['id' => $object->id])  }}" type="button" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.tags.delete', ['id' => $object->id]) }}" type="button" class="btn btn-danger" name="btn-delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="5">Пока тегов нет</td>
        @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection
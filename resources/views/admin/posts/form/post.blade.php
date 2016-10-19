{{ BootForm::open(['model' => $object, 'store' => 'admin.posts.new.save',
'update' => 'admin.posts.update.save']) }}
{!! BootForm::text('title', 'Заголовок') !!}
{!! BootForm::textarea('description', 'Описание', null, ['rows' => 3]) !!}
{!! BootForm::select('category_id', 'Категория', $categories) !!}
{!! BootForm::textarea('content', 'Текст', null, ['class' => 'tinytext'] )!!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}

<script src="{{ asset('js/tiny_init.js') }}"></script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection
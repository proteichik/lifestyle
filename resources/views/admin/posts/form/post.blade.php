{{ BootForm::open(['model' => $object, 'store' => 'admin.posts.new.save',
'update' => 'admin.posts.update.save', 'files' => true]) }}
{!! BootForm::text('title', 'Заголовок') !!}
{!! BootForm::textarea('description', 'Описание', null, ['rows' => 3]) !!}
{!! BootForm::select('category_id', 'Категория', $categories) !!}
{!! BootForm::textarea('content', 'Текст', null, ['class' => 'tinytext'] )!!}

{!! BootForm::file('front_picture', 'Логотип поста') !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}

<script src="{{ asset('js/tiny_init.js') }}"></script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection
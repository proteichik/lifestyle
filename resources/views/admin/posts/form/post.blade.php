{{ BootForm::open(array('route' => $route)) }}
{!! BootForm::text('title', 'Заголовок', $object->title) !!}
{!! BootForm::textarea('description', 'Описание', $object->description, ['rows' => 3]) !!}
{!! BootForm::select('category', 'Категория', $categories, $object->category()) !!}
{!! BootForm::textarea('content', 'Текст', $object->content, ['class' => 'tinytext'] )!!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}

<script src="{{ asset('js/tiny_init.js') }}"></script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection
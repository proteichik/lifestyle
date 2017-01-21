<div class="row">
    {{ BootForm::open(['model' => $object, 'store' => 'admin.posts.new.save',
'update' => 'admin.posts.update.save', 'files' => true]) }}
    {!! BootForm::hidden('publish', 0) !!}
    <div class="col-sm-12 col-md-9">

        {!! BootForm::text('title', 'Заголовок') !!}
        {!! BootForm::textarea('description', 'Описание', null, ['rows' => 3]) !!}
        {!! BootForm::select('category_id', 'Категория', $categories) !!}
        {!! BootForm::textarea('content', 'Текст', null, ['class' => 'tinytext'] )!!}
        {!! BootForm::select('tags', 'Теги', $tags, array_flip($selectedTags), ['multiple' => 'multiple', 'name' => 'tags[]']) !!}
        {!! BootForm::submit('Сохранить') !!}
    </div>
    <div class="col-sm-12 col-md-3">
        {!! BootForm::checkbox('publish', 'Опубликованно') !!}
        {!! BootForm::file('front_picture', 'Логотип поста') !!}
    </div>
    {{ BootForm::close() }}
</div>

<script src="{{ asset('js/tiny_init.js') }}"></script>
<script>
    $( document ).ready(function() {
        $("#tags").chosen();
    });
</script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection
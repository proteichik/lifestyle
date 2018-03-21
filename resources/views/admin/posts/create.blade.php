@extends('layouts.admin')

@section('javascripts')
    @parent
    <script>
        $(document).ready(function(){
            showSubCategories($("#category_id").val());
        });
    </script>
    <script src="{{ asset('js/subcategories.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Добавить запись</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.posts.form.post', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
@endsection
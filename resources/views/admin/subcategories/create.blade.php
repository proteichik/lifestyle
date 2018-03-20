@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Добавить подкатегорию</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.subcategories.form.subcategory')
                </div>
            </div>
        </div>
    </div>
@endsection
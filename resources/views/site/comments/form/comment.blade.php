{{ Form::open(['route' => 'site.comment.new.save']) }}
{{ Form::text('author', '', ['placeholder' => 'Имя']) }}
{{ Form::textarea('content', '', ['placeholder' => 'Текст']) }}
{{ Form::hidden('post_id', $post->id) }}
{{ Form::submit('Save') }}
{{ Form::close() }}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
    </div>
</div>
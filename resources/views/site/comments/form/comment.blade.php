{{ Form::open(['route' => 'site.comment.new.save']) }}
{{ Form::text('author', '', ['placeholder' => 'Имя']) }}
{{ Form::textarea('content', '', ['placeholder' => 'Текст']) }}
{{ Form::hidden('post_id', $post->id) }}
{{ Form::submit('Save') }}
{{ Form::close() }}
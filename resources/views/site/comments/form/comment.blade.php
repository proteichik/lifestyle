{{ Form::open(['route' => 'site.comment.new.save']) }}
{{ Form::text('author', 'Имя') }}
{{ Form::textarea('content', 'Описание', null, ['rows' => 3]) }}
{{ Form::hidden('post_id', $post->id) }}
{{ Form::submit('Save') }}
{{ Form::close() }}
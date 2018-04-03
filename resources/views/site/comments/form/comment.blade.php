{{ Form::open(['route' => 'site.comment.new.save']) }}
{{ Form::text('author', '', ['placeholder' => 'Имя']) }}
{{ Form::textarea('content', '', ['placeholder' => 'Текст']) }}
{{ Form::hidden('post_id', $post->id) }}

@if(!Auth::check())
    <button type="button" class="btn btn-primary" data-toggle="modal" name="submit" data-target="#needApproveModal" data-backdrop="static" data-keyboard="false">
        Отправить
    </button>


    {{--Модальное окно--}}
    <div class="modal fade" id="needApproveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="needApproveModalLabel">Комментарий отправлен</h5>
                </div>
                <div class="modal-body">
                    <p>Ваш комментарий будет опубликован после проверки модератором</p>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Отправить', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
@else
    <button type="submit" name="submit">Отправить</button>
@endif
{{ Form::close() }}
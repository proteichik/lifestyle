{{ BootForm::open(['model' => $object, 'store' => 'admin.tags.new.save',
'update' => 'admin.tags.update.save']) }}
{!! BootForm::text('name', 'Имя') !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}
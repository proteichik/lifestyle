{{ BootForm::open(['model' => $object, 'store' => 'admin.categories.new.save',
'update' => 'admin.categories.update.save']) }}
{!! BootForm::text('name', 'Имя') !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}
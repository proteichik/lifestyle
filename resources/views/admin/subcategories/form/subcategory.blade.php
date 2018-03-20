{{ BootForm::open(['model' => $object, 'store' => 'admin.subcategories.new.save',
'update' => 'admin.subcategories.update.save']) }}
{!! BootForm::text('name', 'Имя') !!}
{!! BootForm::select('category_id', 'Категория', $categories) !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}
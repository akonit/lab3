<?php

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список назначений', 'url'=>array('index')),
	array('label'=>'Назначить категорию продукту', 'url'=>array('create')),
	array('label'=>'Обновить назначение', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Удалить назначение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрирование назначений', 'url'=>array('admin')),
);
?>

<h1>Назначение категорий продуктам #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('label'=>'Продукт', 'value'=>$model->product()->name),
		array('label'=>'Категория продукта', 'value'=>$model->category()->name),
	),
)); ?>

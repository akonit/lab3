<?php

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Обновить категорию', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Удалить категорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрирование категорий продуктов', 'url'=>array('admin')),
);
?>

<h1>Категория продукта <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',*/
		'name',
	),
)); ?>

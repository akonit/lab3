<?php

$this->breadcrumbs=array(
	'Opinions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список отзывов', 'url'=>array('index')),
	array('label'=>'Создать отзыв', 'url'=>array('create')),
	array('label'=>'Обновить отзыв', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Удалить отзыв', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрирование отзывов', 'url'=>array('admin')),
);
?>

<h1>View Opinion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',*/
		'productId',
		'login',
		'time',
		'text',
	),
)); ?>

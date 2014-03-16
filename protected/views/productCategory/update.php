<?php

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список назначений', 'url'=>array('index')),
	array('label'=>'Назначить категорию продукту', 'url'=>array('create')),
	array('label'=>'Список назначений', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Администрирование назначений', 'url'=>array('admin')),
);
?>

<h1>Обновить назначение <?php echo $model->_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

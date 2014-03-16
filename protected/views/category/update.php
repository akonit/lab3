<?php

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Просмотр категории', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Администрирование категорий', 'url'=>array('admin')),
);
?>

<h1>Обновить категорию <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

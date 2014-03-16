<?php

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Создать продукт', 'url'=>array('create')),
	array('label'=>'Просмотреть продукт', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Обновить продукт <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Администрирование категорий', 'url'=>array('admin')),
);
?>

<h1>Создать категорию продукта</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

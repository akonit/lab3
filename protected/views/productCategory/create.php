<?php

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список назначений', 'url'=>array('index')),
	array('label'=>'Администрирование назначений', 'url'=>array('admin')),
);
?>

<h1>Назначить категорию продукту</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

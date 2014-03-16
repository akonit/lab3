<?php
	
	$this->breadcrumbs=array(
		'Products'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'К списку продуктов', 'url'=>array('index')),
		array('label'=>'Администрирование продуктов', 'url'=>array('admin')),
	);
?>

<h1>Создать продукт</h1>

<?php 
	$this->renderPartial('_form', array('model'=>$model)); 
?>

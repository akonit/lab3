<?php

$this->breadcrumbs=array(
	'Product Categories',
);

$this->menu=array(
	array('label'=>'Назначить категорию продукту', 'url'=>array('create')),
	array('label'=>'Администрирование назначений', 'url'=>array('admin')),
);
?>

<h1>Назначения категорий продуктам</h1>

<?php 
	$dataProvider=new EMongoDataProvider('ProductCategory');

	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
)); ?>

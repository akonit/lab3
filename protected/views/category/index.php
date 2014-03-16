<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Создать категорию продуктов', 'url'=>array('create')),
	array('label'=>'Администрирование категорий', 'url'=>array('admin')),
);
?>

<h1>Категории продуктов</h1>

<?php 
	$dataProvider=new EMongoDataProvider('Category');

	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); 
?>

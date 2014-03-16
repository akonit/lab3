<?php

$this->breadcrumbs=array(
	//'Opinions'=>array('index'),
        'Products'=>array('/product/index'),
	'Create',
);

$this->menu=array(
	/*array('label'=>'List Opinion', 'url'=>array('index')),
	array('label'=>'Manage Opinion', 'url'=>array('admin')),*/
);
?>

<h1>Оставить отзыв о продукте</h1>

<?php $this->renderPartial('_create_form', array('model'=>$model, 'product'=>Yii::app()->request->getQuery('product'))); ?>

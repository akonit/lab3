<?php

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Написать отзыв', 'url'=>array('/opinion/create', 'product'=>$model->_id)),
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Создать продукт', 'url'=>array('create')),
	array('label'=>'Обновить продукт', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Удалить продукт', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрирование продуктов', 'url'=>array('admin')),
);
?>

<h1>Продукт <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
	),
)); ?>

<br />

<?php 
	$text_ct = "Категории продукта:  ";
	$product_categories = $model->productCategories();
        foreach($product_categories as $pct)
		{
			$ct = Category::model()->findBy_id($pct->cid);
			$text_ct = $text_ct . $ct->name . ", ";
		}
	echo substr($text_ct, 0, strlen($text_ct) - 2);
?>

<br />
	<?php
		$this->widget("CStarRating", array(
				"name" => $model->name,
				"readOnly" => false,
				'callback'=>'
				function(){
				$.ajax({
				type: "POST",
				url: "'.Yii::app()->createUrl('product/updateMark').'",
				data: "id='.$model->_id.'&mark=" + $(this).val(),
				success: function(msg){
				$("#rating > input").rating("readOnly", true);
				alert("Голос учтен!");                      
				}})},'

			    ));
	?>
<br />
<br />

<h3>-----------------------------</h3>
<h3>Отзывы о продукте</h3>
<h3>-----------------------------</h3>

<?php 
	$opinions = $model->opinions();
	foreach($opinions as $op)
	{ ?>
        <br/>
        <?php
	    $this->widget('zii.widgets.CDetailView', array(
		'data'=>$op,
		'attributes'=>array(
			'login',
			'time',
			'text'
		),
	));} 
?>
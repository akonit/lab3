<div class="span-17">

<?php

	$this->breadcrumbs=array(
		'Products',
	);

	$this->menu=array(
			array('label'=>'Создать продукт', 'url'=>array('create')),
			array('label'=>'Администрирование продуктов', 'url'=>array('admin')),
	);
?>

</div>

<h1>Список продуктов</h1>

<div class="span-18">

<!-- search by description -->
<?php echo CHtml::form(Yii::app()->createUrl('product/index'),'get') ?>
	<?php echo CHtml::textField('q', 'введите описание продукта') ?>
    <?php echo CHtml::submitButton(); ?>
<?php echo CHtml::endForm() ?>


<?php

	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_view',
	)); 
?>
</div>
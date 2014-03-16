<?php
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mark')); ?>:</b>
	<?php echo CHtml::encode($data->mark); ?>
	<br />

	<b>
        <?php 
		$text_ct = "Категории продукта:  ";
		$product_categories = $data->productCategories();
		foreach($product_categories as $pct)
		{
			$ct = Category::model()->findBy_id($pct->cid);
			$text_ct = $text_ct . $ct->name . ", ";
		}
		echo CHtml::encode(substr($text_ct, 0, strlen($text_ct) - 2));
	?></b>
	<br />
	<br />
</div>

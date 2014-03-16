<?php
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div id="pid_row" class="row">
		<?php 
			$list=array();
			$models = Product::model()->findAll();
			foreach($models as $m) {
				$value=(string)$m->_id;
				$text=$m->name;
				$list[$value]=$text;
			}

			echo $form->labelEx($model,'pid');
			echo $form->dropDownList($model,'pid',$list); 
			echo $form->error($model,'pid'); 
		?>
	</div>

	<div id="cid_row" class="row">
		<?php 
			$list=array();
			$models = Category::model()->findAll();
			foreach($models as $m) {
				$value=(string)$m->_id;
				$text=$m->name;
				$list[$value]=$text;
			}
			echo $form->labelEx($model,'cid');
			echo $form->dropDownList($model,'cid',$list);
			echo $form->error($model,'cid'); 
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

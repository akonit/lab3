<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark'); ?>
		<?php echo $form->textField($model,'mark'); ?>
		<?php echo $form->error($model,'mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voters'); ?>
		<?php echo $form->textField($model,'voters'); ?>
		<?php echo $form->error($model,'voters'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать продукт' : 'Обновить продукт'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
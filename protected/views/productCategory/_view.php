<div class="view">

        <b><?php echo CHtml::link('Перейти к назначению', array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo 
		CHtml::encode($data->product()->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php 
		echo CHtml::encode($data->category()->name); ?>
	<br />


</div>

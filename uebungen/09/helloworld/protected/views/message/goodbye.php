<?php
/* @var $this MessageController */

$this->breadcrumbs=array(
	'Message'=>array('/message'),
	'Hello',
);
?>
<h1>Goodbye, Yii developer</h1>
<p><?php echo CHtml::link('Hello',array('message/hello')); ?> </p>
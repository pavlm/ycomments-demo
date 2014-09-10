<?php
/* @var $this NewsController */
/* @var $model News */

?>

<h1>View News #<?php echo $model->id; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'descr',
	),
));


$this->widget('ycomments.widgets.CommentsWidget', array(
		'id' => 'newsReviews',
		'model' => $model, 'view' => 'list',
		'readOnly' => false,
		'options' => array('appendComment' => true),
));

?>

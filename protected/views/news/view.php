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
?>
<br>
<?php
$this->widget('ycomments.widgets.CommentsWidget', array(
		'id' => 'newsReviews',
		'model' => $model, 'view' => 'list',
		'readOnly' => false,
));
?>

<?php
$this->widget('ycomments.widgets.NotifyItemSubscriptionWidget', array(
		'commentableType' => 'News', 'itemId' => $model->id,
));

?>
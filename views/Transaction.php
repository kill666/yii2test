<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */
/* @var $form ActiveForm */
?>
<div class="TransactionForm">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'created_at') ?>
	<?= $form->field($model, 'updated_at') ?>
	<?= $form->field($model, 'user_id') ?>
	<?= $form->field($model, 'comment') ?>
	<?= $form->field($model, 'money') ?>
	<?= $form->field($model, 'status_id') ?>

	<div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>

</div><!-- TransactionForm -->

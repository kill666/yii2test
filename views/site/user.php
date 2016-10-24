<?php
/* @var $this yii\web\View */

namespace app\models;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
	<table class="table">
		<?php foreach ($list_transaction as $key => $value) { ?>
			<tr>
				<td><?= $value['created_id'] ?></td>
				<td><?= $value['money'] ?></td>
			</tr>
		<?php } ?>
	</table>
	<?php
	$form = ActiveForm::begin([
				'id' => 'uaer-back',
				'action' => Url::to(['user/back']),
				'options' => ['class' => 'form-horizontal'],
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
				],
	]);
	?>
	<?=
	$form->field($model, 'money')->textInput([
		'autofocus' => true,
		'placeholder' => 'Сумма',
		'class' => 'form-control'
	])
	?>
	<?=
	$form->field($model, 'comment')->textInput([
		'placeholder' => 'Комментарий',
		'class' => 'form-control'])
	?>
	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	<?php ActiveForm::end(); ?>
</div>

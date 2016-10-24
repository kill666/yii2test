<?php
/* @var $this yii\web\View */

namespace app\models;

//use yii\bootstrap\Html;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
	<?php
	$form = ActiveForm::begin([
				'id' => 'admin-spent',
				'action' => Url::to(['admin/spent']),
				'options' => ['class' => 'form-horizontal'],
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
				],
	]);
	?>

    <div class="form-group field-transaction-status required has-error">
		<label class="col-lg-1 control-label" for="transaction-status">Статус</label>
		<div class="col-lg-3">
			<select name="Transaction[status_id]" id="transaction-status" class="form-control">
				<?php foreach ($status as $key => $value) { ?>
					<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
    <div class="form-group field-transaction-users required has-error">
		<label class="col-lg-1 control-label" for="transaction-status">Пользователь</label>
		<div class="col-lg-3">
			<select name="Transaction[user_id]" id="transaction-users" class="form-control">
				<?php foreach ($users as $key => $value) { ?>
					<option value="<?= $value['id'] ?>"><?= $value['username'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
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

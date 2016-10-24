<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

//use yii\helpers\Html;

$this->title = 'User Report';
//Yii::$app->formatter->locale = 'ru-RU';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/user/report']];
?>
<div class="site-index">
	<?php
	if (isset($errors) && is_array($errors)) {
		foreach ($errors as $value) {
			?>
			<div class="error error-summary"><?= $value[0] ?></div>
			<?php
		}
	}
	?>
	<h3 class="col-lg-12">Отчет</h3>
	<?php
	$form = ActiveForm::begin([
				'id' => 'user-report',
				'action' => Url::toRoute(['/user/report']),
				'options' => ['class' => 'form-horizontal'],
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-1 control-label'],
				],
	]);
	?>

	<?= $form->field($model, 'money')->textInput(['autofocus' => true])->label('Сумма') ?>

	<?= $form->field($model, 'comment')->textInput()->label('Комментарий') ?>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('послать', ['class' => 'btn btn-primary', 'name' => 'report-button     ']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<?php
/* @var $this yii\web\View */

namespace app\models;

//use yii\bootstrap\Html;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Операции с деньгами';
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
	echo $form->field($model, 'status_id')->dropDownList($model->status)->label('Статус') .
	$form->field($model, 'user_id')->dropDownList($model->user)->label('Пользователь') .
	$form->field($model, 'money')->textInput([
		'autofocus' => true,
		'placeholder' => 'Сумма',
		'class' => 'form-control'
	])->label('Сумма') .
	$form->field($model, 'comment')->textInput([
		'placeholder' => 'Комментарий',
		'class' => 'form-control'])->label('Комментарий') .
	Html::submitButton('Сохранить', ['class' => 'btn btn-primary']);
	ActiveForm::end();
	?>
</div>

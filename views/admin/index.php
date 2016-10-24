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
	<table class="table">
		<thead><tr>
				<td>Пользователя номер</td>
				<td>дата</td>
				<td>Дебет\кредит</td>
				<td>Комментарий</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list_transaction as $key => $value) { ?>
				<tr>
					<td><?= $value['user_id'] ?></td>
					<td><?= $value['created_at'] ?></td>
					<td><?= $value['money'] ?></td>
					<td><?= $value['comment'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?= Html::a('Пользователи', Url::toRoute('admin/users'), ['class' => 'col-sm-3']) ?>
	<?= Html::a('Операция', Url::toRoute('admin/spent'), ['class' => 'col-sm-3']) ?>
	<?= Html::a('Настройка', Url::toRoute('admin/options'), ['class' => 'col-sm-3']) ?>
</div>

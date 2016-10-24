<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'User Transaction';
$this->params['breadcrumbs'] = false;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
	Cумма долга:<?= Html::encode($model->summ) ?>
	<table class="table">
		<thead><tr>
				<td>дата</td>
				<td>Дебет\кредит</td>
				<td>Статус</td>
				<td>Комментарий</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($model->listTransaction as $value) { ?>
				<tr>
					<td><?= $value['created_at'] ?></td>
					<td><?= $value['money'] ?></td>
					<td><?= $value['status2'] ?></td>
					<td><?= $value['comment'] ?></td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
	<?= Html::a('Отчитаться', Url::toRoute('user/report'), ['class' => 'col-sm-3']) ?>
</div>

<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Пользователи';
//$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

	<table class="table">
		<thead><tr>
				<td>Пользователь</td>
				<td>дата</td>
				<td>Долг</td>
				<td>API</td>
				<td>Комментарий</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $key => $value) { ?>
				<tr>
					<td><?= $value['username'] ?></td>
					<td><?= $value['created_at'] ?></td>
					<td><?= $value['money'] ?></td>
					<td><?= $value['api'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

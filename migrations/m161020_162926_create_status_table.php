<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m161020_162926_create_status_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
//        $this->createTable('status', [
//            'id' => $this->primaryKey(),
//        ]);
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('status', [
			'id' => $this->primaryKey(),
			'created_at' => $this->timestamp(),
			'updated_at' => $this->timestamp(),
			'name' => $this->string()->notNull(),
			'znak' => $this->boolean(),
			'class' => $this->string()->notNull()
				], $tableOptions);
		$this->batchInsert('status', ["name", 'znak', 'class'], [['Возврат', true, 'app\controllers\report\CashbackController'], ['Расход', false, 'app\controllers\report\SpentController'], ['Под отчет', false, 'app\controllers\report\ReportController'], ['Отчет пользователя', TRUE, 'app\controllers\report\UserController']]);

//		$this->addForeignKey('fk-status-id', 'status', 'id', 'transaction', 'status_id');
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('status');
	}

}

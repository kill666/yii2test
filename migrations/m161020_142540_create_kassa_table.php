<?php

use yii\db\Migration;

/**
 * Handles the creation of table `kassa`.
 */
class m161020_142540_create_kassa_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('kassa', [
			'id' => $this->primaryKey(),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'money' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
				], $tableOptions);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('kassa');
	}

}

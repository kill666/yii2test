<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m161020_124140_create_user_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
//		$this->createTable('user', [
//			'id' => $this->primaryKey(),
//		]);

		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('user', [
			'id' => $this->primaryKey(),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'username' => $this->string()->notNull(),
			'password' => $this->string()->notNull(),
			'money' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'api' => $this->string()->notNull(),
				], $tableOptions);

		$this->createIndex('idx-user-username', 'user', 'username');
		$this->createIndex('idx-user-status', 'user', 'status');
//		$this->addForeignKey('fk-user-status_id', 'user', 'status_id', 'status', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('user');
	}

}

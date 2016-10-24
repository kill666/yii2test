<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaction`.
 */
class m161020_142432_create_transaction_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
//        $this->createTable('transaction', [
//            'id' => $this->primaryKey(),
//        ]);

		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('transaction', [
			'id' => $this->primaryKey(),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'user_id' => $this->integer()->notNull(),
			'comment' => $this->string()->notNull(),
			'money' => $this->integer()->notNull()->defaultValue(0),
			'status_id' => $this->integer()->notNull()->defaultValue(1),
				], $tableOptions);

		$this->createIndex('idx-transaction-id', 'transaction', 'id');
		$this->createIndex('idx-transaction-user_id', 'transaction', 'user_id');
		$this->createIndex('idx-transaction-status_id', 'transaction', 'status_id');
		$this->addForeignKey('fk-transaction-user_id', 'transaction', 'user_id', 'user', 'id');
		$this->addForeignKey('fk-transaction-status_id', 'transaction', 'status_id', 'status', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('transaction');
	}

}

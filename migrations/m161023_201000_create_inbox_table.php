<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inbox`.
 */
class m161023_201000_create_inbox_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
		$this->createTable('inbox', [
			'id' => $this->primaryKey(),
			'user_id' => $this->integer()->notNull(),
			'comment' => $this->string()->notNull(),
			'money' => $this->integer()->notNull()->defaultValue(0),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('inbox');
	}

}

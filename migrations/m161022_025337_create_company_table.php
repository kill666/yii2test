<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m161022_025337_create_company_table extends Migration {

	/**
	 * @inheritdoc
	 */
	public function safeUp() {
//        $this->createTable('company', [
//            'id' => $this->primaryKey(),
//        ]);
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('company', [
			'id' => $this->primaryKey(),
			'created_at' => $this->timestamp()->notNull(),
			'updated_at' => $this->timestamp()->notNull(),
			'name' => $this->string()->notNull(),
			'money' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'api' => $this->string()->notNull(),
				], $tableOptions);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('company');
	}

}

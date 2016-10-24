<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbox".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $comment
 * @property integer $money
 */
class Inbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'comment'], 'required'],
            [['user_id', 'money'], 'integer'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'money' => 'Money',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $invest_plan_id
 * @property double $sum
 * @property string $invest_name
 * @property integer $created_at
 * @property integer $updated_at
 */
class TransactionModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'invest_plan_id', 'created_at', 'updated_at'], 'integer'],
            [['sum'], 'number'],
            [['invest_name'], 'string', 'max' => 255],
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
            'invest_plan_id' => 'Invest Plan ID',
            'sum' => 'Sum',
            'invest_name' => 'Invest Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    

}

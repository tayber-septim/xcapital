<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "referal_system".
 *
 * @property integer $id
 * @property string $user_hash
 * @property double $sum
 * @property string $invest_name
 * @property integer $percent
 * @property string $your_percent
 * @property string $user_name
 * @property integer $user_id
 */
class ReferalSystemModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referal_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sum'], 'number'],
            [['percent', 'user_id'], 'integer'],
            [['user_hash', 'invest_name', 'your_percent', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_hash' => 'User Hash',
            'sum' => 'Sum',
            'invest_name' => 'Invest Name',
            'percent' => 'Percent',
            'your_percent' => 'Your Percent',
            'user_name' => 'User Name',
            'user_id' => 'User ID',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "invests".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property integer $day
 * @property integer $take
 */
class MakeInvestsModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['day', 'take'], 'integer'],
            [['name', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'day' => 'Day',
            'take' => 'Take',
        ];
    }
}

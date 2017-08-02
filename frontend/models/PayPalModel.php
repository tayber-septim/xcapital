<?php


namespace frontend\models;

use yii\base\Model;

/**
 * Class PayPalModel
 * @package app\models
 */
class PayPalModel extends Model
{
    const SCENARIO_PAY = 'pay';

    public $description;
    public $currency;
    public $amount;

    static $currencies = [
        1 => 'USD'
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['description', 'currency', 'amount'], 'required', 'on' => [self::SCENARIO_PAY]],
            ['amount', 'number', 'on' => [self::SCENARIO_PAY]],
            ['description', 'string', 'on' => [self::SCENARIO_PAY]],
            ['currency', 'in', 'range' => array_keys(self::$currencies), 'on' => [self::SCENARIO_PAY]]
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'description' => 'Описание платежа',
            'currency' => 'Валюта',
            'amount' => 'Сумма'
        ];
    }
}
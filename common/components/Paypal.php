<?php
namespace common\components;

use yii\base\Component;
use yii\helpers\Url;

/**
 * Class PayPal
 * @package app\components
 */
class PayPal extends Component
{
    public $user;
    public $signature;
    public $pwd;

    public $apiUrl = 'https://api-3t.sandbox.paypal.com/nvp';
    public $baseUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout';

    public $successUrl = ['invest/success'];
    public $errorUrl = ['invest/error'];

    /**
     * @param $route
     * @return string
     */
    public function buildReturnUrl($route)
    {
        return Url::toRoute($route, true);
    }

    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */
    public function getToken($amount, $currency)
    {
        $successUrl = $this->buildReturnUrl($this->successUrl);
        $errorUrl = $this->buildReturnUrl($this->errorUrl);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "USER={$this->user}&SIGNATURE={$this->signature}&PWD={$this->pwd}&METHOD=SetExpressCheckout&VERSION=98&PAYMENTREQUEST_0_AMT={$amount}&PAYMENTREQUEST_0_CURRENCYCODE={$currency}&PAYMENTREQUEST_0_PAYMENTACTION=SALE&cancelUrl={$errorUrl}&returnUrl={$successUrl}");

        $result = curl_exec($ch);
        curl_close($ch);

        parse_str($result, $data);
        return $data;
    }

    /**
     * @param $amount
     * @param $currency
     * @return array
     */
    public function getTransactionToken($amount, $currency)
    {
        return $this->getToken($amount, $currency);
    }


    /**
     * @param $token
     */
    public function goToExpressCheckout($token)
    {
        $t = urldecode($token);
        $token = '&token=' . $t;
        \Yii::$app->response->redirect("{$this->baseUrl}" . "{$token}");
    }

    /**
     * @param $token
     * @return mixed
     */
    public function getDetails($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "USER={$this->user}&SIGNATURE={$this->signature}&PWD={$this->pwd}&METHOD=GetExpressCheckoutDetails&VERSION=93&TOKEN={$token}");

        $result = curl_exec($ch);
        curl_close($ch);
        
        parse_str($result, $data);
        return $data;
    }

    /**
     * @param $token
     * @param $payerId
     * @param $amount
     * @param $currency
     * @return mixed
     */
    public function confirm($token, $payerId, $amount, $currency)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "USER={$this->user}&SIGNATURE={$this->signature}&PWD={$this->pwd}&METHOD=DoExpressCheckoutPayment&VERSION=93&TOKEN={$token}&PAYERID={$payerId}&PAYMENTREQUEST_0_PAYMENTACTION=SALE&PAYMENTREQUEST_0_AMT={$amount}&PAYMENTREQUEST_0_CURRENCYCODE={$currency}");

        $result = curl_exec($ch);
        curl_close($ch);

        parse_str($result, $data);
        return $data;
    }
}
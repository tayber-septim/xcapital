<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $perfectMoney;
    public $peyeer;
    public $bitcoin;
    public $qiwi;
    public $yandex;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['perfectMoney', 'trim'],
            ['perfectMoney', 'required'],
            ['perfectMoney', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This perfectMoney has already been taken.'],
            ['perfectMoney', 'string', 'min' => 2, 'max' => 255], 

            ['peyeer', 'trim'],
            ['peyeer', 'required'],
            ['peyeer', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This peyeer has already been taken.'],
            ['peyeer', 'string', 'min' => 2, 'max' => 255],

            ['bitcoin', 'trim'],
            ['bitcoin', 'required'],
            ['bitcoin', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This bitcoin has already been taken.'],
            ['bitcoin', 'string', 'min' => 2, 'max' => 255], 

            ['qiwi', 'trim'],
            ['qiwi', 'required'],
            ['qiwi', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This qiwi has already been taken.'],
            ['qiwi', 'string', 'min' => 2, 'max' => 255], 

            ['yandex', 'trim'],
            ['yandex', 'required'],
            ['yandex', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This yandex has already been taken.'],
            ['yandex', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->perfectMoney = $this->perfectMoney;
        $user->peyeer = $this->peyeer;
        $user->bitcoin = $this->bitcoin;
        $user->qiwi = $this->qiwi;
        $user->yandex = $this->yandex;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}

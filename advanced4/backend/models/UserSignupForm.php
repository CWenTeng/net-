<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class UserSignupForm extends Model
{
    public $username;
    public $phone_number;
    public $password;
    public $password_repeat;
  

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['phone_number', 'filter', 'filter' => 'trim'],
            ['phone_number', 'required'],
            ['phone_number', 'string', 'max' => 255],
            ['phone_number', 'unique', 'targetClass' => '\common\models\User', 'message' => '手机号已存在.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
                
            ['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致！'],
                
        ];
    }

    public function attributeLabels()
    {
        return [
                'username' => '用户名',
                'password' => '密码',
                'password_repeat'=>'重输密码',
                'phone_number' => '手机号',
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
        $user->phone_number = $this->phone_number;      
        $user->status=10;
        $user->setPassword($this->password);
        $user->generateAuthKey();
     // $user->save(); VarDumper::dump($user->errors);exit(0);
        return $user->save() ? $user : null;
    }
}

<?php
namespace backend\models;

use yii\base\Model;
use common\models\Adminuser;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nickname;
    public $phone_number;
    public $password;
    public $password_repeat;
    public $profile;   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['phone_number', 'filter', 'filter' => 'trim'],
            ['phone_number', 'required'],
            ['phone_number', 'string', 'max' => 255],
            ['phone_number', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '手机号已存在.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        		
        	['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致！'],
        		
        	['nickname','required'],
        	['nickname','string','max'=>128],
        		
        	['profile','string'],
        ];
    }

    public function attributeLabels()
    {
    	return [
    			'username' => '用户名',
    			'nickname' => '昵称',
    			'password' => '密码',
    			'password_repeat'=>'重输密码',
    			'phone_number' => '手机号',
    			'profile' => '简介',
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
        
        $user = new Adminuser();
        $user->username = $this->username;
        $user->nickname = $this->nickname;
        $user->phone_number = $this->phone_number;
        $user->profile = $this->profile;        
        
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->password = '*';
        $user->password_reset_token = '*';
 //  $user->save(); VarDumper::dump($user->errors);exit(0);
        return $user->save() ? $user : null;
    }
}

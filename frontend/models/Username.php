<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "username".
 *
 * @property integer $id
 * @property string $tel
 * @property string $password
 * @property integer $useradd_time
 * @property integer $add_time
 * @property string $name
 * @property integer $sex
 * @property integer $age
 * @property string $birth_time
 * @property string $work_year
 * @property string $hk_address
 * @property string $address
 * @property string $email
 */
class Username extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'username';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['useradd_time', 'add_time', 'sex', 'age'], 'integer'],
            [['tel'], 'string', 'max' => 13],
            [['tel'], 'required'],
            [['password'], 'string', 'max' => 60],
            [['password'], 'required'],
            [['name'], 'string', 'max' => 12],
            [['name'], 'required'],
            [['birth_time', 'work_year', 'hk_address', 'email'], 'string', 'max' => 24],
            [['email'], 'required'],
            [['address'], 'string', 'max' => 30],
            [['sex'], 'required'],
            [['age'], 'required'],
            [['birth_time'], 'required'],
            [['work_year'], 'required'],
            [['hk_address'], 'required'],
            [['address'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => '手机号',
            'password' => '密码',
            'useradd_time' => '注册时间',
            'add_time' => '添加时间',
            'name' => '姓名',
            'sex' => '性别',
            'age' => '年龄',
            'birth_time' => '出生日期',
            'work_year' => '参加工作时间',
            'hk_address' => '户口地址',
            'address' => '居住地址',
            'email' => '电子邮箱',
        ];
    }
}

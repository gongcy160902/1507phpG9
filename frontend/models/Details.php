<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $native
 * @property string $birthday
 * @property string $education
 * @property string $picture
 * @property integer $sex
 * @property string $username
 * @property integer $createtime
 * @property integer $status
 * @property string $emile
 * @property integer $phone
 * @property string $year
 * @property string $woke_name
 * @property string $woke_type
 * @property string $woke_city
 * @property string $money
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sex', 'createtime', 'status', 'phone'], 'integer'],
            [['native', 'emile', 'year', 'work_name', 'work_type', 'work_city', 'money'], 'string', 'max' => 255],
            [['birthday'], 'string', 'max' => 80],
            [['education', 'username'], 'string', 'max' => 20],
            [['picture'], 'string', 'max' => 50],
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
            'native' => 'Native',
            'birthday' => 'Birthday',
            'education' => 'Education',
            'picture' => 'Picture',
            'sex' => 'Sex',
            'username' => 'Username',
            'createtime' => 'Createtime',
            'status' => 'Status',
            'emile' => 'Emile',
            'phone' => 'Phone',
            'year' => 'Year',
            'work_name' => 'Work Name',
            'work_type' => 'Work Type',
            'work_city' => 'Work City',
            'money' => 'Money',
        ];
    }
}

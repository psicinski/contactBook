<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $mail
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property integer $isFriend
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'phone', 'mail', 'address', 'city', 'zip'], 'required'],
            ['zip', 'match', 'pattern' => '/^[0-9]{2}-[0-9]{3}$/'],
            [['mail', 'address', 'city', 'zip'], 'string'],
            [['isFriend'], 'integer',],
            [['isFriend'],'match','pattern'=>'/^[0-1]{1}$/'],
            ['mail','email'],
            [['firstname', 'lastname'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 11],
            [['phone'], 'match','pattern'=>'/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'mail' => 'Mail',
            'address' => 'Address',
            'city' => 'City',
            'zip' => 'Zip',
            'isFriend' => 'Is Friend',
        ];
    }
}

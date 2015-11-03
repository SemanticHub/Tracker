<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $address
 * @property string $registration_date
 * @property string $established
 * @property string $status
 *
 * @property Documents[] $documents
 * @property Transactions[] $transactions
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['registration_date', 'established'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['phone', 'mobile'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 45],
            [['address'], 'string', 'max' => 140],
            [['status'], 'string', 'max' => 1]
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
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'registration_date' => 'Registration Date',
            'established' => 'Established',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['client_id' => 'id']);
    }
}

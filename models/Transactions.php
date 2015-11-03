<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property string $amount
 * @property string $type
 * @property string $initial
 * @property string $create_time
 * @property integer $create_by
 * @property integer $product_id
 * @property integer $quantity
 * @property string $duration
 * @property string $from_date
 * @property string $to_date
 * @property string $remarks
 * @property integer $client_id
 * @property integer $head_id
 *
 * @property Clients $client
 * @property Heads $head
 * @property Products $product
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'type', 'initial', 'create_time', 'create_by', 'remarks', 'head_id'], 'required'],
            [['amount'], 'number'],
            [['create_time', 'from_date', 'to_date'], 'safe'],
            [['create_by', 'product_id', 'quantity', 'client_id', 'head_id'], 'integer'],
            [['type'], 'string', 'max' => 1],
            [['initial'], 'string', 'max' => 140],
            [['duration'], 'string', 'max' => 45],
            [['remarks'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'type' => 'Type',
            'initial' => 'Initial',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'duration' => 'Duration',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'remarks' => 'Remarks',
            'client_id' => 'Client ID',
            'head_id' => 'Head ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHead()
    {
        return $this->hasOne(Heads::className(), ['id' => 'head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $sku
 * @property string $barcode
 * @property string $price
 * @property string $summery
 * @property string $details
 * @property string $manufacture
 *
 * @property Transactions[] $transactions
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['price'], 'number'],
            [['name', 'sku', 'barcode'], 'string', 'max' => 128],
            [['summery'], 'string', 'max' => 140],
            [['details'], 'string', 'max' => 255],
            [['manufacture'], 'string', 'max' => 45]
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
            'sku' => 'Sku',
            'barcode' => 'Barcode',
            'price' => 'Price',
            'summery' => 'Summery',
            'details' => 'Details',
            'manufacture' => 'Manufacture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['product_id' => 'id']);
    }
}

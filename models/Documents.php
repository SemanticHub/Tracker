<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property integer $id
 * @property string $title
 * @property integer $client_id
 * @property string $filename
 * @property string $extension
 * @property string $type
 * @property string $size
 * @property string $created_time
 * @property integer $created_by
 *
 * @property Clients $client
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'client_id', 'filename', 'created_time'], 'required'],
            [['client_id', 'created_by'], 'integer'],
            [['created_time'], 'safe'],
            [['title', 'extension', 'type'], 'string', 'max' => 45],
            [['filename'], 'string', 'max' => 255],
            [['size'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'client_id' => 'Client ID',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'type' => 'Type',
            'size' => 'Size',
            'created_time' => 'Created Time',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }
}

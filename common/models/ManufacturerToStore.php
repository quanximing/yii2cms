<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturer_to_store".
 *
 * @property int $manufacturer_id
 * @property int $store_id
 */
class ManufacturerToStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer_to_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manufacturer_id', 'store_id'], 'required'],
            [['manufacturer_id', 'store_id'], 'integer'],
            [['manufacturer_id', 'store_id'], 'unique', 'targetAttribute' => ['manufacturer_id', 'store_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manufacturer_id' => 'Manufacturer ID',
            'store_id' => 'Store ID',
        ];
    }
}

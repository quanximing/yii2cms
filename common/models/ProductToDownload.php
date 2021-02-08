<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_to_download".
 *
 * @property int $product_id
 * @property int $download_id
 */
class ProductToDownload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_to_download';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'download_id'], 'required'],
            [['product_id', 'download_id'], 'integer'],
            [['product_id', 'download_id'], 'unique', 'targetAttribute' => ['product_id', 'download_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'download_id' => 'Download ID',
        ];
    }
}

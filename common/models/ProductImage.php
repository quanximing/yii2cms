<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property int $product_image_id
 * @property int $product_id
 * @property string $image
 * @property int $sort_order
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'sort_order'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_image_id' => 'Product Image ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
        ];
    }
}

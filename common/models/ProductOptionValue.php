<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_option_value".
 *
 * @property int $product_option_value_id
 * @property int $product_id
 * @property int $language_id
 * @property string $value 存数学组值的一维数组
 * @property string $sku sku
 * @property int $quantity
 * @property string $price
 * @property int $points
 */
class ProductOptionValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_option_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'language_id', 'value', 'sku', 'quantity', 'price', 'points'], 'required'],
            [['product_id', 'language_id', 'quantity', 'points'], 'integer'],
            [['value', 'sku'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_option_value_id' => 'Product Option Value ID',
            'product_id' => 'Product ID',
            'language_id' => 'Language ID',
            'value' => 'Value',
            'sku' => 'Sku',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'points' => 'Points',
        ];
    }
}

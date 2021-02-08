<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_discount".
 *
 * @property int $product_discount_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $quantity
 * @property int $priority
 * @property string $price
 * @property string $date_start
 * @property string $date_end
 */
class ProductDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_group_id'], 'required'],
            [['product_id', 'customer_group_id', 'quantity', 'priority'], 'integer'],
            [['price'], 'number'],
            [['date_start', 'date_end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_discount_id' => 'Product Discount ID',
            'product_id' => 'Product ID',
            'customer_group_id' => 'Customer Group ID',
            'quantity' => 'Quantity',
            'priority' => 'Priority',
            'price' => 'Price',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }
}

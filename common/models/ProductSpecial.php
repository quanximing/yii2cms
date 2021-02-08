<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_special".
 *
 * @property int $product_special_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $priority
 * @property string $price
 * @property string $date_start
 * @property string $date_end
 */
class ProductSpecial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_special';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_group_id'], 'required'],
            [['product_id', 'customer_group_id', 'priority'], 'integer'],
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
            'product_special_id' => 'Product Special ID',
            'product_id' => 'Product ID',
            'customer_group_id' => 'Customer Group ID',
            'priority' => 'Priority',
            'price' => 'Price',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_reward".
 *
 * @property int $product_reward_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $points
 */
class ProductReward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_reward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_group_id', 'points'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_reward_id' => 'Product Reward ID',
            'product_id' => 'Product ID',
            'customer_group_id' => 'Customer Group ID',
            'points' => 'Points',
        ];
    }
}

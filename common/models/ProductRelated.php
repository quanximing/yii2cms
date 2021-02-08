<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_related".
 *
 * @property int $product_id
 * @property int $related_id
 */
class ProductRelated extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_related';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'related_id'], 'required'],
            [['product_id', 'related_id'], 'integer'],
            [['product_id', 'related_id'], 'unique', 'targetAttribute' => ['product_id', 'related_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'related_id' => 'Related ID',
        ];
    }
}

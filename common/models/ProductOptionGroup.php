<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_option_group".
 *
 * @property int $product_option_group_id
 * @property int $product_id
 * @property int $language_id
 * @property string $type select radio ...
 * @property string $name
 * @property int $required
 * @property int $for_price 是否影响价格
 * @property int $is_show 是否页面显示
 * @property int $mini_show
 * @property int $sort_order
 */
class ProductOptionGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_option_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'type', 'required'], 'required'],
            [['product_id', 'language_id', 'required', 'for_price', 'is_show','mini_show', 'sort_order'], 'integer'],
            [['type'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_option_group_id' => 'Product Option Group ID',
            'product_id' => 'Product ID',
            'language_id' => 'Language ID',
            'type' => 'Type',
            'name' => 'Name',
            'required' => 'Required',
            'for_price' => 'For Price',
            'is_show' => 'Is Show',
            'mini_show'=>' is mimi show',
            'sort_order' => 'Sort Order',
        ];
    }
}

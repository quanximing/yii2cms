<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_option_group_value".
 *
 * @property int $product_option_group_value_id 属性组的值ID
 * @property int $product_id 产品ID
 * @property int $product_option_group_id 属性组id
 * @property string $value 属性组值
 * @property string $key
 * @property string $image 图片
 * @property string $description 产品不同选项差异性描述
 */
class ProductOptionGroupValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_option_group_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_option_group_id', 'value'], 'required'],
            [['product_id', 'product_option_group_id'], 'integer'],
            [['image', 'description'], 'string'],
            [['value','key'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_option_group_value_id' => 'Product Option Group Value ID',
            'product_id' => 'Product ID',
            'product_option_group_id' => 'Product Option Group ID',
            'value' => 'Value',
            'key'=>'key',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }
}

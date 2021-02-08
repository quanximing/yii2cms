<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute".
 *
 * @property int $product_id
 * @property int $attribute_id
 * @property int $language_id
 * @property string $text
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attribute_id', 'language_id', 'text'], 'required'],
            [['product_id', 'attribute_id', 'language_id'], 'integer'],
            [['text'], 'string'],
            [['product_id', 'attribute_id', 'language_id'], 'unique', 'targetAttribute' => ['product_id', 'attribute_id', 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'attribute_id' => 'Attribute ID',
            'language_id' => 'Language ID',
            'text' => 'Text',
        ];
    }

    public function getAttributeDescription(){
        return $this->hasOne(AttributeDescription::className(),['attribute_id'=>'attribute_id']);
    }
}

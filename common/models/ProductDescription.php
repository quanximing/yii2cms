<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_description".
 *
 * @property int $product_id
 * @property int $language_id
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 */
class ProductDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id',  'name', 'description'], 'required'],
            [['product_id', 'language_id'], 'integer'],
            [['description', 'tag'], 'string'],
            [['name', 'meta_title', 'meta_description', 'meta_keyword'], 'string', 'max' => 255],
            [['product_id', 'language_id'], 'unique', 'targetAttribute' => ['product_id', 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'language_id' => 'Language ID',
            'name' => 'Name',
            'description' => 'Description',
            'tag' => 'Tag',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}

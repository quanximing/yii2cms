<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_customtab_description".
 *
 * @property int $product_customtab_id
 * @property int $language_id
 * @property int $product_id
 * @property string $title
 * @property string $description
 */
class ProductCustomtabDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_customtab_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_customtab_id', 'language_id', 'product_id', 'title', 'description'], 'required'],
            [['product_customtab_id', 'language_id', 'product_id'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_customtab_id' => 'Product Customtab ID',
            'language_id' => 'Language ID',
            'product_id' => 'Product ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}

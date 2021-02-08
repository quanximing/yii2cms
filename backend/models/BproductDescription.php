<?php

namespace backend\models;

use Yii;
use common\models\ProductDescription;
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
class BproductDescription extends ProductDescription
{
    public function attributeLabels()
    {
        return [
            'product_id' => '产品ID',
            'language_id' => '语言ID',
            'name' => '商品名称',
            'description' => '产品描述',
            'tag' => '商品标签',
            'meta_title' => 'Meta Tag 标题',
            'meta_description' => 'Meta Tag 描述',
            'meta_keyword' => 'Meta Tag 关键词',
        ];
    }
}

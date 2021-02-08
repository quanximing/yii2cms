<?php

namespace common\models;

use Yii;
use common\models\ProductCustomtabDescription;
/**
 * This is the model class for table "product_customtab".
 *
 * @property int $product_customtab_id
 * @property int $product_id
 * @property int $sort_order
 * @property int $status
 */
class ProductCustomtab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_customtab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'sort_order', 'status'], 'required'],
            [['product_id', 'sort_order', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_customtab_id' => 'Product Customtab ID',
            'product_id' => 'Product ID',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
        ];
    }

    public function getDescription(){
        return $this->hasOne(ProductCustomtabDescription::className(),['product_customtab_id'=>'product_customtab_id']);
    }
}

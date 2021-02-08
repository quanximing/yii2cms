<?php

namespace common\models;

use Yii;
use common\models\FilterDescription;
/**
 * This is the model class for table "product_filter".
 *
 * @property int $product_id
 * @property int $filter_id
 */
class ProductFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'filter_id'], 'required'],
            [['product_id', 'filter_id'], 'integer'],
            [['product_id', 'filter_id'], 'unique', 'targetAttribute' => ['product_id', 'filter_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'filter_id' => 'Filter ID',
        ];
    }

    public function getFilterdescription(){
        return $this->hasOne(FilterDescription::className(),['filter_id'=>'filter_id']);
    }
}

<?php

namespace backend\models;

use Yii;
use common\models\ProductRecurring;
/**
 * This is the model class for table "product_recurring".
 *
 * @property int $product_id
 * @property int $recurring_id
 * @property int $customer_group_id
 */
class BproductRecurring extends ProductRecurring
{
    public function attributeLabels()
    {
        return [
            'recurring_id' => '分期ID',
            'product_id' => '产品ID',
            'fee' => '费率',
            'frequency' => '周期',
            'duration' => '期数',
            'cycle' => '次数',
            'name' => '分期名称',
            'status' => '状态',
            'sort_order' => '排序',
        ];
    }
}

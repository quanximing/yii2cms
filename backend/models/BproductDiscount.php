<?php

namespace backend\models;

use Yii;
use common\models\ProductDiscount;
/**
 * This is the model class for table "product_discount".
 *
 * @property int $product_discount_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $quantity
 * @property int $priority
 * @property string $price
 * @property string $date_start
 * @property string $date_end
 */
class BproductDiscount extends ProductDiscount
{

}

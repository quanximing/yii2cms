<?php

namespace backend\models;

use Yii;
use common\models\ProductSpecial;
/**
 * This is the model class for table "product_special".
 *
 * @property int $product_special_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $priority
 * @property string $price
 * @property string $date_start
 * @property string $date_end
 */
class BproductSpecial extends  ProductSpecial
{

}

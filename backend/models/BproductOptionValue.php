<?php

namespace backend\models;

use Yii;
use common\models\ProductOptionValue;
/**
 * This is the model class for table "product_option_value".
 *
 * @property int $product_option_value_id
 * @property int $product_id
 * @property int $language_id
 * @property string $value 存数学组值的一维数组
 * @property string $sku sku
 * @property int $quantity
 * @property string $price
 * @property int $points
 * @property string $weight
 */
class BproductOptionValue extends ProductOptionValue
{

}

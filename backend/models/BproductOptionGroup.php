<?php

namespace backend\models;

use Yii;
use common\models\ProductOptionGroup;
/**
 * This is the model class for table "product_option_group".
 *
 * @property int $product_option_group_id
 * @property int $product_id
 * @property int $language_id
 * @property string $type select radio ...
 * @property string $name
 * @property int $required
 * @property int $for_price 是否影响价格
 * @property int $is_show 是否页面显示
 * @property int $sort_order
 */
class BproductOptionGroup extends ProductOptionGroup
{

}

<?php

namespace backend\models;

use Yii;
use common\models\ProductOptionGroupValue;
/**
 * This is the model class for table "product_option_group_value".
 *
 * @property int $product_option_group_value_id 属性组的值ID
 * @property int $product_id 产品ID
 * @property int $product_option_group_id 属性组id
 * @property string $value 属性组值
 * @property string $image 图片
 * @property string $description 产品不同选项差异性描述
 */
class BproductOptionGroupValue extends  ProductOptionGroupValue
{

}

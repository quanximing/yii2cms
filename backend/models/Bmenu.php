<?php

namespace backend\models;

use Yii;
use common\models\Menu;
/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property int $parent
 * @property string $route
 * @property int $order
 * @property string $data
 *
 * @property Menu $parent0
 * @property Menu[] $menus
 */
class Bmenu extends Menu
{

}

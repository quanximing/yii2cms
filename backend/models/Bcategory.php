<?php

namespace backend\models;

use Yii;
use common\models\Category;
/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $image
 * @property int $parent_id
 * @property int $top
 * @property int $column
 * @property int $sort_order
 * @property int $status
 * @property string $date_added
 * @property string $date_modified
 */
class Bcategory extends Category
{
    public static function getCategory($category_id) {
        $sql = "SELECT DISTINCT *, (SELECT GROUP_CONCAT(cd1.name ORDER BY level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;')  FROM category_path cp LEFT JOIN category_description cd1 ON (cp.path_id = cd1.category_id AND cp.category_id != cp.path_id) WHERE cp.category_id = c.category_id GROUP BY cp.category_id) AS path FROM category c LEFT JOIN category_description cd2 ON (c.category_id = cd2.category_id) WHERE c.category_id = '" . (int)$category_id . "'";
        $query =  Yii::$app->db->createCommand($sql)->queryOne();
        return $query;
    }

    public function getCategories($data = array()) {
        $sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order FROM category_path cp LEFT JOIN category c1 ON (cp.category_id = c1.category_id) LEFT JOIN category c2 ON (cp.path_id = c2.category_id) LEFT JOIN category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN category_description cd2 ON (cp.category_id = cd2.category_id)";

        if (!empty($data['filter_name'])) {
            $sql .= " AND cd2.name LIKE '%" . $data['filter_name'] . "%'";
        }

        $sql .= " GROUP BY cp.category_id";

        $sort_data = array(
            'name',
            'sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name, sort_order";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query =  Yii::$app->db->createCommand($sql)->queryAll();

        return $query;
    }
}

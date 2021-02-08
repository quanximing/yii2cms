<?php

namespace backend\models;

use Yii;
use common\models\ProductFilter;
/**
 * This is the model class for table "product_filter".
 *
 * @property int $product_id
 * @property int $filter_id
 */
class BproductFilter extends ProductFilter
{

    public function getFilters($data) {
        $sql = "SELECT *, (SELECT name FROM filter_group_description fgd WHERE f.filter_group_id = fgd.filter_group_id AND fgd.language_id = '1') AS `group` FROM filter f LEFT JOIN filter_description fd ON (f.filter_id = fd.filter_id) WHERE fd.language_id = '1'";

        if (!empty($data['filter_name'])) {
            $sql .= " AND fd.name LIKE '" . $data['filter_name']. "%'";
        }

        $sql .= " ORDER BY f.sort_order ASC";

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

<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BsmsLog;

/**
 * SmslogSearch represents the model behind the search form of `backend\models\BsmsLog`.
 */
class SmslogSearch extends BsmsLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'scene', 'create_time', 'used_time'], 'integer'],
            [['mobile', 'session_id', 'code', 'msg', 'error_msg'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BsmsLog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'scene' => $this->scene,
            'create_time' => $this->create_time,
            'used_time' => $this->used_time,
        ]);

        $query->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'session_id', $this->session_id])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'msg', $this->msg])
            ->andFilterWhere(['like', 'error_msg', $this->error_msg]);

        return $dataProvider;
    }
}

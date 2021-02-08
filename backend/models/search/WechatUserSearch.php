<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BwechatUser;

/**
 * WechatUserSearch represents the model behind the search form of `backend\models\BwechatUser`.
 */
class WechatUserSearch extends BwechatUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['AppID', 'openid', 'nickname', 'sex', 'headimgurl', 'country', 'province', 'city', 'access_token','subscribe_scene', 'refresh_token', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = BwechatUser::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'AppID', $this->AppID])
            ->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'nickname', base64_encode($this->nickname)])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'subscribe_scene', $this->subscribe_scene])
            ->andFilterWhere(['like', 'headimgurl', $this->headimgurl])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'refresh_token', $this->refresh_token]);

        return $dataProvider;
    }
}

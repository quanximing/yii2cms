<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcustomer;

/**
 * CustomerSearch represents the model behind the search form of `backend\models\Bcustomer`.
 */
class CustomerSearch extends Bcustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'customer_group_id', 'birthday', 'created_at', 'updated_at'], 'integer'],
            [['sex', 'username', 'email', 'telephone', 'avatar', 'password_hash', 'password_reset_token', 'salt', 'wishlist', 'newsletter', 'ip', 'status', 'safe', 'token', 'code', 'date_added', 'weixin_nackname', 'weixin_login_openid', 'weixin_login_unionid', 'weibo_login_access_token', 'weibo_login_uid', 'qq_openid', 'auth_key'], 'safe'],
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
        $query = Bcustomer::find();

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
            'customer_id' => $this->customer_id,
            'customer_group_id' => $this->customer_group_id,
            'birthday' => $this->birthday,
            'date_added' => $this->date_added,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'salt', $this->salt])
            ->andFilterWhere(['like', 'wishlist', $this->wishlist])
            ->andFilterWhere(['like', 'newsletter', $this->newsletter])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'safe', $this->safe])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'weixin_nackname', $this->weixin_nackname])
            ->andFilterWhere(['like', 'weixin_login_openid', $this->weixin_login_openid])
            ->andFilterWhere(['like', 'weixin_login_unionid', $this->weixin_login_unionid])
            ->andFilterWhere(['like', 'weibo_login_access_token', $this->weibo_login_access_token])
            ->andFilterWhere(['like', 'weibo_login_uid', $this->weibo_login_uid])
            ->andFilterWhere(['like', 'qq_openid', $this->qq_openid])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}

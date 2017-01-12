<?php

namespace backend\modules\organization\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\organization\models\Organizations;

/**
 * OrganizationsSearch represents the model behind the search form about `backend\modules\organization\models\Organizations`.
 */
class OrganizationsSearch extends Organizations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dt_add', 'dt_update', 'status', 'views', 'region_id', 'city_id', 'user_id', 'vip', 'category_id'], 'integer'],
            [['title', 'logo', 'header', 'slug', 'descr', 'mail', 'phone', 'site', 'schedule', 'address'], 'safe'],
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
        $query = Organizations::find();

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
            'dt_add' => $this->dt_add,
            'dt_update' => $this->dt_update,
            'status' => $this->status,
            'views' => $this->views,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'user_id' => $this->user_id,
            'vip' => $this->vip,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'descr', $this->descr])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'schedule', $this->schedule])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}

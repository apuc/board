<?php

namespace backend\modules\adsmanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\adsmanager\models\Adsmanager;

/**
 * AdsmanagerSearch represents the model behind the search form about `backend\modules\adsmanager\models\Adsmanager`.
 */
class AdsmanagerSearch extends Adsmanager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id', 'dt_add', 'dt_update', 'status', 'views', 'top'], 'integer'],
            [['title', 'content', 'slug', 'cover'], 'safe'],
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
        $query = Adsmanager::find();

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

        $query->where(['status' => 1]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'dt_add' => $this->dt_add,
            'dt_update' => $this->dt_update,
            'status' => $this->status,
            'views' => $this->views,
            'top' => $this->top,
        ]);

        $query->andFilterWhere(['!=', 'id', 1]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'cover', $this->cover])
        ->orderBy('dt_update DESC');

        return $dataProvider;
    }
}

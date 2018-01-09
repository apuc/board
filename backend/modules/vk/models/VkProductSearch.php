<?php

namespace backend\modules\vk\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\vk\models\VkProduct;

/**
 * VkProductSearch represents the model behind the search form about `backend\modules\vk\models\VkProduct`.
 */
class VkProductSearch extends VkProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vk_id', 'owner_id', 'price', 'cat_id', 'dt_add'], 'integer'],
            [['title', 'description', 'currency', 'thumb_photo'], 'safe'],
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
        $query = VkProduct::find();

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
            'vk_id' => $this->vk_id,
            'owner_id' => $this->owner_id,
            'price' => $this->price,
            'cat_id' => $this->cat_id,
            'dt_add' => $this->dt_add,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'thumb_photo', $this->thumb_photo]);

        return $dataProvider;
    }
}

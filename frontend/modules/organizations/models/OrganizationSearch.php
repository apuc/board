<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.02.2017
 * Time: 20:55
 */

namespace frontend\modules\organizations\models;

use common\classes\Debug;
use common\classes\OrganizationInfo;
use common\models\db\CategoryOrganizations;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class OrganizationSearch extends OrgInfo
{

    public function getListOrg()
    {

        $query = OrgInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $request = \Yii::$app->request->get();
        $query->where(['status' => [2, 4]]);

        if (isset($request['slug'])) {
            //$cat = OrganizationInfo::getInfoCatOrgSlug(\Yii::$app->request->get('slug'));
            //Debug::prn($cat);
            $query->andFilterWhere(['category_slug' => \Yii::$app->request->get('slug')]);
            $query->orFilterWhere(['category_parent_slug' => \Yii::$app->request->get('slug')]);
        }

        if (isset($request['regionFilter']) || isset($request['cityFilter']) || isset($request['mainCat']) || isset($request['textFilter'])) {
            $query->andFilterWhere(['category_parent_id' => $request['mainCat']]);
            $query->andFilterWhere(['region_id' => $request['regionFilter']]);
            $query->andFilterWhere(['city_id' => $request['cityFilter']]);
            $query->andFilterWhere(['title' => $request['textFilter']]);
            $query->orFilterWhere(['descr' => $request['textFilter']]);

        }

        $query->orderBy('dt_add DESC');

        return $dataProvider;
    }
}
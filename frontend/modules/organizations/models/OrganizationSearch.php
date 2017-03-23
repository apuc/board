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
use yii\base\Model;
use yii\data\ActiveDataProvider;

class OrganizationSearch extends OrgInfo
{



    public function getListOrg(){

        $query = OrgInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        $query->where(['status' => [2,4]]);

        if (\Yii::$app->request->get('slug')){
            //$cat = OrganizationInfo::getInfoCatOrgSlug(\Yii::$app->request->get('slug'));
            //Debug::prn($cat);
            $query->andFilterWhere(['category_slug' => \Yii::$app->request->get('slug')]);
            $query->orFilterWhere(['category_parent_slug' => \Yii::$app->request->get('slug')]);
        }


        $query->orderBy('dt_add DESC' );

        return $dataProvider;
    }
}
<?php


namespace frontend\modules\personal_area\controllers;


use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\CategoryOrganizations;
use frontend\modules\favorites\models\Favorites;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;

class FavoritesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionAds_favorites(){
        $cat = [];
        if(isset($_GET['id-cat'])){
            $cat = AdsCategory::getParentAllCategory($_GET['id-cat']);
        }
        $query = Favorites::find()
            ->leftJoin('ads', '`ads`.`id` = `favorites`.`gist_id`')
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `favorites`.`gist_id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->andWhere(['`favorites`.`gist`' => 'ad', '`favorites`.`user_id`' => \Yii::$app->user->id])
            ->andFilterWhere(['`ads`.`category_id`' => $cat])
            ->groupBy('`ads`.`id`');


        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $ads = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads','ads_img')
            ->all();

        $categoryRes = [];

        $category = AdsCategory::getMainCategory();
        $adsAll = self::favorites_ads();

        foreach ($category as $item) {
            foreach($adsAll as $ad){
                $mainCat = AdsCategory::getListCategoryAllInfo($ad['ads']->category_id,[]);
                $mainCat = array_reverse($mainCat);
                if($mainCat[0]->id == $item->id){
                    if(!isset($categoryRes[$item->id]['count'])){
                        $categoryRes[$item->id]['count'] = 0;
                    }
                    $categoryRes[$item->id]['count'] = $categoryRes[$item->id]['count']+1;
                    $categoryRes[$item->id]['cat_id'] = $item->id;
                    $categoryRes[$item->id]['name'] = $item->name;
                }
            }

        }

        $request = \Yii::$app->request;
        return $this->render('ads', ['ads' => $ads, 'pagination' => $pagination, 'category' => $categoryRes, 'request' => $request]);
    }

    public function actionDelete_all_favorites(){
        $request = Yii::$app->request;
        //Debug::prn($request);
        $arrAds = explode(',', $request->post('id'));
        array_splice($arrAds, -1);
        switch ($request->post('ads')) {
            case 'ads':
                $url = 'ads_favorites';
                $msg = 'Объявления удалины из закладок';
                break;
            case 'org':
                $url = 'org_favorites';
                $msg = 'Организации удалины из закладок';
                break;
        }
        Favorites::deleteAll(['id' => $arrAds]);
        Yii::$app->session->setFlash('success',$msg);
        return $this->redirect([$url, 'page' => $request->post('page')]);
    }

    function favorites_ads(){
        $query = Favorites::find()
            ->leftJoin('ads', '`ads`.`id` = `favorites`.`gist_id`')
            ->where(['`favorites`.`gist`' => 'ad', '`favorites`.`user_id`' => \Yii::$app->user->id]);
        $ads = $query
            ->groupBy('`ads`.`id`')
            ->all();
        return $ads;
    }

    public function actionOrg_favorites(){
        $query = Favorites::find()
            ->leftJoin('org_info', '`org_info`.`id` = `favorites`.`gist_id`')
            ->andWhere(['`favorites`.`gist`' => 'org', '`favorites`.`user_id`' => \Yii::$app->user->id])
            ->andFilterWhere(['`org_info`.`category_parent_id`' => Yii::$app->request->get('id')])
            ->groupBy('`org_info`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $org = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('org_info')
            ->all();

        $category = CategoryOrganizations::find()->where(['parent_id' => 0])->all();
        //$adsAll = self::favorites_ads();
        $categoryRes = [];
        foreach ($category as $item) {
            //Debug::prn($item->id);
            foreach($org as $value){
                //Debug::prn($value);
                //$mainCat = AdsCategory::getListCategoryAllInfo($ad['ads']->category_id,[]);
                //$mainCat = array_reverse($mainCat);
                if($item->id == $value->org_info->category_parent_id){
                    if(!isset($categoryRes[$item->id]['count'])){
                        $categoryRes[$item->id]['count'] = 0;
                    }
                    $categoryRes[$item->id]['count'] = $categoryRes[$item->id]['count']+1;
                    $categoryRes[$item->id]['cat_id'] = $item->id;
                    $categoryRes[$item->id]['name'] = $item->name;
                }
            }

        }
//Debug::prn($categoryRes);

        $request = \Yii::$app->request;
        return $this->render('org',
            [
                'org' => $org,
                'pagination' => $pagination,
                'request' => $request,
                'category' => $categoryRes
            ]
        );
    }
}
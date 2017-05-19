<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 15:35
 */
use common\models\db\CategoryHelp;

?>
<!-- open .bread -->
<ol class="breadcrumbs__list">
    <li><a href="<?= \yii\helpers\Url::to(['/help']) ?>">Служба поддержки Rubon </a></li>
    <?php if(Yii::$app->controller->action->id == 'category'): ?>
        <li><?= CategoryHelp::find()->where(['id'=>$_GET['id']])->one()->name; ?></li>
    <?php else: ?>
        <?php
            if(Yii::$app->request->get('slug')){
                $title = \common\models\db\Help::find()->where(['slug' => Yii::$app->request->get('slug')])->one()->title;
                if(!empty($title)){
                    echo "<li>$title</li>";
                }
            }
        ?>
    <?php endif; ?>
</ol>
<!-- close .bread -->

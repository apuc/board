<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php $this->head() ?>
</head>
<body bgcolor="#f6f6f6" style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">
<table width="1000px" align="center" cellpadding="0" cellspacing="0" border="0" data-mobile="true" dir="ltr"  style="font-size: 16px; background: url(http://rub-on.ru/frontend/web/img/mail/mail_bg.png) 50% 0% no-repeat rgb(196, 196, 196);">
    <thead>
    <tr>
        <td align="center">
            <table cellspacing="0" cellpadding="0" align="center" border="0" class="wrapper" width="600" style="width: 600px; margin: auto;">
                <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="padding: 8px; font-family: Helvetica, Arial, sans-serif; color: rgb(38, 38, 38);">
                                    <br>
                                    <div><br>
                                    </div>
                                    <div><br></div>
                                    <div><br></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td align="center" valign="top" style="margin: 0; padding: 0;">
            <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: auto; width: 600px; background-image: none; background-color: transparent;" class="wrapper">
                <tbody>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody>
                            <tr>
                                <td valign="top" align="left" style="padding: 0px; margin: 0px;">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="" align="left" valign="top">
                                                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="text">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="left" style="padding: 15px 30px 0px 30px; margin: 0px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); line-height: 2.05; background-color: rgba(13, 14, 22, 0.8);">
                                                            <table border="0" cellpadding="0" cellspacing="0" align="left" data-editable="image" style="text-align: right; margin: 0px; padding: 0px;" data-mobile-width="1" id="edi7i0nm" width="154">
                                                                <tbody>
                                                                <tr style="text-align: right;">
                                                                    <td valign="top" align="left" style="display: inline-block; padding: 0px 10px 10px 0px; margin: 0px;" class="tdBlock"><img src="http://rub-on.ru/frontend/web/img/mail/mail_logo.png" width="148"  height="39" style="border: 0px none transparent; display: block;"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <span><div style="text-align: right;">
                                                                    <a style="text-decoration:none;" href="http://rub-on.ru" target="_blank"><span style="font-size: 14px; color: rgb(255, 246, 196); font-family: Tahoma, sans-serif; background-color: inherit;">ПЕРЕЙТИ НА САЙТ</span></a>
                                                                </div></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background-color: rgba(13, 14, 22, 0.8);">
                                    <div style="">
                                        <img src="http://rub-on.ru/frontend/web/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="margin: 0; padding: 0;">
                        <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" data-editable="text">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: rgba(13, 14, 22, 0.8);">
                                    <?= $content ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="top" style="margin: 0px; padding: 0px 10px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: rgba(13, 14, 22, 0.8);">
                                    <img src="http://rub-on.ru/frontend/web/img/mail/podpis.png" alt="">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background-color: rgba(13, 14, 22, 0.8);">
                                    <div style="">
                                        <img src="http://rub-on.ru/frontend/web/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line" style="/*background: url(http://carbax.ru/frontend/web/media/img/mail/news_bg.png) repeat-y;*/">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 0px 0px; margin: 0px;" >
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" data-editable="line" style="background-color: #fff;">
                                        <tbody>
                                        <?php
                                        $ads = \frontend\modules\adsmanager\models\Ads::find()
                                            ->where(['status' => [2, 4]])
                                            ->orderBy('dt_update DESC')
                                            ->limit(6)
                                            ->with('ads_img')
                                            ->all();

                                        //\common\classes\Debug::prn($ads);
                                        ?>

                                        <tr>
                                            <td style="padding: 0px 30px 0px 30px;" >
                                                <h2 style="color:#000000; font-size: 16px; text-transform: uppercase;">Новые объявления</h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php foreach ($ads as $item):?>
                                                    <a href="http://rub-on.ru/ads/<?= $item->slug; ?>">
                                                        <table border="0" cellpadding="0" cellspacing="0" align="left" width="150" data-editable="line" style="background-color: #fff; padding: 0px 28px;">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="http://rub-on.ru/frontend/web/<?=$item['ads_img'][0]->img_thumb?>" alt="" style="width:142px; height: 100px;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span style="color:#006b93; font-size:13px;font-weight: bold;"><?= $item->title;?></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span style="color:#000000; font-size:13px;font-weight: bold;"><?= $item->price;?><span style="display: inline-block;width: 13px;height: 13px;">руб.</span></span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </a>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0"style="background-color: #fff;">
                        <tbody>
                        <tr>
                            <td style="text-align: center; padding-top: 26px;">
                                <span style="font-family:Tahoma; text-transform: uppercase; color:#282828;font-size: 18px; font-weight: bold;">посмотреть все объявления</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><img src="http://rub-on.ru/frontend/web/img/mail/short_line.png" alt=""></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="padding: 10px; font-family: Arial, Helvetica, sans-serif; color: rgb(38, 38, 38); border: 0px none transparent;">
                                <span style="font-family:Arial,Helvetica,sans-serif;color:#262626;font-size:14px"></span>
                                <div data-box="button" style="width: 100%; margin-top: 0px; margin-bottom: 0px; text-align: center;">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center" data-editable="button" style="padding-bottom: 0px; padding-top: 0px; margin: 0px auto;">
                                        <tbody>
                                        <tr>
                                            <td valign="top" align="center" class="tdBlock" style="display: inline-block; padding: 7px 25px; margin: 0px;     border-radius: 18px;background-color: rgb(51, 74, 81);">
                                                <a href="http://rub-on.ru/all-ads" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: rgb(255, 255, 255); font-size: 18px; text-decoration: none; font-weight: bold;" target="_blank">Перейти</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </tr>


                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0" style="padding: 35px;background: #282828;">
                            <tbody>
                            <tr>
                                <td style="padding-left: 25px;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span style="color:#fff; text-transform: uppercase;">наши контакты</span>
                                            </td>
                                        </tr>
                                        <tr><td><img src="http://rub-on.ru/frontend/web/img/mail/short_lineW.png" alt=""></td></tr>
                                        <tr><td><span style="padding-top: 42px;display: table;"></span></td></tr>
                                        <tr><td><span style="color:#fff;"><!--+7 (945) 555 63 63--></span></td></tr>
                                        <tr><td><span style="color:#fff;">Email: support@rub-on.ru</span></td></tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-left: 20px;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span style="color:#fff; text-transform: uppercase;">Следи за нами</span>
                                            </td>
                                        </tr>
                                        <tr><td><img src="http://rub-on.ru/frontend/web/img/mail/short_lineW.png" alt=""></td></tr>
                                        <tr>
                                            <td>
                                                <span><a href="https://vk.com/donetskbuy"><img src="http://rub-on.ru/frontend/web/img/mail/vk.png" alt=""></a></span>
                                                <!--<span><a href=""><img src="http://rub-on.ru/frontend/web/img/mail/fb.png" alt=""></a></span>
                                                <span><a href=""><img src="http://rub-on.ru/frontend/web/img/mail/px.png" alt=""></a></span>
                                                <span><a href=""><img src="http://rub-on.ru/frontend/web/img/mail/ok.png" alt=""></a></span>
                                                <span><a href=""><img src="http://rub-on.ru/frontend/web/img/mail/tw.png" alt=""></a></span>
                                                <span><a href=""><img src="http://rub-on.ru/frontend/web/img/mail/gg.png" alt=""></a></span>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="http://rub-on.ru/frontend/web/img/mail/mail_logo.png" alt="" width="148px;">
                                            </td>
                                        </tr>
                                        <tr><td></td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0px;">
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" data-editable="line">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="padding: 10px 0px; margin: 0px; background: #282828;">
                                    <div style="">
                                        <img src="http://rub-on.ru/frontend/web/img/mail/line.png" alt="" style="display:block;">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" data-editable="preheader" data-webinar="0">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" style="padding: 8px; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background: #282828;">
                                    <span style="color: rgb(255, 255, 255);">© 2016 by rub-on.ru. All Rights Reserved.</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding: 8px; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background: #282828;">
                                    <span style="color: rgb(255, 255, 255);">Это письмо сгенерировано автоматически, Пожалуйста, не отвечайте на него.</span>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    </tbody>
</table>

</body>
</html>
<?php $this->endPage() ?>

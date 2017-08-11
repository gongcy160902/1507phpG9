<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?//echo $menuItems[] = '<li>'
//    . Html::beginForm(['/site/logout'], 'post')
//    . Html::submitButton(
//        'Logout (' . Yii::$app->user->identity->username . ')',
//        ['class' => 'btn btn-link logout']
//    )
//    . Html::endForm()
//    . '</li>';?>


<div class="wrap">
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link type="text/css" rel="stylesheet" href="css/frontmodule.css" />
        <link type="text/css" rel="stylesheet" href="css/5_themes_default_style.css?v=0.0.0.9" front="css" />
        <link type="text/css" rel="stylesheet" href="css/5_themes_default_flexslider.css?v=0.0.0.9" front="css" />
        <link type="text/css" rel="stylesheet" href="css/5_themes_default_jqueryuicore.css?v=0.0.0.9" front="css" />
        <link type="text/css" rel="stylesheet" href="css/5_themes_default_jqueryuiselectmenu.css?v=0.0.0.9" front="css" />
        <link type="text/css" rel="stylesheet" href="css/5_themes_default_jqueryuitheme.css?v=0.0.0.9" front="css" />
        <script type="text/javascript">
            window.PERF_START=new Date;
            function _splash(page, uid, tid, pid){
                uid =  uid || 0;  // 这里是用户ID
                tid =  tid || 0;   // 这里是租户ID
                pid =  pid || 'unknown';  // 这里是项目标识
                var now = new Date;
                var start = window.PERF_START || now;
                var diff = now - start;
                var rand = Math.round(Math.random()*1000000);
                var url= document.location.protocol+'//opsapi.beisen.com/opsapi/AddLog?appName='+pid+'&label=%5Bsplash%5D%20'+page+'&uid='+uid+'&tid='+tid+'&time='+diff+'&type=1&sid='+rand+'&step=0';
                var img = new Image;
                img.src = url;
            }
        </script>
        <script type="text/javascript" src="js/5_themes_default_jquery191.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_jqueryflexslidermin.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_jqueryuicore1.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_jqueryuiposition.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_jqueryuiwidget.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_jqueryuiselectmenu1.js?v=0.0.0.9"></script>
        <script type="text/javascript" src="js/5_themes_default_demo.js?v=0.0.0.9"></script>
        <script type="text/javascript">var $bs_vars={'st':'http://stnew.beisen.com/','version':'2015.09.17.001','constSite':'http://const.tms.beisen.com'};function vstr(str) {
                if (typeof ($bs_vars) == 'undefine')
                    return str;
                var result = str;
                for (var v in $bs_vars) {
                    var regex = new RegExp('\\$\\{' + v.toString() + '\\}|\\{' + v.toString() + '\\}', 'igm');
                    result = result.replace(regex, $bs_vars[v]);
                }
                return result;
            };</script>
        <!--引用静态文件:requirejs-->
        <script type="text/javascript" src="js/require.js"></script>
        <title>首页</title>
    </head>
    <body>
    <div class="header">
        <div class="headercontain">
            <div class="logo">
                <img src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" />
            </div>
            <!--module:login begin-->
            <div class="bs-module">
                <div class="login-link ">
                    <div class="login-hearder">
                        <?   if (!Yii::$app->user->isGuest) {?>

                            <ul class="header-login" >
                                <li class="welcome"><span><span class="userName" ></span>
                                        <?= $name= Yii::$app->user->identity->username ?>，欢迎您！
                                 </span></li>
                                <li class="PortalIndex"><a href="?r="><span>个人中心</span></a></li>
                                <li class="LogoutUrl">
                                    <form action="?r=site/logout" method="post">
                                        <input type="submit" value="退出"/>
                                    </form>
                                </li>
                            </ul>

                        <? }else{?>

                            <ul class="header-unLogin">
                                <li><a class="loginlink" href="?r=site/login"> <span>登录</span> </a></li>
                                <li><a class="reglink" href="?r=site/signup"><span> 注册</span></a></li>
                            </ul>
                        <?}?>
                    </div>

                </div>
            </div>
            <!--module:login end-->
            <!--module:internalrecommend begin-->
            <div class="bs-module">
                <div class="internalrecommend-default ">
                    <div class="internaldiv">
                        <a class="internal" href="http://neitui.zhiye.com/51talk" target="_blank">内部推荐专区</a>
                    </div>
                </div>
            </div>
            <!--module:internalrecommend end-->
        </div>
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

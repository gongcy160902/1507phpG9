
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>注册</title>
    <script type="text/javascript">
        try {
            top.location.hostname;
            if (top.location.hostname != window.location.hostname) {
                top.location.href = window.location.href;
            }
        }
        catch (e) {
            top.location.href = window.location.href;
        }
    </script>
    <!--通用样式Css和脚本-->
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
    <!--引用静态文件:skin_default-->
    <link href="css/common.css" rel="stylesheet" type="text/css" />
    <link href="css/templateform.css" rel="stylesheet" type="text/css" />
    <link href="css/controls.css" rel="stylesheet" type="text/css" />
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/base_new.js"></script>
    <script type="text/javascript" src="js/widgetnew.js?v=3"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/bsdialog.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/controls.js"></script>
    <script type="text/javascript" src="js/underscore.js"></script>
    <script type="text/javascript" src="js/school-select-v2.js?v=6"></script>
    <link href="css/school-select-v2.css" rel="stylesheet" type="text/css" />
    <!--引用静态文件:skin_new_css-->
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <!--引用静态文件:new_dialog_js-->
    <script type="text/javascript" src="js/dialog_js.js"></script>
    <!--产品头部CSS和脚本-->

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
    <!--引用静态文件:front_css-->
    <link href="css/front.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div class="bs_deliver">

    <div class="dl_content dl_gray_bg">
        <div class="dl_content">
            <div class="map">
                <div class="dl_lit-wrap dl_padr30 width553 clearfix">
                    <div class="dl_loginleft dl_padr0">
                        <h3 class="dl_tit_green">注册</h3>
                        <?php
                            use yii\helpers\Html;
                            use yii\widgets\ActiveForm;
                              $form = ActiveForm::begin();
                         ?>
                        <?= $form->field($model,'tel')->textInput()?>
                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-11">
                                <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>




                    </div>
                    <div class="dl_loginright width170">
                        <div class="dl_register">
                            <span class="noaccount">已有账号？</span>
                            <a href="?r=username/login">点击登录</a>
                        </div>
                        <!--                        <h3 class="dl_otherchoice">使用其他账号登录：</h3>-->
                        <!--                        <div class="dl_logos">-->
                        <!--                            <a class="dl_sinalogo dl_grey1 sina" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=sina_connect_v2&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">微博</a>-->
                        <!--                            <a class="dl_qqlogo dl_grey1 qq" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=qzone_login&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">QQ</a>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dl_footer">
        <p>&copy;2017&nbsp;北京八维研修学院，软工学院、1507phpG班、七组成员&nbsp;&nbsp;帮助热线：15947080921</p>
    </div>
</div>
<script language="javascript" type="text/javascript">
    $(".sina,.qq").click(function () {
        var url = $(this).attr("url");
        window.open(url, 'newwindow', 'height=600, width=800, top=200, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=yes,location=no, status=no');
    });
</script>
</body>
</html>
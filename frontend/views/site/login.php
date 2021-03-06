<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>登录</title>
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
    <script src="js/WdatePicker.js"></script>
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
    <style type="text/css">
        .checkbox_list {float: left;width: 450px;}
        .form_container ul li span.start_date {width: 80px;}
        .form_container ul li span.end_date {width: 70px;}
        .dl_logo img {
            width: auto!important;
            height: 40px!important;
            margin: 16px 0 0 30px!important;
        }
    </style>
    <script type="text/javascript">
        $.post("ajax.php", {type:"1"}, function(data) {
            var loginView = $(".login-hearder .header-login");
            var unLoginView = $(".login-hearder .header-unLogin");
            if (data.name != '') {
                loginView.find('.userName').text(data.name);
                loginView.show()
            }
            else {
                unLoginView.show()
            }
        }, "json")
    </script>
    <script type="text/javascript" id="user-info-header">



        $(document).ready(function () {
            var isApplyDetail = "False".toLowerCase() == 'true' ? true : false;
            //先获取用户的基本信息，这里的ajax是同步等待
            if (!isApplyDetail) {
                var userInfo = window.userInfo;
                var detailView = $(".dl_rightit .isApplyDetail");
                var loginView = $(".dl_rightit .isLogin");
                var unLoginView = $(".dl_rightit .unLogin");
                detailView.show();
                //头部对外公开的口，可以修改用户名
                window.loginHeaderView = {
                    userNameText: function (text) {
                        var shortText = text && text.length > 20 ? text.substring(0, 20) : text;
                        loginView.find('.userShortName').text(shortText);
                        loginView.find('#topUserEmail').attr('title', text);
                    }
                };
                if (userInfo.isLogin) {
                    loginView.show();
                    loginView.find('.userShortName').text(userInfo.shortName);
                    loginView.find('#topUserEmail').attr('title', userInfo.name);
                }
                else {
                    unLoginView.show();
                }
            }
        })

        var UserPrompt = function (options) {
            this.paramMap = {
                targetSelector: 'targetSelector'
                , promptText: 'promptText'
            }
            this.floater = {
                tag: options[this.paramMap.targetSelector]
                , position: {}
                , size: {}
            };
            this.promptText = '您尚未设置密码，请点这里修改吧！';//options[this.paramMap.promptText] || '';
            this.ui = {
                close: ".user-prompt-closeBtn"
            };
            this.initialize();
        };
        UserPrompt.prototype = {
            initialize: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;

                self.getFloater();
                self.makeView();
                self.attachCss()
                self.aliveUi();
                self.bindEvents();
            }
            , render: function () {
                var self = this;
                self.$el.appendTo($('body'));
            }
            , show: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;
                //控制所有子页面的show，如果用户第一次登陆才可以show
                //这里没有在子页面去判断是否show是因为单价太高，一共有3个子页面，不好维护
                if (window.userInfo.firstLogin) self.render();
            }
            , hide: function () {
                var self = this;
                $el.remove();
            }
            , getFloater: function () {
                var self = this;
                self.floater.tag = $(self.floater.tag) || $('body');
                self.floater.position = self.floater.tag.position();
                self.floater.size = {
                    'height': self.floater.tag.height()
                    , 'width': self.floater.tag.width()
                }
            }
            , makeView: function () {
                var self = this;
                self.$el = $("<div class='user-prompt-user-firstIn'>" +
                "<div class='user-prompt-action-container'>" +
                "<span class='user-prompt-closeBtn' title='close'></span>" +
                "</div>" +
                "<div class='user-prompt-content'>" + self.promptText + "</div>" +
                "</div>");
            }
            , attachCss: function () {
                var self = this;
                //这里的0.9和4是写死的数，为了调整位置
                self.$el.css({
                    'top': (self.floater.position.top + self.floater.size.height) + 'px' // + 15
                    , 'left': (self.floater.position.left - self.floater.size.width / 4) + 'px'//+ self.floater.size.width / 2
                });
            }
            , aliveUi: function () {
                var self = this;
                var aliveUi = {};
                $.each(self.ui, function (key, value) {
                    aliveUi[key] = self.$el.find(value) || null;
                });
                self.ui = aliveUi;
            }
            , bindEvents: function () {
                var self = this;
                self.ui.close.bind('click', function () {
                    self.$el.remove()
                })
            }
        };


    </script>
</head>
<body>
<div class="bs_deliver" style="margin-top: -66px;">

    <div class="dl_content dl_gray_bg">
        <!---->
        <!--申请职位 s-->
        <!--申请职位 e-->
        <!--我的简历 s-->
        <!--简历内容 s-->
        <script type="text/javascript" src="js/jquery.validate.unobtrusive.js"></script>
        <script type="text/javascript" src="js/jquery.form.min.js"></script>
        <script language="javascript" type="text/javascript">
            $(function () {
                var form = $('#loginForm').ajaxForm({
                    dataType: 'json',
                    beforeSerialize: function ($form, options) {
                        var jsonResultHidden = form.find('input:hidden[name=JsonResult]').val(true);
                        if (!jsonResultHidden.length) {
                            jsonResultHidden = $('<input type="hidden" name="JsonResult" value="true"/>').appendTo(form);
                        }
                    },
                    success: function (response, textStatus) {
                        if (response.Success) {
                            if (response.RedirectUrl) {
                                window.location.href = response.RedirectUrl;
                            } else {
                                window.location.href = 'test.zhiye.comindex.html';
                            }
                        } else {

                            var msgStr = '';
                            for (var i = 0; i < response.Messages.length; i++) {
                                msgStr += response.Messages[i] + '\r\n';
                            }

                            var validator = form.validate();
                            //var errors = [];
                            for (var i = 0; i < response.FieldErrors.length; i++) {
                                var obj = {};
                                obj[response.FieldErrors[i].FieldName] = response.FieldErrors[i].ErrorMessage;
                                validator.showErrors(obj);
                            }
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) { alert('error'); }
                });
            });
        </script>
        <script language="javascript" type="text/javascript">
            $(function () {
                var form = $('#loginForm').ajaxForm({
                    dataType: 'json',
                    beforeSerialize: function ($form, options) {
                        var jsonResultHidden = form.find('input:hidden[name=JsonResult]').val(true);
                        if (!jsonResultHidden.length) {
                            jsonResultHidden = $('<input type="hidden" name="JsonResult" value="true"/>').appendTo(form);
                        }
                    },
                    success: function (response, textStatus) {
                        if (response.Success) {
                            if (response.RedirectUrl) {
                                window.location.href = response.RedirectUrl;
                            } else {

                            }
                        } else {
                            getImgSrc();
                            var eleName = response.FieldErrors[0].FieldName;
                            var errorMsg = response.FieldErrors[0].ErrorMessage;
                            //console.log(response)
                            //$(".bs_pop_alert").each(function () {
                            //    if ($(this).attr('data-valmsg-for') == eleName);
                            //    $(this).html('<span for="' + eleName + '" generated="true" class="">' + errorMsg + '</span>');
                            //})

                            //var msgStr = '';
                            //for (var i = 0; i < response.Messages.length; i++) {
                            //    msgStr += response.Messages[i] + '\r\n';
                            //}

                            var validator = form.validate();
                            //var errors = [];
                            for (var i = 0; i < response.FieldErrors.length; i++) {
                                var obj = {};
                                obj[response.FieldErrors[i].FieldName] = response.FieldErrors[i].ErrorMessage;
                                validator.showErrors(obj);
                            }
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) { alert('error'); }
                });
            });
        </script>
        <style type="text/css"> .bs_pop_alert { margin-left: 12px } </style>
        <div class="dl_content">
            <div class="map">
                <div class="dl_lit-wrap clearfix" style=" width: 700px;">
                    <div class="dl_loginleft1">
                        <h3 class="tit">请登录</h3>
                        <div class="site-login">
                            <h1><?= Html::encode($this->title) ?></h1>
                            <div class="row">
                                <div class="col-lg-5">
                                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                    <div class="form-group">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="dl_loginright1">
                        <div class="dl_register">
                            <span class="noaccount">没有自己的账号？</span>
                            <a href="#" url="?r=site/signup" class="register">立刻注册</a>
                        </div>
                        <h3 class="dl_otherchoice">使用其他账号登录：</h3>
                        <div class="dl_logos">
                            <a class="dl_sinalogo dl_grey1 sina" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=sina_connect_v2&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fLogin&amp;host=51talk.zhiye.com&amp;portalid=104003">微博</a>
                            <a class="dl_qqlogo dl_grey1 qq" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=qzone_login&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fLogin&amp;host=51talk.zhiye.com&amp;portalid=104003">QQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script language="javascript">

            $(".sina,.qq").click(function () {
                var url = $(this).attr("url");
                window.open(url, 'newwindow', 'height=600, width=800, top=200, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=yes,location=no, status=no');
            });

        </script>
        <!--简历内容 e-->
    </div>
    <div class="dl_footer">
        <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p>
    </div>
</div>

</body>
</html>

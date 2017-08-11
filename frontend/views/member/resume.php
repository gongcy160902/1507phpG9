<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>我的简历</title>
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
    <div class="dl_header_border">
        <div class="dl_header clearfix">
            <div class="dl_logo">
                <img id="logoImg" class="header-logo-img" src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;display: none;" />
            </div>
            <div class="dl_rightit">
                <div class="isApplyDetail" style="display:none">
                    <div class="isLogin" style="display:none">
                        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span>，欢迎您！</span>
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="isUserCenter" style="display:none"> <span class="pad3"><a href="member_apply.html">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span>
                        <span class="pad3"><a href="/Portal/Account/Logout">退出</a></span>
                    </div>
                    <div class="unLogin" style="display:none">
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Login">登录</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Register">注册</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dl_content dl_gray_bg">
        <!---->
        <!--申请职位 s-->
        <!--申请职位 e-->
        <!--我的简历 s-->
        <!--简历内容 s-->
        <script type="text/javascript">

            $(document).ready(function () {

                var promptview = new UserPrompt({
                    targetSelector: 'a.accountsettings'
                    , promptText: '在账户设置中，可以改用户名和密码啦！'
                });
                promptview.show();
            })
        </script>
        <div class="dl_bigwrap dl_heightagain clearfix dl_grey_bc">
            <div class="leftmenu" style="width: 160px;margin-left: 20px;">
                <div class="dl_greyline_bg">
                    <span class="dl_menutit">个人中心</span>
                </div>
                <ul class="dl_menulist clearfix">
                    <ul class="dl_menulist clearfix">
                        <li> <a href="?r=member/apply" class="apply">我的申请</a> </li>
                        <li class="selected profilechoose" style="height: 35px;"> <span class="dl_menuchose">我的简历</span> </li>
                        <li> <a href="?r=member/collect" class="shoucang">已收藏职位</a> </li>
                        <li> <a href="?r=apply/apply_info" class="shoucang">创建简历</a> </li>
                </ul>
            </div>
            <div class="rightcontent dl_height1 dl_new_error_wrap">
                <h3 class="dl_bigtit"><span class="dl_postit">我的简历</span></h3>
                <div class="dl_importprofile">
                    <a class="import dl_import" href="javascript:void(0)">导入简历</a>
                    <a id="previewBtn" class="look" target="preview" href="/Portal/Resume/PreviewResume?applyform=e725c9e8-01eb-42ca-8321-eee7569f5301" style="">预览简历</a>
                    <span id="previewBtnDisable" class="look" style="color:#666;display:none;">预览简历</span>
                </div>
                <style type="text/css">
                    *html .dl_myleftform .form_container {
                        width: 490px;
                        overflow: hidden;
                    }

                    *html .dl_myleftform .form_container .form_part .columntwo ul {
                        width: 360px;
                        overflow: hidden;
                    }

                    *html .dl_myleftform .form_container ul li {
                        width: 360px;
                        overflow: hidden;
                    }
                    /* .dl_myleftform .form_container li label{width: 100px}*/
                    *html .dl_myleftform .form_container ul li span.preview_text {
                        width: 220px;
                        overflow: hidden;
                    }

                    .form_container li textarea {
                        border: 1px solid #c1d5df;
                        float: left;
                        height: 100px;
                        margin-right: 5px;
                        padding: 3px;
                        width: 300px;
                    }
                </style>
                <div class="dl_basicinfo">
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit ">个人信息</span>
                    </div>
                    <div class="dl_basicborder mainContainer ">
                        <form method="post" id="cd7c7714-b39a-43a0-9c7e-f7382f04f5cd" name="cd7c7714-b39a-43a0-9c7e-f7382f04f5cd" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                            <div class="clearfix">
                                <div id="resumeitems" name="singleedit" class="dl_myleftform" style="display:none;;">
                                    <input type="hidden" name="oId" id="Hidden1" value="a4fc2e74-0cd1-4163-a4a1-57112d95fcfc" />
                                    <input type="hidden" name="jId" id="Hidden4" value="-1" />
                                    <input type="hidden" name="mId" id="Hidden5" value="0" />
                                    <input name="_objectDataID" type="hidden" value="NDc0NjFhMzktMTg2My00YzM3LTlmOTgtY2ZkN2UyOTFlNmQ0JGE0ZmMyZTc0LTBjZDEtNDE2My1hNGExLTU3MTEyZDk1ZmNmYw==" />
                                    <input name="_metaObjID" type="hidden" value="NDc0NjFhMzktMTg2My00YzM3LTlmOTgtY2ZkN2UyOTFlNmQ0" />
                                    <input name="_viewName" type="hidden" value="UGVyc29uUHJvZmlsZVZpZXc=" />
                                    <input name="_version" type="hidden" value="MjAxMzA3MDQwNDQ4NDUzNzIx" />
                                    <input name="_formIndex" type="hidden" value="1" />
                                    <div class="form_container" id="RecruitmentPortal.PersonProfile">
                                        <h2 class="form_title"> <strong>个人信息</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label class="current label_required">姓名：</label><input class="{required:true,messages:&quot;请填写姓名&quot;} mul_input" name="RecruitmentPortalPersonProfile_Name" id="4c037148-140a-4c2b-b87a-b97609215d7011" value="zhange" /><span class="desc"></span> </li>
                                                    <li><label class="current label_required">邮箱：</label> <input class="{required:true,messages:&quot;请填写邮箱&quot;} mul_input" name="RecruitmentPortalPersonProfile_email" id="67a5c587-4f90-4ae7-819f-eb3dba9ea39911" value="416148489@qq.com" /> <span class="desc"></span> </li>
                                                    <li><label class="current label_required">手机号：</label> <input class="{required:true,messages:'请填写手机号'} mul_input " name="RecruitmentPortalPersonProfile_Mobile" id="acb9b67f-9643-41fb-a7fe-5ff8d742ccdf11" value="13851435593" /> </li>
                                                    <li><label>出生日期：</label> <input class="mul_input Wdate" name="RecruitmentPortalPersonProfile_Birthday" id="436ab7a4-67a1-4819-a238-d5d34eb0717611" value="2003/12/15" /> <span class="desc"></span> </li>
                                                    <li><label>性别：</label>
                                                        <div class="radio_list">
                                                            <input type="radio" name="RecruitmentPortalPersonProfile_gender" value="0" checked="checked" />
                                                            <label class="radio_label">男</label>
                                                            <input type="radio" name="RecruitmentPortalPersonProfile_gender" value="1" />
                                                            <label class="radio_label">女</label>
                                                        </div> </li>
                                                    <li><label>现居住地：</label> <input type="text" readonly="true" displayname="现居住地" constname="Areas" value="" class="Ajson ConstDictSingleSelect" id="RecruitmentPortalPersonProfile_ResidenceState_Id" /> <input type="hidden" name="RecruitmentPortalPersonProfile_ResidenceState" id="RecruitmentPortalPersonProfile_ResidenceState" class=" ResidenceState" /> <span class="desc">例：浙江省杭州市</span> </li>
                                                    <li><label>户口所在地：</label> <input type="text" readonly="true" displayname="户口所在地" constname="Areas" value="" class="Ajson ConstDictSingleSelect" id="RecruitmentPortalPersonProfile_RPR_Id" /> <input type="hidden" value="" name="RecruitmentPortalPersonProfile_RPR" id="RecruitmentPortalPersonProfile_RPR" class="ResidenceState" /> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columntwo">
                                                <ul>
                                                    <li><label>最高学历：</label> <select name="RecruitmentPortalPersonProfile_EducationLevel" id="RecruitmentPortalPersonProfile_EducationLevel" class="mul_select"> <option value="">请选择</option> <option value="3">高中及以下</option> <option value="4">中技（中专/技校/职高）</option> <option value="5">大专</option> <option value="1">本科</option> <option value="2">硕士研究生</option> <option value="6">MBA</option> <option value="7">博士研究生</option> </select> </li>
                                                    <li><label>学习形式：</label> <select name="RecruitmentPortalPersonProfile_EducationStudyMode" id="RecruitmentPortalPersonProfile_EducationStudyMode" class="mul_select"> <option value="">请选择</option> <option value="1">全国普通高等院校全日制</option> <option value="2">成人高等教育</option> <option value="3">专升本 </option> <option value="4">自学考试 </option> <option value="5">其它</option> </select> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>民族：</label> <select name="RecruitmentPortalPersonProfile_Nation" id="RecruitmentPortalPersonProfile_Nation" class="mul_select"> <option value="">请选择</option> <option value="1">汉族</option> <option value="2">回族</option> <option value="3">畲族</option> <option value="4">塔塔尔族</option> <option value="5">阿昌族</option> <option value="6">哈萨克族</option> <option value="7">土家族</option> <option value="8">景颇族</option> <option value="9">哈尼族</option> <option value="10">土族</option> <option value="11">白族</option> <option value="12">维吾尔族</option> <option value="13">保安族</option> <option value="14">赫哲族</option> <option value="15">乌孜别克族</option> <option value="16">基诺族</option> <option value="17">布依族</option> <option value="18">拉祜族</option> <option value="19">锡伯族</option> <option value="20">黎族</option> <option value="21">东乡族</option> <option value="22">蒙古族</option> <option value="23">仫佬族</option> <option value="24">达斡尔族</option> <option value="25">藏族</option> <option value="26">毛南族</option> <option value="27">裕固族</option> <option value="28">俄罗斯族</option> <option value="29">德昂族</option> <option value="30">僳僳族</option> <option value="31">瑶族</option> <option value="32">朝鲜族</option> <option value="33">布朗族</option> <option value="34">满族</option> <option value="35">彝族</option> <option value="36">门巴族</option> <option value="37">侗族</option> <option value="38">苗族</option> <option value="39">佤族</option> <option value="40">羌族</option> <option value="41">独龙族</option> <option value="42">怒族</option> <option value="43">珞巴族</option> <option value="44">普米族</option> <option value="45">傣族</option> <option value="46">纳西族</option> <option value="47">高山族</option> <option value="48">壮族</option> <option value="49">额伦春族</option> <option value="50">塔吉克族</option> <option value="51">京族</option> <option value="52">仡佬族</option> <option value="53">鄂温克族</option> <option value="54">撒拉族</option> <option value="55">柯尔克孜族</option> <option value="56">水族</option> <option value="57">其它</option> </select> </li>
                                                    <li><label>证件照：</label> <input type="hidden" name="RecruitmentPortalPersonProfile_IDPhoto" id="c71310e0-0bef-4173-9826-21a572d4943d11" value="" /> <span><a class="uploadfile" id="c71310e0-0bef-4173-9826-21a572d4943d11_btn">上传</a></span> <span class="desc uploaddesc">推荐1寸照片尺寸，70x100象素。支持jpg，jpeg, gif，bmp或png格式，大小不超过512k</span>
                                                        <ul id="c71310e0-0bef-4173-9826-21a572d4943d11_info" class="uploadfilescontainer" style="margin-left:70px;">
                                                        </ul> </li>
                                                    <li><label>自我评价：</label> <textarea class="textarea mul_textarea" name="RecruitmentPortalPersonProfile_evaluation" id="628bbf58-340a-42d3-bb4d-9e892582841211"></textarea> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div name="singleview" class="dl_myleftform" style="">
                                    <div class="form_container" id="RecruitmentPortal.PersonProfile">
                                        <h2 class="form_title"> <strong>个人信息</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>姓名：</label> <span class="preview_text">zhange</span> </li>
                                                    <li><label>邮箱：</label> <span class="preview_text">416148489@qq.com</span> </li>
                                                    <li><label>手机号：</label> <span class="preview_text">13851435593</span> </li>
                                                    <li><label>出生日期：</label> <span class="preview_text"> 2003年12月15日 </span> </li>
                                                    <li><label>性别：</label> <span name="RecruitmentPortalPersonProfile_gender_span" class="preview_text"> 男</span> </li>
                                                    <li><label>现居住地：</label> <span class="preview_text"></span> </li>
                                                    <li><label>户口所在地：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columntwo">
                                                <ul>
                                                    <li><label>最高学历：</label> </li>
                                                    <li><label>学习形式：</label> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>民族：</label> </li>
                                                    <li><label>证件照：</label> <a href="about.html"></a> </li>
                                                    <li><label>自我评价：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dl_myrightfile">
                                    <div style="width: 118px; margin-left: 12px">
                                        <a name="btnSingleSave" href="#this" class="dl_btn_grey3" style="display:none;"> <span>保存</span> </a>
                                        <a name="btnSingleCancel" href="#this" class="dl_btn_grey3" style="display:none;float: right;"> <span>取消</span> </a>
                                        <a name="btnSingleEdit" href="javascript:void(0)" class="dl_mglft10" style="float: right; padding-bottom: 10px;">编辑</a>
                                    </div>
                                    <img id="idPhoto" style="width: 120px; height: 140px; padding-top: 10px; display: none;" src="images/upfile.jpg" />
                                    <br />
                                    <a class="blue" id="idPhotoUploadBtn" href="javascript:void(0)" style="display:none;">上传照片</a>
                                    <ul id="idPhotoerrinfo" class="warninfo" style="color: #f17f7f; font-size: 12px;">
                                    </ul>
                                    <ul id="idPhotowarninfo" class="warninfo" style="display:none;">
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <input type="hidden" class="viewName" value="201307040448453721" />
                    </div>
                </div>
                <style type="text/css">
                    *html .dl_myleftform .form_container {
                        width: 490px;
                        overflow: hidden;
                    }

                    *html .dl_myleftform .form_container .form_part .columntwo ul {
                        width: 360px;
                        overflow: hidden;
                    }

                    *html .dl_myleftform .form_container ul li {
                        width: 360px;
                        overflow: hidden;
                    }
                    /* .dl_myleftform .form_container li label{width: 100px}*/
                    *html .dl_myleftform .form_container ul li span.preview_text {
                        width: 220px;
                        overflow: hidden;
                    }

                    .form_container li textarea {
                        border: 1px solid #c1d5df;
                        float: left;
                        height: 100px;
                        margin-right: 5px;
                        padding: 3px;
                        width: 300px;
                    }
                </style>
                <div class="dl_basicinfo">
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit ">求职意向</span>
                    </div>
                    <div class="dl_basicborder mainContainer ">
                        <form method="post" id="fdfa1ef1-0a89-4bf9-8500-674c5e233e3f" name="fdfa1ef1-0a89-4bf9-8500-674c5e233e3f" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                            <div class="clearfix">
                                <div id="resumeitems" name="singleedit" class="dl_myleftform" style="display:none;;">
                                    <input type="hidden" name="oId" id="Hidden1" value="f09d29a6-3c52-4237-bcd5-ecaddf83c9de" />
                                    <input type="hidden" name="jId" id="Hidden4" value="-1" />
                                    <input type="hidden" name="mId" id="Hidden5" value="1" />
                                    <input name="_objectDataID" type="hidden" value="OGJjNjNiM2UtZDYzZC00MTZiLThjMWYtOTkwNzIyODJlZTNmJGYwOWQyOWE2LTNjNTItNDIzNy1iY2Q1LWVjYWRkZjgzYzlkZQ==" />
                                    <input name="_metaObjID" type="hidden" value="OGJjNjNiM2UtZDYzZC00MTZiLThjMWYtOTkwNzIyODJlZTNm" />
                                    <input name="_viewName" type="hidden" value="T2JqZWN0aXZlVmlldw==" />
                                    <input name="_version" type="hidden" value="MjAxMzA3MDQwNDQ4NDU2MDkx" />
                                    <input name="_formIndex" type="hidden" value="11" />
                                    <div class="form_container" id="RecruitmentPortal.Objective">
                                        <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>现从事职业：</label> <input type="text" readonly="true" displayname="现从事职业" constname="JobCategory" value="" class="Ajson ConstDictSingleSelect" id="RecruitmentPortalObjective_CurrJobCategory_Id" /> <input type="hidden" value="" name="RecruitmentPortalObjective_CurrJobCategory" id="RecruitmentPortalObjective_CurrJobCategory" class="ResidenceState" /> </li>
                                                    <li><label>求职状态：</label> <select name="RecruitmentPortalObjective_WorkState" id="RecruitmentPortalObjective_WorkState" class="mul_select"> <option value="">请选择</option> <option value="1">正在主动找工作</option> <option value="2">可以考虑更好的工作机会</option> <option value="3">目前不想找工作</option> </select> </li>
                                                    <li><label>期望从事职业：</label> <input type="text" readonly="true" displayname="期望从事职业" constname="JobCategory" value="美术&middot;设计&middot;创意类" class="Ajson ConstDictSingleSelect" id="RecruitmentPortalObjective_ExpectJobCategory_Id" /> <input type="hidden" value="158" name="RecruitmentPortalObjective_ExpectJobCategory" id="RecruitmentPortalObjective_ExpectJobCategory" class="ResidenceState" /> </li>
                                                    <li><label>现月薪(税前)：</label> <select name="RecruitmentPortalObjective_CurrSalary" id="RecruitmentPortalObjective_CurrSalary" class="mul_select"> <option value="">请选择</option> <option value="1">1000以下</option> <option value="2">1000～2000</option> <option value="3">2001～4000</option> <option value="4">4001～6000</option> <option value="5">6001～8000</option> <option value="6">8001～10000</option> <option value="7">10001～15000</option> <option value="8">15001～25000</option> <option value="9">25000以上</option> <option value="10">面议</option> </select> </li>
                                                    <li><label>期望月薪(税前)：</label> <select name="RecruitmentPortalObjective_ExpectSalary" id="RecruitmentPortalObjective_ExpectSalary" class="mul_select"> <option value="">请选择</option> <option value="1">1000以下</option> <option value="2">1000～2000</option> <option value="3">2001～4000</option> <option value="4">4001～6000</option> <option value="5">6001～8000</option> <option value="6">8001～10000</option> <option value="7">10001～15000</option> <option value="8">15001～25000</option> <option value="9">25000以上</option> <option value="10">面议</option> </select> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div name="singleview" class="dl_myleftform" style="">
                                    <div class="form_container" id="RecruitmentPortal.Objective">
                                        <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>现从事职业：</label> <span class="preview_text"></span> </li>
                                                    <li><label>求职状态：</label> </li>
                                                    <li><label>期望从事职业：</label> <span class="preview_text">美术&middot;设计&middot;创意类</span> </li>
                                                    <li><label>现月薪(税前)：</label> </li>
                                                    <li><label>期望月薪(税前)：</label> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dl_myrightfile">
                                    <div style="width: 118px; margin-left: 12px">
                                        <a name="btnSingleSave" href="#this" class="dl_btn_grey3" style="display:none;"> <span>保存</span> </a>
                                        <a name="btnSingleCancel" href="#this" class="dl_btn_grey3" style="display:none;float: right;"> <span>取消</span> </a>
                                        <a name="btnSingleEdit" href="javascript:void(0)" class="dl_mglft10" style="float: right; padding-bottom: 10px;">编辑</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <input type="hidden" class="viewName" value="201307040448456091" />
                    </div>
                </div>
                <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;">
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit">教育背景</span>
                    </div>
                    <div class="dl_basicborder" style="display: none;">
                        <form method="post" id="emptyFrom_7" name="emptyFrom_7" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem" style="display: none;">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="oId" value="" />
                                    <input type="hidden" name="jId" id="jId" value="-1" />
                                    <input type="hidden" name="mId" id="mId" value="7" />
                                    <div class="form_container" id="RecruitmentPortal.Education">
                                        <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学校名称：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li> <label> 时间：</label> <span class="preview_text start_date"> </span> <span class="preview_text end_date"> </span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学历：</label> </li>
                                                    <li><label>学位：</label> </li>
                                                    <li><label>专业名称：</label> <span class="preview_text"></span> </li>
                                                    <li><label>专业描述：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <div class="dl_basicborder">
                        <form method="post" id="10655b54-ca89-4bd0-a9a9-b65600e0174a" name="10655b54-ca89-4bd0-a9a9-b65600e0174a" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="Hidden7" value="39cc3186-545a-4cc9-8b9e-74c80a398ad8" />
                                    <input type="hidden" name="jId" id="Hidden8" value="-1" />
                                    <input type="hidden" name="mId" id="Hidden9" value="7" />
                                    <div class="form_container" id="RecruitmentPortal.Education">
                                        <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学校名称：</label> <span class="preview_text">中国人民大学</span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li> <label> 时间：</label> <span class="preview_text start_date"> 1973年07月至</span> <span class="preview_text end_date"> 今 </span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学历：</label> <span class="preview_text">硕士研究生</span> </li>
                                                    <li><label>学位：</label> <span class="preview_text">MBA</span> </li>
                                                    <li><label>专业名称：</label> <span class="preview_text">qqqq</span> </li>
                                                    <li><label>专业描述：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <div class="dl_basicborder">
                        <form method="post" id="fa8a475a-1e60-4402-bc67-15bd75bcde7f" name="fa8a475a-1e60-4402-bc67-15bd75bcde7f" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="Hidden7" value="fa3b9143-da17-4a66-9c22-69b6702cc1d0" />
                                    <input type="hidden" name="jId" id="Hidden8" value="-1" />
                                    <input type="hidden" name="mId" id="Hidden9" value="7" />
                                    <div class="form_container" id="RecruitmentPortal.Education">
                                        <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学校名称：</label> <span class="preview_text">北京化工大学</span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li> <label> 时间：</label> <span class="preview_text start_date"> 1972年05月至</span> <span class="preview_text end_date"> 今 </span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>学历：</label> <span class="preview_text">硕士研究生</span> </li>
                                                    <li><label>学位：</label> <span class="preview_text">学士</span> </li>
                                                    <li><label>专业名称：</label> <span class="preview_text">qqq</span> </li>
                                                    <li><label>专业描述：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <input type="hidden" class="viewName" value="201307040448456411" />
                    <div class="dl_mgtop10">
                        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a>
                    </div>
                </div>
                <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;">
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit">工作经验</span>
                    </div>
                    <div class="dl_basicborder" style="display: none;">
                        <form method="post" id="emptyFrom_6" name="emptyFrom_6" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem" style="display: none;">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="oId" value="" />
                                    <input type="hidden" name="jId" id="jId" value="-1" />
                                    <input type="hidden" name="mId" id="mId" value="6" />
                                    <div class="form_container" id="RecruitmentPortal.Experience">
                                        <h2 class="form_title"> <strong>工作经验</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>单位名称：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li> <label> 工作时间：</label> <span class="preview_text start_date"> </span> <span class="preview_text end_date"> </span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>职位名称：</label> <span class="preview_text"></span> </li>
                                                    <li><label>工作地点：</label> <span class="preview_text"></span> </li>
                                                    <li><label>工作职责：</label> <span class="preview_text"></span> </li>
                                                    <li><label>部门：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <div class="dl_basicborder">
                        <form method="post" id="1015a315-3343-4c51-9d11-3c90e10bc8b8" name="1015a315-3343-4c51-9d11-3c90e10bc8b8" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="Hidden7" value="30d193ad-9915-4786-8d84-8191f9bc6c89" />
                                    <input type="hidden" name="jId" id="Hidden8" value="-1" />
                                    <input type="hidden" name="mId" id="Hidden9" value="6" />
                                    <div class="form_container" id="RecruitmentPortal.Experience">
                                        <h2 class="form_title"> <strong>工作经验</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>单位名称：</label> <span class="preview_text">qqq</span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li> <label> 工作时间：</label> <span class="preview_text start_date"> 1972年03月至</span> <span class="preview_text end_date"> 今 </span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>职位名称：</label> <span class="preview_text">wqwq</span> </li>
                                                    <li><label>工作地点：</label> <span class="preview_text"></span> </li>
                                                    <li><label>工作职责：</label> <span class="preview_text">wqqqqqq</span> </li>
                                                    <li><label>部门：</label> <span class="preview_text"></span> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <input type="hidden" class="viewName" value="201307040448456801" />
                    <div class="dl_mgtop10">
                        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a>
                    </div>
                </div>
                <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;">
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit">语言能力</span>
                    </div>
                    <div class="dl_basicborder" style="display: none;">
                        <form method="post" id="emptyFrom_4" name="emptyFrom_4" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem" style="display: none;">
                            <div class="eduhistory_drmmbnew pos_realitive">
                                <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
                                    <a name="delItem" href="javascript:void(0)">删除</a>
                                    <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
                                </div>
                                <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                    <input type="hidden" name="oId" id="oId" value="" />
                                    <input type="hidden" name="jId" id="jId" value="-1" />
                                    <input type="hidden" name="mId" id="mId" value="4" />
                                    <input name="_metaObjID" type="hidden" value="NTkwNGU4NWQtNTllNi00ZmY0LWI3MmMtNzYyMjZlYzc3ZjBm" />
                                    <input name="_viewName" type="hidden" value="TGFuZ1ZpZXc=" />
                                    <input name="_version" type="hidden" value="MjAxMzA3MDQwNDQ4NDU3MTIx" />
                                    <input name="_formIndex" type="hidden" value="41011" />
                                    <div class="form_container" id="RecruitmentPortal.Lang">
                                        <h2 class="form_title"> <strong>语言能力</strong> <span class="tab"></span> </h2>
                                        <div class="form_part">
                                            <div class="form_part_container columnone">
                                                <ul>
                                                    <li><label>语言类型：</label> <select name="RecruitmentPortalLang_LanguageType" id="RecruitmentPortalLang_LanguageType" class="dropdownlist mul_select"> <option value="">请选择</option> <option value="0" title="英语">英语</option> <option value="1" title="日语">日语</option> <option value="2" title="韩语">韩语</option> <option value="3" title="法语">法语</option> <option value="4" title="德语">德语</option> <option value="5" title="西班牙语">西班牙语</option> <option value="6" title="意大利语">意大利语</option> <option value="7" title="阿拉伯语">阿拉伯语</option> <option value="8" title="俄语">俄语</option> <option value="9" title="其他">其他</option> </select> </li>
                                                    <li><label>掌握程度：</label> <select name="RecruitmentPortalLang_LanguageLevel" id="RecruitmentPortalLang_LanguageLevel" class="dropdownlist mul_select"> <option value="">请选择</option> <option value="1" title="入门">入门</option> <option value="2" title="熟练">熟练</option> <option value="3" title="精通">精通</option> <option value="4" title="母语">母语</option> </select> </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dl_borderdashed"></div>
                        </form>
                    </div>
                    <input type="hidden" class="viewName" value="201307040448457121" />
                    <div class="dl_mgtop10">
                        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a>
                    </div>
                </div>
            </div>
        </div>
        <!--简历内容 e-->
    </div>
    <div class="dl_footer">
        <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p>
    </div>
</div>
<script type="text/javascript">(function(){var formName='cd7c7714-b39a-43a0-9c7e-f7382f04f5cd';var formIndexID='1';$.validator.setDefaults({ignore:''});$.validator.messages.maxlength=$.validator.format("长度不能超过{0}");$("#cd7c7714-b39a-43a0-9c7e-f7382f04f5cd").validate({rules:{'RecruitmentPortalPersonProfile_Name':{required:true,'RecruitmentPortalPersonProfile_Name_CmsLengthMix30_2020323862':true},'RecruitmentPortalPersonProfile_email':{required:true,'RecruitmentPortalPersonProfile_email_CmsResumeEmail_2020323862':true},'RecruitmentPortalPersonProfile_Mobile':{required:true,'RecruitmentPortalPersonProfile_Mobile_CmsResumeCellPhone_2020323862':true},'RecruitmentPortalPersonProfile_Birthday':{'RecruitmentPortalPersonProfile_Birthday_DateTimeValidator_2020323862':true},'RecruitmentPortalPersonProfile_gender':{'RecruitmentPortalPersonProfile_gender_NotEmpty_2020323862':true},'RecruitmentPortalPersonProfile_IDPhoto':{'RecruitmentPortalPersonProfile_IDPhoto_Image_2020323862':true}}});jQuery("#436ab7a4-67a1-4819-a238-d5d34eb0717611").click(function(){WdatePicker({dateFmt:"yyyy/MM/dd"})});window['c71310e0-0bef-4173-9826-21a572d4943d11_upload']=new AjaxUpload($('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_btn'),{action:'/Multitenant/Handler/FileUploadHandler',name:'myfile',responseType:'json',isJsonpRequest:true,onSubmit:function(file,ext){if(!ext){alert('文件不能为空');return false}var flag=true,msg='文件格式不正确';if(!/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i.test(ext)){flag=false;msg='仅限512K以内jpg、png、jpeg、gif、bmp格式图片'} if(flag){this.disable();this.setData({domain:document.domain,callback:"window['c71310e0-0bef-4173-9826-21a572d4943d11_upload']._settings.onJsonpCallBack",size:'512'});return true}else{alert(msg);return false}},onJsonpCallBack:function(r){window['c71310e0-0bef-4173-9826-21a572d4943d11_upload'].enable();if(r.Status){$('#c71310e0-0bef-4173-9826-21a572d4943d11').val(r.Path);$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html('<span class="fileuploadname"><a href="'+r.ClientUrl+'" target="_blank">'+r.Name+'</a></span><a href="javascript:;" onclick="window[\'c71310e0-0bef-4173-9826-21a572d4943d11_upload\']._settings.del(\''+r.Path+'\')">删除</a>')}else{$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html(r.Msg)}},del:function(p){$('#c71310e0-0bef-4173-9826-21a572d4943d11').val('');$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html('')}});jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Name_CmsLengthMix30_2020323862",function(v,e){return (v.length<=30)},"限30个字符");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_email_CmsResumeEmail_2020323862",function(v,e){return (/^$|^([a-zA-Z0-9][_\.\-]*)+\@([A-Za-z0-9])+((\.|-|_)[A-Za-z0-9]+)*((\.[A-Za-z0-9]{2,4}){1,2})$/.test(v)&&v.length<=60)},"格式有误");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Mobile_CmsResumeCellPhone_2020323862",function(v,e){return /^$|^\d{1,13}$/g.test(v.replace(/(^\s*)|(\s*$)/g,""))},"格式有误");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Birthday_DateTimeValidator_2020323862",function(v,e){return (/^$|^\d{4}\/\d{1,2}\/\d{1,2}$/gi).test(v)},"日期格式不正确");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_gender_NotEmpty_2020323862",function(v,e){return v!=''},"输入不允许为空");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_IDPhoto_Image_2020323862",function(v,e){return (/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i).test(v)},"仅限512K以内jpg、png、jpeg、gif、bmp格式图片");})();</script>
<script type="text/javascript">$(function(){var idPhotoId="c71310e0-0bef-4173-9826-21a572d4943d11",currentFunName=null,funContext={};BSGlobal.pt=function(pro,data){this.pro=pro||"beisen";this.data=data||{};this.init=function(){this.initPage()};this.init.apply(this,arguments)};BSGlobal.pt.prototype={initPage:function(){this.setUserEmail();this.moveIdPhoto();this.initControls();this.btnBindEvent();this.dataBtnBindEvent();var that=this;$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]").blur(that.checkNum);$("#RecruitmentPortalPersonProfile_CertificateType").change(function(){var num=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]");num.val()&&num.val("");num.parent().find("span.new_pop_error").hide()});$("input[name=RecruitmentPortalAttachments_ActivityCode]").attr("disabled",true)},checkNum:function(){var selectVal=$("#RecruitmentPortalPersonProfile_CertificateType").val(),that=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]"),num=that.val().replace(/\s/g,"");selectVal==1&&num.length>0&&$.ajax({type:"post",url:"/Portal/Resume/CheckIdentityCardNumber",data:{icn:num},success:function(resp){that.parent().find(".new_pop_error").remove();resp.result=="failure"&&that.parent().append("<span for='7612c66c-a23a-40ed-a9dc-46b86036f03f11' class='new_pop_error' style='width:auto;'>"+resp.message+"</span>")},error:function(){}})},setUserEmail:function(){var email=$("#topUserEmail").attr("title"),reg=/^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z]))*@[A-Za-z0-9_\.-]+[A-Za-z0-9_][A-Za-z0-9_]$/;if(reg.test(email))if($("input[name='RecruitmentPortalPersonProfile_email']").length>0){var emailInput=$("input[name='RecruitmentPortalPersonProfile_email']");(!emailInput.val()||emailInput.val()=="")&&$("input[name='RecruitmentPortalPersonProfile_email']").val(email)}},initControls:function(currForm){var that=this;$("textarea[name*='RecruitmentPortalQuestion']").attr("cols",80);function SaveOtherLangValue(){var currOtherValue="";$("li > select[name='Part0OtherLang1']").each(function(i,e){var lang=$(e).val();if(lang!=""){var lev=$(e).parent().next("li").find("select[name='Part0Level1']").val();currOtherValue+=lang+":"+lev+";"}});$("#otherLang").val(currOtherValue.substring(0,currOtherValue.length-1));return $("#otherLang").val()}function changeValue(elem,json,fn){if(elem.get(0).tagName.toLowerCase()=="input"){var idValue=elem.next().val();if(idValue)idValue=$.trim(idValue);if(idValue=="0"){elem.val("");return false}var newJson=json,LocName=BasSelect_getTextsByCodes(newJson,idValue);LocName!=null&&elem.val(LocName)}else if(elem.get(0).tagName.toLowerCase()=="select"){for(var i=0;i<json.length;i++)$("<option value='"+json[i][0]+"'>"+json[i][1]+"</option>").appendTo(elem);var otherLangHid=$("form").find("input[type='hidden'][id='otherLang']");if(otherLangHid.length==1){var otherLangRequired=otherLangHid.attr("isRequire").toLowerCase()=="true";if(otherLangRequired&&BSGlobal.data.langConstCount>=4)fn();else!otherLangRequired&&BSGlobal.data.langConstCount>=2&&fn()}}}function AddConstHandler(o,fn){var modelId=o.attr("id")+Math.random().toString().replace(/^0\./,"");o.attr("id",modelId+"_txt");o.next().attr("id",modelId);var funName="set"+modelId+"Json",constname=o.attr("constname"),displayName=o.attr("displayname"),constName=o.attr("constname");funContext[funName]={textModelId:modelId+"_txt",modelId:modelId,constName:constname,displayName:displayName};window[funName]=function(data){if(BSGlobal.data.langConstCount==undefined)BSGlobal.data.langConstCount=1;changeValue(o,data,fn);BSGlobal.data.langConstCount+=1;var context=funContext[currentFunName];if(context.constName.toLowerCase()=="areas")$("#"+context.textModelId).basSelect({valHost:"#"+context.modelId,type:"radio",data:"NewAjson",title:context.displayName,map:{text:"v",id:"k",children:"c"}});else BasSelect(context.textModelId,context.modelId,"A","radio",window[context.constName],context.displayName,"",20,10,0,1,"","","")};if(o.get(0).tagName.toLowerCase()=="input")addHandler(modelId+"_txt","click",function(){currentFunName=funName;if(window[constname])window[setFunName](window[constname]);else{var constJs=document.createElement("script");constJs.type="text/javascript";constJs.src="http://const.tms.beisen.com/ConstData.svc/Const/"+constName+"?callback="+setFunName;constJs.id=funName;constJs.name=funName;var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(constJs,s)}});else o.get(0).tagName.toLowerCase()=="select";var setFunName="set"+constname;if(!window[setFunName])window[setFunName]=function(data){if(!window[constname])window[constname]=data;window[currentFunName](data)}}function InitConstData(currForm){currForm.find("input").each(function(){var constname=$(this).attr("constname");constname&&AddConstHandler($(this))})}if(currForm)InitConstData(currForm);else $("form").each(function(){InitConstData($(this))});function getSaveBtn(){return'<a name="btnSave" class="dl_btn_grey3" href="javascript:void(0)"><span>保存</span></a>'}function getOperateArea(){return'<div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0"  style="width:150px"></div>'}function getEditBtn(){return'<a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>'}function getDelBtn(){return'<a name="delItem" href="javascript:void(0)">删除</a>'}function getCancelBtn(){return'<a name="cancelItem" class="dl_btn_grey3" href="javascript:void(0)"><span>取消</span></a>'}function BuildOperateBtnsOptional(form,addEdit,addDel,addSave,addCancel){form.find(".deletelink_edrmmb").remove();var operateDiv=$(getOperateArea());operateDiv.insertBefore(form.find("div[id='resumeitems']"));if(addDel){var delBtn=getDelBtn();operateDiv.append(delBtn)}if(addEdit){var editBtn=getEditBtn();operateDiv.append(editBtn)}addCancel&&operateDiv.append($(getCancelBtn()));addSave&&operateDiv.append($(getSaveBtn()))}$('a[name="btnSave"]').unbind();$('a[name="btnSave"]').click(function(){var saveBtn=$(this).parent(),form=$(this).parentsUntil("form").parent();if(!isFormValid(form))return;var metaName=form.find("div[class='form_container']").attr("id"),main=$(this).parents(".mainContainer"),viewName=main.find("input[class='viewName']").val();metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()&&SaveOtherLangValue();var pdata=GetFormData(form);if(pdata.length==0){window.location.reload();return}that.showWaitDialage("正在保存,请稍等！");$.ajaxSetup({async:false});$.post(BSGlobal.data.saveUrl,pdata,function(data){if(data.result!="success")return;var items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),oId=data.OId;items.find("input[name='oId']").val(oId);var saveResult=data;$.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:false},function(data){setTimeout(function(){$.modal.close()},100);if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']"),showDel=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,true,showDel,false);toRender.insertAfter(objItem);objItem.remove();var toDeleteObj=resumeItems.find("input[name='_objectDataID'],input[name='_metaObjName'],input[name='_viewName'],input[name='_metaObjID'],input[name='_version']");toDeleteObj.remove();that.initControls(form);that.setPreViewBtn(true)}})})});$('a[name="btnSingleSave"]').unbind();$('a[name="btnSingleSave"]').click(function(){var saveBtn=$(this).parent(),form=$(this).parentsUntil("form").parent();if(!isFormValid(form))return;var metaName=form.find("div[class='form_container']").attr("id"),main=$(this).parents(".mainContainer"),viewName=main.find("input[class='viewName']").val();function nextSave(){that.showWaitDialage("正在保存,请稍等！");$.ajaxSetup({async:false});$.post(BSGlobal.data.saveUrl,pdata,function(data){setTimeout(function(){$.modal.close()},100);if(data.result!="success")return;var items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),oId=data.OId;items.find("input[name='oId']").val(oId);$.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:false},function(data){setTimeout(function(){$.modal.close()},100);if(data.result=="success"){main.find("div[name='singleview']").html(data.render);that.moveIdPhoto();main.find("div[name='singleedit']").hide();main.find("div[name='singleview']").show();main.find("a[name='btnSingleSave']").hide();main.find("a[name='btnSingleCancel']").hide();main.find("a[name='btnSingleEdit']").show();that.setPreViewBtn(true);if($("#"+idPhotoId).length>0){main.find("#idPhotoUploadBtn").hide();main.find("#idPhotowarninfo").hide();main.find("#idPhotoerrinfo").hide();$("#"+idPhotoId+"_info").html("")}}})})}var pdata=GetFormData(form);if(pdata.length==0){window.location.reload();return}var selectVal=$("#RecruitmentPortalPersonProfile_CertificateType").val(),target=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]");if(selectVal==1&&target.val()){num=target.val().replace(/\s/g,"");num.length>0&&$.ajax({type:"post",url:"/Portal/Resume/CheckIdentityCardNumber",data:{icn:num},success:function(resp){target.parent().find(".new_pop_error").remove();if(resp.result=="failure")target.parent().append("<span for='7612c66c-a23a-40ed-a9dc-46b86036f03f11' class='new_pop_error' style='width:auto;'>"+resp.message+"</span>");else nextSave()},error:function(){}})}else nextSave()});$('a[name="btnSingleEdit"]').unbind();$('a[name="btnSingleEdit"]').click(function(){var main=$(this).parents(".mainContainer");main.find("div[name='singleedit']").show();main.find("div[name='singleview']").hide();main.find("a[name='btnSingleSave']").show();main.find("a[name='btnSingleCancel']").show();main.find("a[name='btnSingleEdit']").hide();if($("#"+idPhotoId).length>0){main.find("#idPhotoUploadBtn").show();main.find("#idPhotowarninfo").show();main.find("#idPhotoerrinfo").show();main.find("#idPhotoerrinfo").html("")}$("input[name=RecruitmentPortalAttachments_ActivityCode]").attr("disabled",true)});(function(){$("#phoneTypeSel").remove();var phoneInput=$("input[name=RecruitmentPortalPersonProfile_Mobile]"),sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global">非大陆手机号</option></select>';if(!parseInt(phoneInput.val())||!/\d{0,13}/.test(parseInt(phoneInput.val())))if(phoneInput.val()=="")sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global">非大陆手机号</option></select>';else sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global" selected>非大陆手机号</option></select>';var defaultRule=phoneInput.rules();phoneInput.before(sel);if(phoneInput.val()!=""&&!parseInt(phoneInput.val())||!/\d{0,13}/.test(parseInt(phoneInput.val())))phoneInput.rules("remove");else{phoneInput.rules("remove");phoneInput.rules("add",defaultRule)}var paramMap={},param=location.search.substring(1).split("&");for(i=0;i<param.length;i++){var temp=param[i].split("="),key=temp[0],val=temp[1];paramMap[key]=val}if(paramMap.IsApplyEdit=="True")$("#phoneTypeSel").prop("disabled",true).css("background","#EBEBE4");else $("#phoneTypeSel").change(function(){var val=$(this).val();phoneInput.val("");if(val=="global")phoneInput.rules("remove");else if(val=="chn"){phoneInput.rules("remove");phoneInput.rules("add",defaultRule)}})})();$('a[name="btnSingleCancel"]').unbind();$('a[name="btnSingleCancel"]').click(function(){var main=$(this).parents(".mainContainer");that.moveIdPhoto();main.find("div[name='singleedit']").hide();main.find("div[name='singleview']").show();main.find("a[name='btnSingleSave']").hide();main.find("a[name='btnSingleCancel']").hide();main.find("a[name='btnSingleEdit']").show();that.setPreViewBtn(true);if($("#"+idPhotoId).length>0){main.find("#idPhotoUploadBtn").hide();main.find("#idPhotowarninfo").hide();main.find("#idPhotoerrinfo").hide();$("#"+idPhotoId+"_info").html("")}});$('a[name="addItem"]').unbind();$('a[name="addItem"]').click(function(){var main=$(this).parents(".mainContainer");if(main.find("form").length>=20){alert("已达最大个数，不允许继续添加");return}var addLinkPart=$(this).parent(),firstForm=main.find("form").first();firstForm.find("span[class='new_pop_error']").remove();var form=$("<form>"+firstForm.html()+"</form>");form.attr("method",firstForm.attr("method"));form.attr("enctype",firstForm.attr("enctype"));form.find("div[class='righttitle_edrmmb']").remove();form.find(".deletelink_edrmmb").remove();var resumeItems=form.find("div[id='resumeitems']");resumeItems.find("input[name='objectDataID'],input[name='metaObjName'],input[name='viewName'],input[name='metaObjID']").remove();resumeItems.find("input[name='oId']").val("");var mId=form.find("input[name='mId']").val(),oId="",viewName=main.find("input[class='viewName']").val();$.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:true},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']");toRender.insertAfter(objItem);objItem.remove();BuildOperateBtnsOptional(form,false,false,true,true);form.insertBefore(addLinkPart);appendScript(data.script,form);that.initControls(form);main.find("span[class*='errmsg']").html("");main.find("a[name='cancelItem']").attr("isAdd","1")}})});$("a[name='editItem']").unbind();$("a[name='editItem']").click(function(){var form=$(this).parentsUntil("form").parent(),main=$(this).parents(".mainContainer"),oId=form.find("input[name='oId']").val(),viewName=main.find("input[class='viewName']").val(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),metaName=form.find("div[class='form_container']").attr("id"),editUrl=BSGlobal.data.editUrl;$.post(editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:true},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),objItem=form.find("div[id='resumeitems']").find("div[class='form_container']");toRender.insertAfter(objItem);objItem.remove();var showDelBtn=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,false,false,true,true);appendScript(data.script,form);that.initControls(form)}})});$("a[name='cancelItem']").unbind();$("a[name='cancelItem']").click(function(){var form=$(this).parentsUntil("form").parent(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),oId=form.find("input[name='oId']").val();items.find("input[name='oId']").val(oId);var main=$(this).parents(".mainContainer"),viewName=main.find("input[class='viewName']").val(),metaName=form.find("div[class='form_container']").attr("id"),removeForm=function(){var title=form.find("div[class='righttitle_edrmmb']").clone();title.length!=0&&form.nextAll("form").first().prepend(title.get(0));form.detach()};if(main.find("a[name='cancelItem']").attr("isAdd")=="1")removeForm();else $.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:false},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']"),showDel=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,true,showDel,false);toRender.insertAfter(objItem);objItem.remove();var toDeleteObj=resumeItems.find("input[name='_objectDataID'],input[name='_metaObjName'],input[name='_viewName'],input[name='_metaObjID'],input[name='_version']");toDeleteObj.remove();that.initControls(form);main.find("span[class*='errmsg']").html("")}})});$("a[name='delItem']").unbind();$("a[name='delItem']").click(function(){var sourceEle=this,opt={message:"您确定删除这条信息吗？操作将不可恢复",okFn:function(){var form=$(sourceEle).parentsUntil("form").parent(),oId=form.find("input[name='oId']").val(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),main=$(sourceEle).parents(".mainContainer");main.find("span[class*='errmsg']").html("");var removeForm=function(){var title=form.find("div[class='righttitle_edrmmb']").clone();title.length!=0&&form.nextAll("form").first().prepend(title.get(0));form.detach()};if(oId!="")$.post(BSGlobal.data.delUrl,{mId:mId,oId:oId,jId:BSGlobal.data.jId,formCount:$("form").length},function(data){if(data.result=="success"){removeForm();$.modal.close();data.rate<=0&&that.setPreViewBtn(false);$("form").length==0&&location.reload()}});else{removeForm();$.modal.close();$("form").length==0&&location.reload()}}};that.showDialog(opt)});$(".dl_import").unbind();$(".dl_import").click(function(){var opt={message:"导入简历会覆盖目前填写的内容，请确认是否继续",okFn:function(){location.href=BSGlobal.data.importUrl}};that.showDialog(opt)});function initForm(form,newId){form.attr("id",newId);form.attr("name",newId)}function isFormValid(form){for(var cancelFields=[["RecruitmentPortalEducation_HasAward","AwardTime"],["RecruitmentPortalEducation_HasSocialPractice","PracticeDateTime"],["RecruitmentPortalEducation_IsStudentCadre","CadreDateTime"]],els=[],i=0;i<cancelFields.length;i++){var isAreaShowEl=form.find("input[type='radio'][name='"+cancelFields[i][0]+"']");if($(isAreaShowEl[1]).prop("checked")){var currLi=isAreaShowEl.parentsUntil("ul"),toDetach=currLi.nextAll().detach();els.push({li:currLi,toDetach:toDetach})}}var validator=form.validate();validator.settings.errorPlacement=function(error,element){if($(element).nextAll().length>0)$(error).insertAfter($(element).nextAll().last());else $(error).insertAfter($(element))};var result=validator.form();if(!result)for(var j=0;j<els.length;j++){var li=els[j].li,toDetach=els[j].toDetach;toDetach.insertAfter(li)}return result}function appendScript(script){if(script==undefined||script=="")return;eval($(script).html())}function GetFormData(jqueryForm){var pdata=jqueryForm.serializeArray();try{if(pdata.length<=0){var form=jqueryForm.get(0),els=form.getElementsByTagName("*");pdata=[];for(var i=0;i<els.length;i++){var element=els[i],tagName=element.tagName.toLowerCase(),elType=element.getAttribute("type"),elName=element.getAttribute("name");if(elName!=""&&(tagName=="input"||tagName=="textarea"||tagName=="select"))(elType!="radio"||elType=="radio"&&element.checked)&&pdata.push({name:element.getAttribute("name"),value:element.value})}}}catch(e){}return pdata}},btnBindEvent:function(){var that=this;$(window).scroll(function(){var topPx=$(window).scrollTop()+"px";$("#menubar").animate({top:topPx},{duration:0,queue:false})});$(".tab").each(function(){$(this).addClass("toclose");$(this).click(function(){var state=$(this).attr("class");if(state.indexOf("toclose")>0){$(this).parent().nextAll().hide("normal");$(this).removeClass("toclose");$(this).addClass("toopen")}else if(state.indexOf("toopen")){$(this).parent().nextAll().show("normal");$(this).removeClass("toopen");$(this).addClass("toclose")}})});$("#menubar a").click(function(){$("#menubar a").removeClass("current");$(this).addClass("current")});$(".applyResume").click(function(){if(BSGlobal.data.myJobApplyCount>0)$.dialog({id:"repeatpost",title:"提示",content:'<div class="alertcontent importalert">您已经申请过此职位，是否继续申请？</div><div class="buttonline_drmmb"><a class="smallcmdbutton" onclick="myApplyResume()"><span>确定</span></a><a class="smallcmdbutton" onclick="$.dialog.get(\'repeatpost\').close()"><span>取消</span></a></div>',lock:true,width:450,height:100});else myApplyResume()});uploadFiles("IDPhoto");uploadFiles("Photo");uploadFiles("Resume");function getDelLink(fieldName){return"<a name='del"+fieldName+"' class='deletefile'>删除</a>"}function bintDelLink(fieldName,delLink){delLink.click(function(){delLink.parent().html("");$("#"+fieldName).val("")})}function uploadFiles(fieldName){if($("#"+fieldName).length>0){var uploadName="photo";if(fieldName=="Resume")uploadName="attachFile";else if(fieldName=="IDPhoto")uploadName="IDPhoto";if($("span[name='"+fieldName+"_Info']").find("a").html()!=""){var delLink=getDelLink(fieldName);$("span[name='"+fieldName+"_Info']").append(delLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"))}var fileUpload=new AjaxUpload("#upload"+fieldName,{action:BSGlobal.data.uploadUrl,name:uploadName,responseType:"json",autoSubmit:true,onComplete:function(file,data){$("span[name='"+fieldName+"_Error']").html("");if(data.result=="success"){$("#"+fieldName).val(data.upAddress);var delLink=getDelLink(fieldName),fileLink="<a target='_blank' href='"+data.link+"'>"+data.fileName+"</a>"+delLink;$("span[name='"+fieldName+"_Info']").html(fileLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"));$("span[name='"+fieldName+"_Error']").hide();$("span[name='"+fieldName+"_Error']").parent("li").find("span[class*='desc']").show()}else{var errorMsg="";if(data.isSizeAllowed.toString()=="false")errorMsg+="格式错误";if(data.isTypeAllowed.toString()=="false")errorMsg+="格式错误";var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.html(errorMsg);errorSpan.show();errorSpan.parent("li").find("span[class*='desc']").hide()}},onChange:function(){},onSubmit:function(file,ext){if(!(ext&&/^(jpg|jpeg|gif|bmp|png)$/gi.test(ext)&&fieldName!="Resume"))if(!(ext&&/^(docx|html|htm|txt|doc|pdf)$/gi.test(ext))){var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.show();errorSpan.html("格式错误");errorSpan.parent("li").find("span[class*='desc']").hide();return false}}})}}window.cancelApply=function(){$.dialog.get("applyDialogPop").close()};that.bindChangedEvent()},showDialog:function(options){var msg=options.message,okBtnText=options.okText?options.okText:"确定",closeBtnText=options.closeText?options.closeText:"取消",showOkBtn=options.showOk?options.showOk:true,showCloseBtn=options.showClose?options.showClose:true,html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','       <div class="dl_dialog_icoqa"><span>'+msg+"</span></div>",'\t<div class="dl_dialog_btn">',showOkBtn?' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnOk" ><span>'+okBtnText+"</span></a>":"",showCloseBtn?'\t<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>'+closeBtnText+"</span></a>":"","\t\t<div>","\t</div>","</div>"].join(""),option={containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("#btnOk").unbind();$("#btnOk").click(function(){options.okFn&&options.okFn.apply(this)});options.closeFn&&$("#btnClse").click(function(){options.closeFn&&options.closeFn.apply(this)})}};$.modal(html,option)},showWaitDialage:function(msg){var html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','   <div class="dl_tocenter">','<span class=" dl_ft14_grey2"><b>'+msg+"</b>","</span>","</div>","\t</div>","</div>"].join("");$.modal(html,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0}})},moveIdPhoto:function(){$("[name='RecruitmentPortalPersonProfile_IDPhoto']").parents("li").hide();var idPhotoField=$("[name='RecruitmentPortalPersonProfile_IDPhoto']");if(idPhotoField.length>0){var that=this;$("#idPhoto").show();idPhotoField.parents("li").hide();that.setIdPhoto();setInterval(function(){try{that.setIdPhoto()}catch(e){}},1e3);var info=$(".uploaddesc").html();info&&$("#idPhotowarninfo").html(info);window[""+idPhotoId+"_upload"]=new AjaxUpload($("#idPhotoUploadBtn"),{action:"/Multitenant/Handler/FileUploadHandler",name:"myfile",responseType:"json",isJsonpRequest:true,onSubmit:function(file,ext){if(!ext){alert("文件不能为空");return false}var flag=true,msg="文件格式不正确";if(!/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i.test(ext)){flag=false;msg="仅限512K以内jpg、png、jpeg、gif、bmp格式图片"}if(flag){this.disable();this.setData({domain:document.domain,callback:"window['"+idPhotoId+"_upload']._settings.onJsonpCallBack",size:"512"});return true}else{alert(msg);return false}},onJsonpCallBack:function(r){window[""+idPhotoId+"_upload"].enable();if(r.Status){$("#"+idPhotoId).val(r.Path);$("#"+idPhotoId+"_info").html('<span class="fileuploadname"><a href="'+r.ClientUrl+'" target="_blank">'+r.Name+'</a></span><a href="javascript:;" onclick="window[\''+idPhotoId+"_upload']._settings.del('"+r.Path+"')\">删除</a>")}else $("#"+idPhotoId+"_info").html(r.Msg)},del:function(){$("#"+idPhotoId).val("");$("#"+idPhotoId+"_info").html("")}})}else $("#idPhoto").hide()},setIdPhoto:function(){try{var that=this,img=$("#"+idPhotoId+"_info");if(img.length>0)if(img.find(".fileuploadname a").length>0){var imgUrl=$(".fileuploadname a").attr("href");if(imgUrl){imgUrl=$("#"+idPhotoId).val();imgUrl=that.data.fileUrl+"?dfsPath="+imgUrl.replace(":","%3A").replace("/","%2F");var imgSrc=$("#idPhoto").attr("src");imgUrl!=imgSrc&&$("#idPhoto").attr("src",imgUrl)}}else if($("span[for='"+idPhotoId+"']").length>0)$("#idPhotoerrinfo").html($("span[for='"+idPhotoId+"']").html());else $("#idPhotoerrinfo").html(img.html())}catch(e){}},bindChangedEvent:function(){},setPreViewBtn:function(isShow){if(isShow){$("#previewBtn").show();$("#previewBtnDisable").hide()}else{$("#previewBtn").hide();$("#previewBtnDisable").show()}},dataBtnBindEvent:function(){}}})</script>
<script type="text/javascript">
    $(function () {
        BSGlobal.data = {
            jId: '-1',
            redirectUrl: '/Portal/Resume/ResumeItem',
            editUrl: '/Portal/Resume/RenderSingleItem',
            saveUrl: '/Portal/Resume/SaveResumeItem',
            uploadUrl: '/Portal/Resume/UploadAttach',
            delUrl: '/Portal/Resume/DelResumeItem',
            delAttachUrl: '/Portal/Resume/DeleteUploadFile',
            hasUserDatasUrl: '/Portal/Resume/HasResumeDatas',
            importUrl: 'member_resume.htmlImport',
            fileUrl: '/Portal/Resume/ResumePhoto',
            langObjName: 'Lang'
        };
        BSGlobal.page = new BSGlobal.pt("CmsPortal", BSGlobal.data);
    });
</script>
<script type="text/javascript">

    $(document).ready(function () {


        if (window.location.host.toLowerCase() == 'pecc.zhiye.com') {

            var certificateType = $("#RecruitmentPortalPersonProfile_CertificateType");
            if (certificateType.length) {
                //先选择option是为了使用所选option的验证规则
                certificateType.val('1');
                $.each(certificateType.find('option'), function (state, child) {

                    if ($(child).val() != "1") $(child).remove()
                });
            }

            var phone = $("#phoneTypeSel");
            if (phone.length) {
                phone.val("chn");
                $.each(phone.find('option'), function (state, child) {

                    if ($(child).val() != "chn") $(child).remove()
                });
            }
        }
    });

</script>
<!--引用静态文件:dataInitFunc,HangYe,AreaJson,NewAreaJson-->
<script type="text/javascript"> function setAJson(data){ window.Ajson=data; } function setNewAJson(data){ window.NewAjson=data; } function setMJson(data){ window.Mjson=data; } </script>
<script type="text/javascript" src="http://const.tms.beisen.com/ConstData.svc/Const/hangye?callback=setMJson"></script>
<script type="text/javascript" src="http://const.tms.beisen.com/ConstData.svc/Const/Areas?callback=setAJson"></script>
<script type="text/javascript" src="http://const.tms.beisen.com/Api/Defination/AreaFormat?callback=setNewAJson"></script>
<script language="javascript" type="text/javascript">

    function SetCss() {
        var win = window.location.href;
        if (win.indexOf("Apply") != -1) {
            $("#myapply a").addClass("current");
        }
        else if (win.indexOf("ResumeItem") != -1) {
            $("#myresume a").addClass("current");
        }
        else if (win.indexOf("EditPwd") != -1) {
            $("#changepwd a").addClass("current");
        }
    }
    SetCss();

    $(function () {

        setInterval(function () {
            try {
                DrawImage($("#logoImg"), '350', '80');
            } catch (e) {
            }
        }, 100);
    });

    function DrawImage(ImgD, FitWidth, FitHeight) {
        var image = new Image();

        image.src = $(ImgD).attr("src");

        if (image.width > 0 && image.height > 0) {
            if (image.width / image.height >= FitWidth / FitHeight) {
                if (image.width > FitWidth) {
                    $(ImgD).css("width", FitWidth);
                    $(ImgD).css("height", (image.height * FitWidth) / image.width);
                } else {
                    $(ImgD).css("width", image.width);
                    $(ImgD).css("height", image.height);
                }
            } else {
                if (image.height > FitHeight) {
                    $(ImgD).css("height", FitHeight);
                    $(ImgD).css("width", (image.width * FitHeight) / image.height);
                } else {
                    $(ImgD).css("width", image.width);
                    $(ImgD).css("height", image.height);
                }
            }
            $(ImgD).show();
        }
    }
</script>
</body>
</html>
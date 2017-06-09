{{--<!DOCTYPE HTML>--}}
{{--<html>--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">--}}
{{--<title>获取权限</title>--}}
{{--<body>--}}
{{--</body>--}}

{{--<script>--}}
{{--var appId = "wx510ecd8668932ea8";--}}
{{--var redirectUri = "http://wf.hk1.mofasuidao.cn/token";--}}
{{--var toUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?" +--}}
{{--"appid=" + appId +--}}
{{--"&redirect_uri=" + "http%3a%2f%2fwf.hk1.mofasuidao.cn%2ftoken" +--}}
{{--"&response_type=code" +--}}
{{--"&scope=snsapi_userinfo" +--}}
{{--"&state=STATE#wechat_redirect";--}}
{{--console.log(toUrl);--}}
{{--window.location.href = toUrl;--}}
{{--</script>--}}
{{--</head>--}}
{{--</html>--}}
<?php
$redirectUri = urlencode("http://wf.hk1.mofasuidao.cn/token");
$appId = "wxb206faacb556aef7";
$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appId."&redirect_uri=" . $redirectUri . "&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
//echo $url;
//header('location:'.$url);
?>
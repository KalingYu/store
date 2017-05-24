<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>获取权限</title>
<body>
<input  id="url" type="hidden" value="{{$url}}">
</body>

<script src={{asset("js/lib/jquery.min.js")}}></script>
<script src={{asset("js/lib/axios.min.js")}}></script>
<script>

    $(document).ready(function () {
        var url = document.getElementById("url").value;
        axios({
            method: 'get',
            url: url,
            responseType: 'json'
        }).then(function (response) {
            console.log(response);
            var jsonObj = response.data;
            var openId = jsonObj["openid"];
            var token = jsonObj["access_token"];
            var refreshToken = jsonObj["refresh_token"];
        }).catch(function (error) {
            console.log(error);
        });

        function getUserInfo(token, openId, refreshToken) {
            var url = " https://api.weixin.qq.com/sns/userinfo?" +
                "access_token=" + token +
                "&openid=" + openId +
                "&lang=zh_CN ";
            axios({
                method: 'get',
                url: url,
                responseType: 'json'
            }).then(function (response) {
                console.log(response);
                var jsonObj = response.data;
                var openid = jsonObj["openid"];
                var nickname = jsonObj["nickname"];
                var sex = jsonObj["sex"];
                if (sex === 0) {
                    sex = "未知";
                }else if (sex === 1) {
                    sex = "男";
                }else  {
                    sex = "女";
                }
                var headimgurl = jsonObj["headimgurl"];
                addUser(openid, nickname, sex, headimgurl);
            }).catch(function (error) {
                console.log(error);
            });
        }

        function addUser(openid, nickname, sex, headimgurl) {
            $.ajax({
                type: "PUT",
                url: "" + '/api/users',
                dataType: "json",
                data: {openid: openid, nickname: nickname, sex: sex, headimgurl: headimgurl},
                success: function (jsonData) {
                    var code = jsonData["code"];
                    var msg = jsonData["msg"];
                    if (code === 0) {
                        window.location.href='store/' + nickname;
                    } else {
                        alert(msg);
                    }
                }
            });
        }
    });
</script>
</head>
</html>
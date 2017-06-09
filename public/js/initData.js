var data = {
    isEditUserMod: false,
    currentGoodsCount: 1,
    toCartGoods: {},

    carouselArray: [
        {
            imgUrl: "img/carousel/1.png"
        },

        {
            imgUrl: "img/carousel/2.png"
        },

        {
            imgUrl: "img/carousel/3.png"
        }
    ],
    goodsArray: [],

    cartArray: [
        // {
        //     imgUrl: "img/demo/demo6.png",
        //     name: "成品楼梯",
        //     totalPrice: 1343,
        //     count: 3
        // },
        //
        // {
        //     imgUrl: "img/demo/demo3.png",
        //     name: "成品楼梯",
        //     totalPrice: 1343,
        //     count: 5
        // }
    ],

    me: {
        name: "余嘉陵",
        phone: "18712757621",
        address: "东北大学秦皇岛分校",
        openid: '11',
        union_id: '',
        access_token: '',
        wx_name: 'Kaling',
        avatar: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493896761373&di=767c1f59416f5eee6f4ec9c8dd9248b2&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201602%2F12%2F20160212214325_iFSaZ.thumb.224_0.jpeg'
    },

    ordersArray: [
        // {
        //     number: "1234341234134",
        //     status: "已接收订单",
        //     totalPrice: 341341
        // },
        //
        // {
        //     number: "3413413413",
        //     status: "待处理",
        //     totalPrice: 23412341
        // }
    ],

    searchResult: [
        {
            name: "成品楼梯1",
            imgUrl: "img/demo/demo1.png",
            price: 1280,
            intro: "免焊接集成组装工艺，制作简单，安装方便;一通、侧通、横通、底通均为合金铸件，外表采用静电防腐喷涂工艺，多"
        },

        {
            name: "成品楼梯2",
            imgUrl: "img/demo/demo3.png",
            price: 2341,
            intro: "免焊接集成组装工艺，制作简单，安装方便;一通、侧通、横通、底通均为合金铸件，外表采用静电防腐喷涂工艺，多"
        }
    ]
};


var vm = new Vue({
    el: '#app',
    data: data,


    methods: {
        editUser: function () {
            if (this.isEditUserMod) {
                updateUser();
            }
            this.isEditUserMod = !this.isEditUserMod;
        },

        addCart: function () {
            var currentCount = this.currentGoodsCount;
            this.currentGoodsCount = 1;
            var cartGoods = {
                img_url: this.toCartGoods.imgUrl,
                name: this.toCartGoods.name,
                goods_id: this.toCartGoods.id,
                total_price: this.currentGoodsCount * this.toCartGoods.price,
                count: currentCount,
                open_id: this.me.openid
            };

            addToCart(cartGoods, function () {
                getCarts();
            });
        },

        showAddCartSheet: function (index) {
            showAddCartSheet(index);
        },

        refreshData: function () {
            getGoodsData();
            getCarts();
            getUser();
        },

        deleteCart: function (index, cardId) {
            deleteCart(cardId, function () {
                vm.cartArray.splice(index, 1);
            });
        }
    }
});


getGoodsData();
getCarts();
// addUser();
getUser();

/**
 * 添加物品到购物车
 */
function addToCart(cartGoods, callback) {
    console.log("添加到购物车中的是：" + JSON.stringify(cartGoods));
    $.ajax({
        type: "POST",
        url: "" + '/api/carts',
        dataType: "json",
        data: cartGoods,
        success: function (jsonData) {
            var code = jsonData["code"];
            var msg = jsonData["msg"];
            if (code === 0) {
                callback();
                showSucceedToast();
            } else {
                alert(msg);
            }
        }
    });
}

function deleteCart(cartId, callback) {

    var url = '/api/carts/delete';
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: {"id": cartId},
        success: function (jsonData) {
            var code = jsonData["code"];
            var msg = jsonData["msg"];
            if (code == 0) {
                callback();
            } else {
                alert(msg);
            }
        }
    });
    // axios.delete(url)
    //     .then(function (response) {
    //         console.log(response);
    //         var jsonData = response.data;
    //         var code = jsonData["code"];
    //         var msg = jsonData["msg"];
    //         if (code == 0) {
    //             callback();
    //         } else {
    //             alert(msg);
    //         }
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });

}

/**
 * 添加订单
 */
function addorder() {

    var order = {
        number: (new Date()).valueOf(),
        status: "已付款",
        total_price: 23412341 // todo 计算总价
    };
    $.ajax({
        type: "POST",
        url: "" + '/api/orders',
        dataType: "json",
        data: cartGoods,
        success: function (jsonData) {
            var code = jsonData["code"];
            var msg = jsonData["msg"];
            if (code == 0) {
                callback();
                showSucceedToast();
            } else {
                alert(msg);
            }
        }
    });
}

/**
 * 获取所有货物信息
 */
function getGoodsData() {
    axios({
        method: 'get',
        url: "" + '/api/goods',
        responseType: 'json'
    }).then(function (response) {
        console.log(response);
        var jsonObj = response.data;
        var code = jsonObj["code"];
        var msg = jsonObj["msg"];
        if (code === 0) {
            data.goodsArray = jsonObj['body'];
        } else if (code = -1) {
            alert(msg);
            data.goodsArray = jsonObj['body'];
        } else {
            alert(msg);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

/**
 * 获取购物车信息
 */
// function getCartData() {
//      axios({
//          method: 'get',
//          url: "" + '/api/carts/' + vm.me.open_id,
//          responseType: 'json'
//      }).then(function (response) {
//          console.log(response);
//          var jsonObj = response.data;
//          var code = jsonObj["code"];
//          var msg = jsonObj["msg"];
//          if (code === 0) {
//              data.cartArray = jsonObj['body'];
//          } else {
//              alert(msg);
//          }
//      }).catch(function (error) {
//         console.log(error);
//     });
//
// }

function getUser() {
    var openid = document.getElementById("openid").value;
    axios({
        method: 'get',
        url: "" + '/api/users/' + openid,
        responseType: 'json'
    }).then(function (response) {
        console.log(response);
        var jsonObj = response.data;
        var code = jsonObj["code"];
        var msg = jsonObj["msg"];
        if (code === 0) {
            data.me = jsonObj['body'];
        } else {
            alert(msg);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function getCarts() {
    axios({
        method: 'get',
        url: "" + '/api/carts/' + vm.me.openid,
        responseType: 'json'
    }).then(function (response) {
        console.log(response);
        var jsonObj = response.data;
        var code = jsonObj["code"];
        var msg = jsonObj["msg"];
        if (code === 0) {
            data.cartArray = jsonObj['body'];
        } else {
            alert(msg);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

/**
 * 获取轮播图
 */
function getCarousels() {
    axios({
        method: 'get',
        url: "" + '/api/carousels/',
        responseType: 'json'
    }).then(function (response) {
        console.log(response);
        var jsonObj = response.data;
        var code = jsonObj["code"];
        var msg = jsonObj["msg"];
        if (code === 0) {
            data.cartArray = jsonObj['body'];
        } else {
            alert(msg);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function getMeInfo() {
    var openid = document.getElementById("openid").value;
    axios({
        method: 'get',
        url: "" + '/api/users/' + openid,
        responseType: 'json'
    }).then(function (response) {
        console.log(response);
        var jsonObj = response.data;
        var code = jsonObj["code"];
        var msg = jsonObj["msg"];
        if (code === 0) {
            data.me = jsonObj['body'];
        } else {
            alert(msg);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function updateUser() {
    console.log(vm.me);
    $.ajax({
        type: "POST",
        url: "" + '/api/users',
        dataType: "json",
        data: vm.me,
        success: function (jsonData) {
            var code = jsonData["code"];
            var msg = jsonData["msg"];
            if (code == 0) {
                showSucceedToast();
            } else {
                alert(msg);
            }
        }
    });
}

/**
 * 显示成功的 toast
 */
function showSucceedToast() {
    var toast = $('#toast');
    if (toast.css('display') != 'none') {
        return;
    }
    toast.fadeIn(100);
    setTimeout(function () {
        toast.fadeOut(100);
    }, 2000);

}

/**
 * 显示添加到购物车的 sheet
 * @param index
 */
function showAddCartSheet(index) {
    vm.toCartGoods = vm.goodsArray[index];

    var iosActionsheet = $('#iosActionsheet');
    var iosMask = $("#iosMask");

    function hideSheet() {
        iosActionsheet.removeClass('weui-actionsheet_toggle');
        iosMask.fadeOut(200);
    }

    iosMask.click(function () {
        hideSheet();
    });
    $('#iosActionsheetCancel').click(function () {
        hideSheet();
    });
    $('#iosActionsheetConfirm').click(function () {
        hideSheet();
    });

    iosActionsheet.addClass('weui-actionsheet_toggle');
    iosMask.fadeIn(200);
}

function addUser() {
    openid = document.getElementById("openid").value;
    nickname = document.getElementById("nickname").value;
    sex = document.getElementById("sex").value;
    headimgurl = document.getElementById("headimgurl").value;
    vm.me.openid = openid;
    vm.me.wx_name = nickname;
    vm.me.sex = sex;
    vm.me.avatar = headimgurl;
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
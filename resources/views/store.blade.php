<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>心悦木制品</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href={{asset("css/lib/weui.min.css")}}/>
    <link rel="stylesheet" href={{asset("css/main-page.css")}}/>
    <link rel="stylesheet" href={{asset("css/card.css")}}/>
    <link rel="stylesheet" href={{asset("css/carousel.css")}}/>
</head>
<body>
<div id="app" class="container">
    <div class="weui-flex" id="header_container">
        <div id="avatar-container" class="weui-flex__item">
            <img id="avatar" :src="me.avatar"/>
        </div>
        <div id="user_name" class="weui-flex__item">
            <a>@{{me.wx_name}}</a>
        </div>
        <div id="msg-container" @click="refreshData" class="weui-flex__item">
            <a>  </a>
        </div>
    </div>

    <div class="weui-tab">
        <div class="weui-tab__panel">
            <div class="weui-tab__panel">
                <div id="store-page">
                    <!--搜索开始-->
                    <!--<div class="weui-search-bar" id="searchBar">-->
                    <!--<form class="weui-search-bar__form">-->
                    <!--<div class="weui-search-bar__box">-->
                    <!--<i class="weui-icon-search"></i>-->
                    <!--<input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索"-->
                    <!--required/>-->
                    <!--<a href="javascript:" class="weui-icon-clear" id="searchClear"></a>-->
                    <!--</div>-->
                    <!--<label class="weui-search-bar__label" id="searchText">-->
                    <!--<i class="weui-icon-search"></i>-->
                    <!--<span>搜索</span>-->
                    <!--</label>-->
                    <!--</form>-->
                    <!--<a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>-->
                    <!--</div>-->
                    <!--<div class="weui-cells searchbar-result" id="searchResult">-->
                    <!--<div class="weui-cell weui-cell_access">-->
                    <!--<div class="weui-cell__bd weui-cell_primary">-->
                    <!--<p>实时搜索文本</p>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="weui-cell weui-cell_access">-->
                    <!--<div class="weui-cell__bd weui-cell_primary">-->
                    <!--<p>实时搜索文本</p>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="weui-cell weui-cell_access">-->
                    <!--<div class="weui-cell__bd weui-cell_primary">-->
                    <!--<p>实时搜索文本</p>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--<div class="weui-cell weui-cell_access">-->
                    <!--<div class="weui-cell__bd weui-cell_primary">-->
                    <!--<p>实时搜索文本</p>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--搜索框结束-->

                    <!--轮播开始-->
                    <div class="carousel carousel-slider" data-indicators="true">
                        <a v-for="img in carouselArray" class="carousel-item"><img :src="img.imgUrl"></a>
                    </div>
                    <!--轮播结束-->
                    <div class="card-container">
                        <div class="card left" v-for="(goods, index) in goodsArray">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" :src="goods.imgUrl">
                            </div>
                            <div class="card-content">
                                <!--标题，一般几个字就行了-->
                                <span class="card-title">@{{goods.name}} <i
                                            class="goods-price">￥@{{goods.price}}/m</i> <img
                                            src="img/goods-detail.png"
                                            class="right activator goods-detail-btn"></span>
                                <p class="add-to-cart-container"><a href="javascript:;" @click="showAddCartSheet(index)"
                                                                    class="add-to-cart-btn weui-btn_mini weui-btn weui-btn_plain-primary">添加到购物车</a>
                                </p>
                            </div>
                            <div class="card-reveal">
                                <img class="card-title  right close-btn" src="img/close-btn.png"/>
                                <p class="goods-detail">
                                    @{{goods.intro}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cart-page" class="hidden">
                    <div class="weui-cells__title">购物车详情</div>
                    <div class="weui-cells" v-if="cartArray.length > 0">
                        <div class="weui-cell" v-for="(goods, index) in cartArray">
                            <div class="weui-cell__hd"><img class="cart-goods_img" :src="goods.img_url" alt="">
                            </div>
                            <div class="weui-cell__bd">
                                <p>@{{goods.name}}</p>
                                <i class="cart-total_price ">￥@{{goods.total_price}}</i>
                            </div>
                            <div class="cart-goods_name weui-cell__ft">
                                <span class="right cart-goods_delete"><img @click="deleteCart(index, goods.id)" src="img/delete-icon.png"></span>
                                <span class="right cart-total_count">@{{goods.count}}</span>
                            </div>
                        </div>
                    </div>

                    <div id="">

                    </div>

                    <div id="cart-confirm">
                        <a href="javascript:;" class="weui-btn weui-btn_primary">前往付款</a>
                    </div>
                </div>

                <!--我的开始-->
                <div id="me-page" class="hidden">
                    <div class="me-headline">个人信息 <span
                                class="right me-edit" @click="editUser">
                        <span v-if="isEditUserMod">完成</span>
                        <span v-else>编辑</span>
                    </span></div>

                    <!--编辑个人信息开始-->

                    <div class="weui-cells weui-cells_form" v-if="isEditUserMod">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label edit-label">姓名</label></div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" v-model="me.name" placeholder="请输入姓名"/>
                            </div>
                        </div>

                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label edit-label">手机号</label></div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" v-model="me.phone" placeholder="请输入手机号"/>
                            </div>
                        </div>

                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label class="weui-label edit-label"> 地址</label></div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="text" v-model="me.address" placeholder="请输入地址"/>
                            </div>
                        </div>
                    </div>

                    <!--编辑个人信息结束-->

                    <ul id="me-container" v-else>
                        <li>姓名：<span class="me-info" id="me-name">@{{me.name}}</span></li>
                        <li>电话：<span class="me-info" id="me-phone">@{{me.phone}}</span>
                        </li>
                        </li>
                        <li>地址：<span class="me-info" id="me-address">@{{me.address}}</span></li>
                        </li>
                    </ul>

                    <div id="me-orders-headline" class="me-headline">我的订单</div>

                    <div id="orders-container" v-if="ordersArray.length > 0">
                        <div class="weui-cells">
                            <div class="order_container weui-cell" v-for="order in ordersArray">
                                <div class="me-order_info">
                                    <div class="me-order_line">
                                        <label>订单号：</label>
                                        <span class="me-order_number">@{{order.number}}</span>
                                        <i class="right me-oder_price">￥@{{order.totalPrice}}</i>
                                    </div>
                                    <div class="me-order_line">
                                        <label>订单状态：</label>
                                        <span class="me-order_status">@{{order.status}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="empty-order" v-else>
                        <h5>您还没有订单</h5>
                    </div>
                    <!--我的结束-->
                </div>
            </div>
            <div class="weui-tabbar">
                <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on">
                    <img id="store_icon" src="img/home-active.png" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">商城</p>
                </a>
                <a href="javascript:;" class="weui-tabbar__item">
                    <img id="cart_icon" src="img/cart.png" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">购物车</p>
                </a>
                <a href="javascript:;" class="weui-tabbar__item">
                    <img id="me_icon" src="img/me.png" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">我</p>
                </a>
            </div>
        </div>

        <!--弹窗-->
        <div class="js_dialog" id="androidDialog1" style="display: none;">
            <div class="weui-mask"></div>
            <div class="weui-dialog weui-skin_android">
                <div class="weui-dialog__hd"><strong class="weui-dialog__title">弹窗标题</strong></div>
                <div class="weui-dialog__bd">
                    弹窗内容，告知当前状态、信息和解决方法，描述文字尽量控制在三行内
                </div>
                <div class="weui-dialog__ft">
                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default">辅助操作</a>
                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary">主操作</a>
                </div>
            </div>
        </div>

        <div>
            <div class="weui-mask" id="iosMask" style="display: none"></div>
            <div class="weui-actionsheet" id="iosActionsheet">
                <div class="weui-actionsheet__title">
                    <p class="weui-actionsheet__title-text">请输入购买的数量</p>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">数量</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" v-model="currentGoodsCount" pattern="[0-9]*" placeholder="请输入购买数量"/>
                    </div>
                </div>
                <div class="weui-actionsheet__action">
                    <div class="weui-actionsheet__cell" @click="addCart" id="iosActionsheetConfirm">确定</div>
                </div>
                <div class="weui-actionsheet__action">
                    <div class="weui-actionsheet__cell" id="iosActionsheetCancel">取消</div>
                </div>
            </div>
        </div>
    </div>

    <!--弹窗结束-->

    <!--BEGIN toast-->
    <div id="toast" style="display: none;">
        <div class="weui-mask_transparent"></div>
        <div class="weui-toast">
            <i class="weui-icon-success-no-circle weui-icon_toast"></i>
            <p class="weui-toast__content">已完成</p>
        </div>
    </div>
    <!--end toast-->

</div>

</body>

<script src={{asset("http://res.wx.qq.com/open/js/jweixin-1.2.0.js")}}></script>
<script src={{asset("js/lib/axios.min.js")}}></script>
<script src={{asset("js/lib/vue.js")}}></script>
<script src={{asset("js/lib/jquery.min.js")}}></script>
<script src={{asset("js/lib/materialize.min.js")}}></script>
<script src={{asset("js/lib/init.js")}}></script>
<script src={{asset("js/lib/listener.js")}}></script>
<script src={{asset("js/initData.js")}}></script>
<script src={{asset("js/weixin.js")}}></script>
<script>
    $(document).ready(function () {

        initSearchBox();
        initTabBar();
        $('.carousel.carousel-slider').carousel({fullWidth: true, duration: 200, indicators: true});
    });

</script>
</html>
function initTabBar() {
    $('.weui-tabbar__item').click(function () {
        resetTabBarIcon();
        setActiveTabBarIcon($(this));
        $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
    });
}

function resetTabBarIcon() {
    $("#store_icon").attr("src", "img/home.png");
    $("#cart_icon").attr("src", "img/cart.png");
    $("#me_icon").attr("src", "img/me.png");
}

function setActiveTabBarIcon(tab) {
    var imgContainer = tab.find("img")[0];
    var oldSrc = imgContainer.src;
    var atIndex = oldSrc.lastIndexOf("/");
    var imgName = oldSrc.slice(atIndex, oldSrc.length);
    var imgPathWithoutName = oldSrc.slice(0, atIndex);
    if (imgName === "/home.png") {
        imgContainer.src = imgPathWithoutName + "/home-active.png";
        $("#store-page").removeClass("hidden");
        $("#cart-page").addClass("hidden");
        $("#me-page").addClass("hidden");
    }else if(imgName === "/cart.png") {
        imgContainer.src = imgPathWithoutName +  "/cart-active.png"
        $("#store-page").addClass("hidden");
        $("#cart-page").removeClass("hidden");
        $("#me-page").addClass("hidden");
    }else if (imgName === "/me.png") {
        imgContainer.src = imgPathWithoutName + "/me-active.png";
        $("#store-page").addClass("hidden");
        $("#cart-page").addClass("hidden");
        $("#me-page").removeClass("hidden");
    }
}

/**
 * 设置当前页面
 * @param tab
 */
function setCurrentPage(tab) {
    var imgContainer = tab.find("img")[0];
    var oldSrc = imgContainer.src;
    var atIndex = oldSrc.lastIndexOf("/");
    var imgName = oldSrc.slice(atIndex, oldSrc.length);
    var imgPathWithoutName = oldSrc.slice(0, atIndex);
    if (imgName === "/home.png") {
        $("#store-page").removeClass("hidden");
        $("#cart-page").addClass("hidden");
        $("#me-page").addClass("hidden");
    }else if(imgName === "/cart.png") {
        $("#store-page").removeClass("hidden");
        $("#cart-page").addClass("hidden");
        $("#me-page").addClass("hidden");
    }else if (imgName === "/me.png") {
        $("#store-page").removeClass("hidden");
        $("#cart-page").addClass("hidden");
        $("#me-page").addClass("hidden");
    }
}
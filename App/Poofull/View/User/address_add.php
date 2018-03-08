
<include file="./App/Poofull/View/header.php" />

<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div class="grey tc">
    <br>
    <h1><i class="icon-map-marker "></i>   添加收货地址</h1>
    <a class="ft28  icon-edit" href="/poofull/user/address_add"></a>
    <br>
</div>
<br>
<style>
    .mt7{
        margin-top: 7px;
    }
</style>

    <div class="grey h50 lh50 ft28 w100">
        <span class="bl fl ml5b w50"><i class="icon-user"></i></span>
        <input class="w90 ml5b lh50 fl" type="text" id="name" placeholder="收货人姓名">
    </div>
    <br class="clear">
<div class="grey h50 lh50 ft28 w100">
        <span class="bl fl ml5b w50"><i class="icon-phone-sign"></i></span>
        <input class="w90 ml5b lh50 fl" type="number" id="phone" placeholder="收货人号码">
    </div>
<br class="clear">
<div class="grey h50 lh50 ft28 w100">
    <span class="bl fl ml5b w50"><i class="icon-map-marker"></i></span>
    <input class="w90 ml5b lh50 fl" type="text" id="city" placeholder="收货人城市">
</div>

<br class="clear">
<div class="grey h50 lh50 ft28 w100">
    <span class="bl fl ml5b w50"><i class="icon-map-marker"></i></span>
    <input class="w90 ml5b lh50 fl" type="text" id="address" placeholder="收货人地址">
</div>
<br class="clear">

<button class="w100 aaa " id="ddd">确认添加</button>

<include file="./App/Poofull/View/footer.php" />
<script>

    $("#ddd").click(function () {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var city = $("#city").val();
        var address = $("#address").val();

        if(name=="" || phone==""  || city=="" || address==""){
            alert('请填写完整数据');
            $("#name").focus();
            $("#phone").focus();
            $("#city").focus();
            $("#address").focus();
            return false;
        }
        if(phone){
            var reg = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
            if(!reg.test(phone)){
                alert('手机号错误,必须为11位纯数字.');
                return false;
            }
        }
        $.post('/poofull/user/address_do_add', {
            'name'           : name,
            'phone'        : phone,
            'city'             : city,
            'address'           : address,
        }, function (data) {
                if (data.error_code=='200') {
                    alert(data.msg);
                    location.reload();
                }else{
                    alert(data.msg);
                    return false;
                }
            });

    });

</script>

<include file="./App/Poofull/View/header.php" />

<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div class="grey tc">
    <br>
    <h1><i class="icon-map-marker "></i>   编辑收货地址</h1>
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
    <input class="w90 ml5b lh50 fl" type="text" id="name" value="{$address.name}">
    <input class="w90 ml5b lh50 fl" type="hidden" id="id" value="{$address.id}">
</div>
<br class="clear">
<div class="grey h50 lh50 ft28 w100">
    <span class="bl fl ml5b w50"><i class="icon-phone-sign"></i></span>
    <input class="w90 ml5b lh50 fl" type="number" id="phone" value="{$address.phone}">
</div>
<br class="clear">
<div class="grey h50 lh50 ft28 w100">
    <span class="bl fl ml5b w50"><i class="icon-map-marker"></i></span>
    <input class="w90 ml5b lh50 fl" type="text" id="city" value="{$address.city}">
</div>

<br class="clear">
<div class="grey h50 lh50 ft28 w100">
    <span class="bl fl ml5b w50"><i class="icon-map-marker"></i></span>
    <input class="w90 ml5b lh50 fl" type="text" id="address" value="{$address.address}">
</div>
<br class="clear">

<button class="w100 aaa " id="ddd">确认添加</button>

<include file="./App/Poofull/View/footer.php" />
<script>

    $("#ddd").click(function () {
        var id = $("#id").val();
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
        $.post('/poofull/user/address_do_edit', {
            'name'           : name,
            'phone'        : phone,
            'city'             : city,
            'id'             : id,
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
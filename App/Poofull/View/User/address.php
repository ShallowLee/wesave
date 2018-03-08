
<include file="./App/Poofull/View/header.php" />

<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div class="grey tc">
    <br>
    <h1><i class="icon-map-marker "></i>   地址管理</h1>
    <a class="ft28  icon-edit" href="/poofull/user/address_add"></a>
    <br>
</div>
<br>
<volist name="address" id="addresss">
    <div class="grey h90 lh30">
        <div  class="bl ml10b father">
            <input type="hidden" class="id" value="{$addresss.id}">
            <a href="/poofull/user/address_edit"><i class="icon-user "></i>   <span>{$addresss.name}</span><br>
            <i class="icon-phone-sign "></i>   <span>{$addresss.phone}</span> </a>
            <a href="/poofull/user/address_edit/id/{$addresss.id}" class="fr ft28 mr10 icon-edit "></a>
            <a href="/poofull/user/address_del" class="fr ft28 mr10 icon-trash "></a><br>
            <i class="icon-map-marker "></i>   <span>{$addresss.city}   {$addresss.address}</span>
        </div>
    </div>
    <br>
</volist>

<include file="./App/Poofull/View/footer.php" />

<script>

    $(".icon-trash").click(function () {
        if (confirm('确定删除这个地址吗？')) {
            var id = $(this).parents('.father').find('.id').val();
            $.post('/poofull/user/address_del', {
                'id': id,
            }, function (data) {
                if (data.error_code=='200') {
                    alert(data.msg);
                    location.reload();
                }else{
                    alert(data.msg);
                    return false;
                }
            }
        )
            ;
        }
        return false;
    });

</script>
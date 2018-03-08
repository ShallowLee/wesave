
<include file="./App/Poofull/View/header.php" />

<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div class="grey tc">
    <br>
    <h1><i class="icon-map-marker "></i>   快递信息</h1>
    <br>
</div>
<br>
    <div class="grey lh30">
        <div class="ft20">订单单号：<?php echo $_GET['sn']; ?></div>
        <div class="ft20">快递单号：<?php echo $_GET['express']; ?></div>
        <div>
                <div>
                    <?php
                     foreach($express as $key=>$val) { ?>
                        <div ><span class="ml10"> <?php    echo $val['context'];  ?></span> </div>
                         <div class="bl w100 white"> <span class="ml10"><?php    echo $val['time'];  ?></span> </div>

                     <?php } ?>
                    </div>

        </div>
    </div>


    <br>

<include file="./App/Poofull/View/footer.php" />


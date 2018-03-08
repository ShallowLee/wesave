
<include file="./App/Poofull/View/header.php" />
<!-- Copyright � 2008. Spidersoft Ltd -->
<div>


    <input type="hidden" id="id" value="{$news.id}">
    <p>
        <img width="100%" src="__ROOT__/{$news.pic}">
    </p>
    <div class="ft20">【{$news.title}】</div>


    <style>
        .content img{
            width: 100% !important;
        }
    </style>
    <div class="bl w100 content">
        <?php echo htmlspecialchars_decode($news['content']) ?>
    </div>


</div>
<div class="clear"></div>


<include file="./App/Poofull/View/footer.php" />

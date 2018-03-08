
<include file="./App/Poofull/View/header.php" />
<div style="display: block;  position: relative;
    z-index: 9999;  ">

    <volist name="news" id="newss">
        <div>
            <p>
                <a href="/poofull/news/page/id/{$newss.id}">
                    <span>{$newss.title}</span><br>
                    <img width="100%" src="__ROOT__/{$newss.pic}">
                </a>
            </p>
        </div>
    </volist>
</div>
<!-- Copyright � 2008. Spidersoft Ltd -->


<include file="./App/Poofull/View/footer.php" />
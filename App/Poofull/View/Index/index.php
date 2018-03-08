
<include file="./App/Poofull/View/header.php" />
<div style="display: block;  position: relative;
    z-index: 9999;  ">
<h3>今日头条   <span class="fr mr5 ft16"><a href="/poofull/news/index">更多</a></span></h3>
    <volist name="news" id="newss">
        <div>
            <p class="grey">
                <a href="/poofull/news/page/id/{$newss.id}">
                   {$newss.title}
                    <span class="fr mr5 ft14">{$newss.time|date='Y-m-d H:i:s',###}</span>
                </a>
            </p>
        </div>
    </volist>

</div>
<!-- Copyright � 2008. Spidersoft Ltd -->
    <volist name="classify" id="classifys">
        <div>
            <p>
                <a href="/poofull/product/classify/id/{$classifys.id}">
                    <img width="100%" src="__ROOT__/{$classifys.pic}">
                </a>
            </p>

        </div>
    </volist>


<include file="./App/Poofull/View/footer.php" />
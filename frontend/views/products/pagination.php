<?php
use yii\widgets\LinkPager;
?>
<div class="pagination-wrapper">
    <?= LinkPager::widget([
        'pagination' => $pages,
       // 'nextPageLabel' => 'Next', // 修改上下页按钮
       // 'prevPageLabel' => 'Previous',
        'nextPageLabel' => false, // 不显示上下页按钮
        'prevPageLabel' => false,
        'firstPageLabel' => '<span aria-hidden="true">&laquo;</span>', // 设置首页尾页按钮
        'lastPageLabel' => '<span aria-hidden="true">&raquo;</span>',
        'hideOnSinglePage' => false, // 当你数据不足2页时,分页默认不显示,但你可以让他显示出来
        'maxButtonCount' =>$pageSize,    // 分页 页码默认显示10页,不过你可以自由设置,比如显示5页
        'options' => ['class' => 'pagination'], // 可以给分页添加class 然你你想换个颜色,居个中啊
    ]); ?>
   <!-- <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>-->
</div>
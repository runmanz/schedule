<?php
use yii\helpers\Url;
$this->title = '排班表';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .prev,.next{cursor: pointer;}
</style>
<div class="calendar-index">
    <?= $this->render("/scheduler/_calendar",['data' => $data, 'month' => $month]);?>
</div>
<?php
$schedulerIndexUrl = Url::toRoute("index");
$js = <<<JS
    $("tr").on("click",".prev,.next",function() {
        if(!$(this).hasClass("month-off")){
            window.location.href = "{$schedulerIndexUrl}?month=" + $(this).data("url");
        }else{
            console.log($(this).hasClass("month-off"));
        }
    });
JS;
$this->registerJs($js);
?>
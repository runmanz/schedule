<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\dialog\Dialog;

$this->title = '排班表';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("/css/scheduler.css");
echo Dialog::widget();
?>
<div class="scheduler-index">
    <div class="scheduler-content">
        <?= $this->render("_calendar");?>
    </div>
    <div class="scheduler-right">
        <?= Html::a('查看值班人员', 'javascript:void(0);', [
            'data-toggle' => 'modal',
            'data-target' => '#scheduler-view-modal',
            'class' => 'scheduler-view btn btn-primary'
        ]);?>
        <?= Html::a('添加值班人员', 'javascript:void(0);', [
            'data-toggle' => 'modal',
            'data-target' => '#add-scheduler-modal',
            'class' => 'add-scheduler btn btn-success'
        ]);?>
    </div>
</div>
<?php
use yii\bootstrap\Modal;
Modal::begin([
    'id' => 'add-scheduler-modal',
    'header' => '<h4 class="modal-title">添加值班人员</h4>',
    'footer' => '<button type="button" class="btn btn-primary add-scheduler-submit">提交</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>',
]);
?>
<div class="form-group">
    <label for="" class="control-label">姓名</label>
    <input type="text" placeholder="请输入姓名" class="form-control" id="scheduler-name">
</div>
<?php
Modal::end();
?>
<?php
Modal::begin([
    'id' => 'scheduler-view-modal',
    'header' => '<h4 class="modal-title">值班人员列表</h4>',
    'footer' => '<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>',
]);
?>
<div class="row">
</div>
<div class="help-block" style="color:red">点击人名, 删除值班人员</div>
<?php
Modal::end();
?>
<?php
$addSchedulerUrl = Url::toRoute("add-scheduler");
$schedulerListUrl = Url::toRoute("list");
$deleteSchedulerUrl = Url::toRoute("del-scheduler");
$schedulerSelectUrl = Url::toRoute("scheduler-select");

$js = <<<JS
    $(".add-scheduler-submit").on("click",function() {
        var name = $("#scheduler-name").val();
        var form = $("#add-scheduler-modal");
        $.post("{$addSchedulerUrl}",{name:name},function(data) {
            if(data.status === 1001){
                krajeeDialog.alert("添加成功");
                form.find(".btn-danger").click();
            }else{
                krajeeDialog.alert(data.msg);
            }
        });
    });
    $(".scheduler-view").on("click",function() {
        var form = $("#scheduler-view-modal");
        $.get("{$schedulerListUrl}",function(data) {
            if(data.status === 1001){
                var schedulers = data.schedulers;
                var elements = "";
                $.each(schedulers,function(index, element){
                    elements += '<div class="col-sm-2 schedulers-name" data-id="' + element.id + '">' + element.name + '</div>';
                    if(index % 6 === 5){
                        elements += '<div class="clearfix visible-sm-block"></div>';
                    }
                });
                form.find(".modal-body .row").html(elements);
            }else{
                krajeeDialog.alert(data.msg);
                form.find(".btn-danger").click();
            }
        });
    });
    $("#scheduler-view-modal").on("click",".schedulers-name",function() {
        var id = $(this).data("id");
        var form = $(this);
        $.post("{$deleteSchedulerUrl}?id="+id,function(data) {
            if(data.status === 1001){
                form.remove();
                krajeeDialog.alert("值班人员删除成功!");
            }else{
                krajeeDialog.alert(data.msg);
            }
        })
    });
JS;
$this->registerJs($js);
?>

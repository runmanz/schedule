<?php
$this->registerCssFile("/css/calendar.css");
?>
<table class="calendar">
    <tr>
        <td class="prev <?php if($month == 0):?>month-off<?php endif;?>" <?php if($month!=0):?>data-url="<?=$month-1?>"<?php endif;?>>
            上个月
        </td>
        <td class="month" colspan="5" style="cursor: auto">
            <?php
                switch ($month){
                    case 0:$date = date("Y-m",strtotime("-1 month"));break;
                    case 1:$date = date("Y-m",time());break;
                    case 2:$date = date("Y-m",strtotime("+1 month"));break;
                    default:$date = date("Y-m",time());break;
                }
                echo $date;
            ?>
        </td>
        <td class="next <?php if($month==2):?>month-off<?php endif;?>" <?php if($month!=2):?>data-url="<?=$month+1?>"<?php endif;?>>
            下个月
        </td>
    </tr>
    <tr>
        <th style="text-align: center;">日</th>
        <th style="text-align: center;">一</th>
        <th style="text-align: center;">二</th>
        <th style="text-align: center;">三</th>
        <th style="text-align: center;">四</th>
        <th style="text-align: center;">五</th>
        <th style="text-align: center;">六</th>
    </tr>
    <?php foreach($data as $k => $v):?>
        <?php if($k % 7 === 0):?>
            <?php if($k > 0):?></tr><?php endif;?>
            <tr>
        <?php endif;?>
        <td class="date-content<?php if($v['off']){echo ' off';}?><?php if($v['on']) echo ' on';?>" data-date="<?= $v['date']?>" data-id="<?=$v['id']?>">
            <div class="date"><?= $v['day']?></div>
            <div class="scheduler-name"><?= $v['name']?></div>
        </td>
    <?php endforeach;?>
</table>
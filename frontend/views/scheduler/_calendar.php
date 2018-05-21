<?php
$this->registerCssFile("/css/calendar.css");
?>
<table class="calendar">
    <tr>
        <td class="prev">上个月</td>
        <td class="month" colspan="5" style="cursor: auto">2018-05</td>
        <td class="next">下个月</td>
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
    <?php for($i=0; $i < 42; $i++):?>
        <?php if($i % 7 === 0):?>
            <?php if($i > 0):?></tr><?php endif;?>
            <tr>
        <?php endif;?>
    <?php endfor;?>
    <tr>
        <td class="off" data-day="29" data-date="2018-04-29" data-id="1">
            <div class="date">29</div>
            <div class="scheduler-name">徐堃徐堃徐堃</div>
        </td>
        <td class="off" data-day="30" data-date="2018-04-30" data-id="1">
            <div class="date">30</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="1" data-date="2018-05-01" data-id="1">
            <div class="date">1</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="2" data-date="2018-05-02" data-id="1">
            <div class="date">2</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="3" data-date="2018-05-03" data-id="1">
            <div class="date">3</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="4" data-date="2018-05-04" data-id="1">
            <div class="date">4</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="5" data-date="2018-05-05" data-id="1">
            <div class="date">5</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
    <tr>
        <td data-day="6" data-date="2018-05-06" data-id="1">
            <div class="date">6</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="7" data-date="2018-05-07" data-id="1">
            <div class="date">7</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="8" data-date="2018-05-08" data-id="1">
            <div class="date">8</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="9" data-date="2018-05-09" data-id="1">
            <div class="date">9</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="10" data-date="2018-05-10" data-id="1">
            <div class="date">10</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="11" data-date="2018-05-11" data-id="1">
            <div class="date">11</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="12" data-date="2018-05-12" data-id="1">
            <div class="date">12</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
    <tr>
        <td data-day="13" data-date="2018-05-13" data-id="1">
            <div class="date">13</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="14" data-date="2018-05-14" data-id="1">
            <div class="date">14</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="15" data-date="2018-05-15" data-id="1">
            <div class="date">15</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="16" data-date="2018-05-16" data-id="1">
            <div class="date">16</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="17" data-date="2018-05-17" data-id="1">
            <div class="date">17</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="18" data-date="2018-05-18" data-id="1">
            <div class="date">18</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="19" data-date="2018-05-19" data-id="1">
            <div class="date">19</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
    <tr>
        <td data-day="20" data-date="2018-05-20" data-id="1">
            <div class="date">20</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="on" data-day="21" data-date="2018-05-21" data-id="1">
            <div class="date">21</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="22" data-date="2018-05-22" data-id="1">
            <div class="date">22</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="23" data-date="2018-05-23" data-id="1">
            <div class="date">23</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="24" data-date="2018-05-24" data-id="1">
            <div class="date">24</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="25" data-date="2018-05-25" data-id="1">
            <div class="date">25</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="26" data-date="2018-05-26" data-id="1">
            <div class="date">26</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
    <tr>
        <td data-day="27" data-date="2018-05-27" data-id="1">
            <div class="date">27</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="28" data-date="2018-05-28" data-id="1">
            <div class="date">28</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="29" data-date="2018-05-29" data-id="1">
            <div class="date">29</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="30" data-date="2018-05-30" data-id="1">
            <div class="date">30</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td data-day="31" data-date="2018-05-31" data-id="1">
            <div class="date">31</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="1" data-date="2018-06-01" data-id="1">
            <div class="date">1</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="2" data-date="2018-06-02" data-id="1">
            <div class="date">2</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
    <tr>
        <td class="off" data-day="3" data-date="2018-06-03" data-id="1">
            <div class="date">3</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="4" data-date="2018-06-04" data-id="1">
            <div class="date">4</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="5" data-date="2018-06-05" data-id="1">
            <div class="date">5</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="6" data-date="2018-06-06" data-id="1">
            <div class="date">6</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="7" data-date="2018-06-07" data-id="1">
            <div class="date">7</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="8" data-date="2018-06-08" data-id="1">
            <div class="date">8</div>
            <div class="scheduler-name">徐堃</div>
        </td>
        <td class="off" data-day="9" data-date="2018-06-09" data-id="1">
            <div class="date">9</div>
            <div class="scheduler-name">徐堃</div>
        </td>
    </tr>
</table>
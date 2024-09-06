<?php


$tody = date("Y-m-d"); //今天
$firstDay = date("Y-m-01"); //這個月1號
$day = date("w", strtotime($firstDay)); //這個月1號星期幾
$days = date("t", strtotime($firstDay)); //這個月有幾天 
$week = ceil(($days + $day) / 7);


echo "<table>";
echo "<tr>";
echo "<th>日</th>";
echo "<th>一</th>";
echo "<th>二</th>";
echo "<th>三</th>";
echo "<th>四</th>";
echo "<th>五</th>";
echo "<th>六</th>";
echo "</tr>";
$d=1;
for($i=0;$i<$week;$i++){
    echo "<tr>";
    for($y=0;$y<7;$y++){
        if($i==0&&$day>$y){
            echo "<td></td>";
        }else if($d<=$days){
            echo "<td>".$d."</td>";
            $d++;
        }else{
            echo "<td></td>";
        }

    }
    echo "</tr>";
}

echo "</tr>";
echo "</table>";
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    $year = $_GET["y"] ?? date("Y"); //$_GET["y"]存在 $year=$_GET["y"] 不存在$year=date("Y")
    if ($year < 0) {
        $year = 0;
    } else if ($year >= 100000) {
        $year = 99999;
    }
    $month = $_GET["m"] ?? date("n"); //$_GET["m"]存在 $year=$_GET["m"] 不存在$year=date("n")
    if ($month < 1) {
        $month = 1;
    } else if ($month > 12) {
        $month = 12;
    }

    $lastYear = $year - 1;
    $nextYear = $year + 1;
    $lastMonth = $month - 1;
    $nextMonth = $month + 1;
    $tody = date("d"); //今天
    $firstDay = date($year . "-" . $month . "-01"); //這個月1號
    $day = date("w", strtotime($firstDay)); //這個月1號星期幾
    $days = date("t", strtotime($firstDay)); //這個月有幾天 
    $week = ceil(($days + $day) / 7);
    echo "<div class='container'>";

    echo "<div class='row mt-5 mb-5'>";
    echo "<div class='col d-flex justify-content-between  fs-1'>";
    if ($lastMonth < 1) {
        echo "<a class='btn btn-primary' href='?y=" . $lastYear . "&m=12'><</a>";
    } else {
        echo "<a class='btn btn-primary ' href='?y=" . $year . "&m=" . $lastMonth . "'><</a>";
    }

    echo "<a href='?y=" . date("Y") . "&m=" . date("n") . "'>" . $year . "年" . $month . "月" . "</a>";

    if ($nextMonth > 12) {
        echo "<a class='btn btn-primary ' href='?y=" . $nextYear . "&m=1'>></a>";
    } else {
        echo "<a class='btn btn-primary ' href='?y=" . $year . "&m=" . $nextMonth . "'>></a>";
    }
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<table class='table text-center '>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>日</th>";
    echo "<th>一</th>";
    echo "<th>二</th>";
    echo "<th>三</th>";
    echo "<th>四</th>";
    echo "<th>五</th>";
    echo "<th>六</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $d = 1;
    for ($i = 0; $i < $week; $i++) {
        echo "<tr>";
        for ($y = 0; $y < 7; $y++) {
            if ($i == 0 && $day > $y) {
                echo "<td></td>";
            } else if ($d <= $days) {
                echo "<td>" . $d . "</td>";
                $d++;
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    }

    echo "</tr>";
    echo "</tbody>";

    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    ?>

</body>

</html>
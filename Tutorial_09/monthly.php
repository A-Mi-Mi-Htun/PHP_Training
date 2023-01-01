<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="library/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="library/chart_js/Chart.min.js"></script>
<script src="library/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="mt-3 btn btn-secondary">Back</a>
                    <div class="">
                        <a href="weekly.php" class="mt-3 btn btn-outline-secondary">Weekly</a>
                        <a href="monthly.php" class="mt-3 btn btn-outline-secondary active">Monthly</a>
                        <a href="yearly.php" class="mt-3 btn btn-outline-secondary">Yearly</a>
                    </div>
                </div>
                <canvas class="mt-5" id="monthly">
                    <?php
                    // Include config file
                    require_once "config.php";

                    //Attempt select query execution
                    $sql = 'SELECT created_datetime FROM posts WHERE MONTH(created_datetime) = MONTH(NOW()) AND YEAR(created_datetime) = YEAR(NOW()) GROUP BY created_datetime';
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $created[] = date_format(date_create($row["created_datetime"]), "Y-m-d");
                    }

                    function getDatesFromRange($startDate, $endDate) {
                        $rangeArr = [];
                        $startDate = strtotime($startDate);
                        $endDate = strtotime($endDate);

                        for ($curDate = $startDate; $curDate <= $endDate; $curDate += (86400) ) {
                            $rangeArr[] = date("Y-m-d", $curDate);
                        }
                        return $rangeArr;
                    }

                    $datesArr = getDatesFromRange(date("Y-m-d"), date("Y-m-01"));
                    $color_length = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
                    $labelArr = getDatesFromRange(date("Y-m-01"), date('Y-m-t'));
                    //var_dump($color_length);
                    //var_dump($datesArr);

                    //To create array that doesn't include duplicated values
                    $dataArr = array_unique($created);
                    var_dump($dataArr);

                    //To create array that only includes values
                    $anone = array_values($dataArr);
                    //var_dump($anone);
                    //var_dump(count($datesArr));

                    //To get array values are how many times duplicated
                    $nooftime = array_count_values($created);

                    //To create array that only includes values
                    $antime = array_values($nooftime);
                    //var_dump($nooftime);

                    //Using json_decode is to remove " from start and end of the array
                    $encode_none = json_decode(json_encode($anone));
                    $encode_count = json_decode(json_encode($antime));
                    //var_dump($encode_none);
                    //var_dump($encode_count);

                    $arr = array();

                    for ($i = 0; $i < count($labelArr); $i++) {
                        $arr[$i] = 0;
                    }

                    for ($i = 0; $i < count($datesArr); $i++) {
                        for ($j = 0; $j < count($dataArr); $j++) {
                            if ($datesArr[$i] == $dataArr[$j]) {
                                $arr[$i] = $antime[$j];
                            }
                        }
                        
                    }
                    var_dump($arr);

                    //Color array
                    $colorarr = array();
                    for ($i = 0; $i < $color_length; $i++){
                        $colorarr[$i] = "#00ffff";
                    }
                    //Close connection
                    //$conn->close($link);
                    ?>
                </canvas>
            </div>
        </div>
    </div>
</div>
<script>
    var chart = document.getElementById("monthly").getContext("2d");
    var myChart = new Chart(chart, {
        type: "bar",
        data: {
            labels: <?php echo json_encode($labelArr); ?> ,
            datasets : [{
                label: "# monthly created posts",
                data: <?php echo json_encode($arr); ?> ,
                backgroundColor : <?php echo json_encode($colorarr); ?>
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });
</script>
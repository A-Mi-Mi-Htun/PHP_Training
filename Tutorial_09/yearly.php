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
                        <a href="monthly.php" class="mt-3 btn btn-outline-secondary">Monthly</a>
                        <a href="yearly.php" class="mt-3 btn btn-outline-secondary active">Yearly</a>
                    </div>
                </div>
                <canvas class="mt-5" id="yearly">
                    <?php
                    // Include config file
                    require_once "config.php";

                    //Attempt select query execution
                    $sql = 'SELECT created_datetime FROM posts WHERE DATE(created_datetime) BETWEEN "2021-12-19" AND NOW() GROUP BY created_datetime';
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $created[] = date_format(date_create($row["created_datetime"]), "y-m-d");
                    }

                    //To create array that doesn't include duplicated values
                    $none = array_unique($created);

                    //To create array that only includes values
                    $anone = array_values($none);
                    //var_dump($anone);

                    $color_length = count($anone);

                    //To get array values are how many times duplicated
                    $nooftime = array_count_values($created);

                    //To create array that only includes values
                    $antime = array_values($nooftime);
                    //var_dump($nooftime);

                    //Using json_decode is to remove " from start and end of the array
                    $encode_none = json_decode(json_encode($anone));
                    $encode_count = json_decode(json_encode($antime));
                    var_dump($encode_none);
                    var_dump($encode_count);

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
    var chart = document.getElementById("yearly").getContext("2d");
    var myChart = new Chart(chart, {
        type: "bar",
        data: {
            labels: <?php echo json_encode($encode_none); ?> ,
            datasets : [{
                label: "# yearly created posts",
                data: <?php echo json_encode($encode_count); ?> ,
                backgroundColor : <?php echo json_encode($colorarr); ?>
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
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
                        <a href="weekly.php" class="mt-3 btn btn-outline-secondary active">Weekly</a>
                        <a href="monthly.php" class="mt-3 btn btn-outline-secondary">Monthly</a>
                        <a href="yearly.php" class="mt-3 btn btn-outline-secondary">Yearly</a>
                    </div>
                </div>
                <canvas class="mt-5" id="weekly">
                    <?php
                    // Include config file
                    require_once "config.php";

                    //Attempt select query execution
                    $sql = 'SELECT created_datetime FROM posts WHERE MONTH(created_datetime) = MONTH(NOW()) AND YEAR(created_datetime) = YEAR(NOW()) GROUP BY created_datetime';
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $created[] = date_format(date_create($row["created_datetime"]), "D");
                    }

                    $created_datetime = json_encode($created);
                    var_dump($created_datetime);

                    $arr = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
                    $array = json_encode($arr);

                    $newarr = array(0, 0, 0, 0, 0, 0, 0);
                    $count = 0;

                    $arr_length = count($arr);
                    $created_length = count($created);

                    //To create array | origin values when values of two arrays are same 
                    //or zero when two values of two arrays are not equal
                    for ($i = 0; $i < $arr_length; $i++) {
                        for ($j = 0; $j < $created_length; $j++) {
                            if ($arr[$i] == $created[$j]) {
                                $count += 1;
                            }
                            $newarr[$i] = $count;
                        }
                        $count = 0;
                    }
                    //var_dump($newarr);

                    //Close connection
                    //$conn->close($link);
                    ?>
                </canvas>
            </div>
        </div>
    </div>
</div>
<script>
    var chart = document.getElementById("weekly").getContext("2d");
    var myChart = new Chart(chart, {
        type: "bar",
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: "# weekly created posts",
                data: <?php echo json_encode($newarr); ?> ,
                backgroundColor : [
                    "#00ffff",
                    "#00ffff",
                    "#00ffff",
                    "#00ffff",
                    "#00ffff",
                    "#00ffff",
                    "#00ffff"
                ]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
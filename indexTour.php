</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	echo '<ul>';
foreach ($unique_routes as $route) {
    echo '<li>' . $route . '</li>';
}
echo '</ul>';
</body>
</html>




        }

       $car_query = mysqli_query($connect, "SELECT * FROM `carinfo` WHERE `user_id` = '$user_id'");
        if (mysqli_num_rows($car_query) > 0) {

        $carinfo = mysqli_fetch_assoc($car_query);

       $_SESSION['carinfo'] = [
        "ID_car" => $carinfo['ID_car'],
        "user_id" => $carinfo['user_id'],
        "Mark" => $carinfo['Mark'],
        "Model" => $carinfo['Model'],
        "DevYear" => $carinfo['DevYear'],
        "NumSeatPlace" => $carinfo['NumSeatPlace'],
        "GovNum" => $carinfo['GovNum']

        ];



        header('Location: ../profile.php');

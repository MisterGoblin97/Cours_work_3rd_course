<?php
        require_once "../vendor/connect.php";

		session_start();
		$id = $_GET['id'];

		// Получение данных текущего пользователя из БД
		$query = "SELECT * FROM towns WHERE id = $id";
		$result = mysqli_query($connect, $query);

		$town_data = mysqli_fetch_assoc($result);

		// Обработка отправки формы


		if (isset($_POST['submit'])) {
			$townName = mysqli_real_escape_string($connect, $_POST['townName']);
            $price = mysqli_real_escape_string($connect, $_POST['price']);

			if (!empty($_FILES['file']['name'])) {
			    // Если файл был загружен, сохраняем новый файл и его путь
			    $apppath = dirname(dirname(__FILE__));
			    $filepath = 'uploads/' . time() . basename($_FILES['file']['name']);
			    $uploadfile = $apppath . '/' . $filepath;
			    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
			} else {
			    // Если файл не был загружен, используем существующий путь файла из БД
			    $filepath = $town_data['picture'];
			}

			$query = "UPDATE towns SET townName = '$townName', price = '$price', picture = '$filepath' WHERE id = $id";
			mysqli_query($connect, $query);

            header('Location: indexAdmin.php');
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Изменить данные рабочего пространства</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
	<div class="container">
		<form method="post" action="" enctype="multipart/form-data">
			<label>Название:</label>
			<input type="text" name="townName" value="<?php echo $town_data['townName']; ?>">

            <label>Цена:</label>
			<input type="text" name="price" value="<?php echo $town_data['price']; ?>">

			<label>Файл:</label>
			<input type="file" name="file">

			<button type="submit" name="submit" onclick="return confirm('Вы уверены, что хотите сохранить данные?')">Сохранить</button>
		</form>
	</div>
</body>
</html>


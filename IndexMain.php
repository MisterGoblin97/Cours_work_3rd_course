<?php
require_once "vendor/connect.php";

$stmt = $pdo->query("select * from towns");
$towns = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Главная</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- подключение шрифтов гугл -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href='assets/css/footer.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/StyleMain.css'>
    <script src="assets/js/script.js"></script>
</head>
<body>

        <div id="header_wrapper">
            <a href="IndexMain.html">
            <div class="header_logo">
                <img src="assets/img/logo1.png">
            </div> </a>

                <div class="header_tour" itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                    <a href="travelIndexFind.php" class="link-tour link-tour_search" >
                        <div class="link-tour_icon">
                            <img src="assets/img/loop.png" width="18" height="18">
                        </div>
                        <div class="link-tour_search">
                            Найти поездку
                        </div>
                    </a>

                    <a href="travelIndex.php" class="link-tour link-tour_create" >
                        <div class="link-tour_icon">
                            <img src="assets/img/plus.png" width="18" height="18">
                        </div>
                        <div class="link-tour_create">
                            Создать поездку
                        </div>
                    </a>
                </div>

            <div class="header_auth">
                    <a href="register.php" class="header_auth-link">
                      Ваш аккаунт
                    </a>
            </div>
        </div>



    <!-- Секция с основным контентом -->
    <section class="main_content">

            <h1 style="font-size: 30px;">Популярные маршруты по России</h1>

            <div class="con">
                <?php foreach ($towns as $town): ?>
                <div class="price" style="background-image: url('<?php echo $town['picture']?>'); background-color: rgba(31,31,31,0.2 );">
                    <div class="price-second">
                        <div class="text">
                            <div style="padding-bottom: 5px"><strong><?php echo $town['townName'] ?></strong></div>
                            <div>Поездка от <?php echo $town['price'] ?> рублей </div>
                        </div>
                        </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="about-service">
            <div class="about-service_item">
                <h1 style="font-size: 23px;">Если вы пассажир</h1>

                <div class="about-service_reward">
                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                            <p><b>Легкость путешествия</b></p>
                            <div class="about-service_reward-description">
                                Больше никаких пересадок и ожиданий на остановках. Под рукой всегда комфортабельный автомобиль.
                            </div>
                        </div>
                    </div>
                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                            <p><b>Безопасность</b></p>
                            <div class="about-service_reward-description">
                                Наши рейтинговые системы всегда подскажут вам наилучший выбор для вашего безопасного путешествия.
                            </div>
                        </div>
                    </div>

                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                        <p><b>Доступность</b></p>
                            <div class="about-service_reward-description">
                                Забронируйте машину по самой выгодной цене, на необходимую дату с нужными опциями.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-service_item">
                <h1 style="font-size: 23px;">Если вы водитель</h1>
                <div class="about-service_reward">
                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                            <p><b>Много попутчиков</b></p>
                            <div class="about-service_reward-description">
                                Среди огромной базы наших пассажиров вы точно найдете попутчиков, которым с вами по пути.
                            </div>
                        </div>
                    </div>

                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                            <p><b>Экономия</b></p>
                            <div class="about-service_reward-description">
                                Вы можете не только разделить ваши расходы на поездку с попутчиками, но и получить дополнительные бонусы.
                            </div>
                        </div>
                    </div>

                    <div class="about-service_reward-item">
                        <div class="about-service_reward-icon">
                            <img src="assets/img/shield.png" alt="" draggable="false" class="shield_icon">
                        </div>
                        <div class="about-service_reward-content">
                            <p><b>Весело</b></p>

                            <div class="about-service_reward-description">
                                Вы не успеете заскучать в поездке. Ведь с вами рядом всегда много интересных людей.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    <div class="main-seo_container">
                <div class="main-seo_cell">
                    <p>
                       <b>RoadMate</b> — иновационный и функциональный сервис поиска попутчиков совместных поездок на любые расстояния. На <b>RoadMate</b>:
                    </p>

                    <div class="margin-sm">
                        <div class="main-seo_description">
                           Расходы участники поездки делят между собой. Поэтому каждая  поездка всегда безопастна и удобна.
                        </div>
                    </div>

                    <div>
                        <div class="main-seo_description">
                            Каждую неделю водители создают множество поездок для пассажиров.
                        </div>
                    </div>

                    <div>
                        <div class="main-seo_description">
                            Простой, интуитивно понятный поиск междугородних поездок — в несколько кликов можно найти подходящий автомобиль или попутчика для поездки в любой регион России.
                        </div>
                    </div>
                </div>

                <div class="main-seo_cell">
                    <p>
                        Куда бы вы ни собирались, в какой бы удаленный населенных пункт ни ехали — с <b>RoadMate</b> каждая поездка будет безопасной, вы всегда доедете быстрее, удобнее и дешевле!
                    </p>
                    <p class="margin-sm">
                        Вы выбираете время и место, а водители предлагают вам свои услуги на условиях, которые выгодны всем участникам совместной поездки. <b>RoadMate</b> — это легкий и всегда выгодный способ путешествовать быстрее и с максимальным комфортом.
                    </p>
                </div>
            </div>
                <br>

            <!-- Подвал сайта -->
            <footer >
                <div>
                    <p>
                        RoadMate
                    </p>
                    <p>
                         &copy; Все права защищены. 2023 год.
                    </p>
                </div>
                <div>
                    <p>
                        Наша почта: RoadMate@mail.com
                    </p>
                    <p> Наш номер: +7(4725)-370-09-23 </p>
                </div>

                <div class="socialnet">
                    <a href="https://telegram.com">
                        <img src="assets/img/vk.png" width="70px" height="70px">
                    </a>
                    <a href="https://vk.com">
                        <img src="assets/img/telegram.png" width="70px" height="70px">
                    </a>
                </div>
            </footer>
    </body>
</html>


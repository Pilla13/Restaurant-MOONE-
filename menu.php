<?php
    $host = 'localhost'; 
    $user = 'root';  
    $pass = ''; 
    $db_name = 'Ресторан';  
    $link = mysqli_connect($host, $user, $pass, $db_name); 
        
    if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' .mysqli_connect_error();
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресторан</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/menu.css">
</head>

<body>
    <header>
        <div class = "header__wrapper">
            <div class = "logo__wrapper">
                <img class="header__logo" src = "./img/header__logo.png" alt="Restaurant logo" />
            </div>
            <div class = "nav__wrapper">
                <nav>
                    <ul class="nav__list">
                        <li class = "nav__item"><a href="index.php" class = "nav__link">ГЛАВНАЯ</a></li>
                        <li class = "nav__item"><a href="menu.php" class = "nav__link">МЕНЮ</a></li>
                        <li class = "nav__item"><a href="placement.php" class = "nav__link">РАЗМЕЩЕНИЕ</a></li>
                        <li class = "nav__item"><a href="staff.php" class = "nav__link">ПЕРСОНАЛ</a></li>
                        <li class = "nav__item"><a href="orders.php" class = "nav__link">ЗАКАЗЫ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class = "rest_menu_bg">
            <img src="./img/main.png" alt="Pic">
        </div>

        <section class = "rest_menu">
        <h2>Основное меню:</h2>
            <div class = "main_menu__container">
            <?php
            $query_create_view_main = "CREATE VIEW view_main_dishes AS SELECT * FROM `Основные блюда`";
            mysqli_query($link, $query_create_view_main);

            $query_select_view_main = "SELECT * FROM view_main_dishes";
            $result_view_main = mysqli_query($link, $query_select_view_main);
            while ($row = mysqli_fetch_assoc($result_view_main)) {
                ?>
                <div class="product__block">
                    <img src="/dishes/<?php echo $row['Номер изображения'] ?>.png" alt="Img">
                    <h4><?php echo $row['Название'] ?></h4>
                    <div class="dish__text">
                        <p class="dish__name"><?php echo $row['Цена'] ?> руб.</p>
                        <p class="dish__gr"><?php echo $row['Объем порции'] ?> гр.</p>
                    </div>
                </div>
            <?php
            }
            
            $query_drop_view_main = "DROP VIEW IF EXISTS view_main_dishes";
            mysqli_query($link, $query_drop_view_main);
            ?>
            </div>

            <h2>Десерты:</h2>
            <div class = "main_menu__container">
                <?php
                $query_create_view_deserts = "CREATE VIEW view_deserts AS SELECT * FROM `Десерты`";
                mysqli_query($link, $query_create_view_deserts);
                
                $query_select_view_deserts = "SELECT * FROM view_deserts";
                $result_view_deserts = mysqli_query($link, $query_select_view_deserts);
                while ($row = mysqli_fetch_assoc($result_view_deserts)) {
                    ?>
                    <div class="product__block">
                        <img src="/deserts/<?php echo $row['Номер изображения'] ?>.png" alt="Img">
                        <h4><?php echo $row['Название'] ?></h4>
                        <div class="dish__text">
                            <p class="dish__name"><?php echo $row['Цена'] ?> руб.</p>
                            <p class="dish__gr"><?php echo $row['Объем порции'] ?> гр.</p>
                        </div>
                    </div>
                <?php
                }
                
                $query_drop_view_deserts = "DROP VIEW IF EXISTS view_deserts";
                mysqli_query($link, $query_drop_view_deserts);
                ?>
            </div>

            <h2>Напитки:</h2>
            <div class = "main_menu__container">
            <?php
            $query_create_view_drinks = "CREATE VIEW view_drinks AS SELECT * FROM `Напитки`";
            mysqli_query($link, $query_create_view_drinks);
            
            $query_select_view_drinks = "SELECT * FROM view_drinks";
            $result_view_drinks = mysqli_query($link, $query_select_view_drinks);
            
            while ($row = mysqli_fetch_assoc($result_view_drinks)) {
                ?>
                <div class="product__block">
                    <img src="/drinks/<?php echo $row['Номер изображения'] ?>.png" alt="Img">
                    <h4><?php echo $row['Название'] ?></h4>
                    <div class="dish__text">
                        <p class="dish__name"><?php echo $row['Цена'] ?> руб.</p>
                        <p class="dish__gr"><?php echo $row['Объем'] ?> гр.</p>
                    </div>
                </div>
                <?php
                }
                
                $query_drop_view_drinks = "DROP VIEW IF EXISTS view_drinks";
                mysqli_query($link, $query_drop_view_drinks);
                ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class = "footer__wrapper">
            <div class = "footer__logo">
                <img src = "./img/header__logo.png" alt = "Logo">
            </div>
            <ul class = "sm__icons">
                <li class = "icon"><img src = "./img/inst.png" alt = "Icon" /></li>
                <li class = "icon"><img src = "./img/tt.png" alt = "Icon" /></li>
                <li class = "icon"><img src = "./img/tg.png" alt = "Icon" /></li>
                <li class = "icon"><img src = "./img/fb.png" alt = "Icon" /></li>
                <li class = "icon"><img src = "./img/wu.png" alt = "Icon" /></li>
            </ul>
        </div>
    </footer>
</body>
</html>
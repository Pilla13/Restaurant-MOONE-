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
    <link rel="stylesheet" href="./style/orders.css">
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
                    </ul></nav>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class = "ord_bg">
            <img src="./img/main.png" alt="Pic">
        </div>

        <section class = "orders">
            <h2>Заказы:</h2>

            <table class = "table__orders">

            <tr><th class = "th__orders">Номер<br />заказа</th><th class = "th__orders">Номер<br />стола</th><th class = "th__orders">Клиент</th><th class = "th__orders">Основное блюдо</th><th class = "th__orders">Десерт</th><th class = "th__orders">Напиток</th><tr>
            <?php
                $query_select_view_orders = "SELECT `Заказы`.`IDЗаказа`, `Заказы`.`IDСтола`, `Заказы`.`IDКлиента`,`Клиенты`.`Имя` AS `Клиент`, `Заказы`.`IDОсновное блюдо`, `Основные блюда`.`Название` AS `Название блюда`, `Заказы`.`IDДесерт`, `Десерты`.`Название` AS `Название десерта`, `Заказы`.`IDНапиток`, `Напитки`.`Название` AS `Название напитка` FROM `Заказы`
                LEFT JOIN `Клиенты` ON `Заказы`.`IDКлиента` = `Клиенты`.`IDКлиента`
                LEFT JOIN `Основные блюда` ON `Заказы`.`IDОсновное блюдо` = `Основные блюда`.`IDБлюда`
                LEFT JOIN `Десерты` ON `Заказы`.`IDДесерт` = `Десерты`.`IDДесерта`
                LEFT JOIN `Напитки` ON `Заказы`.`IDНапиток` = `Напитки`.`IDНапитка`";
            
                $result_view_orders = mysqli_query($link, $query_select_view_orders);
                
                while ($row = mysqli_fetch_assoc($result_view_orders))
                {
                    echo "<tr class='tr__orders'><td class='td__orders'>".$row['IDЗаказа']."</td><td class='td__orders'>".$row['IDСтола']."</td><td class='td__orders'>".$row['Клиент']."</td><td class='td__orders'>".$row['Название блюда']."</td><td class='td__orders'>".$row['Название десерта']."</td><td class='td__orders'>".$row['Название напитка']."</td></tr>";
                }
            
                $query_drop_view_orders = "DROP VIEW IF EXISTS view_orders";
                mysqli_query($link, $query_drop_view_orders);
            ?>
            
            </table>
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
</header>
</body>
</html>
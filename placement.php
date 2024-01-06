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
    <link rel="stylesheet" href="./style/placement.css">
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
        <div class = "fs_bg">
            <img src="./img/main.png" alt="Pic">
        </div>

        <section class = "tables">
            <h2>Столы:</h2>

            <table class = "table__tables">

            <tr><th class = "th__tables">Номер стола</th><th class = "th__tables">Количество мест</th><th class = "th__tables">Статус</th><th class = "th__tables">Номер официанта</th><tr>
                
                <?php
                $query_create_view_tables = "CREATE VIEW view_tables AS SELECT * FROM `Столы`";
                mysqli_query($link, $query_create_view_tables);
                            
                $query_select_view_tables = "SELECT * FROM view_tables";
                $result_view_tables = mysqli_query($link, $query_select_view_tables);
                     
                while ($row = mysqli_fetch_assoc($result_view_tables))
                {
                    ?>
                    <?php
                    echo "<tr class = tr__tables'><td class = 'td__tables'>".$row['IDСтола']."</td><td class = 'td__tables'>".$row['Количество мест']."</td><td class = 'td__tables'>".$row['Статус']."</td><td class = 'td__tables'>".$row['IDПерсонала']."</td></tr>";
                }
                $query_drop_view_tables = "DROP VIEW IF EXISTS view_tables";
                mysqli_query($link, $query_drop_view_tables);
                ?>
            </table>
        </section>

        <section class = "clients">
            <h2>Клиенты:</h2>

            <table class = "table__clients">

            <tr><th class = "th__clients">Номер клиента</th><th class = "th__clients">Имя</th><th class = "th__clients">Номер телефона</th><th class = "th__clients">Номер стола</th><tr>
                
                <?php
                $query_create_view_clients = "CREATE VIEW view_clients AS SELECT * FROM `Клиенты`";
                mysqli_query($link, $query_create_view_clients);
                            
                $query_select_view_clients = "SELECT * FROM view_clients";
                $result_view_clients = mysqli_query($link, $query_select_view_clients);
     
                while ($row = mysqli_fetch_assoc($result_view_clients))
                {
                    echo "<tr class = tr__clients'><td class = 'td__clients'>".$row['IDКлиента']."</td><td class = 'td__clients'>".$row['Имя']."</td><td class = 'td__clients'>".$row['Номер']."</td><td class = 'td__clients'>".$row['IDСтола']."</td></tr>";
                }
                $query_drop_view_clients = "DROP VIEW IF EXISTS view_clients";
                mysqli_query($link, $query_drop_view_clients);
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
</body>
</html>
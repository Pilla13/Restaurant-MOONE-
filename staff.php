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
        <?php
if (isset($_GET['submitForm'])) {
    $name = $_GET['fio'];
    $gender = $_GET['gender'];
    $birthdate = $_GET['birthdate'];
    $status = $_GET['status'];
    $number = $_GET['number'];
    $salary = $_GET['salary'];
    $position = $_GET['position'];

    $mysqli = new mysqli("localhost", "root", "", "Ресторан");

    if ($mysqli->connect_errno) {
        echo "Не могу соединиться с БД.";
        exit;
    }

    $name = $mysqli->real_escape_string($name);
    $gender = $mysqli->real_escape_string($gender);
    $birthdate = $mysqli->real_escape_string($birthdate);
    $status = $mysqli->real_escape_string($status);
    $number = $mysqli->real_escape_string($number);
    $salary = $mysqli->real_escape_string($salary);
    $position = $mysqli->real_escape_string($position);

    $query = "INSERT INTO `Персонал` (`IDРабочего`, `ФИО`, `Пол`, `Дата рождения`, `Статус`, `Номер`, `Зарплата`, `Должность`)
    VALUES (NULL, '$name', '$gender', '$birthdate', '$status', '$number', '$salary', '$position')";

    $result = $mysqli->query($query);

    if ($result) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        // Do not echo anything before the header
        // echo 'Ошибка при добавлении данных: ' . $mysqli->error;
        die('Ошибка при добавлении данных: ' . $mysqli->error);
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресторан</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/staff.css">
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
        <div class = "fs_bg">
            <img src="./img/main.png" alt="Pic">
        </div>

        <section class = "staff">
            <h2>Персонал:</h2>

            <table class = "table__personal">

            <tr><th class = "th__personal">Номер официанта</th><th class = "th__personal">ФИО</th><th class = "th__personal">Пол</th><th class = "th__personal">Дата рождения</th><th class = "th__personal">Статус</th><th class = "th__personal">Номер телефона</th><th class = "th__personal">Зарплата</th><th class = "th__personal">Должность</th><tr>
                <?php
                $query_create_view_personal = "CREATE VIEW view_personal AS SELECT * FROM `Персонал`";
                mysqli_query($link, $query_create_view_personal);
            
                $query_select_view_personal = "SELECT * FROM view_personal";
                $result_view_personal = mysqli_query($link, $query_select_view_personal);
     
                while ($row = mysqli_fetch_assoc($result_view_personal))
                {
                    echo "<tr class = tr__personal'><td class = 'td__personal'>".$row['IDРабочего']."</td><td class = 'td__personal'>".$row['ФИО']."</td><td class = 'td__personal'>".$row['Пол']."</td><td class = 'td__personal'>".$row['Дата рождения']."</td><td class = 'td__personal'>".$row['Статус']."</td><td class = 'td__personal'>".$row['Номер']."</td><td class = 'td__personal'>".$row['Зарплата']." р.</td><td class = 'td__personal'>".$row['Должность']."</td></tr>";
                }
                
                $query_drop_view_personal = "DROP VIEW IF EXISTS view_personal";
                mysqli_query($link, $query_drop_view_personal);
                ?>
            </table>
        </section>

        <section class = "staff__form">
            <div class = "staff__wrapper">
                <div class = "staff__img">
                    <img src = "/img/cook.png" alt = "Cook img">
                </div>

                <div class = "form__wrapper">

                <form action="" method="get">
                <div class = "box">
                    <label for="fio">ФИО:</label>
                    <input type="text" id="fio" name="fio" placeholder = "Иванов Иван Иванович" required><br>
                </div>

                <div class = "box box__gender">
                    <label>Пол:</label>
                    <input type="radio" id="female" name="gender" value="Женский" class = "radio" required>
                    <label for="female">Женский</label>
                    <input type="radio" id="male" name="gender" value="Мужской" class = "radio" required>
                    <label for="male">Мужской</label><br>
                </div>

                <div class = "box">
                    <label for="birthdate">Дата рождения:</label>
                    <input type="date" id="birthdate" name="birthdate" required><br>
                </div>

                <div class = "box">
                    <label>Статус:</label>
                    <select name="status" required>
                        <option selected disabled>Выбрать</option>
                        <option value="Замужем">Замужем</option>
                        <option value="Не замужем">Не замужем</option>
                        <option value="Женат">Женат</option>
                        <option value="Не женат">Не женат</option>
                    </select><br>
                </div>

                <div class = "box">
                    <label for="number">Номер:</label>
                    <input type="text" id = "number" name = "number" placeholder = "+375 33 12-34-567" required><br>
                </div>

                <div class = "box">
                    <label for="salary">Зарплата:</label>
                    <input type="number" id="salary" name="salary" placeholder = "1000" required><br>
                </div>

                <div class = "box">
                    <label for="position">Должность:</label>
                    <input type="text" id="position" name="position" placeholder = "Официант" required><br>
                </div>

                <input type="submit" name="submitForm" class = "sub_btn" value="Добавить">
                </form>
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
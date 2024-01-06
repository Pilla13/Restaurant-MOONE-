<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресторан</title>
    <link rel="stylesheet" href="./style/style.css">
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
        
        <section class="first_section">

            <div class = "fs__container">
                <div class = "fs__wrapper">
                    <div class = "fs__info">
                        <h1>MOONE</h2>

                        <p>
                            <span>MOONE</span> — это сочетание необычных вкусов, 
                            текстур, мнений, полета фантазии, красок и 
                            эмоций, чего-то теплого, приятного и 
                            эстетического.
                        </p>

                        <p>
                            <span>MOONE</span> — это европейская кухня с нотами Азии, 
                            которую мы показываем из простых ингредиентов, 
                            сочетая их с авторскими соусами, пробуя новые 
                            сочетания.
                        </p>
                    </div>

                    <div class = "fs__img">
                        <img src = "./img/fs_1.png" alt = "Dish">
                    </div>
                </div>
            </div>
        </section>

        <section class = "second_section">
            <div class = "fs_2">
                <img src="./img/fs_2.png" alt="Pic">
            </div>

            <div class = "ss__container">
                <div class = "ss__item">
                    <div class = "item">
                        <img src = "./img/time.svg" alt = "SVG" />
                        <h5>Понедельник - четверг: <br />11:00 - 22:00</h5>
                        <h5>Пятница - воскресенье: <br />11:00 - 01:00</h5>
                    </div>
                </div>

                <div class = "ss__item">
                    <div class = "item">
                        <img src = "./img/loc.svg" alt = "SVG" />
                        <h5>г. Минск, ул.Кальварийская, 25</h5>
                        <h5>г. Минск, ул.Октябрьская, 78</h5>
                        <h5>г. Минск, ул.Старовиленская, 45</h5>
                        <h5>г. Брест, ул.Партизанская, 9</h5>
                    </div>
                </div>

                <div class = "ss__item">
                    <div class = "item">
                        <img src = "./img/numb.svg" alt = "SVG" />
                        <h5>+375 17 67-33-220</h5>
                        <h5>+375 17 12-88-455</h5>
                        <h5>+375 29 76-67-777</h5>
                        <h5>+375 33 88-23-220</h5>
                    </div>
                </div>
            </div>
        </section>

        <section class = "third__section">
            <div class = "ts__bg">
                <img src="./img/ts_bg.png" alt="Pic">
            </div>

            <div class = "ts__1">
                <img src="./img/ts_1.png" alt="Pic">
            </div>

            <div class = "ts__container">
                <div class = "ts__wrapper">
                    <p>
                        Мы предлагаем наш аутентичный азиатский вкус удобным и доступным способом. 
                        MOONE стремится готовить более 30 различных блюд меню и подавать их к столу 
                        каждого клиента только из ингредиентов самого высокого качества.
                    </p>

                    <p>
                        Выдержка и ферментация являются основными процессами для приготовления традиционных 
                        азиатских соусов, таких как соевые соусы, различные сорта уксуса, чили и соевые пасты. 
                        Эти соусы и ингредиенты богаты натуральными пребиотиками и пробиотиками, которые 
                        полезны для пищеварительной системы и общего состояния организма.
                    </p>
                </div>
            </div>

            <div class = "sticks">
                <img src="./img/sticks.png" alt="Pic">
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
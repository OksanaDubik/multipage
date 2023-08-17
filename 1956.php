<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="./" class="logo ">
                    <img src="images/header/logo.svg" alt="logo" class="logo__img" width="125">
                </a>
                <nav class="menu">
                    <button class="menu__btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <ul class="menu__list">
                        <li class="menu__list-item"><a href="newProduct.html" class="menu__list-link">Твой стиль</a></li>
                        <li class="menu__list-item"><a href="workProcesses.html" class="menu__list-link">ЧАВО</a></li>
                        <li class="menu__list-item"><a href="examples.html" class="menu__list-link">Нам доверяют</a>
                        </li>
                        <li class="menu__list-item"><a href="1956.php" class="menu__list-link">Заказать</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main main-form">
        <div class="container">
            <h2 class="section__title">Свяжитесь с нами</h2>

        </div>
        <?php
        $theme = "Новый заказ";
        error_reporting(E_ERROR);   //Отключение предупреждений и нотайсов (warning и notice) на сайте
        // создание переменных из полей формы
        if (isset($_POST['name1'])) {
            $name1 = $_POST['name1'];
            if ($name1 == '') {
                unset($name1);
            }
        }
        if (isset($_POST['email1'])) {
            $email1 = $_POST['email1'];
            if ($email1 == '') {
                unset($email1);
            }
        }
        if (isset($_POST['text'])) {
            $text = $_POST['text'];
            if ($text == '') {
                unset($text);
            }
        }
        if (isset($_POST['sab'])) {
            $sab = $_POST['sab'];
            if ($sab == '') {
                unset($sab);
            }
        }

        //стирание треугольных скобок из полей формы
        /* комментарий */
        if (isset($name1)) {
            $name1 = stripslashes($name1);
            $name1 = htmlspecialchars($name1);
        }
        if (isset($email1)) {
            $email1 = stripslashes($email1);
            $email1 = htmlspecialchars($email1);
        }
        if (isset($text)) {
            $text = stripslashes($text);
            $text = htmlspecialchars($text);
        }
        // адрес почты куда придет письмо
        $address = "OksanaDubikW@yandex.ru";

        // текст письма
        $note_text = "
    Тема : $theme \r\n
    Имя : $name1 \r\n
    Email : $email1 \r\n
       Дополнительная информация : $text";
        if (isset($name1) && isset ($sab)) {
            mail($address, $theme, $note_text, "Content-type:text/plain; windows-1251");

            echo "<div  style=' background-color: #ddddfa;
    width: 100%;
    text-align: center;
    padding: 40px'>
    <p style='font-size:25px;'>
    Уважаемый(ая) 
    <b style='font-size:25px;'>
    $name1
    </b>
    Ваше письмо отправленно успешно. <br>
    Спасибо. <br>
    Вам скоро ответят на почту <b style='font-size:25px;'>
    $email1</b>.
    </p>
    </div>";
        }
        ?>
        <form action="1956.php" method="post" target="_blank" name="f1" enctype="multipart/form-data">

            <label>
                <input class="input1956" type="text" placeholder="Ваше имя" name="name1" required="">
            </label>
            <label>
                <input class="input1956" type="email" placeholder="Ваш email" name="email1" required="required">
            </label>


            <div class="form__item">
                <label><textarea class="input1956" placeholder="Дополнительные детали" name="text"></textarea></label>
            </div>
            <div class="input1956__btns">
                <input class="input1956__button" type="submit" value="ЗАКАЗАТЬ" name="sab">
                <input class="input1956__button" type="reset" value="ОЧИСТИТЬ" name="cli">
            </div>

        </form>
    </main>



    <footer class="footer">
        <div class="container">
            <nav class="footer__menu">
                <ul class="footer__menu-list">
                    <li class="footer__menu-item"><p class="footer__menu-title">Продукты</p></li>
                    <li class="footer__menu-item"><a href="examples.html" class="footer__menu-link">Наши работы</a>
                    </li>
                    <li class="footer__menu-item"><a href="workProcesses.html" class="footer__menu-link">Советы</a>
                    </li>
                    <li class="footer__menu-item"><a href="newProduct.html" class="footer__menu-link">Подарки для самых близких</a>
                    </li>
                </ul>
                <ul class="footer__menu-list">
                    <li class="footer__menu-item"><p class="footer__menu-title">Ресурсы </p></li>
                    <li class="footer__menu-item"><a href="workProcesses.html" class="footer__menu-link">Блог</a>
                    </li>

                    <li class="footer__menu-item"><a
                            href="mailto:oksana170773@gmail.com?subject=Заказать рисунок на одежде"
                            class="footer__menu-link">Связаться с нами по электронной почте</a></li>
                </ul>
                <ul class="footer__menu-list">
                    <li class="footer__menu-item"><p class="footer__menu-title">Нам доверяют</p></li>
                    <li class="footer__menu-item"><a href="examples.html" class="footer__menu-link">Отзывы</a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"></a></li>
                </ul>
                <ul class="footer__menu-list">
                    <li class="footer__menu-item"><p class="footer__menu-title">О нас</p></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link">Мы в соцсетях</a></li>
                </ul>
            </nav>
            <div class="footer__copy">
                <p class="footer__copy-text">По вопросам, связанным с заказами, звоните
                    по телефону 1-888-878-3227.
                </p>
                <p class="footer__copy-text">Мы не занимаемся продажей или арендой
                    одежды. Все работы подлежат предварительному согласованию с заказчиком.
                </p>
            </div>

            <nav class="copy__nav">
                <ul class="copy__nav-list">
                    <li class="copy__nav-item"><a href="#" class="copy__nav-link"> &#169; Данный сайт является
                            интеллектуальной собственностью</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</div>
<script type="text/javascript" src="main.js"></script>

</body>
</html>


<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>form</title>-->
<!--    <link rel='stylesheet' href='css/style.css'>-->
<!---->
<!--</head>-->
<!--<body>-->
<!--<div class="wrapper">-->
<!--    <header class="header">-->
<!--        <div class="container">-->
<!--            <div class="header__inner">-->
<!--                <a href="./" class="logo ">-->
<!--                    <img src="images/header/logo.svg" alt="logo" class="logo__img" width="125">-->
<!--                </a>-->
<!--                <nav class="menu">-->
<!--                    <button class="menu__btn">-->
<!--                        <span></span>-->
<!--                        <span></span>-->
<!--                        <span></span>-->
<!--                    </button>-->
<!--                    <ul class="menu__list">-->
<!--                        <li class="menu__list-item"><a href="newProduct.html" class="menu__list-link">новости</a></li>-->
<!--                        <li class="menu__list-item"><a href="workProcesses.html" class="menu__list-link">рабочие-->
<!--                                процессы</a></li>-->
<!--                        <li class="menu__list-item"><a href="examples.html" class="menu__list-link">Нам доверяют</a>-->
<!--                        </li>-->
<!--                        <li class="menu__list-item"><a href="printingPainting.html" class="menu__list-link">Советы</a>-->
<!--                        </li>-->
<!--                        <li class="menu__list-item"><a href="1956.php" class="menu__list-link">Заказать</a></li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->
<!--    </header>-->
<!--    <h2>Свяжитесь с нами</h2>-->
<!---->
<!--    <form action="1956.php" method="post" target="_blank" name="f1" enctype="multipart/form-data">-->
<!--        <div class="form__item">-->
<!--            <label>-->
<!--                <input type="text" placeholder="Ваше имя" name="name1" required="">-->
<!--            </label>-->
<!--            <label>-->
<!--                <input type="email" placeholder="Ваш email" name="email1" required="required">-->
<!--            </label>-->
<!--        </div>-->
<!---->
<!--        <div class="form__item">-->
<!--            <label><textarea placeholder="Дополнительно" name="text"></textarea></label>-->
<!--        </div>-->
<!---->
<!--        <input type="submit" value="ЗАКАЗАТЬ" name="sab">-->
<!--        <input type="submit" value="ОЧИСТИТЬ" name="cli">-->
<!--    </form>-->
<!--    --><?php
//    $theme = "Новый заказ";
//    error_reporting(E_ERROR);   //Отключение предупреждений и нотайсов (warning и notice) на сайте
//    // создание переменных из полей формы
//    if (isset($_POST['name1']))    {  $name1 = $_POST['name1'];       if ($name1 == '')   { unset($name1); } }
//    if (isset($_POST['email1']))   {  $email1 = $_POST['email1'];     if ($email1 == '')  {  unset($email1); } }
//    if (isset($_POST['text']))     {  $text = $_POST['text'];         if ($text == '')    { unset($text);  } }
//    if (isset($_POST['sab']))      {  $sab = $_POST['sab'];           if ($sab == '')     {  unset($sab);  } }
//
//
//
//    //стирание треугольных скобок из полей формы
//    /* комментарий */
//    if (isset($name1)) {
//        $name1 = stripslashes($name1);
//        $name1 = htmlspecialchars($name1);
//    }
//    if (isset($email1)) {
//        $email1 = stripslashes($email1);
//        $email1 = htmlspecialchars($email1);
//    }
//    if (isset($text)) {
//        $text = stripslashes($text);
//        $text = htmlspecialchars($text);
//    }
//    // адрес почты куда придет письмо
//    $address = "OksanaDubikW@yandex.ru";
//
//    // текст письма
//    $note_text = "
//    Тема : $theme \r\n
//    Имя : $name1 \r\n
//    Email : $email1 \r\n
//       Дополнительная информация : $text";
//    if (isset($name1) && isset ($sab)) {
//        mail($address, $theme, $note_text, "Content-type:text/plain; windows-1251");
//
//        echo "<p style='fontSize:25px;'>Уважаемый(ая) <b style='fontSize:25px;'>$name1</b> Ваше письмо отправленно успешно. <br> Спасибо. <br>Вам скоро ответят на почту <b style='fontSize:25px;'> $email1</b>.</p>";
//    }
//    ?>
<!---->
<!--    <footer class="footer">-->
<!--        <div class="container">-->
<!--            <nav class="footer__menu">-->
<!--                <ul class="footer__menu-list">-->
<!--                    <li class="footer__menu-item"><p class="footer__menu-title">Продукты</p></li>-->
<!--                    <li class="footer__menu-item"><a href="newProduct.html" class="footer__menu-link">Наши работы</a>-->
<!--                    </li>-->
<!--                    <li class="footer__menu-item"><a href="printingPainting.html" class="footer__menu-link">Советы</a>-->
<!--                    </li>-->
<!--                    <li class="footer__menu-item"><a href="./" class="footer__menu-link">Подарки для самых близких</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--                <ul class="footer__menu-list">-->
<!--                    <li class="footer__menu-item"><p class="footer__menu-title">Ресурсы </p></li>-->
<!--                    <li class="footer__menu-item"><a href="printingPainting.html" class="footer__menu-link">Блог</a>-->
<!--                    </li>-->
<!--                    <!--                                    <li class="footer__menu-item"><a href="#" class="footer__menu-link">ЧСВ</a></li>-->-->
<!--                    <li class="footer__menu-item"><a-->
<!--                            href="mailto:oksana170773@gmail.com?subject=Заказать рисунок на одежде"-->
<!--                            class="footer__menu-link">Связаться с нами по электронной почте</a></li>-->
<!--                </ul>-->
<!--                <ul class="footer__menu-list">-->
<!--                    <li class="footer__menu-item"><p class="footer__menu-title">Нам доверяют</p></li>-->
<!--                    <li class="footer__menu-item"><a href="examples.html" class="footer__menu-link">Отзывы</a></li>-->
<!--                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"></a></li>-->
<!--                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"></a></li>-->
<!--                </ul>-->
<!--                <ul class="footer__menu-list">-->
<!--                    <li class="footer__menu-item"><p class="footer__menu-title">О нас</p></li>-->
<!--                    <li class="footer__menu-item"><a href="#" class="footer__menu-link">Мы в соцсетях</a></li>-->
<!---->
<!--                </ul>-->
<!--            </nav>-->
<!---->
<!--            <div class="footer__copy">-->
<!--                <p class="footer__copy-text">По вопросам, связанным с заказами, звоните-->
<!--                    по телефону 1-888-878-3227.-->
<!--                </p>-->
<!--                <p class="footer__copy-text">Мы не занимаемся продажей или арендой-->
<!--                    одежды. Все работы подлежат предварительному согласованию с заказчиком.-->
<!--                </p>-->
<!--            </div>-->
<!---->
<!--            <nav class="copy__nav">-->
<!--                <ul class="copy__nav-list">-->
<!---->
<!--                    <li class="copy__nav-item"><a href="#" class="copy__nav-link"> &#169; Данный сайт является-->
<!--                            интеллектуальной собственностью</a></li>-->
<!--                </ul>-->
<!--            </nav>-->
<!--        </div>-->
<!--    </footer>-->
<!--</div>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->
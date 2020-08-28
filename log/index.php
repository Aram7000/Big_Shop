<?php
session_start();
if (!isset($_SESSION["requested"])) {
    $_SESSION["requested"] = 0;
    $_SESSION["log_err"] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../my.css">
    <link rel="stylesheet" href="../colors.css">
    <script src="./script.js"></script>
    <title>Մուտք</title>
</head>

<body>
    <main>
        <header class="flex-column jcc aic">
            <?php if ($_SESSION["requested"]) { ?>
                <div class="requested">
                    <span>!</span><span>
                        Ձեր Հարցումն Ընդունված է, Խնդրում ենք սպասել մեր զանգին
                    </span>
                </div>
            <?php }
            $_SESSION["requested"] = 0; ?>
            <p>
                Big Shop
            </p>
            <div class="buttons flex-row jca aic">
                <a href="#si" class="slide">Մուտք</a>
                <a href="#su" class="slide">Գրանցման Հայտ</a>
            </div>
        </header>
        <div class="forms flex-row">
            <form id="si" class="p20 flex-column aic jcb" action="../signin/index.php" method="post">
                <h1>Մուտք</h1>
                <?php if ($_SESSION["log_err"] == 1) { ?>
                    <div class="requested">
                        <span>!</span><span>
                            ԱՁ-ն կամ ID-ն սխալ է, Փորձեք կրկին կամ դիմեք Տեղեկատու
                        </span>
                    </div>
                <?php } $_SESSION["log_err"] = 0; ?>
                <div class="flex-column">
                    <label for="cn">ԱՁ</label>
                    <input placeholder="Ձեր ԱՁ-ն" type="text" name="cn" id="cn">
                </div>
                <div class="flex-column">
                    <label for="id">ID</label>
                    <input placeholder="Հատկացված ID-ն" type="text" name="id" id="id">
                </div>
                <input id="mq" type="submit" value="Մուտք" disabled>
            </form>
            <form id="su" class="p20 flex-column aic jcb" action="../signup/index.php" method="post">
                <h1>Գրանցման Հայտ</h1>

                <div class="flex-column">
                    <label for="cn2">ԱՁ</label>
                    <input placeholder="Ձեր ԱՁ-ն" type="text" name="cn2" id="cn2">
                </div>
                <div class="flex-column">
                    <label for="pn">Հեռախոսահամար</label>
                    <div class="flex-row jcb os">
                        <p class="p374">(+374</p>
                        <input placeholder="Ձեր Հեռախոսահամարը" type="text" name="pn" id="pn">
                    </div>
                </div>
                <input id="gh" type="submit" value="Թողնել Հայտ" disabled>
            </form>

        </div>
        <footer class="p10 flex-column jca aic">
            <p>
                Powered By <span class="nn">N</span><span class="e">e</span><span class="o">o</span><span class="n">n</span>
            </p>
        </footer>
    </main>
</body>

</html>
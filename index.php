<?php
session_start();
unset($_SESSION["cn"]);
unset($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Գլխավոր էջ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./my.css">
</head>

<body>
    <header class="flex-column">
        <div class="flex-row jcc aic p20">
            <h1>Big Shop</h1>
        </div>
        <menu class="flex-row jcc aic">
            <a href="#" class="navigation p10 block selected">Գլխավոր էջ</a>
            <a href="#" class="navigation p10 block">Ապրանքներ</a>
            <a href="log" class="navigation p10 block">Մուտք</a>
        </menu>
    </header>
    <main>

    </main>
    <footer class="p10 flex-column jca aic">
        <p>
            Powered By <span class="nn">N</span><span class="e">e</span><span class="o">o</span><span class="n">n</span>
        </p>
    </footer>
</body>

</html>
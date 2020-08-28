<?php

include "../edb/functions.php";
session_start();
$cn = $_SESSION["cn"];
$id = $_SESSION["id"];

$db = new EDB("../edb/databases/accounts.edb", "undefined");
$dbContent = $db->formatAsObj()["content"];

if (isset($dbContent[$id]) && $dbContent[$id]["name"]) {
    $user = $dbContent[$id];
    unset($db);
    unset($dbContent);
} else {
    $_SESSION["log_err"] = 1;
    header("Location: ../log");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Իմ Պրոֆիլ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../my.css">
    <link rel="stylesheet" href="../colors.css">
    <?php if ($user["admin"] == 1) { ?>
        <script src="admin.js"></script>
    <?php } else { ?>
        <script>
            allItems = [
                <?php
                $idb = (new EDB("../edb/databases/items.edb"))->content[0];
                for ($i = 1; $i < count($idb); $i++) {
                    echo '["' . $idb[$i][0] . '", "' . $idb[$i][1] . '"],';
                }
                ?>
            ];
        </script>
        <script src="script.js">
        </script>
    <?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php if ($user["admin"] == 1) { ?>
        <header class="p20 flex-row jcb aic">
            <button id="menu-btn" class="menu openfalse">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <p class="name"><?php echo $user["name"] ?></p>
        </header>
        <menu class="openfalse flex-column jcb p20">
            <div class="flex-column">
                <a href="#sector1" class="menu-i">Գրանցման Հայտեր</a>
                <a href="#sector2" class="menu-i">Պատվերներ</a>
                <a href="#sector3" class="menu-i">Ապրանքներ</a>
            </div>
            <a href="../" class="menu-i">Ելք</a>
        </menu>
        <main>
            <section id="sector1">
                <h1>Գրանցման Հայտեր</h1>
                <hr>
                <div class="cont">
                    <?php
                    $rdb = new EDB("../edb/databases/request.edb");
                    $requests = $rdb->content;

                    for ($i = 0; $i < count($requests); $i++) {
                    ?>
                        <div class="req flex-row aic jcb">
                            <p class="cn"><?php echo $requests[$i][1][1] ?></p>
                            <p class="pn">+374 <?php echo $requests[$i][2][1] ?></p>
                            <div class="btns">
                                <button onclick="acceptClicked('<?php echo $requests[$i][0]; ?>')" class="accept"><span class="ex1"></span><span class="ex2"></span></button>
                                <button onclick="ignoreClicked('<?php echo $requests[$i][0]; ?>')" class="ignore"><span class="ex1"></span><span class="ex2"></span></button>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </section>
            <section class="flex-column" id="sector2">
                <h1>Պատվերներ</h1>
                <div class="buttons">
                    <a href="#all">Ընդհանուր</a>
                    <a href="#mbm">Անհատական</a>
                </div>
                <div class="dbl2">
                    <div class="dbl">
                        <div class="section" id="all">
                            <h2>Ընդհանուր</h2>
                            <div class="cont">

                            </div>
                        </div>
                        <div class="section" id="mbm">
                            <h2>Անհատական</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="sector3">
                <h1>Ապրանքներ</h1>
                <form enctype="multipart/form-data" action="add_item.php" method="POST" class="flex-column add-item">
                    <input name="in" placeholder="Անուն" type="text" id="i-n">
                    <input name="ip" placeholder="Գին" type="text" id="i-p">
                    <div class="flex-row jcb">
                        <input name="it" placeholder="(Բլոկ / Արկղ / Հատ)" type="text" id="i-t">
                        <div class="flex-row oh" id="i-c">
                            <input name="ic" placeholder="Քանակը Բլոկում" type="text" id="i-ci">
                        </div>
                    </div>
                    <input name="ii" type="file" id="i-img" class="none">
                    <div id="f-b" class="inputFile">
                        <input type="button" value="Ընտրել Նկարը">
                        <p id="f-n"></p>
                    </div>
                    <input type="submit" id="i-b" value="Ավելացնել Ապրանքը">
                </form>
                <hr>
                <?php
                $idb = new EDB("../edb/databases/items.edb");
                for ($i = 0; $i < count($idb->content); $i++) {
                    $element = $idb->content[$i];
                ?>
                    <div class="item flex-row w100 jcb aic">
                        <div class="flex-row aic jcb item-side">
                            <div class="flex-row aic">
                                <p class="item-name"><?php echo $element[0]; ?></p>
                            </div>
                            <div class="flex-row aic jcb">
                                <p class="bah">Հատ</p>
                                <p class="item-price"><?php echo $element[1][1]; ?> դրամ</p>
                            </div>
                        </div>
                        <div class="bah-side flex-row item-side">
                            <span class="item-img" style="background-image:url('../assets/item_assets/<?php echo $element[4][1]; ?>')"></span>
                            <p class="bah"><?php echo $element[2][1] ?></p>
                            <p class="item-price"><?php echo $element[3][1] * $element[1][1]; ?> դրամ</p>
                            <button class="delete-item" onclick="deleteItem('<?php echo $i ?>')">Ջնջել</button>
                        </div>
                    </div>

                <?php
                }


                ?>
            </section>
            <footer>
                <p>
                    Powered By <span class="nn">N</span><span class="e">e</span><span class="o">o</span><span class="n">n</span>
                </p>
            </footer>
        </main>
    <?php } else { ?>
        <header class="p20 flex-row jcb aic">
            <button id="menu-btn" class="menu openfalse">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <p class="name"><?php echo $user["name"] ?></p>
        </header>
        <menu class="openfalse flex-column jcb p20">
            <div class="flex-column">
                <a href="#u-sector1" class="menu-i">Պատվիրել</a>
                <a href="#u-sector2" class="menu-i">Գնացուցակ</a>
            </div>
            <a href="../" class="menu-i">Ելք</a>
        </menu>
        <main>
            <section id="u-sector1">
                <h1>Պատվիրել</h1>
                <div class="flex-column">
                    <div class="add-item user">
                        <input type="text" id="i-n" placeholder="Փնտրել">
                        <input type="button" id="i-b" class="none" value="">
                    </div>
                    <div class="all-items">
                        <div id="a-i" class="flex-row">

                        </div>
                    </div>
                </div>
                <hr>

                <div class="p-items">
                    <div id="p-i" class="flex-row">

                    </div>
                </div>
                <input type="button" value="Ուղղարկել պատվերը" disabled>
            </section>
            <section id="u-sector2">

            </section>
            <footer>
                <p>
                    Powered By <span class="nn">N</span><span class="e">e</span><span class="o">o</span><span class="n">n</span>
                </p>
            </footer>
        </main>
    <?php } ?>
</body>

</html>
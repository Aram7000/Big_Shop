window.addEventListener('load', () => {
    let openedMenu = false;
    let menuBtn = document.querySelector("#menu-btn");
    let menu = document.querySelector("menu");
    menuBtn.addEventListener('click', () => {
        menuBtn.classList.remove(`open${openedMenu}`);
        menu.classList.remove(`open${openedMenu}`);
        openedMenu = !openedMenu;
        menuBtn.classList.add(`open${openedMenu}`);
        menu.classList.add(`open${openedMenu}`);
    });
    menu.addEventListener('click', () => {
        menuBtn.classList.remove(`open${openedMenu}`);
        menu.classList.remove(`open${openedMenu}`);
        openedMenu = !openedMenu;
        menuBtn.classList.add(`open${openedMenu}`);
        menu.classList.add(`open${openedMenu}`);
    });
    let itemType = document.querySelector("#i-t");
    let itemCount = document.querySelector("#i-c");
    itemType.addEventListener("keyup", () => {
        if (itemType.value.toLowerCase() == "բլոկ") {
            itemCount.classList.add("unset");
            itemType.classList.add("done");
        } else {
            itemCount.classList.remove("unset");
            itemType.classList.remove("done");
        }
    });

    acceptClicked = (id) => {
        $.ajax({
            type: 'POST',
            url: './request.php',
            data: {
                us: id,
                req: 1,
            },
            success: function (data) {
                window.location.reload();
            },
        });
    }
    ignoreClicked = (id) => {
        $.ajax({
            type: 'POST',
            url: './request.php',
            data: {
                us: id,
                req: 0,
            },
            success: function (data) {
                window.location.reload();
            },
        });
    }


    deleteItem = (i) => {
        $.ajax({
            type: 'POST',
            url: './delete_item.php',
            data: {
                item: i,
            },
            success: function (data) {
                window.location.reload();
            },
        });
    }
    let fileInput = document.querySelector("#i-img");
    let fileBtn = document.querySelector("#f-b");
    let fileName = document.querySelector("#f-n");
    let fileType = document.querySelector("#i-t");
    
    fileBtn.addEventListener("click", () => {
        fileInput.click();
    });

    setInterval(() => {
        fileType.value = fileType.value.toLowerCase();
        fileName.innerText = fileInput.value;
    }, 1);

});
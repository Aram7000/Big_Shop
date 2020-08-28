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
    let innerHTML = "";
    let itemsBox = document.querySelector("#a-i");
    let searchBtn = document.querySelector("#i-b");
    let inputArea = document.querySelector("#i-n");
    searchBtn.addEventListener("click", () => {
        let innerHTML = ``;
        let keyWord = document.querySelector("#i-n").value.toLowerCase();
        for (let i in allItems) {
            const element = allItems[i][0].toLowerCase();
            if (keyWord == "") {
                innerHTML += `
                <div onclick="addItem(${i})" class="card-a">
                    <div class="card p10">
                        <div class="front">
                        <p class="item-name">${allItems[i][0]}</p>
                            <p class="item-price">${allItems[i][1]} Դրամ</p>
                        </div>
                        <div class="back">
                        <div class="img"></div>
                        </div>
                        </div>
                        </div>
                
                `;
            }
            if (element.replace(keyWord, "") != element) {
                innerHTML += `
                <div onclick="addItem(${i})" class="card-a">
                    <div class="card p10">
                    <div class="front">
                            <p class="item-name">${allItems[i][0]}</p>
                            <p class="item-price">${allItems[i][1]} Դրամ</p>
                        </div>
                        <div class="back">
                        <div class="img"></div>
                        </div>
                        </div>
                </div>
                `;
            }
        }
        itemsBox.innerHTML = innerHTML;
    });
    inputArea.addEventListener("keyup", () => {
        searchBtn.click();
    });
    searchBtn.click();
    let pItems = document.querySelector("#p-i");
    let pItemsArr = [];
    addItem = (i) => {
        pItemsArr.unshift(allItems[i]);
        allItems.splice(i, 1);
        searchBtn.click();
        let innerHTML = "";
        for (let j in pItemsArr) {
            innerHTML += `
            <div class="card-a">
                <div class="card p10">
                    <div class="front">
                        <p class="item-name">${pItemsArr[j][0]}</p>
                        <p class="item-price">${pItemsArr[j][1]} Դրամ</p>
                    </div>
                    <div class="back">
                        <button onclick="deleteItem(${j})">Հանել</button>
                        <div class="img"></div>
                    </div>
                </div>
                <div class="i-c flex-row">
                    <input type="text" placeholder="Քանակ">
                </div>
            </div>
            `;
        }
        pItems.innerHTML = innerHTML;
    }



});



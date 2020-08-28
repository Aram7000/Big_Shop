window.addEventListener('load', () => {
    let cn = document.querySelector("#cn");
    let id = document.querySelector("#id");
    let mq = document.querySelector("#mq");
    let cn2 = document.querySelector("#cn2");
    let pn = document.querySelector("#pn");
    let gh = document.querySelector("#gh");
    pnval = "xx) xx xx xx"
    pnum = ""
    pn.setSelectionRange(pn.value.length,pn.value.length);
    pn.addEventListener("keydown", (evt) => {
        if (!isNaN(evt.key)) {
            pnval = pnval.replace("x", evt.key);
            pnum += evt.key;
        } else if (evt.key == "Backspace") {
            pnum = "";
            pnval = "xx) xx xx xx";
        }
    })
    setInterval(() => {
        //signin
        mq.disabled = false;
        if (cn.value.length < 1) {
            mq.disabled = true;
        } else if (id.value.length < 6) {
            mq.disabled = true;
        }
        //signup
        pn.value = pnval;
        gh.disabled = false;

        if (cn2.value.length < 1) {
            gh.disabled = true;
        } else if (pn.value.replace("x", "") != pn.value) {
            gh.disabled = true;
        }

    }, 1);

    
})
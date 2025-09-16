let pass = document.getElementById("password");
let count = document.getElementById("textcount");
let symbs = document.getElementById("hassymbol");
document.addEventListener("input", () => {
    const leng = pass.value;
    if (leng.length >= 8 && leng.length <= 12) {
        count.style.color = "green";
    } else {
        count.style.color = "red";
    }
    for (let i = 0; i < leng.length; i++) {
        if (!/[a-zA-Z]/.test(leng[i])) {
            symbs.style.color = "green";
        } else {
            symbs.style.color = "red";
        }
    }
});
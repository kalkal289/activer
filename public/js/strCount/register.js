//入力している文字数を出力
const name = document.getElementById('name');
const nameCount = document.getElementById('name-count');
const nameCountMessage = document.getElementById('name-count-message');
name.addEventListener('keyup', () => {
    let str = name.value;
    let num = str.length;
    nameCount.textContent = num;
    if(num > 50) {
        nameCountMessage.style.color = "red";
    } else {
        nameCountMessage.style.color = "black";
    }
});

const accountName = document.getElementById('account-name');
const accountNameCount = document.getElementById('account-name-count');
const accountNameCountMessage = document.getElementById('account-name-count-message');
accountName.addEventListener('keyup', () => {
    let str = accountName.value;
    let num = str.length;
    accountNameCount.textContent = num;
    if(num > 50) {
        accountNameCountMessage.style.color = "red";
    } else {
        accountNameCountMessage.style.color = "black";
    }
});
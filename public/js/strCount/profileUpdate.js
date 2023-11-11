const accountName = document.getElementById('account-name');
const accountNameCount = document.getElementById('account-name-count');
const accountNameCountMessage = document.getElementById('account-name-count-message');

//文字数の初期値を表示
window.onload = function() {
    let accountNameStr = accountName.value;
    let accountNameNum = accountNameStr.length;
    accountNameCount.textContent = accountNameNum;
}

//入力している文字数を表示
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

// //formの内容をチェック
// function formCheck()
// {
//     const str = accountName.value;
//     if(str.length > 50) {
//         alert("アカウントネームは50字以内にしてください。");
//         return false;
//     } else {
//         return true;
//     }
// }
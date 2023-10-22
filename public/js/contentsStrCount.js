//入力している文字数を出力
//メイン・ストア用
const textCount = document.getElementById('text-count');
const textCountMessage = document.getElementById('text-count-message');
const contentTitle = document.getElementById('title');
const titleCount = document.getElementById('title-count');
const titleCountMessage = document.getElementById('title-count-message');
const contentBody = document.getElementById('content');

window.onload = function() {
    let titleStr = contentTitle.value;
    let titleNum = titleStr.length;
    titleCount.textContent = titleNum;
    let bodyStr = contentBody.value;
    let bodyNum = bodyStr.length;
    textCount.textContent = bodyNum;
}

contentTitle.addEventListener('keyup', () => {
    let str = contentTitle.value;
    let num = str.length;
    titleCount.textContent = num;
    if(num > 50) {
        titleCountMessage.style.color = "red";
    } else {
        titleCountMessage.style.color = "black";
    }
});

contentBody.addEventListener('keyup', () => {
    let str = contentBody.value;
    let num = str.length;
    textCount.textContent = num;
    if(num > 500) {
        textCountMessage.style.color = "red";
    } else {
        textCountMessage.style.color = "black";
    }
});
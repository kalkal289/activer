//入力している文字数を出力
//投稿用
const textCount = document.getElementById('text-count');
const textCountMessage = document.getElementById('text-count-message');

const postBody = document.getElementById('post-content');
postBody.addEventListener('keyup', () => {
    let str = postBody.value;
    let num = str.length;
    textCount.textContent = num;
    if(num > 30) {
        textCountMessage.style.color = "red";
    } else {
        textCountMessage.style.color = "black";
    }
});
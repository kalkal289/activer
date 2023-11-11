//入力している文字数を出力
//投稿用
const textCount = document.getElementById('text-count');
const textCountMessage = document.getElementById('text-count-message');
const postBody = document.getElementById('post-content');
postBody.addEventListener('keyup', () => {
    let str = postBody.value;
    let num = str.length;
    textCount.textContent = num;
    if(num > 300) {
        textCountMessage.style.color = "red";
    } else {
        textCountMessage.style.color = "black";
    }
});

//マイカテゴリー設定へ飛ぶ際の確認
function jumpConfirm() {
    if(postBody.value == "") {
        window.location.href = "/categories";
    } else {
        if(confirm('入力した内容は失われます。本当によろしいですか？')) {
            window.location.href = "/categories";
        }
    }
}

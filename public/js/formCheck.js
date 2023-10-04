//ポストのformの内容をチェック
function postFormCheck()
{
    const content = document.getElementById('content');
    const image = document.getElementById('image');
    // const txt = document.getElementById('error-txt');
    if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        // txt.innerHTML = '内容を入力するか、画像を添付してください。';
        alert("内容を入力するか、画像を添付してください。");
        return false;
    } else {
        return true;
    }
}

//メインコンテンツのformの内容をチェック
function contentFormCheck()
{
    const content = document.getElementById('content');
    const image = document.getElementById('image');
    const title = document.getElementById('title');
    // const txt = document.getElementById('error-txt');
    if(title.value == '') {
        alert("タイトルを入力してください。");
        return false;
    } else if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        // txt.innerHTML = '内容を入力するか、画像を添付してください。';
        alert("内容を入力するか、画像を添付してください。");
        return false;
    } else {
        return true;
    }
}

//プロフィールのformの内容をチェック
function profileFormCheck()
{
    const name = document.getElementById('name');
    // const txt = document.getElementById('error-txt');
    if(name.value == '') {
        alert("名前を入力してください。");
        return false;
    } else {
        return true;
    }
}

//添付する画像の枚数をチェック
function imagesTooMany() {
    const image = document.getElementById('image');
    if(image.files.length > 4) {
        alert("画像は4枚までです。");
        image.value = '';
    }
}
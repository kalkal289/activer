//ポストのformの内容をチェック
function postFormCheck()
{
    const content = document.getElementById('post-content');
    const image = document.getElementById('image');
    // const txt = document.getElementById('error-txt');
    if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        // txt.innerHTML = '内容を入力するか、画像を添付してください。';
        alert("内容を入力するか、画像を添付してください。");
        return false;
    } else {
        const str = content.value;
        if(str.length > 300) {
            alert("内容は300字以内にしてください。");
            return false;
        } else {
            return true;
        }
    }
}

//コンテンツのformの内容をチェック
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
        const titleStr = title.value;
        const contentStr = content.value;
        if(titleStr.length > 50) {
            alert("タイトルは50字以内にしてください。");
            return false;
        } else if(contentStr.length > 500) {
            alert("内容は500字以内にしてください。");
            return false;
        } else {
            return true;
        }
    }
}

//プロフィールのformの内容をチェック
function profileFormCheck()
{
    const name = document.getElementById('name');
    const message = document.getElementById('message');
    // const txt = document.getElementById('error-txt');
    if(name.value == '') {
        alert("名前を入力してください。");
        return false;
    } else {
        const nameStr = name.value;
        const messageStr = message.value;
        if(nameStr.length > 50) {
            alert("名前は50字以内にしてください。");
            return false;
        } else if(messageStr.length > 100) {
            alert("自己紹介文は100字以内にしてください。");
            return false;
        } else {
            return true;
        }
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
//ポストのformの内容をチェック
function postFormCheck() {
    const target = event.target;
    const content = document.getElementById('post-content');
    const image = document.getElementById('image');
    if(target.classList.contains('submit-already')) {
        return false;
    } else if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        alert("本文を入力するか、画像を添付してください。");
        return false;
    } else {
        const str = content.value;
        if(str.length > 300) {
            alert("投稿は300字以内にしてください。");
            return false;
        } else {
            target.classList.add('submit-already');
            return true;
        }
    }
}

//コメントのformの内容をチェック
function commentFormCheck() {
    const target = event.target;
    const content = document.getElementById('content');
    const image = document.getElementById('image');
    if(target.classList.contains('submit-already')) {
        return false;
    } else if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        alert("コメントを入力するか、画像を添付してください。");
        return false;
    } else {
        const str = content.value;
        if(str.length > 150) {
            alert("コメントは150字以内にしてください。");
            return false;
        } else {
            target.classList.add('submit-already');
            return true;
        }
    }
}

//コンテンツのformの内容をチェック
function contentFormCheck() {
    const target = event.target;
    const content = document.getElementById('content');
    const image = document.getElementById('image');
    const title = document.getElementById('title');
    // const txt = document.getElementById('error-txt');
    if(target.classList.contains('submit-already')) {
        return false;
    } else if(title.value == '') {
        alert("タイトルを入力してください。");
        return false;
    } else if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        // txt.innerHTML = '内容を入力するか、画像を添付してください。';
        alert("本文を入力するか、画像を添付してください。");
        return false;
    } else {
        const titleStr = title.value;
        const contentStr = content.value;
        if(titleStr.length > 50) {
            alert("タイトルは50字以内にしてください。");
            return false;
        } else if(contentStr.length > 500) {
            alert("本文は500字以内にしてください。");
            return false;
        } else {
            target.classList.add('submit-already');
            return true;
        }
    }
}

//プロフィールのformの内容をチェック
function profileFormCheck() {
    const target = event.target;
    const name = document.getElementById('name');
    const message = document.getElementById('message');
    // const txt = document.getElementById('error-txt');
    if(target.classList.contains('submit-already')) {
        return false;
    } else if(name.value == '') {
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
            for(let i = 0; i < 5; i++) {
                let usertag = document.getElementById(`tag${i}`);
                let usertagStr = usertag.value;
                if(usertagStr.length > 30) {
                    alert(`ユーザータグ${i + 1}を30字以内にしてください。`);
                    return false;
                }
            }
            target.classList.add('submit-already');
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
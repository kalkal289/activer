//formの内容をチェック
function formCheck()
{
    const content = document.getElementById('content');
    const image = document.getElementById('image');
    // const txt = document.getElementById('error-txt');
    if(content.value == '' && image.files.length == 0) { //formが空じゃないかどうか
        // txt.innerHTML = '内容を入力するか、画像を添付してください。';
        alert("内容を入力するか、画像を添付してください。");
        return false;
    } else if(image.files.length > 4) { //画像が4枚以下かどうか
        // txt.innerHTML = '画像は4枚までです。';
        alert("画像は4枚までです。");
        image.value = '';
        return false;
    } else {
        return true;
    }
}
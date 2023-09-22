//画像入力制限
function tooManyImages() 
{
    const image = document.getElementById('image');
    if(image.files.length > 4) {
        alert("画像は4枚までです。");
        image.value = '';
    }
}
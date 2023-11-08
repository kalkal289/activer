const textCount = document.getElementById('text-count');
const textCountMessage = document.getElementById('text-count-message');
const categoryCreateName = document.getElementById('category-create-name');
categoryCreateName.addEventListener('keyup', () => {
    let str = categoryCreateName.value;
    let num = str.length;
    textCount.textContent = num;
    if(num > 30) {
        textCountMessage.style.color = "red";
    } else {
        textCountMessage.style.color = "black";
    }
});

function categoryEditToggle(id) {
    //編集表示の切り替え
    const categoryShow = document.getElementById(`category-show${id}`);
    const categoryEdit = document.getElementById(`category-edit${id}`);
    categoryShow.classList.toggle('hidden');
    categoryEdit.classList.toggle('hidden');
    
    //文字数のセット
    const textCount = document.getElementById(`text-count${id}`);
    const textCountMessage = document.getElementById(`text-count-message${id}`);
    const categoryName = document.getElementById(`category-name${id}`);
    let textStr = categoryName.value;
    let textNum = textStr.length;
    textCount.textContent = textNum;
}

function categoryStrCount(id) {
    const textCount = document.getElementById(`text-count${id}`);
    const textCountMessage = document.getElementById(`text-count-message${id}`);
    const categoryName = document.getElementById(`category-name${id}`);
    let str = categoryName.value;
    let num = str.length;
    textCount.textContent = num;
    if(num > 30) {
        textCountMessage.style.color = "red";
    } else {
        textCountMessage.style.color = "black";
    }
}

//カテゴリーの削除確認
function deleteCategory(id) {
    'use strict'
    
    if (confirm('復元できません。また、このカテゴリーが設定された投稿は「カテゴリーなし」になります。本当に削除しますか？')) {
        document.getElementById(`deleteCategory${id}`).submit();
    }
}

//フォームの内容確認
function createFormCheck() {
    const categoryName = document.getElementById('category-create-name');
    let str = categoryName.value;
    if(str.length > 30) {
        alert('マイカテゴリー名は30文字以内にしてください。');
        return false
    } else {
        return true;
    }
    
}

function editFormCheck(id) {
    const categoryName = document.getElementById(`category-name${id}`);
    let str = categoryName.value;
    if(str.length > 30) {
        alert('マイカテゴリー名は30文字以内にしてください。');
        return false
    } else {
        return true;
    }
    
}
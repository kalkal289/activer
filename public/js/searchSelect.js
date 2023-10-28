function typeChange() {
    //セレクトボックスで選んだ項目の番号を取得
    const typeNumber = document.getElementById("type_select").selectedIndex;
    
    //選んだ項目ごとにformのaction属性を変更
    const formUrlArray = new Array("/posts/filter", "/mains/filter", "/stores/filter", "/users/filter");
    const searchForm = document.getElementById("search_form");
    searchForm.setAttribute("action", formUrlArray[typeNumber]);
    
    //「投稿」の場合はビッグポストかどうかのチェックボックスを表示し、それ以外の場合は非表示&無効にする
    const bigpostCheckbox = document.getElementById("bigpost_checkbox");
    const checkboxBigPost = document.getElementById("checkbox_big_post");
    
    if(typeNumber == 0) {
        bigpostCheckbox.classList.remove("hidden");
        checkboxBigPost.removeAttribute("disabled");
    } else {
        bigpostCheckbox.classList.add("hidden");
        checkboxBigPost.setAttribute("disabled", "");
    }
    
}
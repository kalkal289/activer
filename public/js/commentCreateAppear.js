//コメント投稿エリアの表示・非表示

function commentAreaAppear() {
    const commentCreateArea = document.getElementById("comment-create-area");
    commentCreateArea.classList.remove("hidden");
}

function commentAreaHidden() {
    const commentCreateArea = document.getElementById("comment-create-area");
    commentCreateArea.classList.add("hidden");
}
//コメント投稿エリアの表示・非表示

function commentAreaAppear() {
    const commentCreateArea = document.getElementById("comment-create-area");
    if(commentCreateArea.classList.contains("hidden")) {
        commentCreateArea.classList.remove("hidden");
    } else {
        commentCreateArea.classList.add("hidden");
    }
}
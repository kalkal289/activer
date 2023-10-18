//コメント投稿エリアの表示・非表示

function commentAreaAppear() {
    document.getElementById("comment-create-btn").classList.toggle("comment-create-btn-on");
    document.getElementById("comment-create-btn-icon").classList.toggle("comment-create-btn-on");
    document.getElementById("comment-create-area").classList.toggle("hidden");
}
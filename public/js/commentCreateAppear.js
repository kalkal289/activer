//コメント投稿エリアの表示・非表示

function commentAreaAppear() {
    document.getElementById("comment-create-btn").classList.toggle("comment-create-btn-on");
    document.getElementById("comment-create-btn-icon").classList.toggle("comment-create-btn-on");
    const commentCreateArea = document.getElementById("comment-create-area");
    commentCreateArea.classList.toggle("hidden");
    setTimeout(function() {
        commentCreateArea.classList.toggle("comment-create-area-appear");
    }, 100);
}
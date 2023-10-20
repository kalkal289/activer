function postMenuAppear(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.remove("hidden");
    setTimeout(function() {
        postMenuList.classList.add("post-menu-list-appear");
    }, 10);
}

function postMenuHidden(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.add("hidden");
    postMenuList.classList.remove("post-menu-list-appear");
}

function commentMenuAppear(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.remove("hidden");
    setTimeout(function() {
        commentMenuList.classList.add("post-menu-list-appear");
    }, 10);
}

function commentMenuHidden(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.add("hidden");
    commentMenuList.classList.remove("post-menu-list-appear");
}
function postMenuAppear(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.remove("hidden");
    postMenuList.classList.add("post-menu-list-appear");
}

function postMenuHidden(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.add("hidden");
    postMenuList.classList.remove("post-menu-list-appear");
}

function commentMenuAppear(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.remove("hidden");
    commentMenuList.classList.add("post-menu-list-appear");
}

function commentMenuHidden(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.add("hidden");
    commentMenuList.classList.remove("post-menu-list-appear");
}
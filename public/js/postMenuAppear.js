function postMenuAppear(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.toggle("post-menu-list-appear");
}

function postMenuHidden(id) {
    const postMenuList = document.getElementById(`post-menu-list${id}`);
    postMenuList.classList.remove("post-menu-list-appear");
}

function commentMenuAppear(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.toggle("post-menu-list-appear");
}

function commentMenuHidden(id) {
    const commentMenuList = document.getElementById(`comment-menu-list${id}`);
    commentMenuList.classList.remove("post-menu-list-appear");
}
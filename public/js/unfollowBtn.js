function onUnfollowBtn(id) {
    const unfollowBtn = document.getElementById(`unfollow_btn${id}`);
    if(unfollowBtn.classList.contains('unfollow-btn')) {
        unfollowBtn.innerHTML = "フォロー解除";
    }
}

function outUnfollowBtn(id) {
    const unfollowBtn = document.getElementById(`unfollow_btn${id}`);
    if(unfollowBtn.classList.contains('unfollow-btn')) {
        unfollowBtn.innerHTML = "フォロー中";
    }
}
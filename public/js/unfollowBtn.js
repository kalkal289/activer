function onUnfollowBtn(id) {
    const unfollowBtn = document.getElementById(`unfollow_btn${id}`);
    unfollowBtn.innerHTML = "フォロー解除";
}

function outUnfollowBtn(id) {
    const unfollowBtn = document.getElementById(`unfollow_btn${id}`);
    unfollowBtn.innerHTML = "フォロー中";
}
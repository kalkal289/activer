//ポストの削除確認
function deletePost(id) {
    'use strict'
    
    if (confirm('復元できません。本当に削除しますか？')) {
        document.getElementById(`deletePost${id}`).submit();
    }
}

//コメントの削除確認
function deleteComment(id) {
    'use strict'
    
    if (confirm('復元できませんjjj。本当に削除しますか？')) {
        document.getElementById(`deleteComment${id}`).submit();
    }
}
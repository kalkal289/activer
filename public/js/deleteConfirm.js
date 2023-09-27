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
    
    if (confirm('復元できません。本当に削除しますか？')) {
        document.getElementById(`deleteComment${id}`).submit();
    }
}

//メインコンテンツの削除確認
function deleteMain(id) {
    'use strict'
    
    if (confirm('復元できません。本当に削除しますか？')) {
        document.getElementById(`deleteMain${id}`).submit();
    }
}

//ストアの削除確認
function deleteStore(id) {
    'use strict'
    
    if (confirm('復元できません。本当に削除しますか？')) {
        document.getElementById(`deleteStore${id}`).submit();
    }
}
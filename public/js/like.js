$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});

$(function() {
    let like = $('.like-btn');
    like.on('click', function() {
        let $this = $(this);
        let postId = $this.data('post-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/like',
            method: 'POST',
            data: {
                'post_id': postId
            },
        })
        
        .done(function(data) {
            $this.toggleClass('post-like-btn');
            $this.toggleClass('post-unlike-btn');
            $this.children('.likes-count').html(data.post_likes_count);
        })
        
        .fail(function() {
            console.log('fail');
        })
    });
});
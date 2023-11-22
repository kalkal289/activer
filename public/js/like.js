$(function() {
    let like = $('.post-like-btn');
    like.on('click', function() {
        let $this = $(this);
        let postId = $this.data('post-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: `/like/${postId}`,
            method: 'POST',
        })
        
        .done(function(data) {
            $this.children('.liked-heart').toggleClass('hidden');
            $this.children('.not-liked-heart').toggleClass('hidden');
            $this.next('.likes-count').html(data.post_likes_count);
            if($this.children('.liked-heart').hasClass('hidden')) {
                $this.children('.flow-heart').addClass('flow-heart-move');
                setTimeout(function() {
                    $this.children('.flow-heart').removeClass('flow-heart-move');
                }, 700);
            }
        })
        
        .fail(function() {
            console.log('fail');
        })
    });
});
$(function() {
    let follow = $('.follow-button');
    follow.on('click', function() {
        let $this = $(this);
        let userId = $this.data('user-id');
        let mainId = $('#main-user-id').data('main-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: `/follows/list/${userId}`,
            method: 'POST',
            data: {
                'main_id': mainId
            },
        })
        
        .done(function(data) {
            $this.toggleClass('follow-btn');
            $this.toggleClass('unfollow-btn');
            if($this.hasClass('follow-btn')) {
                $this.html('フォロー');
            } else {
                $this.html('フォロー中');
            }
            $('#followers_count').html(data.user_followers_count);
            $('#followeds_count').html(data.user_followeds_count);
        })
        
        .fail(function() {
            console.log('fail');
        });
    });
});
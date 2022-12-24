// self jquery loading
(function ($) {
    $(document).ready(function () {
        var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    // navigation disabled
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
        });
        // load-more-btn click event handler with ajax
        $('.load-more-btn').click(function () {
            var btn = $(this);
            var page = $(this).data('page');
            var newPage = page + 1;
          
            // ajax request
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'post',
                data: {
                    page: newPage,
                    action: 'load_more',
                    nonce: ajax_object.nonce
                },
                error: function (response) {
                    console.log(response);
                }
            }).done(function (response) {
                if (response) {
                    btn.data('page', newPage);
                    $('.latest .wrapper .row').append(response);
                } else {
                    btn.remove();
                }
              
            }
            );

        });
    });

})(jQuery);
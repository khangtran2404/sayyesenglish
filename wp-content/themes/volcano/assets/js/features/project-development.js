$(document).ready(function () {
    //run function
    ajax_url = $('#ajax-url').attr('data-id');
    add_custom_class_for_strong_tag();
    show_hide_phrase();
    $('.phrase-detail').hide();
    $('.item-phrase-detail-1').show();
});

function add_custom_class_for_strong_tag() {
    let mainElement = $('.bring-a-development');
    mainElement.each(function () {
        $(this).find('strong').addClass('bold-text')
    })
}

function show_hide_phrase() {
    let mainElement = $('.group-cont');
    mainElement.click(function () {
        mainElement.removeClass('active');
        $(this).addClass('active');
        $('.group-phrase-detail-ajax').html('<i class="fa fa-spinner fa-spin"></i>');
        let data_id = $(this).attr('data-id');
        let data_page = $(this).attr('data-page');
        $.ajax({
            type : "post",
            url : ajax_url,
            data : {
                action: "render_our_roles_ajax",
                data_id : data_id ,
                data_page : data_page
            },
            success: function(response) {
                $('.group-phrase-detail-ajax').html(response);
            }
        })
    })
}
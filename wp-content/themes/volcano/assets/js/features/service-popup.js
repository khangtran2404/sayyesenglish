$(document).ready(function(){
    //run function
    popup_service_detail();
});

function popup_service_detail() {
    let post_list_element = $('.service-post-item');
    post_list_element.click(function () {
        let title = $(this).attr('data-title');
        let detail = $(this).attr('data-detail');
        let thumbnails = ($(this).attr('data-thumbnail')).split(',');
        let popup_element = $('.service-post-popup-body');
        popup_element.children('.service-post-thumbnail').html();
        $.each(thumbnails,function (index,value) {
            popup_element.children('.service-post-thumbnail').append('<img src="'+value+'" alt="service_post_banner">');
        })
        popup_element.find('.post-title').html(title);
        popup_element.find('.post-detail').html(detail);

        $('.show-service-popup-btn').trigger('click');
    })
}
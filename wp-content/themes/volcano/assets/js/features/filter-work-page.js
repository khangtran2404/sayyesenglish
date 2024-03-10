$(document).ready(function () {
    //run function
    filter_work_brand_film();
    filter_work_type();
});

function filter_work_brand_film() {
    let element = $('.filter-work-section .filter-list li')
    let work_brand = $('.work-brands-section');
    let work_film = $('.work-films-section');
    element.on('click', function () {
        let post_list_element = $('.post-list');
        let filter_tax_element = $('.filter-taxonomy-list li');
        filter_tax_element.each(function () {
            $(this).removeClass('active')
        });
        post_list_element.children().each(function () {
            if ($(this).hasClass('hidden')) {
                $(this).removeClass('hidden');
            }
        })
        let data_filter = $(this).attr('data-id');
        switch (data_filter) {
            case 'work-brand':
                if (work_brand.hasClass('hidden')) {
                    work_brand.toggleClass('hidden');
                }
                if (!work_film.hasClass('hidden')) {
                    work_film.toggleClass('hidden')
                }
                work_brand.addClass('active');
                work_film.removeClass('active');
                break;
            case 'work-film':
                if (!work_brand.hasClass('hidden')) {
                    work_brand.toggleClass('hidden');
                }
                if (work_film.hasClass('hidden')) {
                    work_film.toggleClass('hidden')
                }
                work_film.addClass('active');
                work_brand.removeClass('active');
                break;
        }
    })
}

function filter_work_type() {
    let element = $('.filter-taxonomy-list li');

    element.click(function () {
        element.each(function () {
            $(this).removeClass('active')
        });
        $(this).addClass('active');
        let post_list_section_name = $(this).parent().attr('data-id');
        let post_list_section_element = $('.' + post_list_section_name).find('.post-list');
        // let post_list_element = $(this).parents('.other-post').children('.post-list');
        let filter_id = $(this).attr('data-id');
        post_list_section_element.children().children().each(function () {
            if ($(this).hasClass(filter_id)) {
                $(this).parent().removeClass('hidden')
            } else {
                if (!$(this).hasClass('hidden')) {
                    $(this).parent().addClass('hidden');
                }
            }
        })
    })
}
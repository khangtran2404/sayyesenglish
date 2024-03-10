let $ =jQuery;

$(document).ready(function(){
    //run function
    onScroll();
    btnScrollTop();
    menuHamburger();
    wrapMenu();
    subMenuMobile();
    addTargetfooter();
    BannerSlider();
    partnerSlide();
    CounNUmber();
    texAnimationWpctf7();
    actionFilter();
    checkSizeBlock();
});

function onScroll() { 
    scrollTop();
    $(window).scroll(scrollTop);

    function scrollTop() {
        let scrollToTop = $(window).scrollTop();
        let header = $('#masthead');
        let heightOfHeader = $('#masthead').innerHeight();
        let btnScrollTop = $('.scroll-top');

        if(scrollToTop > heightOfHeader*5) {
            btnScrollTop.addClass('active-scroll-top');
        } else {
            btnScrollTop.removeClass('active-scroll-top');
        }
        if(scrollToTop > heightOfHeader) {
            header.addClass('active-bg-header');
        } else {
            header.removeClass('active-bg-header');
        }
        
    }
}

function menuHamburger() {
    let menuHamburger = $('.btn-hamburger');
    let headerMo = $('.navigation-mobile-volcano');
    let header = $('#masthead');
    
    menuHamburger.click(function() {
        $(this).toggleClass('hamburger-active');
        headerMo.toggleClass('navigation-mobile-active');
        header.toggleClass('revert-old-bg');
    });
    $(window).resize(function() {
        if($(window).width() > 991) {
            headerMo.removeClass('navigation-mobile-active');
            menuHamburger.removeClass('hamburger-active');
            header.removeClass('revert-old-bg');
        }
    });
}

function wrapMenu() {
    let nav = $('.navigation-mobile-volcano a');

    nav.each(function(index,item){
        var nextDiv = $(item).next();
        var followingDiv = $(nextDiv).next('span');
        $(item).wrap("<group id='fieldset" + index + "' class='nav-group-volcano'></group>");
        $("#fieldset"+index).append(nextDiv).append(followingDiv);
    });
}

function subMenuMobile() {
    let item = $('.navigation-mobile-volcano .menu-item-has-children');
    
    item.each(function(i, e) {
        let totalItemSubmenu = parseInt($(e).find('.sub-menu li').length);
        let heightSubItem = totalItemSubmenu*31 + 20;
        let subMenu = $(this).find('.sub-menu');
        let iconArrow = $(this).find('.sub-menu-arrow');
        let groupItem = $(this);
        iconArrow.click(function() {
            if($(this).hasClass('active')) {
                $(this).removeClass('active');
                subMenu.css({
                    'height':  0,
                    'opacity': 0,
                    'margin-top': 0
                });
            } else {
                $(this).addClass('active');
                subMenu.css({
                    'height': heightSubItem,
                    'opacity': 1,
                    'margin-top': '10px'
                });
            }
        });
        groupItem.click(function() {
            if($(this).hasClass('active')) {
                $(this).removeClass('active');
                iconArrow.removeClass('active');
                subMenu.css({
                    'height':  0,
                    'opacity': 0,
                    'margin-top': 0
                });
            } else {
                $(this).addClass('active');
                iconArrow.addClass('active');
                subMenu.css({
                    'height': heightSubItem,
                    'opacity': 1,
                    'margin-top': '10px'
                });
            }
        });
    });
    
}

function checkSizeBlock() {
    let img = $('.instagram-footer .gallery .gallery-icon');
    let width = img.innerWidth();
    let postHomeLeft = $('.posts-homepage .col-cont-left .cont-box');
    let postHomeRight = $('.posts-homepage .col-cont-right .col-item');
    let imgHomeRight = $('.posts-homepage .col-cont-right .col-item img');
    let postHeight = (postHomeLeft.innerHeight() - 60)/3;
    let workHightLight = $('.template-work .highlight-posts .cont-img');
    let workList = $('.template-work .post-list .cont-img');
    let singleMoreList = $('.single .section-more-project .cont-img');
    let singleMoreListMovie = $('.single .section-more-project .cont-img .move-text .item');

    img.css('height',width);
    postHomeRight.css('height', postHeight);
    imgHomeRight.css('height', postHeight - 30);
    imgHomeRight.css('width', postHeight - 30);
    workHightLight.css('height', (workHightLight.innerWidth() - (workHightLight.innerWidth())/3));
    workList.css('height', (workList.innerWidth()));
    singleMoreList.css('height', singleMoreList.innerWidth());
    singleMoreListMovie.css('width', singleMoreList.innerWidth() + 10);

    $(window).resize(function() {
        let img = $('.instagram-footer .gallery .gallery-icon');
        let width = img.innerWidth();
        let postHomeLeft = $('.posts-homepage .col-cont-left .cont-box');
        let postHomeRight = $('.posts-homepage .col-cont-right .col-item');
        let imgHomeRight = $('.posts-homepage .col-cont-right .col-item img');
        let postHeight = (postHomeLeft.innerHeight() - 60)/3;
        let workHightLight = $('.template-work .highlight-posts .cont-img');
        let workList = $('.template-work .post-list .cont-img');
        let singleMoreList = $('.single .section-more-project .cont-img');
        let singleMoreListMovie = $('.single .section-more-project .cont-img .move-text .item');

        img.css('height',width);
        postHomeRight.css('height', postHeight);
        imgHomeRight.css('height', postHeight - 30);
        imgHomeRight.css('width', postHeight - 30);
        workHightLight.css('height', (workHightLight.innerWidth() - (workHightLight.innerWidth())/3));
        workList.css('height', (workList.innerWidth()));
        singleMoreList.css('height', singleMoreList.innerWidth());
        singleMoreListMovie.css('width', singleMoreList.innerWidth() + 10);
    });
}

function addTargetfooter() {
    let iconSocial = $('.footer .footer-navigation ul li a');
    let socialLinkBanner = $('.banner-icon-social ul li a');
    iconSocial.attr('target','_blank');
    socialLinkBanner.attr('target','_blank');
}


function btnScrollTop() {
    let btn = $('.scroll-top');

    btn.click(function(event) {
        $('html,body').animate({scrollTop: 0}, 700);
    });
}

function BannerSlider() {
    let contListBannerHome = $('#slider-homepage .slides-home');
    let contListBannerWork = $('#banner-slider-work');
    let contListBannerBlog = $('#banner-slider-blog');
    let contListBrandWork = $('#work-brand-slider');
    let totalItemListBrandWork = parseInt((contListBrandWork.find('.slide-item')).length);
    let contListDevelopWork = $('.work-develop-post-slider');
    let totalItemDevelopWork = parseInt((contListDevelopWork.find('.slide-item')).length);
    let contListFilmWork = $('#work-film-slider');
    let totalItemListFilmWork = parseInt((contListFilmWork.find('.slide-item')).length);
    let contListPhraseGroupDev = $('.phrase-group-develop-slider');
    let contListRowService = $('.template-service .service-list-section .service-item');
    let contListMoreProject = $('.single .more-post-list');

    contListBannerHome.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 600,
        autoplaySpeed: 5000
    }).slickAnimation();    

    contListRowService.each(function() {
        let item = $(this).find('.post-list');

        item.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            infinite: true,
            autoplay: true,
            speed: 600,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        }); 
        let serviceList = item.find('.cont-img');
        let bgMovie = item.find('.bg-movie .group-move-text .item');
        let serviceListWidth = serviceList.innerWidth();
        serviceList.css('height', serviceListWidth);
        bgMovie.css('width', serviceListWidth);

        $(window).resize(function() {
            let serviceList = item.find('.cont-img');
            let bgMovie = item.find('.bg-movie .group-move-text .item');
            let serviceListWidth = serviceList.innerWidth();
            serviceList.css('height', serviceListWidth);
            bgMovie.css('width', serviceListWidth);
        });
    });

    contListBannerWork.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 600,
        autoplaySpeed: 5000
    }); 
    contListBannerBlog.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 600,
        autoplaySpeed: 5000
    }); 
    if(totalItemListBrandWork > 3) {
        contListBrandWork.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            arrows: true,
            dots: false,
            speed: 600,
            centerPadding: '15px',
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    else {
        contListBrandWork.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            speed: 600,
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if(totalItemListFilmWork > 3) {
        contListFilmWork.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            arrows: true,
            dots: false,
            speed: 600,
            centerPadding: '15px',
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                    {
                    breakpoint: 768,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    } else {
        contListFilmWork.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            speed: 600,
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if(totalItemDevelopWork > 3) {
        contListDevelopWork.removeClass('slick-three-item');
        contListDevelopWork.slick({
            slidesToShow: 3,
            centerMode: true,
            arrows: true,
            dots: false,
            speed: 600,
            centerPadding: '180px',
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        centerPadding: '80px',
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                    {
                    breakpoint: 768,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    } else if(totalItemDevelopWork === 3){
        contListDevelopWork.addClass('slick-three-item');
        contListDevelopWork.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            speed: 600,
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    } else {
        contListDevelopWork.removeClass('slick-three-item');
        contListDevelopWork.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            speed: 600,
            infinite: true,
            autoplaySpeed: 4000,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    contListMoreProject.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        speed: 600,
        infinite: true,
        autoplaySpeed: 4000,
        autoplay: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    contListPhraseGroupDev.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        speed: 600,
        infinite: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
}


function partnerSlide() {
    let listBlog = $('.group-partner-home');

    listBlog.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
}


function CounNUmber() {
    let classCounter  =  $('.template-home .counter-number');
    function isScrolledIntoView($elem) {
        let docViewTop = $(window).scrollTop();
        let docViewBottom = docViewTop + $(window).height();
        let elemTop = $elem.offset().top;
        let elemBottom = elemTop + $elem.height();
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
  
    function count($this) {
      let current = parseInt($this.html(), 10);
      if (isScrolledIntoView($this) && !$this.data("isCounting") && current < $this.data('count')) {
          $this.html(++current);
          $this.data("isCounting", true);
          setTimeout(function () {
              $this.data("isCounting", false);
              count($this);
          }, 6);
      }
    }
  
    classCounter.each(function () {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        $(this).data("isCounting", false);
    });
  
    function startCount() {
        classCounter.each(function () {
            count($(this));
        });
    };
  
    $(window).scroll(function () {
        startCount();
    });
  
    startCount();
}

function texAnimationWpctf7() {
    let inputService = $('.template-service .wpcf7 label input');
    let inputServiceDevelop = $('.template-development-pro .wpcf7 label input');
    let inputContact = $('.template-contact .group-label-animation-wpctf7 label input');

    inputService.click(function(){
        $(this).parent().parent().find('.text').addClass('active-label-text');
        $(this).parent().parent().addClass('active-label');
    });

    inputServiceDevelop.click(function(){
        $(this).parent().parent().find('.text').addClass('active-label-text');
        $(this).parent().parent().addClass('active-label');
    });

    inputContact.click(function(){
        $(this).parent().parent().find('.text').addClass('active-label-text');
        $(this).parent().parent().addClass('active-label');
    });
}

function actionFilter() {
    let itemMainFilter = $('.filter-work-section ul .filter-item');
    itemMainFilter.click(function() {
        $(this).parent().find('.filter-item').removeClass('active-filter');
        $(this).addClass('active-filter');
        let data = $(this).attr('data-id');
        if(data === 'work-brand') {
            $(this).parents().find('.filter-post-tax-brands').addClass('active-filter-tax');
            $(this).parents().find('.filter-post-tax-films').removeClass('active-filter-tax');
        } else {
            $(this).parents().find('.filter-post-tax-brands').removeClass('active-filter-tax');
            $(this).parents().find('.filter-post-tax-films').addClass('active-filter-tax');
        }
    });
}
$(document).ready(function () {
  //run function
  popup_service_detail();
});

function popup_service_detail() {
  let post_list_element = $(".service-post-item");
  post_list_element.click(function () {
    let title = $(this).attr("data-title");
    let detail = $(this).attr("data-detail");
    let thumbnail = $(this).attr("data-thumbnail");

    let popup_element = $(".service-post-popup-body");
    popup_element.children(".service-post-thumbnail").html("");
    popup_element
      .children(".service-post-thumbnail")
      .removeClass("slick-initialized");
    popup_element
      .children(".service-post-thumbnail")
      .removeClass("slick-slider");
    let gallery = JSON.parse($(this).attr("data-gallery"));
    if (gallery) {
      $.each(gallery, function (index, url) {
        popup_element
          .children(".service-post-thumbnail")
          .append(
            '<div class="item-slider-img"><img src="' +
              url +
              '" alt="service_post_banner"></div>'
          );
      });
    } else {
      popup_element
        .children(".service-post-thumbnail")
        .html(
          '<div class="item-slider-img" style="height: 100%;"><img src="' +
            thumbnail +
            '" alt="service_post_banner"></div>'
        );
    }
    popup_element.find(".post-title").html(title);
    popup_element.find(".post-detail").html(detail);
    if (
      popup_element.parents().find(".service-post-thumbnail .item-slider-img")
        .length > 1
    ) {
      popup_element.children(".service-post-thumbnail").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 600,
        autoplaySpeed: 5000,
      });
      $(".service-post-thumbnail .slick-arrow").hide();
      $(".service-post-thumbnail .slick-arrow").trigger("click");
    }

    $(".show-service-popup-btn").trigger("click");
  });
}

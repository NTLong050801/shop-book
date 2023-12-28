// Slider Main
var sliderMainJS = new Swiper(".sliderMainJS", {
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return `
        <span class="${className}">
          <span class="swiper-pagination-number">${
            index < 9 ? "0" + (index + 1) : index + 1
          }</span>
        </span>
      `;
    },
  },
});
// End Slider Main

// Products Main
var productsMainJS = new Swiper(".productsMainJS", {
  slidesPerView: 1,
  spaceBetween: 15,
  loop: true,
  freeMode: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
    1366: {
      slidesPerView: 4,
      spaceBetween: 60,
    },
  },
});
// End Products Main

// articleMainJS
var articleMainJS = new Swiper(".articleMainJS", {
  slidesPerView: 1,
  spaceBetween: 15,
  loop: true,
  freeMode: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 42,
    },
    992: {
      slidesPerView: 2,
      spaceBetween: 42,
    },
    1200: {
      slidesPerView: 2,
      spaceBetween: 42,
    },
    1366: {
      slidesPerView: 2,
      spaceBetween: 42,
    },
  },
});
// End articleMainJS

// testimonialsJS
var testimonialsJS = new Swiper(".testimonialsJS", {
  slidesPerView: 1,
  spaceBetween: 15,
  loop: true,
  freeMode: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1366: {
      slidesPerView: 2,
      spaceBetween: 32,
    },
  },
});
// End testimonialsJS

// Gallery Highlight
var galleryHighlightJS = new Swiper(".galleryHighlightJS", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },
});
// End Gallery Highlight

// partnersJS
var partnersJS = new Swiper(".partnersJS", {
  slidesPerView: 2,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    992: {
      slidesPerView: 3,
    },
  },
});
// End partnersJS

// articleHighlightJS
var articleHighlightJS = new Swiper(".articleHighlightJS", {
  slidesPerView: 1,
  spaceBetween: 16,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// End articleHighlightJS

// jsDateRange
const jsDateRange = document.querySelector(".jsDateRange");
if (jsDateRange) {
  $(function () {
    $("input.jsDateRange").daterangepicker(
      {
        opens: "left",
        autoApply: true,
        locale: {
          format: "DD/MM/YYYY",
        },
      },
      function (start, end, label) {
        console.log(
          "A new date selection was made: " +
            start.format("YYYY-MM-DD") +
            " to " +
            end.format("YYYY-MM-DD")
        );
      }
    );
  });
}
// End jsDateRange

// Menu Sider
const buttonOpenMenu = document.querySelector("#buttonOpenMenu");
const buttonCloseMenu = document.querySelector("#buttonCloseMenu");
const menuSider = document.querySelector("#menuSider");
const menuOverlay = document.querySelector("#menuOverlay");

buttonOpenMenu.addEventListener("click", () => {
  menuSider.classList.add("show");
});

buttonCloseMenu.addEventListener("click", () => {
  menuSider.classList.remove("show");
});

menuOverlay.addEventListener("click", () => {
  menuSider.classList.remove("show");
});
// End Menu Sider

// Sticky Top
$(function () {
  var header = $(".header-fixed");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 74) {
      header.addClass("fixed");
    } else {
      header.removeClass("fixed");
    }
  });
});
// End Sticky Top

// Countdown
const boxCountdown = document.querySelector(".box-countdown");
if (boxCountdown) {
  (function () {
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

    let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "09/30/",
      birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
      birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(birthday).getTime(),
      x = setInterval(function () {
        const now = new Date().getTime(),
          distance = countDown - now;

        document.getElementById("hours").innerText = Math.floor(
          (distance % day) / hour
        );
        document.getElementById("minutes").innerText = Math.floor(
          (distance % hour) / minute
        );
        document.getElementById("seconds").innerText = Math.floor(
          (distance % minute) / second
        );

        if (distance < 0) {
          clearInterval(x);
        }
      }, 0);
  })();
}
// End Countdown

// filter-show-max
const listFilterShowMax = document.querySelectorAll("[filter-show-max]");
if (listFilterShowMax.length > 0) {
  listFilterShowMax.forEach((item) => {
    const max = parseInt(item.getAttribute("filter-show-max"));

    const listLabel = item.querySelectorAll(".inner-label");

    const length = max <= listLabel.length ? max : listLabel.length;

    for (let i = 0; i < length; i++) {
      listLabel[i].classList.add("show");
    }

    const btnShowMore = item.querySelector("[btn-show-more]");
    if (btnShowMore) {
      btnShowMore.addEventListener("click", () => {
        item.classList.add("show-all");
      });
    }
  });
}
// End filter-show-max

// Menu Sider
const btnFilterAdvanced = document.querySelector("[btn-filter-advanced]");
if(btnFilterAdvanced) {
  const btnCloseFilterAdvanced = document.querySelector(
    "[btn-close-filter-advanced]"
  );
  const boxFilterAdvanced = document.querySelector("[box-filter-advanced]");
  
  btnFilterAdvanced.addEventListener("click", () => {
    boxFilterAdvanced.classList.toggle("show");
  });
  
  btnCloseFilterAdvanced.addEventListener("click", () => {
    boxFilterAdvanced.classList.remove("show");
  });
}
// End Menu Sider

// productImages
var productImagesThumbJS = new Swiper(".productImagesThumbJS", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var productImagesMainJS = new Swiper(".productImagesMainJS", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: productImagesThumbJS,
  },
});

const buttonNextProductImagesThumbJS = document.querySelector(".productImagesThumbJS .swiper-button-next");
const buttonPrevProductImagesThumbJS = document.querySelector(".productImagesThumbJS .swiper-button-prev");

if(buttonNextProductImagesThumbJS) {
  buttonNextProductImagesThumbJS.addEventListener("click", () => {
    const buttonNextProductImagesMainJS = document.querySelector(".productImagesMainJS .swiper-button-next");
    buttonNextProductImagesMainJS.click();
  });
}

if(buttonPrevProductImagesThumbJS) {
  buttonPrevProductImagesThumbJS.addEventListener("click", () => {
    const buttonPrevProductImagesMainJS = document.querySelector(".productImagesMainJS .swiper-button-prev");
    buttonPrevProductImagesMainJS.click();
  });
}
// End productImages

// Product Amount
$('.btn-add').click(function () {
  $(this).prev().val(+$(this).prev().val() + 1);
});
$('.btn-sub').click(function () {
  if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
});
// End Product Amount

// table-services
const tableServices = document.querySelector("[table-services]");
if(tableServices) {
  const listTr = tableServices.querySelectorAll(".inner-body .inner-tr");
  const length = listTr.length < 2 ? listTr.length : 2;

  for (let i = 0; i < length; i++) {
    listTr[i].classList.add("show");
  }

  const btnViewMore = tableServices.querySelector("[btn-view-more]");
  btnViewMore.addEventListener("click", () => {
    tableServices.classList.add("show-all");
  });
}
// End table-services

// box-collapse
const listBoxCollapse = document.querySelectorAll("[box-collapse]");
if(listBoxCollapse.length > 0) {
  listBoxCollapse.forEach(box => {
    const btnViewMore = box.querySelector("[btn-view-more]");
    btnViewMore.addEventListener("click", () => {
      box.classList.toggle("show");
    });
  });
}
// End box-collapse

// double-range
$(document).ready(function () {
  $(".noUi-handle").on("click", function () {
    $(this).width(50);
  });
  var rangeSlider = document.getElementById("slider-range");
  var moneyFormat = wNumb({
    decimals: 0,
    thousand: ",",
    postfix: " VND",
  });
  noUiSlider.create(rangeSlider, {
    start: [0, 2000000],
    step: 1000,
    range: {
      min: [0],
      max: [2000000],
    },
    format: moneyFormat,
    connect: true,
  });

  // Set visual min and max values and also update value hidden form inputs
  rangeSlider.noUiSlider.on("update", function (values, handle) {
    document.getElementById("slider-range-value1").innerHTML = values[0];
    document.getElementById("slider-range-value2").innerHTML = values[1];
    document.getElementsByName("min-value").value = moneyFormat.from(values[0]);
    document.getElementsByName("max-value").value = moneyFormat.from(values[1]);
  });
});
// End double-range
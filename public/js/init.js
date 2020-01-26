$(document).ready(function() {
  $('a[href^="#"]').click(function() {
    var elementClick = $(this).attr("href");
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated), body:not(:animated)").animate(
      { scrollTop: destination },
      600
    );
    return false;
  });

  function update() {
    var Now = new Date(),
      Finish = new Date();
    Finish.setHours(23);
    Finish.setMinutes(59);
    Finish.setSeconds(59);
    if (
      Now.getHours() === 23 &&
      Now.getMinutes() === 59 &&
      Now.getSeconds === 59
    ) {
      Finish.setDate(Finish.getDate() + 1);
    }
    var sec = Math.floor((Finish.getTime() - Now.getTime()) / 1000);
    var hrs = Math.floor(sec / 3600);
    sec -= hrs * 3600;
    var min = Math.floor(sec / 60);
    sec -= min * 60;
    $(".timer .hours").html(pad(hrs));
    $(".timer .minutes").html(pad(min));
    $(".timer .seconds").html(pad(sec));
    setTimeout(update, 200);
  }

  function pad(s) {
    s = ("00" + s).substr(-2);
    return "<span>" + s[0] + "</span><span>" + s[1] + "</span>";
  }
  update();

  $(".rev-slider").slick({
    infinite: true,
    autoplay: false,
    adaptiveHeight: true,
    dots: false,
    arrows: true,
    fade: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:
      '<span data-role="none" class="slick-prev animate" aria-label="Previous" tabindex="0" role="button"></span>',
    nextArrow:
      '<span data-role="none" class="slick-next animate" aria-label="Next" tabindex="0" role="button"></span>'
  });

  function checkData(str) {
    if (str.trim() !== "") {
      return true;
    } else {
      return false;
    }
  }

  $("#submitButton1").click(function() {
    let data = {
      form: 1,
      name: $("#input_name_1").val(),
      phone: $("#input_phone_1").val()
    };
    if (
      checkData($("#input_name_1").val()) &&
      checkData($("#input_phone_1").val())
    ) {
      sendOrder(data);
    } else {
      $("#error-order-input").modal();
    }
  });

  $("#submitButton2").click(function() {
    let data = {
      form: 2,
      name: $("#input_name_2").val(),
      phone: $("#input_phone_2").val()
    };
    if (
      checkData($("#input_name_2").val()) &&
      checkData($("#input_phone_2").val())
    ) {
      sendOrder(data);
    } else {
      $("#error-order-input").modal();
    }
  });

  function sendOrder(data) {
    $.ajax({
      type: "POST",
      url: "/api/newOrder",
      dataType: "json",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      data: data,
      beforeSend: function() {
        $("#confirm-order").modal({
          showClose: false,
          clickClose: false
        });
      },
      success: function(data) {
        if (data.response) {
          setTimeout(function() {
            window.location.replace("/success");
          }, 1000);
        } else if (!data.response) {
          $("#error-order-input").modal();
        } else {
        }
      },
      error: function(data) {
        $("#error-order").modal();
      }
    });
  }
});

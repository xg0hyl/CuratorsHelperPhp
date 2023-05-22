$('.menu-container a').on('click', function() {
  $('.container-home').addClass('active-menu');
  $('.plan-container').css('display', 'none');
  $('.report-container').css('display', 'none');
  $('.studentCard-container').css('display', 'none');
  $('.settings-container').removeClass('settings-active');
  $('.listStudents-container').css('display', 'none');
  $('.menu-container a').removeClass('active');
  $(this).addClass('active');

  if ($(this).hasClass('menu-profile')) {
    $('.container-profile').addClass('active-menu');
  } else {
    $('.container-profile').removeClass('active-menu');
  }

  if ($(this).hasClass('menu-home')) {
    $('.container-home').addClass('active-menu');
  } else {
    $('.container-home').removeClass('active-menu');
  }
});

$(document).ready(function() {
  $('.menu-container a').eq(1).addClass('active');
});





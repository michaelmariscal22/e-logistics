(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  var nav = document.getElementById('nav-head');

  $(document).ready(function() {
  
	$(window).scroll(function () {
		//if you hard code, then use console
		//.log to determine when you want the 
		//nav bar to stick.  
		//console.log($(window).scrollTop())
	  if ($(window).scrollTop() > 50) {
		$('#header-user').addClass('header-fixed');
		$('#user-body').addClass('user-body-margin');
	  }
	  if ($(window).scrollTop() < 51) {
		$('#header-user').removeClass('header-fixed');
		$('#user-body').removeClass('user-body-margin');
	  }
	});
  });

	let imageToSpin = document.getElementById('btn-mn');
	imageToSpin.onclick = function () {
	imageToSpin.classList.toggle('rotated')
};
})(jQuery);


$('#rateNow').on('click',function(){
	if($('#1').css('display')!='none'){
	$('#2').show().siblings('div').hide();
	}else if($('#2').css('display')!='none'){
		$('#1').show().siblings('div').hide();
	}
});

$('#rateCancel').on('click',function(){
	if($('#2').css('display')!='none'){
	$('#1').show().siblings('div').hide();
	}else if($('#1').css('display')!='none'){
		$('#2').show().siblings('div').hide();
	}
});
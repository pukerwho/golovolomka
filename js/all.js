function init() {
	
	//Мобильное меню открываем/закрываем
	$('.header-menu__mobile').on('click', function(){
		$('.menu-cover').addClass('open');
		$('.bg-modal').addClass('open');
		$('body').addClass('overflow-y-hidden');
	})
	$('.header-menu__mobile--close').on('click', function(){
		$('.menu-cover').removeClass('open');
		$('.bg-modal').removeClass('open');
		$('body').removeClass('overflow-y-hidden');
		console.log('close');
	});

	//Мобильное содержание поста
	$('.bottom-info--wrap').on('click', function(){
		$('.post-navigation--mobile').addClass('show');
	});

	$('.post-navigation--mobile_close').on('click', function(){
		$('.post-navigation--mobile').removeClass('show');
	});

	// document.addEventListener('click', function(e){
 //    if(e.target.classList.value === 'bg-modal open') {
 //      $('.menu-cover').removeClass('open');
	// 		$('.bg-modal').removeClass('open');
	// 		$('body').removeClass('overflow-y-hidden');
 //    }
 //  });

 //Появляется bottom-info
 	if ($(window).outerWidth() < 1025) {
		$(function(){
			var lastScrollTop = 0, delta = 30;
				$(window).scroll(function(){
				var nowScrollTop = $(this).scrollTop();
				if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
					if (nowScrollTop > lastScrollTop){
						$('.bottom-info').removeClass('show');
					} else {
						$('.bottom-info').addClass('show');
					}
					lastScrollTop = nowScrollTop;
				}
			});
		});
	}

	//Rating Post
  var goPostRating = 0;
  //Post Rating click
  $(document).on('click', '.post-rating__qty', function(){
    if (goPostRating === 0){
      
      var postId = $('.post_id').val();
      var postRatingCount = $('.post-rating__count').val();
      console.log(postRatingCount);

      var button = $(this),
        data = {
          'action': 'rating_post_back',
          'postId': postId,
          'postRatingCount': postRatingCount,
        };

      $.ajax({
        url: rating_params.ajaxurl, // AJAX handler
        data: data,
        type: 'POST',
        beforeSend : function ( xhr ) {
          console.log('отправляю');
        },
        success : function( data ){
          goPostRating = 1;
          $('.rating-success-message>div').addClass('show');
          setTimeout(function(){
          	$('.rating-success-message>div').removeClass('show');
          }, 5000)
        }
      });
    }
  });
}

document.addEventListener("DOMContentLoaded", init);
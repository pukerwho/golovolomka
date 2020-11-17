function init() {
	
	//Мобильное меню открываем/закрываем
	$('.header-menu__mobile').on('click', function(){
		$('.menu-cover').addClass('open');
		$('.bg-modal').addClass('open');
		$('body').addClass('overflow-y-hidden');
	})
	document.addEventListener('click', function(e){
    if(e.target.classList.value === 'bg-modal open') {
      $('.menu-cover').removeClass('open');
			$('.bg-modal').removeClass('open');
			$('body').removeClass('overflow-y-hidden');
    }
  });

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

document.addEventListener("DOMContentLoaded", init);
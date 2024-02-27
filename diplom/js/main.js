 $(document).ready(function(){
	$('.team > .container > .row').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow:'<button type="button" class="slick-prev"><i class="bi bi-arrow-left-short"></i></button>',
		nextArrow:'<button type="button" class="slick-next"><i class="bi bi-arrow-right-short"></i></button>',
		responsive: [
		{
			breakpoint: 1120,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
			}
		}
		]
	}); 




  /**
   * Back to top button
   */

	$(window).scroll(function(){
   		if (window.scrollY > 100) {
   			$('.back-to-top').addClass('active')
   		} else {
   			$('.back-to-top').removeClass('active')
   		}
   	});


  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });


  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

});











  /**
   * Easy selector helper function
   */
const select = (el, all = false) => {
	el = el.trim()
    if (all) {
    	return [...document.querySelectorAll(el)]
    } else {
    	return document.querySelector(el)
    }
}


  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos,
      behavior: 'smooth'
    })
  }
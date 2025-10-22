const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  simulateTouch: false,

  // Default parameters
  slidesPerView: 1,
  spaceBetween: 10,

  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      spaceBetween: 30
    }
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-next',
    prevEl: '.swiper-prev',
  },

});

const swiper_gallery = new Swiper('.swiper-gallery', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  simulateTouch: false,

  // Default parameters
  slidesPerView: 1,
  watchOverflow: false,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-next',
    prevEl: '.swiper-prev',
  },

});

var linkToggle = document.querySelectorAll('.expanding');
for(i = 0; i < linkToggle.length; i++){
  linkToggle[i].addEventListener('click', function(event){
    event.preventDefault();

    var container = document.getElementById(this.dataset.service);

    var open = document.getElementById('open-' + this.dataset.service);
    var close = document.getElementById('close-' + this.dataset.service);

    if (!container.classList.contains('active')) {
      container.classList.add('active');
      container.style.height = 'auto';

      open.classList.add('hidden');
      close.classList.remove('hidden');

      var height = container.clientHeight + 'px';

      container.style.height = '0px';

      setTimeout(function () {
        container.style.height = height;
      }, 0);
    } else {
      container.style.height = '0px';

      open.classList.remove('hidden');
      close.classList.add('hidden');

      container.addEventListener('transitionend', function () {
        container.classList.remove('active');
      }, {
        once: true
      });
    }
  });
}


var dropdown = document.querySelectorAll('.dropdown');
for(i = 0; i < dropdown.length; i++){
  dropdown[i].addEventListener('click', function(event){
    if (this.classList.contains('dropdown-closed')) {
      this.classList.remove('dropdown-closed')
    } else {
      this.classList.add('dropdown-closed')
    }
  });
}

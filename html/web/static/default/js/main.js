'use strict';

(function(window) {

	var mobile = device.mobile(),
			tablet = device.tablet();



  if(mobile || mobile) {
  	$('.icon-mouse').addClass('mobile-heand');
  	$('.icon-mouse').html('<div class="touth-heand"></div>');
  }		

	/* navigation */
	function init() {
		[].slice.call(document.querySelectorAll('.nav')).forEach(function(nav) {
			var navItems = [].slice.call(nav.querySelectorAll('.nav__item')),
				itemsTotal = navItems.length,
				setCurrent = function(item) {
					if( item.classList.contains('active') ) {
						return false;
					}
					var currentItem = nav.querySelector('.active');
					currentItem.classList.remove('active');
					item.classList.add('active');
				};
			
			navItems.forEach(function(item) {
				item.addEventListener('click', function() { setCurrent(item); });
			});
		});

		[].slice.call(document.querySelectorAll('.link-copy')).forEach(function(link) {
			link.setAttribute('data-clipboard-text', location.protocol + '//' + location.host + location.pathname + '#' + link.parentNode.id);
			new Clipboard(link);
			link.addEventListener('click', function() {
				link.classList.add('link-copy--animate');
				setTimeout(function() {
					link.classList.remove('link-copy--animate');
				}, 300);
			});
		});
	}

	init();


	/* backgraund */
	var canvas = document.querySelector('#scene');
	var width = canvas.offsetWidth,
	    height = canvas.offsetHeight;

	var renderer = new THREE.WebGLRenderer({
		alpha: true,
	  canvas: canvas,
	  antialias: true
	});

	renderer.setPixelRatio(window.devicePixelRatio > 1 ? 2 : 1);
	renderer.setSize(width, height);

	var scene = new THREE.Scene();

	var camera = new THREE.PerspectiveCamera(50, width / height, 0.1, 2000);
	camera.position.set(0, 0, 80);

	var loader = new THREE.TextureLoader();
	loader.crossOrigin = "Anonymous";
	var dotTexture = loader.load('/static/default/img/dotTexture.png');

	var radius = 50;
	var sphereGeom = new THREE.IcosahedronGeometry(radius, 5);
	var dotsGeom = new THREE.Geometry();
	var bufferDotsGeom = new THREE.BufferGeometry();
	var positions = new Float32Array(sphereGeom.vertices.length * 3);
	for (var i = 0;i<sphereGeom.vertices.length;i++) {
	  var vector = sphereGeom.vertices[i];
	  animateDot(i, vector);
	  dotsGeom.vertices.push(vector);
	  vector.toArray(positions, i * 3);
	}

	var fix = 2;

	function animateDot(index, vector) {
	  TweenMax.to(vector, 4, {
	    x: 0,
	    z: 0,
	    ease:Back.easeOut,
	    delay: Math.abs(vector.y/radius) * 2,
	    repeat:-1,
	    yoyo: true,
	    yoyoEase:Back.easeOut,
	    onUpdate: function () {
	      updateDot(index, vector, fix);
	    }
	  });
	}
	function updateDot(index, vector, fix) {
	  positions[index*3] = vector.x;
	  positions[index*3+2] = vector.z;
	}

	var attributePositions = new THREE.BufferAttribute(positions, 3);
	bufferDotsGeom.addAttribute('position', attributePositions);
	var shaderMaterial = new THREE.ShaderMaterial({
	  uniforms: {
	    texture: {
	      value: dotTexture
	    }
	  },
	  vertexShader: document.getElementById("wrapVertexShader").textContent,
	  fragmentShader: document.getElementById("wrapFragmentShader").textContent,
	  transparent:true
	});
	var dots = new THREE.Points(bufferDotsGeom, shaderMaterial);
	

	function render(a) {
	  dots.geometry.verticesNeedUpdate = true;
	  dots.geometry.attributes.position.needsUpdate = true;
	  renderer.render(scene, camera);
	}

	function onResize() {
	  canvas.style.width = '';
	  canvas.style.height = '';
	  width = canvas.offsetWidth;
	  height = canvas.offsetHeight;
	  camera.aspect = width / height;
	  camera.updateProjectionMatrix();  
	  renderer.setSize(width, height);
	}

	var mouse = new THREE.Vector2(0.8, 0.5);
	function onMouseMove(e) {
	  mouse.x = (e.clientX / window.innerWidth) - 0.5;
	  mouse.y = (e.clientY / window.innerHeight) - 0.5;
	  TweenMax.to(dots.rotation, 4, {
	    x : (mouse.y * Math.PI * 0.5),
	    z : (mouse.x * Math.PI * 0.2),
	    ease:Power1.easeOut
	  });
	}

	TweenMax.ticker.addEventListener("tick", render);
	window.addEventListener("mousemove", onMouseMove);
	var resizeTm;
	window.addEventListener("resize", function(){
	  resizeTm = clearTimeout(resizeTm);
	  resizeTm = setTimeout(onResize, 200);
	});

	if (mobile) {
		var granimInstance = new Granim({
		  element: '#granim-canvas',
		  direction: 'diagonal',
		  opacity: [1, 1],
		  isPausedWhenNotInView: true,
		  stateTransitionSpeed: 500,
		  states : {
		    "default-state": {
	        gradients: [
	          ['#F6AE40', '#F641E6']
	        ],
	      },
	      "state-1": {
	        gradients: [
	          ['#F6AE40', '#F641E6']
	        ],
	      },
	      "state-2": {
	        gradients: [
	          ['#7A46EC', '#F745E5']
	        ],
	      },
	      "state-3": {
	        gradients: [
	        	['#30DAE7', '#8C48F5']
	        ],
	      },
	      "state-4": {
	        gradients: [
	          ['#EC4FDE', '#69E3E6']
	        ],
	      },
	      "state-5": {
	        gradients: [ 
	        	['#F6B841', '#E938A0']
	        ],
	      }
		  }
		});
	} else {
		var granimInstance = new Granim({
		  element: '#granim-canvas',
		  direction: 'diagonal',
		  opacity: [1, 1],
		  isPausedWhenNotInView: true,
		  stateTransitionSpeed: 500,
		  states : {
		    "default-state": {
	        gradients: [
	          ['#F6AE40', '#F641E6'],
	          ['#F641E6', '#F6AE40']
	        ],
	        transitionSpeed: 10000
	      },
	      "state-1": {
	        gradients: [
	          ['#F6AE40', '#F641E6'],
	          ['#F641E6', '#F6AE40']
	        ],
	        transitionSpeed: 10000
	      },
	      "state-2": {
	        gradients: [
	          ['#7A46EC', '#F745E5'],
	          ['#F745E5', '#7A46EC'] 
	        ],
	        transitionSpeed: 10000
	      },
	      "state-3": {
	        gradients: [
	        	['#30DAE7', '#8C48F5'],
	          ['#8C48F5', '#30DAE7']
	        ],
	        transitionSpeed: 10000
	      },
	      "state-4": {
	        gradients: [
	          ['#EC4FDE', '#69E3E6'], 
	        	['#69E3E6', '#EC4FDE']
	        ],
	        transitionSpeed: 10000
	      },
	      "state-5": {
	        gradients: [ 
	        	['#F6B841', '#E938A0'],
	        	['#E938A0', '#F6B841']
	        ],
	        transitionSpeed: 10000
	      }
		  }
		});
	}


	/* preload */
	var pageWrap = $('#ip-container'),
			loaderLogo = $('#logo-loader'),
			logoAnimateKey = true,
			counter = 0,
			loaderTimeOut;

	function loadComplete(){
    var preloaderOutTl = new TimelineMax();
    preloaderOutTl.to($('#logo-loader'), 0.3, {y: 100, autoAlpha:0, ease:Back.easeIn})
    .to($('#logo-loader span'), 0.3, {y: 100, autoAlpha:0, ease:Back.easeIn}, 0.1)
    .set($('body'), {className : '-= is-loading'})
    .set($('body'), {className : '+=is-loaded'})
    .to($('.ip-header'), 0.7, {yPercent: 100, ease: Power4.easeInOut})
    .set($('.ip-header'), {className: '+=is-hidden'})
    .from($('.ip-main .section'), 1, {autoAlpha: 0, ease:Power1.easeOut}, '-=0.2')
    return preloaderOutTl;
  }

	function logoAnimate(time){
		loaderLogo.toggleClass('active');
		counter ++;
		loaderTimeOut = setTimeout(function(){
			if(logoAnimateKey) logoAnimate(time);
		}, time);
	}

	function loadFinish(num){
		if(counter >= num) {
			logoAnimateKey = false;
			setTimeout(function(){
				loadComplete();
				scene.add(dots);
			}, 1500);
		} else {
			setTimeout(function(){
				loadFinish(num);
			}, 1000);
		}
	}

	setTimeout(function(){
		pageWrap.removeClass('before-start');
	}, 500);

	setTimeout(function(){
		logoAnimate(1000);
	}, 2000);

	$(window).on('load', function(){
		loadFinish(4)
	});




	/* app script */
	function fixPhone(phone,phoneNum){
		var link = '<a href="'+ phone.data('tel') +'">' + phoneNum + '</a>';
		if(mobile) {
			phone.html(link);
		} else {
			phone.text(phoneNum);
		}
	}


	$(document).ready(function(){
		var init = true;
		var sensitivity;

		(mobile) ? sensitivity = 15 : sensitivity = 10;   

		$('#fullpage').fullpage({
		  anchors: ['page-1', 'page-2', 'page-3', 'page-4', 'page-5'],
		  menu: '#menu',
		  touchSensitivity: sensitivity,
		  onLeave: function(index, nextIndex, direction){
				granimInstance.changeState('state-' + nextIndex);			
				if(!mobile && index == 4) {
					animateSlider.stopPlay();
				} else if(mobile && index == 4) {
					$('#slider-client .slick-slider').slick('slickPause');
				}
			},
			afterLoad: function(anchorLink, index){
				//$('.section[data-anchor="page-'+ index +'"] .anim-delay').css('opacity', '1');
				if(index == 4 && init) {
					if (!mobile) animateSlider.init(sliderClient, 4000);
					init = false;				
				} else if (!mobile && index == 4) {
					animateSlider.addPlay();
				} else if(mobile && index == 4) {
					$('#slider-client .slick-slider').slick('slickPlay');
				}
			}
	 	});

	 	$('.scroll-top').on('click', function(){
	 		$.fn.fullpage.moveTo(1);
	 	});
	 	$('.icon-mouse').on('click', function(){
	 		$.fn.fullpage.moveTo(2);
	 	});

	 	var phone = $('.phone-fix'),
	 		  phoneNum = $('.phone-fix').text();

	 	fixPhone(phone,phoneNum);

	 	function dataTextAnimate(slider){	 		
	 		var slideList = slider.find('.slider-ell');
	 		var type = slider.data('animate');
	 		var dadaSlidelist = [];
	 		for (var i = 0; i < slideList.length; i++) {
	 			var dataSlide = [];
	 			var animateText = $(slideList[i]).find('.animate-text');
	 			Array.prototype.forEach.call(animateText, function(child) {
	 				var txt = new TextFx(child);
	 				if(i > 0) txt.hide();
	 				dataSlide.push(txt);
				});
				dadaSlidelist.push(dataSlide);
	 		}
	 		this.slider = slider;	
	 		this.type = type;
	 		this.slideList = slideList;
	 		this.slideEll = dadaSlidelist;
	 	}

	 	var animateSlider = {
	 		play : true,
	 		time : null,
	 		current : 0,
	 		slider : null,
	 		sliderNode : null,
	 		init : function(slider, time){
	 			this.time = time;
	 			this.slider = slider;
	 			this.sliderNode = $('#slider-client');
	 			this.autoPlay();
	 			this.sliderNode.on('click', '.prev-slide', function(){
					animateSlider.play = false;
					animateSlider.slidePrev();
				});
				this.sliderNode.on('click', '.next-slide', function(){
					animateSlider.play = false;
					animateSlider.slideNext();
				});
	 		},
	 		currentSlide : function (direction){
	 			if(direction == 'next') {
	 				(this.slider.slideEll.length - 1 > this.current) ? this.current ++ : this.current = 0;
	 			} else {
	 				(this.current == 0) ? this.current = this.slider.slideEll.length - 1 : this.current --;
	 			}
				var slideEll = this.slider.slideEll[this.current];
				var type = this.slider.type;
				for (var i = 0; i < slideEll.length; i++) {
					slideEll[i].show(type);
					if(i == 0 && this.play) this.autoPlay();
				}	
				this.slider.slideList.removeClass('active');
				$(this.slider.slideList[this.current]).addClass('active');
			},
			slidePrev : function (){
				var slideEll = this.slider.slideEll[this.current];
				var type = this.slider.type;
				for (var i = 0; i < slideEll.length; i++) {
				 	if(i == 0) {
				  	slideEll[i].hide(type, this.currentSlide('prev'));
				  } else {
				  	slideEll[i].hide(type);
				  }
				}
			},
			slideNext : function (){
				var slideEll = this.slider.slideEll[this.current];
				var type = this.slider.type;
				for (var i = 0; i < slideEll.length; i++) {
				  if(i == 0) {
				  	slideEll[i].hide(type, this.currentSlide('next'));
				  } else {
				  	slideEll[i].hide(type);
				  }
				}
			},
			autoPlay : function (){
				setTimeout(function(){
					if(animateSlider.play) animateSlider.slideNext(this.current);
				}, animateSlider.time);
			},
			addPlay : function() {
		 		this.play = true;
		 		this.autoPlay(this.time);
		 	},
		 	stopPlay : function() {
		 		this.play = false;
		 	}
	 	}
	 	
	 	if (mobile) {
	 		$('#slider-client .slick-slider').slick({
			  slidesToShow: 1,
			  autoplay: true,
			  autoplaySpeed: 4000,
			  prevArrow: $('.nav-slider .prev-slide'),
			  nextArrow: $('.nav-slider .next-slide')
			}); 
			$('#slider-client .slick-slider').slick('slickPause');		
	 	} else {
	 		var sliderClient = new dataTextAnimate($('#slider-client'));
	 	}

	 	


		/* form input file */
	 	$('.fild-file .input__field').on('focus', function(){
	 		$(this).parent().parent().find('input[type="file"]').trigger('click');
	 	})
	 	$('.fild-file input[type="file"]').on('change', function(){
	 		if(this.files.length > 0) { 
	 			$(this).parent().find('.input__field').val(this.files[0].name);
	 			$(this).parent().find('.input--hoshi').addClass('succses');
	 			$(this).parent().find('.input--hoshi').addClass('input--filled');
	 			$(this).parent().find('.icon-file').addClass('clear-file');
	 		} else {
	 			$(this).parent().find('.input__field').val('');
	 			$(this).parent().find('.input.input--hoshi').removeClass('input--filled');
	 			$(this).parent().find('.input__field').blur();
	 			$(this).parent().find('.input--hoshi').removeClass('succses');
	 			$(this).parent().find('.icon-file').removeClass('clear-file');
	 		} 		
	 	});

	 	$('.icon-file').on('click', function(){
	 		if($(this).hasClass('clear-file')) {
	 			$(this).parent().parent().find('.input__field').val('');
		 		$(this).parent().parent().find('input[type="file"]').val('');
		 		$(this).parent().parent().find('.input.input--hoshi').removeClass('input--filled');
		 		$(this).parent().parent().find('.input__field').blur();
		 		$(this).parent().parent().find('.input--hoshi').removeClass('succses');
		 		$(this).removeClass('clear-file');
	 		} else {
	 			$(this).parent().parent().find('.input.input--hoshi').addClass('input--filled');
	 			$(this).parent().parent().find('input[type="file"]').trigger('click');
	 		}
	 	})


    /* form input */
    if (!String.prototype.trim) {
      (function() {
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        String.prototype.trim = function() {
          return this.replace(rtrim, '');
        };
      })();
    }

    [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
      if( inputEl.value.trim() !== '' ) {
        classie.add( inputEl.parentNode, 'input--filled' );
      }
      inputEl.addEventListener( 'focus', onInputFocus );
      inputEl.addEventListener( 'blur', onInputBlur );
    });

    function onInputFocus( ev ) {
      classie.add( ev.target.parentNode, 'input--filled' );
    }

   	function onInputBlur( ev ) {
    	if( ev.target.value.trim() === '' ) {
      	classie.remove( ev.target.parentNode, 'input--filled' );
    	}
  	}
		
	 	
	});

})(window);



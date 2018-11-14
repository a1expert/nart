'use strict';

document.addEventListener('DOMContentLoaded', function () {
	//	FAQ - аккордион
	const accordeon = document.querySelector('.faq');
	const addSmoothOpen = function () {
		[].forEach.call(accordeon.querySelectorAll('.faq__content'), function (it) {
			it.classList.add('faq__content_smooth');
		});
	};
	const setTargetContentHeight = function (contentBlock) {
		const contentChilds = contentBlock.children;
		let elementsHeight = 0;
		[].forEach.call(contentChilds, function (it) {
			elementsHeight += it.offsetHeight;
		});
		contentBlock.style.maxHeight = elementsHeight + 'px';
	};
	const setFirstItemActive = function (allAccItems) {
		allAccItems[0].classList.add('faq__item_active');
		allAccItems[0].querySelector('.faq__content').style.maxHeight = setTargetContentHeight(allAccItems[0].querySelector('.faq__content')) + 'px';
	};
	const toggleAccordeon = function (event, allAccItems) {
		const target = event.target;
		if (target.closest('.faq__toggler')) {
			const targetParent = target.closest('.faq__item');
			const targetContent = targetParent.querySelector('.faq__content');
			addSmoothOpen();
			[].forEach.call(allAccItems, function (it) {
				it.classList.remove('faq__item_active');
				it.querySelector('.faq__content').style.maxHeight = '0px';
			});
			targetParent.classList.add('faq__item_active');
			setTargetContentHeight(targetContent);
		}
	};
	const accordeonOnClick = function (event, allFaqItems) {
		toggleAccordeon(event, allFaqItems);
	};
	const initAccordeon = function () {
		if (accordeon) {
			const allAccItems = accordeon.querySelectorAll('.faq__item');
			setFirstItemActive(allAccItems);
			accordeon.addEventListener('click', function () {
				accordeonOnClick(event, allAccItems);
			});
		}else {
			return false;
		}
	};

	if (accordeon) {
		initAccordeon();

		window.addEventListener('resize', function () {
			setTargetContentHeight(document.querySelector('.faq__item_active .faq__content'));
		});
	}
	//	ends FAQ аккордион

	// floatingLabels
	const inputs = document.querySelectorAll('.jsFloating');
	const inputOnChange = function (event) {
		const target = event.target;
		const targetSiblingLabel = target.nextSibling;
		if (target.value) {
			targetSiblingLabel.classList.add('floatingLabel_up');
		}else {
			targetSiblingLabel.classList.remove('floatingLabel_up');
		}
	};
	[].forEach.call(inputs, function (it) {
		it.addEventListener('change', inputOnChange);
	});



	//	submittingForm
	const forms = document.querySelectorAll('form');
	//	createSuccessMessage
	const createSuccessMessage = function () {
		const successMessageTemplate = document.querySelector('#successMessage').content.querySelector('.successMessage');
		const successMessage = successMessageTemplate.cloneNode(true);
		return successMessage;
	};

	const formOnSubmit = function (evt) {
		evt.preventDefault();
		const target = evt.target;
		const formData = new FormData(target);
		console.log(formData);
		const targetParent = target.parentNode;
		uploadData(formData,
			function () {
				targetParent.replaceChild(createSuccessMessage(), target);
			},
			function () {
				console.log('поломалося');
			});
	};
	[].forEach.call(forms, function (it) {
		it.addEventListener('submit', formOnSubmit);
	});

	//	попап-форма
	const popupTemplate = document.querySelector('#formPopup').content.querySelector('.formPopup');
	const ESC_CODE = 27;

	const closePopup = function (popup) {
		popup.removeEventListener('click', popupOnClick);
		document.removeEventListener('keydown', documentOnKeydown);
		popup.remove();
	};

	const documentOnKeydown = function (evt) {
		if (evt.keyCode === ESC_CODE) {
			closePopup(document.querySelector('.formPopup'));
		}
	};

	const popupOnClick = function (evt) {
		const targetClick = evt.target;
		if (targetClick === targetClick.closest('.formPopup__layout') || targetClick === targetClick.closest('.formPopup__close')) {
			closePopup(document.querySelector('.formPopup'));
		}
	};

	const openPopup = function () {
		const formPopup = popupTemplate.cloneNode(true);
		formPopup.addEventListener('click', popupOnClick);
		document.addEventListener('keydown', documentOnKeydown);
		document.body.appendChild(formPopup);
		formPopup.querySelector('.jsFloating').addEventListener('change', inputOnChange);
		formPopup.querySelector('form').addEventListener('submit', formOnSubmit);
	};

	const popupTogglers = document.querySelectorAll('.jsPopup');
	[].forEach.call(popupTogglers, function (it) {
		it.addEventListener('click', openPopup);
	});

	//	показать поле для ввода комментария
	const showCommentsBtn = document.querySelector('.form__showComment');
	const showComments = function (evt) {
		const target = evt.target;
		const slidingBlock = target.parentNode.querySelector('.jsSlideDown');
		target.remove();
		setTargetContentHeight(slidingBlock);
		// const slidingBlockChildsHeight = calcTargetContentHeight(slidingBlock);
		// slidingBlock.style.maxHeight = slidingBlockChildsHeight + 'px';
		target.removeEventListener('click', showComments);
	};
	if (showCommentsBtn) {
		showCommentsBtn.addEventListener('click', showComments);
	}

	//	cards render
	//	test data
	//let cards = [];
	// 	{
	// 		image: './assets/images/rentItem1.png',
	// 		name: 'hyundai universe',
	// 		seats: '26',
	// 		type: 'Комфорт',
	// 		price: '3000',
	// 		label: 'Рекомендуем для перевозки детей'
	// 	},
	// 	{
	// 		image: './assets/images/rentItem2.png',
	// 		name: 'hyundai universe1',
	// 		seats: '33',
	// 		type: 'Стандарт',
	// 		price: '400',
	// 		label: ''
	// 	},
	// 	{
	// 		image: './assets/images/rentItem3.png',
	// 		name: 'hyundai universe2',
	// 		seats: '43',
	// 		type: 'Стандарт',
	// 		price: '75000',
	// 		label: ''
	// 	},
	// 	{
	// 		image: './assets/images/rentItem4.png',
	// 		name: 'hyundai universe3',
	// 		seats: '45',
	// 		type: 'Комфорт',
	// 		price: '6000',
	// 		label: 'Рекомендуем для перевозки детей'
	// 	},
	// 	{
	// 		image: './assets/images/rentItem5.png',
	// 		name: 'hyundai universe4',
	// 		seats: '52',
	// 		type: 'Комфорт',
	// 		price: '3750',
	// 		label: ''
	// 	},
	// 	{
	// 		image: './assets/images/rentItem6.png',
	// 		name: 'hyundai universe5',
	// 		seats: '33',
	// 		type: 'Комфорт',
	// 		price: '9000',
	// 		label: ''
	// 	}
	// ];



	const renderCards = function (array) {
		window.createCard(array);
	};


	// window.loadData(
	// 	function (data) {
	// 		let cards = data;
	// 		renderCards(cards);
	// 	},
	// 	function (errorMessage) {
	// 		console.log(errorMessage);
	// 	});



	const gallery = document.querySelectorAll('.jsGallery');
	if (gallery) {
		const createGalleryCarousel = function () {
			const fragment = '';
		};
		const galleryOnClick = function (evt) {
			const target = evt.target;
			const galleryImg = target.querySelectorAll('img');
			if (target === target.closest('img')) {
				const fullsize = document.createElement('div');
				fullsize.classList.add('jsGallery__image');
				fullsize.src = target.dataset.src;
				document.body.appendChild(fullsize);
			}
		};

		[].forEach.call(gallery, function (it) {
			it.addEventListener('click', galleryOnClick);
		});
	}
	var carouselPrev = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>';
	var carouselNext = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>';


	$('.hero__carousel').owlCarousel({
		items: 1,
		loop: true,
		dots: true,
		dotsContainer: '.hero__dots',
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		mouseDrag: false,
		autoplay: true,
		autoplayTimeout: 7500
	});
	$('.mainLicense__carousel').owlCarousel({
		items: 1,
		loop: true,
		nav: true,
		navContainer: '.mainLicense__nav',
		navText: [carouselPrev, carouselNext],
		dots: false,
		mouseDrag: false
	});
	const initSmallCarousels = function () {
		$('.rent__list').owlCarousel({
			items: 1,
			loop: true,
			nav: false,
			dots: true,
			mouseDrag: true
		});
		$('.services__list').owlCarousel({
			items: 1,
			loop: true,
			nav: false,
			dots: true,
			mouseDrag: true
		});
	};
	if (window.matchMedia('(max-width: 767px)').matches) {
		initSmallCarousels();
	}

	function destroySmallCarousels() {
		$('.services__list').trigger('destroy.owl.carousel');
		$('.rent__list').trigger('destroy.owl.carousel');
	}

	$(window).on('resize', function () {
		if (window.matchMedia('(max-width: 767px)').matches) {
			initSmallCarousels();
		} else {
			destroySmallCarousels();
		}
	});

	//menu
	const menuBtn = document.querySelector('.header__menuBtn');
	const menuBtnOnClick = function (evt) {
		const self = evt.target;
		const menu = document.querySelector('.menu');
		if (self.classList.contains('header__menuBtn_open')) {
			menu.removeAttribute('style');
		}else {
			setTargetContentHeight(menu);
		}
		evt.target.classList.toggle('header__menuBtn_open');
	};
	menuBtn.addEventListener('click', menuBtnOnClick);

});

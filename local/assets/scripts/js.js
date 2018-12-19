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
	const inputOnChange = function (event) {
		const target = event.target;
		const targetSiblingLabel = target.parentNode.querySelector(".floatingLabel");
		if (target.value) {
			targetSiblingLabel.classList.add('floatingLabel_up');
		}else {
			targetSiblingLabel.classList.remove('floatingLabel_up');
		}
	};
	function floatingLabels()
	{
		const inputs = document.querySelectorAll('.jsFloating');
		[].forEach.call(inputs, function (it) {
			it.addEventListener('change', inputOnChange);
		});
	}

	// main form
	try
	{
		const mainFormTemplate = document.querySelector("#mainForm").content.querySelector(".mainForm");
		const mainFormWrap = document.querySelector(".feedback__wrapper");
		const mainForm = mainFormTemplate.cloneNode(true);
		mainFormWrap.appendChild(mainForm);
		if(mainForm)mainForm.addEventListener("submit", formOnSubmit);
	}
	catch(error)
	{
		console.log(error.name + error.message);
	}
	
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
	const createSuccessMessage = function () {
		const successMessageTemplate = document.querySelector('#successMessage').content.querySelector('.successMessage');
		const successMessage = successMessageTemplate.cloneNode(true);
		return successMessage;
	};
	const openPopup = function () {
		const formPopup = popupTemplate.cloneNode(true);
		formPopup.addEventListener('click', popupOnClick);
		document.addEventListener('keydown', documentOnKeydown);
		document.body.appendChild(formPopup);
		formPopup.querySelector('.jsFloating').addEventListener('change', inputOnChange);
		var form = document.querySelector(".jsForm");
		form.addEventListener("submit", formOnSubmit);

	};

	//	submittingForm	
	function formOnSubmit (e)
	{
		e.preventDefault();
		const form = e.target;
		const url = form.action;
		const formData  = new FormData(form);
		const targetParent = form.parentNode;
		
		fetch(url, {method: 'POST', body: formData}).then(function (response)
		{
			if(response.status === 200)
			{
				targetParent.replaceChild(createSuccessMessage(), form);
			}
		});
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

	// cards render
	

	//	debounce
	let lastTimeout;
	window.debounce = function (func) {
		if (lastTimeout) {
			clearTimeout(lastTimeout);
		}
		lastTimeout = setTimeout(func, 500);
	};

	//	карточки
	const rentGrid = document.querySelector('.rentGrid .row');
	const renderCards = function (array) {
		rentGrid.innerHTML = '';
		createCard(array);
	};

	const cardTemplate = document.querySelector('#rentItem');
	const createCard = function (array) {
		const cardTemplateContent = cardTemplate.content.querySelector('.rentItem');
		const fragment = document.createDocumentFragment();
		array.forEach(function (it) {
			const rentCard = cardTemplateContent.cloneNode(true);
			const rentLink = rentCard.querySelector('.rentItem__link');
			const rentCardImage = rentCard.querySelector('.rentItem__picture');
			const rentCardName = rentCard.querySelector('.rentItem__name');
			const rentCardSeats = rentCard.querySelector('.rentItem__seats');
			const rentCardType = rentCard.querySelector('.rentItem__type');
			const rentCardPrice = rentCard.querySelector('.rentItem__price span');
			const rentCardWrapper = document.createElement('li');
			rentCardWrapper.classList.add('rentGrid__element', 'col-xs-12', 'col-md-4');
			rentLink.href = it.url;
			rentCardImage.src = it.image;
			rentCardName.textContent = it.name;
			rentCardSeats.textContent = it.seats;
			rentCardType.textContent = it.type;
			rentCardPrice.textContent = it.price;
			if (it.label !== '') {
				rentCard.dataset.label = it.label;
				rentCard.classList.add('rentItem_label');
			}
			rentCardWrapper.appendChild(rentCard);
			fragment.appendChild(rentCardWrapper);
		});
		rentGrid.appendChild(fragment);
	};

	if (rentGrid) {

		renderCards(cards);
	}

	//	галлерея
	const gallery = document.querySelector('.jsGallery');
	if (gallery) {
		const fullsize = gallery.querySelector('.carGallery__fullsize');
		const galleryBtns = gallery.querySelectorAll('button');

		const createImage = btn => {
			const newImage = document.createElement('img');
			newImage.src = btn.dataset.src;
			newImage.alt = btn.dataset.description;
			fullsize.innerHTML = '';
			fullsize.appendChild(newImage);
		};

		const createVideo = btn => {
			const video = document.createElement('video');
			video.controls = true;
			video.autoplay = true;
			const source = document.createElement('source');
			source.src = btn.dataset.src;
			video.appendChild(source);
			fullsize.innerHTML = '';
			fullsize.appendChild(video);
		};

		const createFullsize = btn => {
			if (btn.dataset.type === 'img') {
				createImage(btn);
			}else {
				createVideo(btn);
			}
		};

		const setActive = btn => {
			[].forEach.call(galleryBtns, function (it) {
				it.classList.remove('carGallery__button_active');
			});
			btn.classList.add('carGallery__button_active');
		};

		const galleryOnClick = evt => {
			const target = evt.target;
			if (target === target.closest('button')) {
				createFullsize(target);
				setActive(target);
			}
		};

		const galleryInit = () => {
			for (let i = 0; i < galleryBtns.length; i++) {
				galleryBtns[i].style.backgroundImage = 'url(' + galleryBtns[i].dataset.preview + ')';
				createImage(galleryBtns[0]);
			}
			gallery.addEventListener('click', galleryOnClick);
		};

		galleryInit();
	}

	//	фильтр
	const filters = document.querySelector('.filters__block');

	const filter = {
		seats: 'any',
		type: 'any',
		price: 'any'
	};

	const seatsFilter = (seats, comparedSeats) => {
		if (comparedSeats === 'any') {
			return true;
		}
		return seats === comparedSeats;
	};

	const typeFilter = (type, comparedType) => {
		if (comparedType === 'any') {
			return true;
		}
		return type === comparedType;
	};
	const applyFilters = arr => {
		return arr.filter(it => {
			return seatsFilter(it.seats, filter.seats) && typeFilter(it.type, filter.type);
		});
	};

	const addFilter = (type, value) => {
		filter[type] = value;
	};

	const activateFilterBtn = button => {
		const siblingsFilterButtons = button.parentNode.children;
		[].forEach.call(siblingsFilterButtons, function (it) {
			it.classList.remove('filters__control_active');
		});
		button.classList.add('filters__control_active');
	};

	const deactivateFilterBtn = button => {
		button.classList.remove('filters__control_active');
	};

	const sortByPrice = arr => {
		let prices = arr.slice().sort(function (a, b) {
			if (parseInt(a.price, 10) > parseInt(b.price, 10)) {
				return 1;
			}
			if (parseInt(a.price, 10) < parseInt(b.price, 10)) {
				return -1;
			}
			return 0;
		});
		return prices;
	};

	const checkSorting = arr => {
		switch (filter.price) {
			case 'any':
				return arr;
			case 'priceUp':
				return sortByPrice(arr);
			case 'priceDown':
				return sortByPrice(arr).reverse();
		}
	};

	const filtersOnClick = evt => {
		const target = evt.target;
		const filterBy = target.dataset.filterby;
		const value = target.dataset.value;
		let filteredCards = [];
		let sortedCards = [];
		if (!target.classList.contains('filters__control_active') && target.closest('button')) {
			activateFilterBtn(target);
			addFilter(filterBy, value);
			filteredCards = applyFilters(cards);
			sortedCards = checkSorting(filteredCards);
			debounce(function () {
				renderCards(sortedCards);
			});
		}else {
			deactivateFilterBtn(target);
			addFilter(filterBy, 'any');
			filteredCards = applyFilters(cards);
			debounce(function () {
				renderCards(filteredCards);
			});
		}
	};

	if (filters) {
		filters.addEventListener('click', filtersOnClick);
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
	Selecter();
	floatingLabels();
});

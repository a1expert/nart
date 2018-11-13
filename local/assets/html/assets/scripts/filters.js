'use strict';

(function (){
	const filters = document.querySelector('.filters__block');

	const sortingCardsByPrices = function (array) {
		let prices = array.slice().sort(function (a, b) {
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

	const toggleActiveFilterBtn = function (button) {
		const allFilterButtons = button.parentNode.children;
		[].forEach.call(allFilterButtons, function (it) {
			it.classList.remove('filters__control_active');
		});
		button.classList.add('filters__control_active');
	};

	const rerenderCards = function (cardsArray) {
		rentGrid.innerHTML = '';
		renderCards(cardsArray);
	};

	const applyFilterByPrice = function (button) {
		switch (button.id) {
			case 'priceUp':
				debounce(function () {
					rerenderCards(sortingCardsByPrices(window.cards));
				});
				break;
			case 'priceDown':
				debounce(function () {
					rerenderCards(sortingCardsByPrices(window.cards).reverse());
				});
				break;
		}
	};

	const disapplyFilterByPrice = function (button) {
		button.classList.remove('filters__control_active');
		debounce(function () {
			rerenderCards(window.cards);
		});
	};

	const filtersOnClick = function (evt) {
		const target = evt.target;
		switch (target.dataset.filteredby) {
			case 'seats':
				console.log('фильтрация по местам');
				break;
			case 'type':
				console.log('фильтрация по типу');
				break;
			case 'price':
				console.log('фильлтрация по цене');
				break;
		}
		// if (target === target.closest('button') && (!target.classList.contains('filters__control_active'))) {
		// 	toggleActiveFilterBtn(target);
		// 	applyFilterByPrice(target);
		// }else if (target === target.closest('button')) {
		// 	disapplyFilterByPrice(target);
		// }

	};
	filters.addEventListener('click', filtersOnClick);
}());

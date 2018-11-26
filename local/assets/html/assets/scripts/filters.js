'use strict';

(function (){
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
			filteredCards = applyFilters(window.cards);
			sortedCards = checkSorting(filteredCards);
			window.debounce(function () {
				window.renderCards(sortedCards);
			});
		}else {
			deactivateFilterBtn(target);
			addFilter(filterBy, 'any');
			filteredCards = applyFilters(window.cards);
			window.debounce(function () {
				window.renderCards(filteredCards);
			});
		}
	};

	if (filters) {
		filters.addEventListener('click', filtersOnClick);
	}
}());

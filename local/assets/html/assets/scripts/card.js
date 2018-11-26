'use strict';

(function (){
	const cardTemplate = document.querySelector('#rentItem')
	if (cardTemplate) {
		const cardTemplateContent = cardTemplate.content.querySelector('.rentItem');
		window.rentGrid = document.querySelector('.rentGrid .row');
		window.createCard = function (array) {
			const fragment = document.createDocumentFragment();
			array.forEach(function (it) {
				const rentCard = cardTemplateContent.cloneNode(true);
				const rentCardImage = rentCard.querySelector('.rentItem__picture');
				const rentCardName = rentCard.querySelector('.rentItem__name');
				const rentCardSeats = rentCard.querySelector('.rentItem__seats');
				const rentCardType = rentCard.querySelector('.rentItem__type');
				const rentCardPrice = rentCard.querySelector('.rentItem__price span');
				const rentCardWrapper = document.createElement('li');
				rentCardWrapper.classList.add('rentGrid__element', 'col-xs-12', 'col-md-4');
				rentCardImage.src = it.image;
				// 'http://a1reklamaj.myjino.ru' +
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
			window.rentGrid.appendChild(fragment);
		};
	}

}());

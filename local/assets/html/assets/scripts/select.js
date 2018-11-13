'use strict';

(function () {
	const selects = document.querySelectorAll('.select');
	const closeSelect = function () {
		[].forEach.call(selects, function (it) {
			it.classList.remove('select_open');
			it.querySelector('.select__fakeSelect').removeEventListener('click', fakeSelectOnClick);
		});
	};

	const createPlaceholder = function (select) {
		const placeholder = document.createElement('span');
		placeholder.classList.add('select__placeholder');
		placeholder.textContent = 'Выберите услугу';
		select.appendChild(placeholder);
	};

	const removePlaceholder = function (select) {
		const placeholder = select.querySelector('.select__placeholder');
		if (select.contains(placeholder)) {
			placeholder.remove();
		}
	};

	const documentOnClick = function (evt) {
		const target = evt.target;
		if (target !== target.closest('.select')) {
			closeSelect();
		}
	};

	const fakeSelectOnClick = function (evt) {
		const target = evt.target;
		if (target === target.closest('.select__fakeOption')) {
			const associatedSelect = target.parentNode.previousSibling;
			associatedSelect.value = target.dataset.value;
			removePlaceholder(target.closest('.select'));
			closeSelect();
		}
	};

	const selectOnClick = function (evt) {
		const target = evt.target;
		if (target === target.closest('.select')) {
			const associatedFakeSelect = target.querySelector('.select__fakeSelect');
			closeSelect();
			target.classList.add('select_open');
			associatedFakeSelect.addEventListener('click', fakeSelectOnClick);
			document.addEventListener('click', documentOnClick);
		}
	};

	const createOptions = function (options, fakeSelect) {
		const fragment = document.createDocumentFragment();
		[].forEach.call(options, function (it) {
			const fakeOption = document.createElement('div');
			fakeOption.classList.add('select__fakeOption');
			fakeOption.textContent = it.textContent;
			fakeOption.dataset.value = it.value;
			fragment.appendChild(fakeOption);
		});
		fakeSelect.appendChild(fragment);
		return fakeSelect;
	};

	const createFakeSelect = function (select) {
		const options = select.options;
		const parent = select.parentNode;
		const fakeSelect = document.createElement('div');
		fakeSelect.classList.add('select__fakeSelect');
		parent.appendChild(createOptions(options, fakeSelect));
	};

	const initFakeSelects = function () {
		[].forEach.call(selects, function (it) {
			const selectPrototype = it.querySelector('select');
			createFakeSelect(selectPrototype);
			createPlaceholder(it);
			it.addEventListener('click', selectOnClick);
		});
	};

	initFakeSelects();
}());

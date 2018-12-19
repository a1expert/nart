'use strict';

(function (){
	let lastTimeout;
	window.debounce = function (func) {
		if (lastTimeout) {
			clearTimeout(lastTimeout);
		}
		lastTimeout = setTimeout(func, 500);
	};
}());

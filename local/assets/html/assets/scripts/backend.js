'use strict';

(function () {
	window.uploadData = function (data, onLoad, onError) {
		const xhr = new XMLHttpRequest();
		const URL = 'http://httpbin.org/post';
		xhr.responseType = 'json';

		xhr.addEventListener('load', onDataUpload);
		xhr.addEventListener('error', onDataUpLoadError);

		xhr.open('POST', URL);
		xhr.send(data);

		function onDataUpload() {
			if (xhr.status === 200) {
				onLoad();
			}
		}

		function onDataUpLoadError() {
			onError();
		}
	};

	window.loadData = function(onLoad, onError) {
		let xhr = new XMLHttpRequest();

		xhr.responseType = 'json';
		xhr.timeout = 10000;

		xhr.addEventListener('load', onDataLoad);
		xhr.addEventListener('error', onDataLoadError);
		xhr.addEventListener('timeout', onDataLoadTimeout);

		xhr.open('GET', 'http://a1reklamaj.myjino.ru/local/assets/buses.json');
		xhr.send();

		function onDataLoad() {
			if (xhr.status === 200) {
				onLoad(xhr.response);
			}
		}

		function onDataLoadError() {
			onError('Произошла ошибка соединения.');
		}

		function onDataLoadTimeout() {
			onError('Запрос был прекращён по таймауту.');
		}
	};
}());

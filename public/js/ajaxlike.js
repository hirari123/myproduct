/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/ajaxlike.js":
/*!**********************************!*\
  !*** ./resources/js/ajaxlike.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(function () {\n  var likeArticleId;\n  $('.js-like-toggle').on('click', function () {\n    var $this = $(this);\n    likeArticleId = $this.data('articleid'); // Viewからdata-articleid受け取った？\n\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxlike',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'article_id': likeArticleId // Controllerの$requestに渡すパラメータ($request->article_idとして使う)\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // lovedクラスを追加する\n      $this.toggleClass('loved'); // .likesCountの次の要素のhtmlを「data.articleLikesCount」の値に書き換える\n\n      $this.next('.likesCount').html(data.articleLikesCount); // ここの処理がうまくいっていない？？\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗');\n    });\n    return false;\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheGxpa2UuanM/ZTcwMSJdLCJuYW1lcyI6WyIkIiwibGlrZUFydGljbGVJZCIsIm9uIiwiJHRoaXMiLCJkYXRhIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwidHlwZSIsImRvbmUiLCJ0b2dnbGVDbGFzcyIsIm5leHQiLCJodG1sIiwiYXJ0aWNsZUxpa2VzQ291bnQiLCJmYWlsIiwieGhyIiwiZXJyIiwiY29uc29sZSIsImxvZyIsImFsZXJ0Il0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLFlBQVk7QUFDVixNQUFJQyxhQUFKO0FBRUFELEdBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCRSxFQUFyQixDQUF3QixPQUF4QixFQUFpQyxZQUFZO0FBQ3pDLFFBQUlDLEtBQUssR0FBR0gsQ0FBQyxDQUFDLElBQUQsQ0FBYjtBQUNBQyxpQkFBYSxHQUFHRSxLQUFLLENBQUNDLElBQU4sQ0FBVyxXQUFYLENBQWhCLENBRnlDLENBRUE7O0FBRXpDSixLQUFDLENBQUNLLElBQUYsQ0FBTztBQUNIQyxhQUFPLEVBQUU7QUFDTCx3QkFBZ0JOLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCTyxJQUE3QixDQUFrQyxTQUFsQyxDQURYLENBQ3dEOztBQUR4RCxPQUROO0FBSUhDLFNBQUcsRUFBRSxXQUpGO0FBSWU7QUFDbEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEwsVUFBSSxFQUFFO0FBQ0Ysc0JBQWNILGFBRFosQ0FDMEI7O0FBRDFCO0FBTkgsS0FBUCxFQVdJO0FBWEosS0FZS1MsSUFaTCxDQVlVLFVBQVVOLElBQVYsRUFBZ0I7QUFDbEI7QUFDQUQsV0FBSyxDQUFDUSxXQUFOLENBQWtCLE9BQWxCLEVBRmtCLENBSWxCOztBQUNBUixXQUFLLENBQUNTLElBQU4sQ0FBVyxhQUFYLEVBQTBCQyxJQUExQixDQUErQlQsSUFBSSxDQUFDVSxpQkFBcEMsRUFMa0IsQ0FLc0M7QUFDM0QsS0FsQkwsRUFvQkk7QUFwQkosS0FxQktDLElBckJMLENBcUJVLFVBQVVYLElBQVYsRUFBZ0JZLEdBQWhCLEVBQXFCQyxHQUFyQixFQUEwQjtBQUM1QjtBQUNBQyxhQUFPLENBQUNDLEdBQVIsQ0FBWSxLQUFaO0FBQ0FELGFBQU8sQ0FBQ0MsR0FBUixDQUFZRixHQUFaO0FBQ0FDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZSCxHQUFaO0FBQ0FJLFdBQUssQ0FBQyxhQUFELENBQUw7QUFDSCxLQTNCTDtBQTZCQSxXQUFPLEtBQVA7QUFDSCxHQWxDRDtBQW1DSCxDQXRDQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FqYXhsaWtlLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGxpa2VBcnRpY2xlSWQ7XG5cbiAgICAkKCcuanMtbGlrZS10b2dnbGUnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgICAgIGxpa2VBcnRpY2xlSWQgPSAkdGhpcy5kYXRhKCdhcnRpY2xlaWQnKTsgLy8gVmlld+OBi+OCiWRhdGEtYXJ0aWNsZWlk5Y+X44GR5Y+W44Gj44Gf77yfXG5cbiAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKSAvLyBDU1JG44OI44O844Kv44Oz44Gu6Kit5a6aXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgdXJsOiAnL2FqYXhsaWtlJywgLy8gUm91dGVz44Gu6KiY6L+wKHdlYi5waHDjgajlkIjjgo/jgZvjgospXG4gICAgICAgICAgICB0eXBlOiAnUE9TVCcsIC8vIOODquOCr+OCqOOCueODiOOCv+OCpOODlyhHRVTjgoLjgYLjgospXG4gICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgJ2FydGljbGVfaWQnOiBsaWtlQXJ0aWNsZUlkIC8vIENvbnRyb2xsZXLjga4kcmVxdWVzdOOBq+a4oeOBmeODkeODqeODoeODvOOCvygkcmVxdWVzdC0+YXJ0aWNsZV9pZOOBqOOBl+OBpuS9v+OBhilcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzmiJDlip/jgZfjgZ/loLTlkIjjga7lh6bnkIYo5byV5pWw44GuZGF0YeOBr0NvbnRyb2xsZXLjgYvjgonov5TjgZXjgozjgZ/lgKTjgYzlhaXjgospXG4gICAgICAgICAgICAuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIC8vIGxvdmVk44Kv44Op44K544KS6L+95Yqg44GZ44KLXG4gICAgICAgICAgICAgICAgJHRoaXMudG9nZ2xlQ2xhc3MoJ2xvdmVkJyk7XG5cbiAgICAgICAgICAgICAgICAvLyAubGlrZXNDb3VudOOBruasoeOBruimgee0oOOBrmh0bWzjgpLjgIxkYXRhLmFydGljbGVMaWtlc0NvdW5044CN44Gu5YCk44Gr5pu444GN5o+b44GI44KLXG4gICAgICAgICAgICAgICAgJHRoaXMubmV4dCgnLmxpa2VzQ291bnQnKS5odG1sKGRhdGEuYXJ0aWNsZUxpa2VzQ291bnQpOyAvLyDjgZPjgZPjga7lh6bnkIbjgYzjgYbjgb7jgY/jgYTjgaPjgabjgYTjgarjgYTvvJ/vvJ9cbiAgICAgICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzlpLHmlZfjgZfjgZ/loLTlkIjjga7lh6bnkIZcbiAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uIChkYXRhLCB4aHIsIGVycikge1xuICAgICAgICAgICAgICAgIC8vIOOCqOODqeODvOODoeODg+OCu+ODvOOCuOOCkuWHuuWKm+OBmeOCi+iomOi/sFxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCfjgqjjg6njg7wnKTtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlcnIpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhocik7XG4gICAgICAgICAgICAgICAgYWxlcnQoJ0FqYXjjg6rjgq/jgqjjgrnjg4jlpLHmlZcnKTtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/ajaxlike.js\n");

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/ajaxlike.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/hiroyukinakajima/Desktop/techboost/myproduct/resources/js/ajaxlike.js */"./resources/js/ajaxlike.js");


/***/ })

/******/ });
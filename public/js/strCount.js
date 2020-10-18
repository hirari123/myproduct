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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/strCount.js":
/*!**********************************!*\
  !*** ./resources/js/strCount.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// フォームの本文の文字数を扱う\n// 文字数制限のバリデーション\n$(\"#post-form\").submit(function () {\n  if ($(\"textarea[name='body']\").val() == '') {\n    alert('投稿文を入力してください');\n    return false;\n  } else if ($(\"textarea[name='body']\").val().length > 120) {\n    alert('投稿文は120文字以内で入力してください');\n    return false;\n  } else {\n    $(\"#post-form\").submit();\n  }\n}); // 文字数のカウントアップ\n// #countUpに対してkeyupイベントをセット\n// テキストエリアの文字数を取得して#count1に文字数を表示させる\n// $(this)は#countUpを指している\n\n$('#countUp').keyup(function () {\n  $('#count1').text($(this).val().length); // 文字数制限を超える場合は文字色を変える\n\n  if ($(this).val().length > 120) {\n    $('#count1').css('color', 'red');\n  } else {\n    $('#count1').css('color', 'white');\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc3RyQ291bnQuanM/YTMwYiJdLCJuYW1lcyI6WyIkIiwic3VibWl0IiwidmFsIiwiYWxlcnQiLCJsZW5ndGgiLCJrZXl1cCIsInRleHQiLCJjc3MiXSwibWFwcGluZ3MiOiJBQUFBO0FBRUE7QUFDQUEsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkMsTUFBaEIsQ0FBdUIsWUFBWTtBQUMvQixNQUFJRCxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkUsR0FBM0IsTUFBb0MsRUFBeEMsRUFBNEM7QUFDeENDLFNBQUssQ0FBQyxjQUFELENBQUw7QUFDQSxXQUFPLEtBQVA7QUFDSCxHQUhELE1BR08sSUFBSUgsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJFLEdBQTNCLEdBQWlDRSxNQUFqQyxHQUEwQyxHQUE5QyxFQUFtRDtBQUN0REQsU0FBSyxDQUFDLHNCQUFELENBQUw7QUFDQSxXQUFPLEtBQVA7QUFDSCxHQUhNLE1BR0E7QUFDSEgsS0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkMsTUFBaEI7QUFDSDtBQUNKLENBVkQsRSxDQVlBO0FBQ0E7QUFDQTtBQUNBOztBQUNBRCxDQUFDLENBQUMsVUFBRCxDQUFELENBQWNLLEtBQWQsQ0FBb0IsWUFBWTtBQUM1QkwsR0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhTSxJQUFiLENBQWtCTixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFFLEdBQVIsR0FBY0UsTUFBaEMsRUFENEIsQ0FHNUI7O0FBQ0EsTUFBS0osQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRRSxHQUFSLEdBQWNFLE1BQWYsR0FBeUIsR0FBN0IsRUFBa0M7QUFDOUJKLEtBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYU8sR0FBYixDQUFpQixPQUFqQixFQUEwQixLQUExQjtBQUNILEdBRkQsTUFFTztBQUNIUCxLQUFDLENBQUMsU0FBRCxDQUFELENBQWFPLEdBQWIsQ0FBaUIsT0FBakIsRUFBMEIsT0FBMUI7QUFDSDtBQUNKLENBVEQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc3RyQ291bnQuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyDjg5Xjgqnjg7zjg6Djga7mnKzmlofjga7mloflrZfmlbDjgpLmibHjgYZcblxuLy8g5paH5a2X5pWw5Yi26ZmQ44Gu44OQ44Oq44OH44O844K344On44OzXG4kKFwiI3Bvc3QtZm9ybVwiKS5zdWJtaXQoZnVuY3Rpb24gKCkge1xuICAgIGlmICgkKFwidGV4dGFyZWFbbmFtZT0nYm9keSddXCIpLnZhbCgpID09ICcnKSB7XG4gICAgICAgIGFsZXJ0KCfmipXnqL/mlofjgpLlhaXlipvjgZfjgabjgY/jgaDjgZXjgYQnKTtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0gZWxzZSBpZiAoJChcInRleHRhcmVhW25hbWU9J2JvZHknXVwiKS52YWwoKS5sZW5ndGggPiAxMjApIHtcbiAgICAgICAgYWxlcnQoJ+aKleeov+aWh+OBrzEyMOaWh+Wtl+S7peWGheOBp+WFpeWKm+OBl+OBpuOBj+OBoOOBleOBhCcpO1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJChcIiNwb3N0LWZvcm1cIikuc3VibWl0KCk7XG4gICAgfVxufSk7XG5cbi8vIOaWh+Wtl+aVsOOBruOCq+OCpuODs+ODiOOCouODg+ODl1xuLy8gI2NvdW50VXDjgavlr77jgZfjgaZrZXl1cOOCpOODmeODs+ODiOOCkuOCu+ODg+ODiFxuLy8g44OG44Kt44K544OI44Ko44Oq44Ki44Gu5paH5a2X5pWw44KS5Y+W5b6X44GX44GmI2NvdW50MeOBq+aWh+Wtl+aVsOOCkuihqOekuuOBleOBm+OCi1xuLy8gJCh0aGlzKeOBryNjb3VudFVw44KS5oyH44GX44Gm44GE44KLXG4kKCcjY291bnRVcCcpLmtleXVwKGZ1bmN0aW9uICgpIHtcbiAgICAkKCcjY291bnQxJykudGV4dCgkKHRoaXMpLnZhbCgpLmxlbmd0aCk7XG5cbiAgICAvLyDmloflrZfmlbDliLbpmZDjgpLotoXjgYjjgovloLTlkIjjga/mloflrZfoibLjgpLlpInjgYjjgotcbiAgICBpZiAoKCQodGhpcykudmFsKCkubGVuZ3RoKSA+IDEyMCkge1xuICAgICAgICAkKCcjY291bnQxJykuY3NzKCdjb2xvcicsICdyZWQnKTtcbiAgICB9IGVsc2Uge1xuICAgICAgICAkKCcjY291bnQxJykuY3NzKCdjb2xvcicsICd3aGl0ZScpO1xuICAgIH1cbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/strCount.js\n");

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/strCount.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/hiroyukinakajima/Desktop/techboost/myproduct/resources/js/strCount.js */"./resources/js/strCount.js");


/***/ })

/******/ });
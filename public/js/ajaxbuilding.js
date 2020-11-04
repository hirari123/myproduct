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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/ajaxbuilding.js":
/*!**************************************!*\
  !*** ./resources/js/ajaxbuilding.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(function () {\n  var bodyWeight;\n  var bodyFatPercentage;\n  $('.js-building-intake').on('keyup', function () {\n    var $this = $(this); // Viewのフォームから受け取る\n\n    bodyWeight = $(\"[name=body_weight]\").val();\n    bodyFatPercentage = $(\"[name=body_fat_percentage]\").val();\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxbuilding',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'body_weight': bodyWeight,\n        'body_fat_percentage': bodyFatPercentage // Controllerの$requestに渡すパラメータ\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // 表の計算結果とhiddenのinputのvalueを書き換える\n      $('.lean-body-mass').html(data['lean_body_mass']);\n      $('[name=\"lean-body-mass\"]').val(data['lean_body_mass']);\n      $('.building-target-calories').html(data['building_target_calories']);\n      $('[name=\"building-target-calories\"]').val(data['building_target_calories']);\n      $('.building-target-protein').html(data['building_target_protein']);\n      $('[name=\"building-target-protein\"]').val(data['building_target_protein']);\n      $('.building-target-lipid').html(data['building_target_lipid']);\n      $('[name=\"building-target-lipid\"]').val(data['building_target_lipid']);\n      $('.building-target-carbohydrate').html(data['building_target_carbohydrate']);\n      $('[name=\"building-target-carbohydrate\"]').val(data['building_target_carbohydrate']);\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗！');\n    });\n    return false;\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheGJ1aWxkaW5nLmpzP2I4NGUiXSwibmFtZXMiOlsiJCIsImJvZHlXZWlnaHQiLCJib2R5RmF0UGVyY2VudGFnZSIsIm9uIiwiJHRoaXMiLCJ2YWwiLCJhamF4IiwiaGVhZGVycyIsImF0dHIiLCJ1cmwiLCJ0eXBlIiwiZGF0YSIsImRvbmUiLCJodG1sIiwiZmFpbCIsInhociIsImVyciIsImNvbnNvbGUiLCJsb2ciLCJhbGVydCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0FBQ1YsTUFBSUMsVUFBSjtBQUNBLE1BQUlDLGlCQUFKO0FBRUFGLEdBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCRyxFQUF6QixDQUE0QixPQUE1QixFQUFxQyxZQUFZO0FBQzdDLFFBQUlDLEtBQUssR0FBR0osQ0FBQyxDQUFDLElBQUQsQ0FBYixDQUQ2QyxDQUU3Qzs7QUFDQUMsY0FBVSxHQUFHRCxDQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkssR0FBeEIsRUFBYjtBQUNBSCxxQkFBaUIsR0FBR0YsQ0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NLLEdBQWhDLEVBQXBCO0FBRUFMLEtBQUMsQ0FBQ00sSUFBRixDQUFPO0FBQ0hDLGFBQU8sRUFBRTtBQUNMLHdCQUFnQlAsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJRLElBQTdCLENBQWtDLFNBQWxDLENBRFgsQ0FDd0Q7O0FBRHhELE9BRE47QUFJSEMsU0FBRyxFQUFFLGVBSkY7QUFJbUI7QUFDdEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEMsVUFBSSxFQUFFO0FBQ0YsdUJBQWVWLFVBRGI7QUFFRiwrQkFBdUJDLGlCQUZyQixDQUV3Qzs7QUFGeEM7QUFOSCxLQUFQLEVBWUk7QUFaSixLQWFLVSxJQWJMLENBYVUsVUFBVUQsSUFBVixFQUFnQjtBQUNsQjtBQUNBWCxPQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQmEsSUFBckIsQ0FBMEJGLElBQUksQ0FBQyxnQkFBRCxDQUE5QjtBQUNBWCxPQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkssR0FBN0IsQ0FBaUNNLElBQUksQ0FBQyxnQkFBRCxDQUFyQztBQUNBWCxPQUFDLENBQUMsMkJBQUQsQ0FBRCxDQUErQmEsSUFBL0IsQ0FBb0NGLElBQUksQ0FBQywwQkFBRCxDQUF4QztBQUNBWCxPQUFDLENBQUMsbUNBQUQsQ0FBRCxDQUF1Q0ssR0FBdkMsQ0FBMkNNLElBQUksQ0FBQywwQkFBRCxDQUEvQztBQUNBWCxPQUFDLENBQUMsMEJBQUQsQ0FBRCxDQUE4QmEsSUFBOUIsQ0FBbUNGLElBQUksQ0FBQyx5QkFBRCxDQUF2QztBQUNBWCxPQUFDLENBQUMsa0NBQUQsQ0FBRCxDQUFzQ0ssR0FBdEMsQ0FBMENNLElBQUksQ0FBQyx5QkFBRCxDQUE5QztBQUNBWCxPQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QmEsSUFBNUIsQ0FBaUNGLElBQUksQ0FBQyx1QkFBRCxDQUFyQztBQUNBWCxPQUFDLENBQUMsZ0NBQUQsQ0FBRCxDQUFvQ0ssR0FBcEMsQ0FBd0NNLElBQUksQ0FBQyx1QkFBRCxDQUE1QztBQUNBWCxPQUFDLENBQUMsK0JBQUQsQ0FBRCxDQUFtQ2EsSUFBbkMsQ0FBd0NGLElBQUksQ0FBQyw4QkFBRCxDQUE1QztBQUNBWCxPQUFDLENBQUMsdUNBQUQsQ0FBRCxDQUEyQ0ssR0FBM0MsQ0FBK0NNLElBQUksQ0FBQyw4QkFBRCxDQUFuRDtBQUNILEtBekJMLEVBMkJJO0FBM0JKLEtBNEJLRyxJQTVCTCxDQTRCVSxVQUFVSCxJQUFWLEVBQWdCSSxHQUFoQixFQUFxQkMsR0FBckIsRUFBMEI7QUFDNUI7QUFDQUMsYUFBTyxDQUFDQyxHQUFSLENBQVksS0FBWjtBQUNBRCxhQUFPLENBQUNDLEdBQVIsQ0FBWUYsR0FBWjtBQUNBQyxhQUFPLENBQUNDLEdBQVIsQ0FBWUgsR0FBWjtBQUNBSSxXQUFLLENBQUMsY0FBRCxDQUFMO0FBQ0gsS0FsQ0w7QUFvQ0EsV0FBTyxLQUFQO0FBQ0gsR0EzQ0Q7QUE0Q0gsQ0FoREEsQ0FBRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hamF4YnVpbGRpbmcuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uICgpIHtcbiAgICB2YXIgYm9keVdlaWdodDtcbiAgICB2YXIgYm9keUZhdFBlcmNlbnRhZ2U7XG5cbiAgICAkKCcuanMtYnVpbGRpbmctaW50YWtlJykub24oJ2tleXVwJywgZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgICAgICAvLyBWaWV344Gu44OV44Kp44O844Og44GL44KJ5Y+X44GR5Y+W44KLXG4gICAgICAgIGJvZHlXZWlnaHQgPSAkKFwiW25hbWU9Ym9keV93ZWlnaHRdXCIpLnZhbCgpO1xuICAgICAgICBib2R5RmF0UGVyY2VudGFnZSA9ICQoXCJbbmFtZT1ib2R5X2ZhdF9wZXJjZW50YWdlXVwiKS52YWwoKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpIC8vIENTUkbjg4jjg7zjgq/jg7Pjga7oqK3lrppcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB1cmw6ICcvYWpheGJ1aWxkaW5nJywgLy8gUm91dGVz44Gu6KiY6L+wKHdlYi5waHDjgajlkIjjgo/jgZvjgospXG4gICAgICAgICAgICB0eXBlOiAnUE9TVCcsIC8vIOODquOCr+OCqOOCueODiOOCv+OCpOODlyhHRVTjgoLjgYLjgospXG4gICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgJ2JvZHlfd2VpZ2h0JzogYm9keVdlaWdodCxcbiAgICAgICAgICAgICAgICAnYm9keV9mYXRfcGVyY2VudGFnZSc6IGJvZHlGYXRQZXJjZW50YWdlLCAvLyBDb250cm9sbGVy44GuJHJlcXVlc3TjgavmuKHjgZnjg5Hjg6njg6Hjg7zjgr9cbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzmiJDlip/jgZfjgZ/loLTlkIjjga7lh6bnkIYo5byV5pWw44GuZGF0YeOBr0NvbnRyb2xsZXLjgYvjgonov5TjgZXjgozjgZ/lgKTjgYzlhaXjgospXG4gICAgICAgICAgICAuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIC8vIOihqOOBruioiOeul+e1kOaenOOBqGhpZGRlbuOBrmlucHV044GudmFsdWXjgpLmm7jjgY3mj5vjgYjjgotcbiAgICAgICAgICAgICAgICAkKCcubGVhbi1ib2R5LW1hc3MnKS5odG1sKGRhdGFbJ2xlYW5fYm9keV9tYXNzJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwibGVhbi1ib2R5LW1hc3NcIl0nKS52YWwoZGF0YVsnbGVhbl9ib2R5X21hc3MnXSk7XG4gICAgICAgICAgICAgICAgJCgnLmJ1aWxkaW5nLXRhcmdldC1jYWxvcmllcycpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhbG9yaWVzJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LWNhbG9yaWVzXCJdJykudmFsKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9jYWxvcmllcyddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LXByb3RlaW4nKS5odG1sKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9wcm90ZWluJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LXByb3RlaW5cIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X3Byb3RlaW4nXSk7XG4gICAgICAgICAgICAgICAgJCgnLmJ1aWxkaW5nLXRhcmdldC1saXBpZCcpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2xpcGlkJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LWxpcGlkXCJdJykudmFsKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9saXBpZCddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LWNhcmJvaHlkcmF0ZScpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhcmJvaHlkcmF0ZSddKTtcbiAgICAgICAgICAgICAgICAkKCdbbmFtZT1cImJ1aWxkaW5nLXRhcmdldC1jYXJib2h5ZHJhdGVcIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhcmJvaHlkcmF0ZSddKTtcbiAgICAgICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzlpLHmlZfjgZfjgZ/loLTlkIjjga7lh6bnkIZcbiAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uIChkYXRhLCB4aHIsIGVycikge1xuICAgICAgICAgICAgICAgIC8vIOOCqOODqeODvOODoeODg+OCu+ODvOOCuOOCkuWHuuWKm+OBmeOCi+iomOi/sFxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCfjgqjjg6njg7wnKTtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlcnIpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhocik7XG4gICAgICAgICAgICAgICAgYWxlcnQoJ0FqYXjjg6rjgq/jgqjjgrnjg4jlpLHmlZfvvIEnKTtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/ajaxbuilding.js\n");

/***/ }),

/***/ 4:
/*!********************************************!*\
  !*** multi ./resources/js/ajaxbuilding.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/hiroyukinakajima/Desktop/techboost/myproduct/resources/js/ajaxbuilding.js */"./resources/js/ajaxbuilding.js");


/***/ })

/******/ });
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

eval("$(function () {\n  var bodyWeight;\n  var bodyFatPercentage;\n  $('.js-building-intake').on('change mouseover', function () {\n    // Viewのフォームから受け取る\n    bodyWeight = $(\"[name=body_weight]\").val();\n    bodyFatPercentage = $(\"[name=body_fat_percentage]\").val();\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxbuilding',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'body_weight': bodyWeight,\n        'body_fat_percentage': bodyFatPercentage // Controllerの$requestに渡すパラメータ\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // 表の計算結果とhiddenのinputのvalueを書き換える\n      $('.lean-body-mass').html(data['lean_body_mass']);\n      $('[name=\"lean-body-mass\"]').val(data['lean_body_mass']);\n      $('.building-target-calories').html(data['building_target_calories']);\n      $('[name=\"building-target-calories\"]').val(data['building_target_calories']);\n      $('.building-target-protein').html(data['building_target_protein']);\n      $('[name=\"building-target-protein\"]').val(data['building_target_protein']);\n      $('.building-target-lipid').html(data['building_target_lipid']);\n      $('[name=\"building-target-lipid\"]').val(data['building_target_lipid']);\n      $('.building-target-carbohydrate').html(data['building_target_carbohydrate']);\n      $('[name=\"building-target-carbohydrate\"]').val(data['building_target_carbohydrate']);\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗！');\n    });\n    return false;\n  }); // 未計算でフォーム送信した時のバリデーション\n\n  $(\"#js_building_submit\").submit(function () {\n    if ($(\"input[name='building-target-calories']\").val() == 0) {\n      alert('未計算です。現在の体重と体脂肪率を設定してください。');\n      return false;\n    } else {\n      $(\"js_building_submit\").submit();\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheGJ1aWxkaW5nLmpzP2I4NGUiXSwibmFtZXMiOlsiJCIsImJvZHlXZWlnaHQiLCJib2R5RmF0UGVyY2VudGFnZSIsIm9uIiwidmFsIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwidHlwZSIsImRhdGEiLCJkb25lIiwiaHRtbCIsImZhaWwiLCJ4aHIiLCJlcnIiLCJjb25zb2xlIiwibG9nIiwiYWxlcnQiLCJzdWJtaXQiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsWUFBWTtBQUNWLE1BQUlDLFVBQUo7QUFDQSxNQUFJQyxpQkFBSjtBQUVBRixHQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QkcsRUFBekIsQ0FBNEIsa0JBQTVCLEVBQWdELFlBQVk7QUFDeEQ7QUFDQUYsY0FBVSxHQUFHRCxDQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkksR0FBeEIsRUFBYjtBQUNBRixxQkFBaUIsR0FBR0YsQ0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NJLEdBQWhDLEVBQXBCO0FBRUFKLEtBQUMsQ0FBQ0ssSUFBRixDQUFPO0FBQ0hDLGFBQU8sRUFBRTtBQUNMLHdCQUFnQk4sQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJPLElBQTdCLENBQWtDLFNBQWxDLENBRFgsQ0FDd0Q7O0FBRHhELE9BRE47QUFJSEMsU0FBRyxFQUFFLGVBSkY7QUFJbUI7QUFDdEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEMsVUFBSSxFQUFFO0FBQ0YsdUJBQWVULFVBRGI7QUFFRiwrQkFBdUJDLGlCQUZyQixDQUV3Qzs7QUFGeEM7QUFOSCxLQUFQLEVBWUk7QUFaSixLQWFLUyxJQWJMLENBYVUsVUFBVUQsSUFBVixFQUFnQjtBQUNsQjtBQUNBVixPQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQlksSUFBckIsQ0FBMEJGLElBQUksQ0FBQyxnQkFBRCxDQUE5QjtBQUNBVixPQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkksR0FBN0IsQ0FBaUNNLElBQUksQ0FBQyxnQkFBRCxDQUFyQztBQUNBVixPQUFDLENBQUMsMkJBQUQsQ0FBRCxDQUErQlksSUFBL0IsQ0FBb0NGLElBQUksQ0FBQywwQkFBRCxDQUF4QztBQUNBVixPQUFDLENBQUMsbUNBQUQsQ0FBRCxDQUF1Q0ksR0FBdkMsQ0FBMkNNLElBQUksQ0FBQywwQkFBRCxDQUEvQztBQUNBVixPQUFDLENBQUMsMEJBQUQsQ0FBRCxDQUE4QlksSUFBOUIsQ0FBbUNGLElBQUksQ0FBQyx5QkFBRCxDQUF2QztBQUNBVixPQUFDLENBQUMsa0NBQUQsQ0FBRCxDQUFzQ0ksR0FBdEMsQ0FBMENNLElBQUksQ0FBQyx5QkFBRCxDQUE5QztBQUNBVixPQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlksSUFBNUIsQ0FBaUNGLElBQUksQ0FBQyx1QkFBRCxDQUFyQztBQUNBVixPQUFDLENBQUMsZ0NBQUQsQ0FBRCxDQUFvQ0ksR0FBcEMsQ0FBd0NNLElBQUksQ0FBQyx1QkFBRCxDQUE1QztBQUNBVixPQUFDLENBQUMsK0JBQUQsQ0FBRCxDQUFtQ1ksSUFBbkMsQ0FBd0NGLElBQUksQ0FBQyw4QkFBRCxDQUE1QztBQUNBVixPQUFDLENBQUMsdUNBQUQsQ0FBRCxDQUEyQ0ksR0FBM0MsQ0FBK0NNLElBQUksQ0FBQyw4QkFBRCxDQUFuRDtBQUNILEtBekJMLEVBMkJJO0FBM0JKLEtBNEJLRyxJQTVCTCxDQTRCVSxVQUFVSCxJQUFWLEVBQWdCSSxHQUFoQixFQUFxQkMsR0FBckIsRUFBMEI7QUFDNUI7QUFDQUMsYUFBTyxDQUFDQyxHQUFSLENBQVksS0FBWjtBQUNBRCxhQUFPLENBQUNDLEdBQVIsQ0FBWUYsR0FBWjtBQUNBQyxhQUFPLENBQUNDLEdBQVIsQ0FBWUgsR0FBWjtBQUNBSSxXQUFLLENBQUMsY0FBRCxDQUFMO0FBQ0gsS0FsQ0w7QUFvQ0EsV0FBTyxLQUFQO0FBQ0gsR0ExQ0QsRUFKVSxDQWdEVjs7QUFDQWxCLEdBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCbUIsTUFBekIsQ0FBZ0MsWUFBWTtBQUN4QyxRQUFJbkIsQ0FBQyxDQUFDLHdDQUFELENBQUQsQ0FBNENJLEdBQTVDLE1BQXFELENBQXpELEVBQTREO0FBQ3hEYyxXQUFLLENBQUMsNEJBQUQsQ0FBTDtBQUNBLGFBQU8sS0FBUDtBQUNILEtBSEQsTUFHTztBQUNIbEIsT0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JtQixNQUF4QjtBQUNIO0FBQ0osR0FQRDtBQVFILENBekRBLENBQUQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYWpheGJ1aWxkaW5nLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGJvZHlXZWlnaHQ7XG4gICAgdmFyIGJvZHlGYXRQZXJjZW50YWdlO1xuXG4gICAgJCgnLmpzLWJ1aWxkaW5nLWludGFrZScpLm9uKCdjaGFuZ2UgbW91c2VvdmVyJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAvLyBWaWV344Gu44OV44Kp44O844Og44GL44KJ5Y+X44GR5Y+W44KLXG4gICAgICAgIGJvZHlXZWlnaHQgPSAkKFwiW25hbWU9Ym9keV93ZWlnaHRdXCIpLnZhbCgpO1xuICAgICAgICBib2R5RmF0UGVyY2VudGFnZSA9ICQoXCJbbmFtZT1ib2R5X2ZhdF9wZXJjZW50YWdlXVwiKS52YWwoKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpIC8vIENTUkbjg4jjg7zjgq/jg7Pjga7oqK3lrppcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB1cmw6ICcvYWpheGJ1aWxkaW5nJywgLy8gUm91dGVz44Gu6KiY6L+wKHdlYi5waHDjgajlkIjjgo/jgZvjgospXG4gICAgICAgICAgICB0eXBlOiAnUE9TVCcsIC8vIOODquOCr+OCqOOCueODiOOCv+OCpOODlyhHRVTjgoLjgYLjgospXG4gICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgJ2JvZHlfd2VpZ2h0JzogYm9keVdlaWdodCxcbiAgICAgICAgICAgICAgICAnYm9keV9mYXRfcGVyY2VudGFnZSc6IGJvZHlGYXRQZXJjZW50YWdlLCAvLyBDb250cm9sbGVy44GuJHJlcXVlc3TjgavmuKHjgZnjg5Hjg6njg6Hjg7zjgr9cbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzmiJDlip/jgZfjgZ/loLTlkIjjga7lh6bnkIYo5byV5pWw44GuZGF0YeOBr0NvbnRyb2xsZXLjgYvjgonov5TjgZXjgozjgZ/lgKTjgYzlhaXjgospXG4gICAgICAgICAgICAuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIC8vIOihqOOBruioiOeul+e1kOaenOOBqGhpZGRlbuOBrmlucHV044GudmFsdWXjgpLmm7jjgY3mj5vjgYjjgotcbiAgICAgICAgICAgICAgICAkKCcubGVhbi1ib2R5LW1hc3MnKS5odG1sKGRhdGFbJ2xlYW5fYm9keV9tYXNzJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwibGVhbi1ib2R5LW1hc3NcIl0nKS52YWwoZGF0YVsnbGVhbl9ib2R5X21hc3MnXSk7XG4gICAgICAgICAgICAgICAgJCgnLmJ1aWxkaW5nLXRhcmdldC1jYWxvcmllcycpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhbG9yaWVzJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LWNhbG9yaWVzXCJdJykudmFsKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9jYWxvcmllcyddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LXByb3RlaW4nKS5odG1sKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9wcm90ZWluJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LXByb3RlaW5cIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X3Byb3RlaW4nXSk7XG4gICAgICAgICAgICAgICAgJCgnLmJ1aWxkaW5nLXRhcmdldC1saXBpZCcpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2xpcGlkJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LWxpcGlkXCJdJykudmFsKGRhdGFbJ2J1aWxkaW5nX3RhcmdldF9saXBpZCddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LWNhcmJvaHlkcmF0ZScpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhcmJvaHlkcmF0ZSddKTtcbiAgICAgICAgICAgICAgICAkKCdbbmFtZT1cImJ1aWxkaW5nLXRhcmdldC1jYXJib2h5ZHJhdGVcIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhcmJvaHlkcmF0ZSddKTtcbiAgICAgICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzlpLHmlZfjgZfjgZ/loLTlkIjjga7lh6bnkIZcbiAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uIChkYXRhLCB4aHIsIGVycikge1xuICAgICAgICAgICAgICAgIC8vIOOCqOODqeODvOODoeODg+OCu+ODvOOCuOOCkuWHuuWKm+OBmeOCi+iomOi/sFxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCfjgqjjg6njg7wnKTtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlcnIpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhocik7XG4gICAgICAgICAgICAgICAgYWxlcnQoJ0FqYXjjg6rjgq/jgqjjgrnjg4jlpLHmlZfvvIEnKTtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcblxuICAgIC8vIOacquioiOeul+OBp+ODleOCqeODvOODoOmAgeS/oeOBl+OBn+aZguOBruODkOODquODh+ODvOOCt+ODp+ODs1xuICAgICQoXCIjanNfYnVpbGRpbmdfc3VibWl0XCIpLnN1Ym1pdChmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICgkKFwiaW5wdXRbbmFtZT0nYnVpbGRpbmctdGFyZ2V0LWNhbG9yaWVzJ11cIikudmFsKCkgPT0gMCkge1xuICAgICAgICAgICAgYWxlcnQoJ+acquioiOeul+OBp+OBmeOAguePvuWcqOOBruS9k+mHjeOBqOS9k+iEguiCqueOh+OCkuioreWumuOBl+OBpuOBj+OBoOOBleOBhOOAgicpO1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgJChcImpzX2J1aWxkaW5nX3N1Ym1pdFwiKS5zdWJtaXQoKTtcbiAgICAgICAgfVxuICAgIH0pO1xufSk7Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/ajaxbuilding.js\n");

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
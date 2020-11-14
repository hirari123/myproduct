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

eval("$(function () {\n  var bodyWeight;\n  var bodyFatPercentage;\n  $('.js-building-intake').on('change mouseout', function () {\n    // Viewのフォームから受け取る\n    bodyWeight = $(\"[name=body_weight]\").val();\n    bodyFatPercentage = $(\"[name=body_fat_percentage]\").val();\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxbuilding',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'body_weight': bodyWeight,\n        'body_fat_percentage': bodyFatPercentage // Controllerの$requestに渡すパラメータ\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // 表の計算結果とhiddenのinputのvalueを書き換える\n      $('.lean-body-mass').html(data['lean_body_mass']);\n      $('[name=\"lean-body-mass\"]').val(data['lean_body_mass']);\n      $('.building-target-calories').html(data['building_target_calories']);\n      $('[name=\"building-target-calories\"]').val(data['building_target_calories']);\n      $('.building-target-protein').html(data['building_target_protein']);\n      $('[name=\"building-target-protein\"]').val(data['building_target_protein']);\n      $('.building-target-lipid').html(data['building_target_lipid']);\n      $('[name=\"building-target-lipid\"]').val(data['building_target_lipid']);\n      $('.building-target-carbohydrate').html(data['building_target_carbohydrate']);\n      $('[name=\"building-target-carbohydrate\"]').val(data['building_target_carbohydrate']);\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗！');\n    });\n    return false;\n  }); // 未計算でフォーム送信した時のバリデーション\n\n  $(\"#js_building_submit\").submit(function () {\n    if ($(\"input[name='building-target-calories']\").val() == 0) {\n      alert('未計算です。現在の体重と体脂肪率を設定してください。');\n      return false;\n    } else {\n      $(\"js_building_submit\").submit();\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheGJ1aWxkaW5nLmpzP2I4NGUiXSwibmFtZXMiOlsiJCIsImJvZHlXZWlnaHQiLCJib2R5RmF0UGVyY2VudGFnZSIsIm9uIiwidmFsIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwidHlwZSIsImRhdGEiLCJkb25lIiwiaHRtbCIsImZhaWwiLCJ4aHIiLCJlcnIiLCJjb25zb2xlIiwibG9nIiwiYWxlcnQiLCJzdWJtaXQiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsWUFBWTtBQUNWLE1BQUlDLFVBQUo7QUFDQSxNQUFJQyxpQkFBSjtBQUVBRixHQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QkcsRUFBekIsQ0FBNEIsaUJBQTVCLEVBQStDLFlBQVk7QUFDdkQ7QUFDQUYsY0FBVSxHQUFHRCxDQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkksR0FBeEIsRUFBYjtBQUNBRixxQkFBaUIsR0FBR0YsQ0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NJLEdBQWhDLEVBQXBCO0FBRUFKLEtBQUMsQ0FBQ0ssSUFBRixDQUFPO0FBQ0hDLGFBQU8sRUFBRTtBQUNMLHdCQUFnQk4sQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJPLElBQTdCLENBQWtDLFNBQWxDLENBRFgsQ0FDd0Q7O0FBRHhELE9BRE47QUFJSEMsU0FBRyxFQUFFLGVBSkY7QUFJbUI7QUFDdEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEMsVUFBSSxFQUFFO0FBQ0YsdUJBQWVULFVBRGI7QUFFRiwrQkFBdUJDLGlCQUZyQixDQUV3Qzs7QUFGeEM7QUFOSCxLQUFQLEVBWUk7QUFaSixLQWFLUyxJQWJMLENBYVUsVUFBVUQsSUFBVixFQUFnQjtBQUNsQjtBQUNBVixPQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQlksSUFBckIsQ0FBMEJGLElBQUksQ0FBQyxnQkFBRCxDQUE5QjtBQUNBVixPQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkksR0FBN0IsQ0FBaUNNLElBQUksQ0FBQyxnQkFBRCxDQUFyQztBQUNBVixPQUFDLENBQUMsMkJBQUQsQ0FBRCxDQUErQlksSUFBL0IsQ0FBb0NGLElBQUksQ0FBQywwQkFBRCxDQUF4QztBQUNBVixPQUFDLENBQUMsbUNBQUQsQ0FBRCxDQUF1Q0ksR0FBdkMsQ0FBMkNNLElBQUksQ0FBQywwQkFBRCxDQUEvQztBQUNBVixPQUFDLENBQUMsMEJBQUQsQ0FBRCxDQUE4QlksSUFBOUIsQ0FBbUNGLElBQUksQ0FBQyx5QkFBRCxDQUF2QztBQUNBVixPQUFDLENBQUMsa0NBQUQsQ0FBRCxDQUFzQ0ksR0FBdEMsQ0FBMENNLElBQUksQ0FBQyx5QkFBRCxDQUE5QztBQUNBVixPQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QlksSUFBNUIsQ0FBaUNGLElBQUksQ0FBQyx1QkFBRCxDQUFyQztBQUNBVixPQUFDLENBQUMsZ0NBQUQsQ0FBRCxDQUFvQ0ksR0FBcEMsQ0FBd0NNLElBQUksQ0FBQyx1QkFBRCxDQUE1QztBQUNBVixPQUFDLENBQUMsK0JBQUQsQ0FBRCxDQUFtQ1ksSUFBbkMsQ0FBd0NGLElBQUksQ0FBQyw4QkFBRCxDQUE1QztBQUNBVixPQUFDLENBQUMsdUNBQUQsQ0FBRCxDQUEyQ0ksR0FBM0MsQ0FBK0NNLElBQUksQ0FBQyw4QkFBRCxDQUFuRDtBQUNILEtBekJMLEVBMkJJO0FBM0JKLEtBNEJLRyxJQTVCTCxDQTRCVSxVQUFVSCxJQUFWLEVBQWdCSSxHQUFoQixFQUFxQkMsR0FBckIsRUFBMEI7QUFDNUI7QUFDQUMsYUFBTyxDQUFDQyxHQUFSLENBQVksS0FBWjtBQUNBRCxhQUFPLENBQUNDLEdBQVIsQ0FBWUYsR0FBWjtBQUNBQyxhQUFPLENBQUNDLEdBQVIsQ0FBWUgsR0FBWjtBQUNBSSxXQUFLLENBQUMsY0FBRCxDQUFMO0FBQ0gsS0FsQ0w7QUFvQ0EsV0FBTyxLQUFQO0FBQ0gsR0ExQ0QsRUFKVSxDQWdEVjs7QUFDQWxCLEdBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCbUIsTUFBekIsQ0FBZ0MsWUFBWTtBQUN4QyxRQUFJbkIsQ0FBQyxDQUFDLHdDQUFELENBQUQsQ0FBNENJLEdBQTVDLE1BQXFELENBQXpELEVBQTREO0FBQ3hEYyxXQUFLLENBQUMsNEJBQUQsQ0FBTDtBQUNBLGFBQU8sS0FBUDtBQUNILEtBSEQsTUFHTztBQUNIbEIsT0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JtQixNQUF4QjtBQUNIO0FBQ0osR0FQRDtBQVFILENBekRBLENBQUQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYWpheGJ1aWxkaW5nLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGJvZHlXZWlnaHQ7XG4gICAgdmFyIGJvZHlGYXRQZXJjZW50YWdlO1xuXG4gICAgJCgnLmpzLWJ1aWxkaW5nLWludGFrZScpLm9uKCdjaGFuZ2UgbW91c2VvdXQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIC8vIFZpZXfjga7jg5Xjgqnjg7zjg6DjgYvjgonlj5fjgZHlj5bjgotcbiAgICAgICAgYm9keVdlaWdodCA9ICQoXCJbbmFtZT1ib2R5X3dlaWdodF1cIikudmFsKCk7XG4gICAgICAgIGJvZHlGYXRQZXJjZW50YWdlID0gJChcIltuYW1lPWJvZHlfZmF0X3BlcmNlbnRhZ2VdXCIpLnZhbCgpO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykgLy8gQ1NSRuODiOODvOOCr+ODs+OBruioreWumlxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHVybDogJy9hamF4YnVpbGRpbmcnLCAvLyBSb3V0ZXPjga7oqJjov7Aod2ViLnBocOOBqOWQiOOCj+OBm+OCiylcbiAgICAgICAgICAgIHR5cGU6ICdQT1NUJywgLy8g44Oq44Kv44Ko44K544OI44K/44Kk44OXKEdFVOOCguOBguOCiylcbiAgICAgICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgICAgICAnYm9keV93ZWlnaHQnOiBib2R5V2VpZ2h0LFxuICAgICAgICAgICAgICAgICdib2R5X2ZhdF9wZXJjZW50YWdlJzogYm9keUZhdFBlcmNlbnRhZ2UsIC8vIENvbnRyb2xsZXLjga4kcmVxdWVzdOOBq+a4oeOBmeODkeODqeODoeODvOOCv1xuICAgICAgICAgICAgfSxcbiAgICAgICAgfSlcblxuICAgICAgICAgICAgLy8gQWpheOODquOCr+OCqOOCueODiOOBjOaIkOWKn+OBl+OBn+WgtOWQiOOBruWHpueQhijlvJXmlbDjga5kYXRh44GvQ29udHJvbGxlcuOBi+OCiei/lOOBleOCjOOBn+WApOOBjOWFpeOCiylcbiAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAgICAgLy8g6KGo44Gu6KiI566X57WQ5p6c44GoaGlkZGVu44GuaW5wdXTjga52YWx1ZeOCkuabuOOBjeaPm+OBiOOCi1xuICAgICAgICAgICAgICAgICQoJy5sZWFuLWJvZHktbWFzcycpLmh0bWwoZGF0YVsnbGVhbl9ib2R5X21hc3MnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJsZWFuLWJvZHktbWFzc1wiXScpLnZhbChkYXRhWydsZWFuX2JvZHlfbWFzcyddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LWNhbG9yaWVzJykuaHRtbChkYXRhWydidWlsZGluZ190YXJnZXRfY2Fsb3JpZXMnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJidWlsZGluZy10YXJnZXQtY2Fsb3JpZXNcIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2NhbG9yaWVzJ10pO1xuICAgICAgICAgICAgICAgICQoJy5idWlsZGluZy10YXJnZXQtcHJvdGVpbicpLmh0bWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X3Byb3RlaW4nXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJidWlsZGluZy10YXJnZXQtcHJvdGVpblwiXScpLnZhbChkYXRhWydidWlsZGluZ190YXJnZXRfcHJvdGVpbiddKTtcbiAgICAgICAgICAgICAgICAkKCcuYnVpbGRpbmctdGFyZ2V0LWxpcGlkJykuaHRtbChkYXRhWydidWlsZGluZ190YXJnZXRfbGlwaWQnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJidWlsZGluZy10YXJnZXQtbGlwaWRcIl0nKS52YWwoZGF0YVsnYnVpbGRpbmdfdGFyZ2V0X2xpcGlkJ10pO1xuICAgICAgICAgICAgICAgICQoJy5idWlsZGluZy10YXJnZXQtY2FyYm9oeWRyYXRlJykuaHRtbChkYXRhWydidWlsZGluZ190YXJnZXRfY2FyYm9oeWRyYXRlJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwiYnVpbGRpbmctdGFyZ2V0LWNhcmJvaHlkcmF0ZVwiXScpLnZhbChkYXRhWydidWlsZGluZ190YXJnZXRfY2FyYm9oeWRyYXRlJ10pO1xuICAgICAgICAgICAgfSlcblxuICAgICAgICAgICAgLy8gQWpheOODquOCr+OCqOOCueODiOOBjOWkseaVl+OBl+OBn+WgtOWQiOOBruWHpueQhlxuICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24gKGRhdGEsIHhociwgZXJyKSB7XG4gICAgICAgICAgICAgICAgLy8g44Ko44Op44O844Oh44OD44K744O844K444KS5Ye65Yqb44GZ44KL6KiY6L+wXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ+OCqOODqeODvCcpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycik7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coeGhyKTtcbiAgICAgICAgICAgICAgICBhbGVydCgnQWpheOODquOCr+OCqOOCueODiOWkseaVl++8gScpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xuXG4gICAgLy8g5pyq6KiI566X44Gn44OV44Kp44O844Og6YCB5L+h44GX44Gf5pmC44Gu44OQ44Oq44OH44O844K344On44OzXG4gICAgJChcIiNqc19idWlsZGluZ19zdWJtaXRcIikuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCQoXCJpbnB1dFtuYW1lPSdidWlsZGluZy10YXJnZXQtY2Fsb3JpZXMnXVwiKS52YWwoKSA9PSAwKSB7XG4gICAgICAgICAgICBhbGVydCgn5pyq6KiI566X44Gn44GZ44CC54++5Zyo44Gu5L2T6YeN44Go5L2T6ISC6IKq546H44KS6Kit5a6a44GX44Gm44GP44Gg44GV44GE44CCJyk7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAkKFwianNfYnVpbGRpbmdfc3VibWl0XCIpLnN1Ym1pdCgpO1xuICAgICAgICB9XG4gICAgfSk7XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/ajaxbuilding.js\n");

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
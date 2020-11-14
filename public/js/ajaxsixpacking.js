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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/ajaxsixpacking.js":
/*!****************************************!*\
  !*** ./resources/js/ajaxsixpacking.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(function () {\n  var bodyWeight;\n  $('.js-sixpacking-intake').on('change mouseout', function () {\n    // Viewのフォームから受け取る\n    bodyWeight = $(\"[name=body_weight]\").val();\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxsixpacking',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'body_weight': bodyWeight // Controllerの$requestに渡すパラメータ\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // 表の計算結果とhiddenのinputのvalueを書き換える\n      $('.sixpacking-target-calories').html(data['sixpacking_target_calories']);\n      $('[name=\"sixpacking-target-calories\"]').val(data['sixpacking_target_calories']);\n      $('.sixpacking-target-protein').html(data['sixpacking_target_protein']);\n      $('[name=\"sixpacking-target-protein\"]').val(data['sixpacking_target_protein']);\n      $('.sixpacking-target-lipid').html(data['sixpacking_target_lipid']);\n      $('[name=\"sixpacking-target-lipid\"]').val(data['sixpacking_target_lipid']);\n      $('.sixpacking-target-carbohydrate').html(data['sixpacking_target_carbohydrate']);\n      $('[name=\"sixpacking-target-carbohydrate\"]').val(data['sixpacking_target_carbohydrate']);\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗！');\n    });\n    return false;\n  }); // 未計算でフォーム送信した時のバリデーション\n\n  $(\"#js_sixpacking_submit\").submit(function () {\n    if ($(\"input[name='sixpacking-target-calories']\").val() == 0) {\n      alert('未計算です。現在の体重を設定してください。');\n      return false;\n    } else {\n      $(\"js_sixpacking_submit\").submit();\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheHNpeHBhY2tpbmcuanM/MzFkZiJdLCJuYW1lcyI6WyIkIiwiYm9keVdlaWdodCIsIm9uIiwidmFsIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwidHlwZSIsImRhdGEiLCJkb25lIiwiaHRtbCIsImZhaWwiLCJ4aHIiLCJlcnIiLCJjb25zb2xlIiwibG9nIiwiYWxlcnQiLCJzdWJtaXQiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsWUFBWTtBQUNWLE1BQUlDLFVBQUo7QUFFQUQsR0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJFLEVBQTNCLENBQThCLGlCQUE5QixFQUFpRCxZQUFZO0FBQ3pEO0FBQ0FELGNBQVUsR0FBR0QsQ0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JHLEdBQXhCLEVBQWI7QUFFQUgsS0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSEMsYUFBTyxFQUFFO0FBQ0wsd0JBQWdCTCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2Qk0sSUFBN0IsQ0FBa0MsU0FBbEMsQ0FEWCxDQUN3RDs7QUFEeEQsT0FETjtBQUlIQyxTQUFHLEVBQUUsaUJBSkY7QUFJcUI7QUFDeEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEMsVUFBSSxFQUFFO0FBQ0YsdUJBQWVSLFVBRGIsQ0FDd0I7O0FBRHhCO0FBTkgsS0FBUCxFQVdJO0FBWEosS0FZS1MsSUFaTCxDQVlVLFVBQVVELElBQVYsRUFBZ0I7QUFDbEI7QUFDQVQsT0FBQyxDQUFDLDZCQUFELENBQUQsQ0FBaUNXLElBQWpDLENBQXNDRixJQUFJLENBQUMsNEJBQUQsQ0FBMUM7QUFDQVQsT0FBQyxDQUFDLHFDQUFELENBQUQsQ0FBeUNHLEdBQXpDLENBQTZDTSxJQUFJLENBQUMsNEJBQUQsQ0FBakQ7QUFDQVQsT0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NXLElBQWhDLENBQXFDRixJQUFJLENBQUMsMkJBQUQsQ0FBekM7QUFDQVQsT0FBQyxDQUFDLG9DQUFELENBQUQsQ0FBd0NHLEdBQXhDLENBQTRDTSxJQUFJLENBQUMsMkJBQUQsQ0FBaEQ7QUFDQVQsT0FBQyxDQUFDLDBCQUFELENBQUQsQ0FBOEJXLElBQTlCLENBQW1DRixJQUFJLENBQUMseUJBQUQsQ0FBdkM7QUFDQVQsT0FBQyxDQUFDLGtDQUFELENBQUQsQ0FBc0NHLEdBQXRDLENBQTBDTSxJQUFJLENBQUMseUJBQUQsQ0FBOUM7QUFDQVQsT0FBQyxDQUFDLGlDQUFELENBQUQsQ0FBcUNXLElBQXJDLENBQTBDRixJQUFJLENBQUMsZ0NBQUQsQ0FBOUM7QUFDQVQsT0FBQyxDQUFDLHlDQUFELENBQUQsQ0FBNkNHLEdBQTdDLENBQWlETSxJQUFJLENBQUMsZ0NBQUQsQ0FBckQ7QUFDSCxLQXRCTCxFQXdCSTtBQXhCSixLQXlCS0csSUF6QkwsQ0F5QlUsVUFBVUgsSUFBVixFQUFnQkksR0FBaEIsRUFBcUJDLEdBQXJCLEVBQTBCO0FBQzVCO0FBQ0FDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLEtBQVo7QUFDQUQsYUFBTyxDQUFDQyxHQUFSLENBQVlGLEdBQVo7QUFDQUMsYUFBTyxDQUFDQyxHQUFSLENBQVlILEdBQVo7QUFDQUksV0FBSyxDQUFDLGNBQUQsQ0FBTDtBQUNILEtBL0JMO0FBaUNBLFdBQU8sS0FBUDtBQUNILEdBdENELEVBSFUsQ0EyQ1Y7O0FBQ0FqQixHQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQmtCLE1BQTNCLENBQWtDLFlBQVk7QUFDMUMsUUFBSWxCLENBQUMsQ0FBQywwQ0FBRCxDQUFELENBQThDRyxHQUE5QyxNQUF1RCxDQUEzRCxFQUE4RDtBQUMxRGMsV0FBSyxDQUFDLHVCQUFELENBQUw7QUFDQSxhQUFPLEtBQVA7QUFDSCxLQUhELE1BR087QUFDSGpCLE9BQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCa0IsTUFBMUI7QUFDSDtBQUNKLEdBUEQ7QUFRSCxDQXBEQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FqYXhzaXhwYWNraW5nLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGJvZHlXZWlnaHQ7XG5cbiAgICAkKCcuanMtc2l4cGFja2luZy1pbnRha2UnKS5vbignY2hhbmdlIG1vdXNlb3V0JywgZnVuY3Rpb24gKCkge1xuICAgICAgICAvLyBWaWV344Gu44OV44Kp44O844Og44GL44KJ5Y+X44GR5Y+W44KLXG4gICAgICAgIGJvZHlXZWlnaHQgPSAkKFwiW25hbWU9Ym9keV93ZWlnaHRdXCIpLnZhbCgpO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykgLy8gQ1NSRuODiOODvOOCr+ODs+OBruioreWumlxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHVybDogJy9hamF4c2l4cGFja2luZycsIC8vIFJvdXRlc+OBruiomOi/sCh3ZWIucGhw44Go5ZCI44KP44Gb44KLKVxuICAgICAgICAgICAgdHlwZTogJ1BPU1QnLCAvLyDjg6rjgq/jgqjjgrnjg4jjgr/jgqTjg5coR0VU44KC44GC44KLKVxuICAgICAgICAgICAgZGF0YToge1xuICAgICAgICAgICAgICAgICdib2R5X3dlaWdodCc6IGJvZHlXZWlnaHQsLy8gQ29udHJvbGxlcuOBriRyZXF1ZXN044Gr5rih44GZ44OR44Op44Oh44O844K/XG4gICAgICAgICAgICB9LFxuICAgICAgICB9KVxuXG4gICAgICAgICAgICAvLyBBamF444Oq44Kv44Ko44K544OI44GM5oiQ5Yqf44GX44Gf5aC05ZCI44Gu5Yem55CGKOW8leaVsOOBrmRhdGHjga9Db250cm9sbGVy44GL44KJ6L+U44GV44KM44Gf5YCk44GM5YWl44KLKVxuICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAvLyDooajjga7oqIjnrpfntZDmnpzjgahoaWRkZW7jga5pbnB1dOOBrnZhbHVl44KS5pu444GN5o+b44GI44KLXG4gICAgICAgICAgICAgICAgJCgnLnNpeHBhY2tpbmctdGFyZ2V0LWNhbG9yaWVzJykuaHRtbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9jYWxvcmllcyddKTtcbiAgICAgICAgICAgICAgICAkKCdbbmFtZT1cInNpeHBhY2tpbmctdGFyZ2V0LWNhbG9yaWVzXCJdJykudmFsKGRhdGFbJ3NpeHBhY2tpbmdfdGFyZ2V0X2NhbG9yaWVzJ10pO1xuICAgICAgICAgICAgICAgICQoJy5zaXhwYWNraW5nLXRhcmdldC1wcm90ZWluJykuaHRtbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9wcm90ZWluJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwic2l4cGFja2luZy10YXJnZXQtcHJvdGVpblwiXScpLnZhbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9wcm90ZWluJ10pO1xuICAgICAgICAgICAgICAgICQoJy5zaXhwYWNraW5nLXRhcmdldC1saXBpZCcpLmh0bWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfbGlwaWQnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJzaXhwYWNraW5nLXRhcmdldC1saXBpZFwiXScpLnZhbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9saXBpZCddKTtcbiAgICAgICAgICAgICAgICAkKCcuc2l4cGFja2luZy10YXJnZXQtY2FyYm9oeWRyYXRlJykuaHRtbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9jYXJib2h5ZHJhdGUnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJzaXhwYWNraW5nLXRhcmdldC1jYXJib2h5ZHJhdGVcIl0nKS52YWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfY2FyYm9oeWRyYXRlJ10pO1xuICAgICAgICAgICAgfSlcblxuICAgICAgICAgICAgLy8gQWpheOODquOCr+OCqOOCueODiOOBjOWkseaVl+OBl+OBn+WgtOWQiOOBruWHpueQhlxuICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24gKGRhdGEsIHhociwgZXJyKSB7XG4gICAgICAgICAgICAgICAgLy8g44Ko44Op44O844Oh44OD44K744O844K444KS5Ye65Yqb44GZ44KL6KiY6L+wXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ+OCqOODqeODvCcpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycik7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coeGhyKTtcbiAgICAgICAgICAgICAgICBhbGVydCgnQWpheOODquOCr+OCqOOCueODiOWkseaVl++8gScpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xuXG4gICAgLy8g5pyq6KiI566X44Gn44OV44Kp44O844Og6YCB5L+h44GX44Gf5pmC44Gu44OQ44Oq44OH44O844K344On44OzXG4gICAgJChcIiNqc19zaXhwYWNraW5nX3N1Ym1pdFwiKS5zdWJtaXQoZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAoJChcImlucHV0W25hbWU9J3NpeHBhY2tpbmctdGFyZ2V0LWNhbG9yaWVzJ11cIikudmFsKCkgPT0gMCkge1xuICAgICAgICAgICAgYWxlcnQoJ+acquioiOeul+OBp+OBmeOAguePvuWcqOOBruS9k+mHjeOCkuioreWumuOBl+OBpuOBj+OBoOOBleOBhOOAgicpO1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgJChcImpzX3NpeHBhY2tpbmdfc3VibWl0XCIpLnN1Ym1pdCgpO1xuICAgICAgICB9XG4gICAgfSk7XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/ajaxsixpacking.js\n");

/***/ }),

/***/ 5:
/*!**********************************************!*\
  !*** multi ./resources/js/ajaxsixpacking.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/hiroyukinakajima/Desktop/techboost/myproduct/resources/js/ajaxsixpacking.js */"./resources/js/ajaxsixpacking.js");


/***/ })

/******/ });
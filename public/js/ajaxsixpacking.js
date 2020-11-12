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

eval("$(function () {\n  var bodyWeight;\n  $('.js-sixpacking-intake').on('change mouseover', function () {\n    // Viewのフォームから受け取る\n    bodyWeight = $(\"[name=body_weight]\").val();\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content') // CSRFトークンの設定\n\n      },\n      url: '/ajaxsixpacking',\n      // Routesの記述(web.phpと合わせる)\n      type: 'POST',\n      // リクエストタイプ(GETもある)\n      data: {\n        'body_weight': bodyWeight // Controllerの$requestに渡すパラメータ\n\n      }\n    }) // Ajaxリクエストが成功した場合の処理(引数のdataはControllerから返された値が入る)\n    .done(function (data) {\n      // 表の計算結果とhiddenのinputのvalueを書き換える\n      $('.sixpacking-target-calories').html(data['sixpacking_target_calories']);\n      $('[name=\"sixpacking-target-calories\"]').val(data['sixpacking_target_calories']);\n      $('.sixpacking-target-protein').html(data['sixpacking_target_protein']);\n      $('[name=\"sixpacking-target-protein\"]').val(data['sixpacking_target_protein']);\n      $('.sixpacking-target-lipid').html(data['sixpacking_target_lipid']);\n      $('[name=\"sixpacking-target-lipid\"]').val(data['sixpacking_target_lipid']);\n      $('.sixpacking-target-carbohydrate').html(data['sixpacking_target_carbohydrate']);\n      $('[name=\"sixpacking-target-carbohydrate\"]').val(data['sixpacking_target_carbohydrate']);\n    }) // Ajaxリクエストが失敗した場合の処理\n    .fail(function (data, xhr, err) {\n      // エラーメッセージを出力する記述\n      console.log('エラー');\n      console.log(err);\n      console.log(xhr);\n      alert('Ajaxリクエスト失敗！');\n    });\n    return false;\n  }); // 未計算でフォーム送信した時のバリデーション\n\n  $(\"#js_sixpacking_submit\").submit(function () {\n    if ($(\"input[name='sixpacking-target-calories']\").val() == 0) {\n      alert('未計算です。現在の体重を設定してください。');\n      return false;\n    } else {\n      $(\"js_sixpacking_submit\").submit();\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheHNpeHBhY2tpbmcuanM/MzFkZiJdLCJuYW1lcyI6WyIkIiwiYm9keVdlaWdodCIsIm9uIiwidmFsIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwidHlwZSIsImRhdGEiLCJkb25lIiwiaHRtbCIsImZhaWwiLCJ4aHIiLCJlcnIiLCJjb25zb2xlIiwibG9nIiwiYWxlcnQiLCJzdWJtaXQiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsWUFBWTtBQUNWLE1BQUlDLFVBQUo7QUFFQUQsR0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJFLEVBQTNCLENBQThCLGtCQUE5QixFQUFrRCxZQUFZO0FBQzFEO0FBQ0FELGNBQVUsR0FBR0QsQ0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JHLEdBQXhCLEVBQWI7QUFFQUgsS0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSEMsYUFBTyxFQUFFO0FBQ0wsd0JBQWdCTCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2Qk0sSUFBN0IsQ0FBa0MsU0FBbEMsQ0FEWCxDQUN3RDs7QUFEeEQsT0FETjtBQUlIQyxTQUFHLEVBQUUsaUJBSkY7QUFJcUI7QUFDeEJDLFVBQUksRUFBRSxNQUxIO0FBS1c7QUFDZEMsVUFBSSxFQUFFO0FBQ0YsdUJBQWVSLFVBRGIsQ0FDd0I7O0FBRHhCO0FBTkgsS0FBUCxFQVdJO0FBWEosS0FZS1MsSUFaTCxDQVlVLFVBQVVELElBQVYsRUFBZ0I7QUFDbEI7QUFDQVQsT0FBQyxDQUFDLDZCQUFELENBQUQsQ0FBaUNXLElBQWpDLENBQXNDRixJQUFJLENBQUMsNEJBQUQsQ0FBMUM7QUFDQVQsT0FBQyxDQUFDLHFDQUFELENBQUQsQ0FBeUNHLEdBQXpDLENBQTZDTSxJQUFJLENBQUMsNEJBQUQsQ0FBakQ7QUFDQVQsT0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NXLElBQWhDLENBQXFDRixJQUFJLENBQUMsMkJBQUQsQ0FBekM7QUFDQVQsT0FBQyxDQUFDLG9DQUFELENBQUQsQ0FBd0NHLEdBQXhDLENBQTRDTSxJQUFJLENBQUMsMkJBQUQsQ0FBaEQ7QUFDQVQsT0FBQyxDQUFDLDBCQUFELENBQUQsQ0FBOEJXLElBQTlCLENBQW1DRixJQUFJLENBQUMseUJBQUQsQ0FBdkM7QUFDQVQsT0FBQyxDQUFDLGtDQUFELENBQUQsQ0FBc0NHLEdBQXRDLENBQTBDTSxJQUFJLENBQUMseUJBQUQsQ0FBOUM7QUFDQVQsT0FBQyxDQUFDLGlDQUFELENBQUQsQ0FBcUNXLElBQXJDLENBQTBDRixJQUFJLENBQUMsZ0NBQUQsQ0FBOUM7QUFDQVQsT0FBQyxDQUFDLHlDQUFELENBQUQsQ0FBNkNHLEdBQTdDLENBQWlETSxJQUFJLENBQUMsZ0NBQUQsQ0FBckQ7QUFDSCxLQXRCTCxFQXdCSTtBQXhCSixLQXlCS0csSUF6QkwsQ0F5QlUsVUFBVUgsSUFBVixFQUFnQkksR0FBaEIsRUFBcUJDLEdBQXJCLEVBQTBCO0FBQzVCO0FBQ0FDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLEtBQVo7QUFDQUQsYUFBTyxDQUFDQyxHQUFSLENBQVlGLEdBQVo7QUFDQUMsYUFBTyxDQUFDQyxHQUFSLENBQVlILEdBQVo7QUFDQUksV0FBSyxDQUFDLGNBQUQsQ0FBTDtBQUNILEtBL0JMO0FBaUNBLFdBQU8sS0FBUDtBQUNILEdBdENELEVBSFUsQ0EyQ1Y7O0FBQ0FqQixHQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQmtCLE1BQTNCLENBQWtDLFlBQVk7QUFDMUMsUUFBSWxCLENBQUMsQ0FBQywwQ0FBRCxDQUFELENBQThDRyxHQUE5QyxNQUF1RCxDQUEzRCxFQUE4RDtBQUMxRGMsV0FBSyxDQUFDLHVCQUFELENBQUw7QUFDQSxhQUFPLEtBQVA7QUFDSCxLQUhELE1BR087QUFDSGpCLE9BQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCa0IsTUFBMUI7QUFDSDtBQUNKLEdBUEQ7QUFRSCxDQXBEQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FqYXhzaXhwYWNraW5nLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGJvZHlXZWlnaHQ7XG5cbiAgICAkKCcuanMtc2l4cGFja2luZy1pbnRha2UnKS5vbignY2hhbmdlIG1vdXNlb3ZlcicsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgLy8gVmlld+OBruODleOCqeODvOODoOOBi+OCieWPl+OBkeWPluOCi1xuICAgICAgICBib2R5V2VpZ2h0ID0gJChcIltuYW1lPWJvZHlfd2VpZ2h0XVwiKS52YWwoKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpIC8vIENTUkbjg4jjg7zjgq/jg7Pjga7oqK3lrppcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB1cmw6ICcvYWpheHNpeHBhY2tpbmcnLCAvLyBSb3V0ZXPjga7oqJjov7Aod2ViLnBocOOBqOWQiOOCj+OBm+OCiylcbiAgICAgICAgICAgIHR5cGU6ICdQT1NUJywgLy8g44Oq44Kv44Ko44K544OI44K/44Kk44OXKEdFVOOCguOBguOCiylcbiAgICAgICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgICAgICAnYm9keV93ZWlnaHQnOiBib2R5V2VpZ2h0LC8vIENvbnRyb2xsZXLjga4kcmVxdWVzdOOBq+a4oeOBmeODkeODqeODoeODvOOCv1xuICAgICAgICAgICAgfSxcbiAgICAgICAgfSlcblxuICAgICAgICAgICAgLy8gQWpheOODquOCr+OCqOOCueODiOOBjOaIkOWKn+OBl+OBn+WgtOWQiOOBruWHpueQhijlvJXmlbDjga5kYXRh44GvQ29udHJvbGxlcuOBi+OCiei/lOOBleOCjOOBn+WApOOBjOWFpeOCiylcbiAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAgICAgLy8g6KGo44Gu6KiI566X57WQ5p6c44GoaGlkZGVu44GuaW5wdXTjga52YWx1ZeOCkuabuOOBjeaPm+OBiOOCi1xuICAgICAgICAgICAgICAgICQoJy5zaXhwYWNraW5nLXRhcmdldC1jYWxvcmllcycpLmh0bWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfY2Fsb3JpZXMnXSk7XG4gICAgICAgICAgICAgICAgJCgnW25hbWU9XCJzaXhwYWNraW5nLXRhcmdldC1jYWxvcmllc1wiXScpLnZhbChkYXRhWydzaXhwYWNraW5nX3RhcmdldF9jYWxvcmllcyddKTtcbiAgICAgICAgICAgICAgICAkKCcuc2l4cGFja2luZy10YXJnZXQtcHJvdGVpbicpLmh0bWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfcHJvdGVpbiddKTtcbiAgICAgICAgICAgICAgICAkKCdbbmFtZT1cInNpeHBhY2tpbmctdGFyZ2V0LXByb3RlaW5cIl0nKS52YWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfcHJvdGVpbiddKTtcbiAgICAgICAgICAgICAgICAkKCcuc2l4cGFja2luZy10YXJnZXQtbGlwaWQnKS5odG1sKGRhdGFbJ3NpeHBhY2tpbmdfdGFyZ2V0X2xpcGlkJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwic2l4cGFja2luZy10YXJnZXQtbGlwaWRcIl0nKS52YWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfbGlwaWQnXSk7XG4gICAgICAgICAgICAgICAgJCgnLnNpeHBhY2tpbmctdGFyZ2V0LWNhcmJvaHlkcmF0ZScpLmh0bWwoZGF0YVsnc2l4cGFja2luZ190YXJnZXRfY2FyYm9oeWRyYXRlJ10pO1xuICAgICAgICAgICAgICAgICQoJ1tuYW1lPVwic2l4cGFja2luZy10YXJnZXQtY2FyYm9oeWRyYXRlXCJdJykudmFsKGRhdGFbJ3NpeHBhY2tpbmdfdGFyZ2V0X2NhcmJvaHlkcmF0ZSddKTtcbiAgICAgICAgICAgIH0pXG5cbiAgICAgICAgICAgIC8vIEFqYXjjg6rjgq/jgqjjgrnjg4jjgYzlpLHmlZfjgZfjgZ/loLTlkIjjga7lh6bnkIZcbiAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uIChkYXRhLCB4aHIsIGVycikge1xuICAgICAgICAgICAgICAgIC8vIOOCqOODqeODvOODoeODg+OCu+ODvOOCuOOCkuWHuuWKm+OBmeOCi+iomOi/sFxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCfjgqjjg6njg7wnKTtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlcnIpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhocik7XG4gICAgICAgICAgICAgICAgYWxlcnQoJ0FqYXjjg6rjgq/jgqjjgrnjg4jlpLHmlZfvvIEnKTtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcblxuICAgIC8vIOacquioiOeul+OBp+ODleOCqeODvOODoOmAgeS/oeOBl+OBn+aZguOBruODkOODquODh+ODvOOCt+ODp+ODs1xuICAgICQoXCIjanNfc2l4cGFja2luZ19zdWJtaXRcIikuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCQoXCJpbnB1dFtuYW1lPSdzaXhwYWNraW5nLXRhcmdldC1jYWxvcmllcyddXCIpLnZhbCgpID09IDApIHtcbiAgICAgICAgICAgIGFsZXJ0KCfmnKroqIjnrpfjgafjgZnjgILnj77lnKjjga7kvZPph43jgpLoqK3lrprjgZfjgabjgY/jgaDjgZXjgYTjgIInKTtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICQoXCJqc19zaXhwYWNraW5nX3N1Ym1pdFwiKS5zdWJtaXQoKTtcbiAgICAgICAgfVxuICAgIH0pO1xufSk7Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/ajaxsixpacking.js\n");

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
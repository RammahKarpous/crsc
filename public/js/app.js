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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components */ "./resources/js/components/index.js");
// populate user data event

Object(_components__WEBPACK_IMPORTED_MODULE_0__["populateFormData"])();

/***/ }),

/***/ "./resources/js/components/index.js":
/*!******************************************!*\
  !*** ./resources/js/components/index.js ***!
  \******************************************/
/*! exports provided: populateFormData */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _populateFormData__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./populateFormData */ "./resources/js/components/populateFormData.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "populateFormData", function() { return _populateFormData__WEBPACK_IMPORTED_MODULE_0__["default"]; });



/***/ }),

/***/ "./resources/js/components/populateFormData.js":
/*!*****************************************************!*\
  !*** ./resources/js/components/populateFormData.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var populateFormData = function populateFormData() {
  var populateFam = document.querySelector('#populate'); // family form elements

  var familyName = document.querySelector('#family_name'),
      addressLine = document.querySelector('#address_line'),
      livingPlace = document.querySelector('#place'),
      postcode = document.querySelector('#postcode'),
      contactNumber = document.querySelector('#contact_number'),
      email = document.querySelector('#email');
  populateFam.addEventListener('click', function () {
    var data = familyData[Math.floor(Math.random() * familyData.length)];
    familyName.value = data['familyName'];
    addressLine.value = data['addressLine'];
    livingPlace.value = data['livingPlace'];
    postcode.value = data['postcode'];
    contactNumber.value = data['contactNumber'];
    email.value = data['email'];
  });
  var familyData = [{
    familyName: 'Karpous',
    addressLine: '47 Fernley Road',
    city: 'Birmingham',
    postcode: 'B11 3NS',
    contactNumber: '07 123 456 789',
    email: 'rammahkarpous@outlook.com'
  }, {
    familyName: 'Johnson',
    addressLine: '47 Berry Street',
    city: 'Solihull',
    postcode: 'B11 3NS',
    contactNumber: '07 123 456 789',
    email: 'thejognsons@outlook.com'
  }, {
    familyName: 'Jackie',
    addressLine: '51 Solihull Road',
    city: 'Stoke-On-Trent',
    postcode: 'ST24 3NS',
    contactNumber: '07 234 456 789',
    email: 'jackiechan@outlook.com'
  }];
  var memberData = [{
    name: 'Rammah'
  }];
};

/* harmony default export */ __webpack_exports__["default"] = (populateFormData);

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\laragon\www\crsc\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! D:\laragon\www\crsc\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });
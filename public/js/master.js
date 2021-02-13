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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/master.js":
/*!********************************!*\
  !*** ./resources/js/master.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
try {
    let jquery = require('jquery');
    window.$ = jquery;
    window.jQuery = jquery;
    require('bootstrap/dist/js/bootstrap.min');
} catch (e) {
    console.log(e);
}
*/
function printDoc() {
  window.print();
}

var token;
$(function () {
  token = $('#token').val();
  $(document).find('[data-toggle="tooltip"]').tooltip();
  $('.printBtn').click(function () {
    printDoc();
  }); //submit  form

  $("#submitForm").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    form.parsley().validate();

    if (!form.parsley().isValid()) {
      return false;
    }

    var button = $("#createBtn");
    button.button('loading');
    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize()
    }).done(function (response) {
      // button loading
      button.button('reset'); // reload the manage member table

      form[0].reset();
      table.ajax.reload(null);
      $('#add-messages').html('<div class="alert alert-success">' + '<button type="button" class="close" data-dismiss="alert">&times;</button>' + '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + " Record added successfully" + '</div>');
      $(".alert-success").delay(500).show(10, function () {
        $(this).delay(3000).hide(10, function () {
          $(this).remove();
        });
      }); // /.alert
    }).fail(function (error) {
      button.button('reset');
      $('#add-messages').html('<div class="alert alert-danger">' + '<button type="button" class="close" data-dismiss="alert">&times;</button>' + '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + "Unable to save record" + '</div>');
      $(".alert-danger").delay(500).show(10, function () {
        $(this).delay(3000).hide(10, function () {
          $(this).remove();
        });
      }); // /.alert
    });
  }); // submit of edit categories form

  $("#editForm").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    form.parsley().validate();

    if (!form.parsley().isValid()) {
      return false;
    } // button loading


    var btn = $("#editBtn");
    btn.button('loading');
    $.ajax({
      url: form.attr('action'),
      type: 'PUT',
      data: form.serialize()
    }).done(function (response) {
      // button loading
      btn.button('reset'); // reload the manage member table

      table.destroy();
      myFunc();
      $('#edit-messages').html('<div class="alert alert-success">' + '<button type="button" class="close" data-dismiss="alert">&times;</button>' + '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + "Record successfully updated" + '</div>');
      $(".alert-success").delay(500).show(10, function () {
        $(this).delay(3000).hide(10, function () {
          $(this).remove();
        });
      }); // /.alert
    }).fail(function (error) {
      btn.button('reset');
      $('#edit-messages').html('<div class="alert alert-danger">' + '<button type="button" class="close" data-dismiss="alert">&times;</button>' + '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + "Unable to update record" + '</div>');
      $(".alert-danger").delay(500).show(10, function () {
        $(this).delay(3000).hide(10, function () {
          $(this).remove();
        });
      }); // /.alert
    });
  });
}); // delete button click

$(document).on("click", ".js-delete", function () {
  var deleteUrl = $(this).attr("data-url");
  var button = $(this);
  deleteWithUrl(deleteUrl, button, table);
});

function deleteWithUrl(deleteUrl, button, table) {
  var confirmButton = $('button.confirm');
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this data!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#007B00",
    confirmButtonText: "Ok!",
    closeOnConfirm: false
  }, function () {
    confirmButton.button('loading');
    $.ajax({
      url: deleteUrl,
      data: {
        _token: token
      },
      method: 'DELETE'
    }).done(function (response) {
      confirmButton.button('reset');
      swal({
        title: "Deleted!",
        text: "Record  has been deleted.",
        type: "success",
        confirmButtonColor: "#007B00",
        confirmButtonText: "Close"
      }); // reload the manage member table

      var tr = button.parents("tr");
      table.rows(tr).remove().draw(false);
    }).fail(function (error) {
      confirmButton.button('reset');
      swal({
        title: "Not Deleted!",
        text: "Record is not deleted please try again later.",
        type: "info",
        confirmButtonColor: "#ff3f71",
        confirmButtonText: "Ok ,Close"
      });
    });
  });
}

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/master.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\PHP\shop\resources\js\master.js */"./resources/js/master.js");


/***/ })

/******/ });
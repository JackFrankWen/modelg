/*! ModelG js
 * ================
 * Main JS application file for Admin
 *
 * @Author  Jack
 * @Email   <vincent1990wen@gmail.com>
 * @version 1.0.0
 */

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
  throw new Error("jack requires jQuery");
}

/* jack
 *
 * @type Object
 * @description $.jack is the main object for the template's app.
 *              It's used for implementing functions and options related
 *              to the template. Keeping everything wrapped in an object
 *              prevents conflict with other plugins and is a better
 *              way to organize our code.
 */
$.jack = {};

$.jack.sidebar = {
	isActivated: false,
	nthActivated: null,
	clickability: true,
	
}
_init();

function _init(){
	/* Dropdown menu
	 *
	 * @type Function
	 * @description Dropdown menu can the main object for the template's app.
	 *              It's used for implementing functions and options related
	 */
	$.jack.dropdownMenu = function(){
		$('.treeview').on('click',  function(event) {
						
						//map sider
						var sidebar =  $.jack.sidebar;
						var _this = $(this);
						var submenu = _this.children('.treeview-menu');
						var clicknth = _this.prevAll().length;

						if (clicknth === sidebar.nthActivated && sidebar.isActivated === true) {
						
							//close itself
							_this.removeClass('active');
							submenu.removeClass('open');
							submenu.slideUp('400')
							//record status
							sidebar.isActivated = false;
							sidebar.nthActivated = null;

						}else if(clicknth !== sidebar.nthActivated && sidebar.isActivated === true){
							var nth = sidebar.nthActivated;
							var nthMenu = $( ".side-menu>li").eq(nth);


							//close nth of menu  and open itself
							nthMenu.removeClass('active');
							nthMenu.children('.treeview-menu').slideUp('400');
							nthMenu.children('.treeview-menu').removeClass('open');
							
							// open clicked menu
							_this.addClass('active');
							submenu.slideDown('400', function() {
								submenu.addClass('open');
							});
						
							//record status
							sidebar.isActivated = true;
							sidebar.nthActivated = _this.prevAll().length;
						}else{
							//open clicked menu
							_this.addClass('active');
							//record status
							submenu.slideDown('400', function() {
								submenu.addClass('open');
							});
							sidebar.nthActivated = _this.prevAll().length;
							sidebar.isActivated = true;
						}
						
		});
	};
	/* Push menu
	 *
	 * @type Function
	 * @description Push menu can the main object for the template's app.
	 *              It's used for implementing functions and options related
	 */
	 $.jack.pushMenu = function(){
	 	$('.sidebar-controller').on('click', function(event) {
	 		
	 		var Cwindow = $(window).width();
	 		var isOpen = $('.sidebar-controller').attr('aria-expanded');
	 		var screenWidth = $(window).width();
	 		if (screenWidth > 767) {
	 			if (isOpen == 'false') {
	 					// collapse sidebar
	 					$('body').addClass('sidebar-collapse');
	 					$('.sidebar-controller').attr('aria-expanded','true');
	 				} else {
	 					// open sidebar
	 					$('body').removeClass('sidebar-collapse');
	 					$('.sidebar-controller').attr('aria-expanded','false');
	 				};
	 		} else {
	 			// Open sidebar when screensize on mobile size
	 			if (isOpen == 'false') {
	 					// collapse sidebar
	 					$('body').addClass('sidebar-mobile');
	 					$('.sidebar-controller').attr('aria-expanded','true');
	 				} else {
	 					// open sidebar
	 					$('body').removeClass('sidebar-mobile');
	 					$('.sidebar-controller').attr('aria-expanded','false');
	 				};

	 		}
	 	});

	 }
}

/*-----------------Shop Info,Rates Page------------------------*/

//Show input and foucs on input after dbclick
$(document).on('click', '.diamond',function() {
	var _this = $(this);
	var val = _this.text();
	var _next = _this.next();
	var _pre = _this.prev();
	_this.css('display','none');
	_pre.css('display','none');
	//Get span text
	_next.val(val);
	_next.css('display','initial').focus();

});

// Display none input when input focusout
$(document).on('focusout', '.ript',function() {
	var _this = $(this);
	var val = _this.val();
	var _prev = _this.prev();
	var _prevall =  _this.prevAll()
	_this.css('display','none');
	_prev.text(val);
	_prevall.css('display','initial');

});


//creat a new rates item
$(document).on('click', '.new',function() {
	var _this = $(this).parent();
	_this.clone().insertAfter(_this);

});

//Delete this item
$(document).on('click', '.dlt',function() {
	/* Act on the event */
	var _this = $(this);
	var last =_this.parents('.lt').children('.lv1').size();
	if(last > 1){
		_this.parent(".lv1").remove();
	}else{
		alert('Last one cant delete');
	}
});
/************************************/

$(function () {
	/*
		Description: Initialize
		
	*/
  $('[data-toggle="tooltip"]').tooltip();
  $.jack.dropdownMenu();
  $.jack.pushMenu();
});

/* Ajax 
	 *
	 * @type Function
	 * @description Remove item from rates page
	 *              
	 */

$('.rm').click(function(event) {
	var _this =$(this);
	var token =  $("meta[name=_token]").attr('content');
	var form = _this.parents('.rates-wrap');
	var url = _this.parent().find('input[name=delete]').val();
	var item = $('.rates-wrap');
	$.ajax({
		url: url,
		type: 'POST',
		data: {_method: 'delete',
				_token:token
				},
	})
	.done(function(data) {
		form.hide('slow', function() {
			$(this).detach();
			item.unwrap('.clos');
			item = $('.rates-wrap');
			for (var i = 0; i < item.length; i+=3) {
				item.slice(i, i+3).wrapAll('<div class="row clos"></div>')
			};
		});
		

	})
	.fail(function(xhr, ajaxOptions, thrownError) {
		console.log("error");
		console.log(xhr.status);
		console.log(xhr.responseText);
		console.log(thrownError);
	})
	.always(function() {
		console.log("complete");
	});
	
});

/* Ajax 
	 *
	 * @type Function
	 * @description update item page information.
	 *              
	 */
$(".updt").click(function(event) {
	var _this = $(this);
	var token =  $("meta[name=_token]").attr('content');
	var form = _this.parent();

	var inputinfo = form.find('input[name^=rates_info]');
	var inputprice = form.find('input[name^=rates_price]');
	var rates_name = form.find('input[name^=rates_name]').val();
	console.log(rates_name);
	var rates_info= [];
	var rates_price= [];
	var url = form.attr('action');

	inputinfo.each(function(index, el) {
		 rates_info.push($(this).val());
	});
	inputprice.each(function(index, el) {
		 rates_price.push($(this).val());
	});

	
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'html',
		data: {
				_token:token,
				rates_info,
				rates_price,
				rates_name
				},
	})
	.done(function(data) {
		console.log(data);
		alert("update success");
	})
	.fail(function(xhr, ajaxOptions, thrownError) {
		alert("error");
		console.log("error");
		console.log(xhr.status);
		console.log(xhr.responseText);
		console.log(thrownError);
	})
	.always(function() {
		console.log("complete");
	});
	
});


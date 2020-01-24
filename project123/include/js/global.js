var loadContent,ProcessRequest,formError,msgbox,menunav,showErrorMessage,msgbox_title,fileExtension,fileSize,uploader;
var winHeight = $(window).height();
var winWidth = $(window).width();
var dashboardLink;
var fromDashboard = false;
$(document).ready(function() {

	// $("input:submit, input:button, button, .button").button();
/* MAIN MENU */
	// menunav = $("#nav").menu({
	// 	select: function( event, ui ) {
	// 		var link = ui.item.children('a:first');
	// 		var inSubNav = $(link).hasParent('.subnav') ? 2 : 0;
	// 		if(link.attr( "href" ) == '#'){
	// 			event.preventDefault();
	// 			return false;		
	// 		}
	// 		loadContent(link.attr( "href" ));
	// 		$(link,this).parents(':eq('+inSubNav+')').siblings('li').removeClass('nav-active');
	// 		$(link,this).parents(':eq('+inSubNav+')').addClass('nav-active');
	// 		event.preventDefault();
	// 	}
	// }).mouseleave(function(){
	// 	$("#nav").menu('collapseAll',true);
	// });
	
	dashboardLink = function(obj){
		loadContent($(obj).attr( "href" ));	
		fromDashboard = true;
	}
	
	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
		var curURL = options.url;
		if((/^http/).test(curURL) == false){
			var noHTTP = options.url;
			options.url = APP_URL + noHTTP;
		}
	});
	
/* INDEX MENU */
$(document).on('click',".nav-item a",function(event){
	// $(".navbar-brand,.nav-item a").on('click',function(event){
		event.preventDefault();	
		if($.trim($(this).attr( "href" )) != '' && $.trim($(this).attr( "href" )) != '#' && ($.trim($(this).attr( "href" )).indexOf("#") < 0)){
			var inSubNav = 0;
			if($(this).hasClass('navbar-brand')){
				$('.nav').find('li').removeClass('active');
				$('#Shome').parents(':eq(0)').addClass('active');
			}else{
				
				$('.nav').find('li').removeClass('active');
				$(this).parents(':eq(0)').addClass('active');

				if($(this).attr( "data-subnav" ) != undefined && $.trim($(this).attr( "data-subnav" )) != '#'){
					
					$(this).parents(':eq(3)').addClass('active');
				}
				
			}
			loadContent($(this).attr( "href" ));	
		}
		// console.log($(this).attr( "href" ));
			
	});



	$(document).on('click',"#wawi_items a",function(e){

	// $('#wawi_items a').click(function(e) {
		e.preventDefault();
		if($.trim($(this).attr( "href" )) != '' && $.trim($(this).attr( "href" )) != '#' && ($.trim($(this).attr( "href" )).indexOf("#") < 0)){
			loadWrapper($(this).attr( "href" ));	
			
		}

	 
 });

 $(document).on('click',".changecustomer",function(e){

	// $('#wawi_items a').click(function(e) {
		e.preventDefault();
		if($.trim($(this).attr( "href" )) != '' && $.trim($(this).attr( "href" )) != '#' && ($.trim($(this).attr( "href" )).indexOf("#") < 0)){
			loadWrapper($(this).attr( "href" ));	
			
		}

	 
 });
 
	
	// $("#nav").removeClass('ui-corner-all').find('li>a').removeClass('ui-corner-all');
	 
/* CONTENT LOADER */
	loadContent = function(href,postData){ 
		$.ajax({
			type: 'POST',
			url: href,
			data: postData,
			success: function(data){
				$("#content").hide().html(data).fadeIn('slow');
				$(".dataTable tbody").on("click","tr",function(event){
					if ( $(this).hasClass('row_selected') )
						$(this).removeClass('row_selected');
					else
						$(this).addClass('row_selected');
				});
			},
			beforeSend: function(){				
				// $("#nav").menu('collapseAll',true);
				$.dimScreen(300, 0.5, function() {});
			},
			complete: function(){
					$.dimScreenStop();					
			},
			error: function(request){
				$.dimScreenStop();
				showErrorMessage(request.status);
				if(request.status == 500 && request.statusText == 'Internal Server Error'){					
						msgbox('Error Message','<p class="error">Could not load page.<br>Please contact support.</p>');				
				}
			}
		});
	}	


	loadWrapper = function(href,postData){ 
		$.ajax({
			type: 'POST',
			url: href,
			data: postData,
			success: function(data){
				$("#whole-wrapper").hide().html(data).fadeIn('slow');
			},
			beforeSend: function(){				
				// $("#nav").menu('collapseAll',true);
				$.dimScreen(300, 0.5, function() {});
			},
			complete: function(){
					$.dimScreenStop();					
			},
			error: function(request){
				$.dimScreenStop();
				showErrorMessage(request.status);
				if(request.status == 500 && request.statusText == 'Internal Server Error'){					
						msgbox('Error Message','<p class="error">Could not load page.<br>Please contact support.</p>');				
				}
			}
		});
	}	
/* CLEAR FORM */
	$.fn.clearForm = function() {
		return this.each(function() {
			var type = this.type, tag = this.tagName.toLowerCase();
			if (tag == 'form')
			  return $(':input',this).clearForm();
			if(!$(this).hasClass('retain')){
				if (type == 'text' || type == 'password' || tag == 'textarea')
					this.value = '';
				else if (type == 'checkbox' || type == 'radio')
				  this.checked = false;
				else if (tag == 'select')
				  this.selectedIndex = 0;
			}
		});
    };
	
/* FORM ENTER - FOCUS NEXT INPUT */
	$('.globalform').find('input,select').on('keydown',function(event) {
		if (event.keyCode == '13') {
			$(":input:eq(" + ($(":input").index(this) + 1) + ")").focus();
			return false;							
		}
	});	
	
/* MESSAGE DIALOG BOX */
	// msgbox = function(_title,_content,_focus,_confirm,_modal,_width,_height){
	// 	_title = _title ? _title : 'Alert Message';
	// 	_focus = _focus ? _focus : false;
	// 	_width = _width ? _width : 350;
	// 	_height = _height ? _height : 250;
	// 	_modal = _modal ? _modal : true;
	// 	_is_confirm = count(_confirm) > 0 ? true : false;
	// 	if(_is_confirm){
	// 		var _buttons = { 'Yes' : function() {
	// 								$(this).dialog("close");
	// 								var theFunction = eval('(' + _confirm[0] + ')');
	// 									theFunction(_confirm[1]);
	// 							},
	// 						  'No': function() {
	// 								$(this).dialog("close");
	// 							}
	// 						}
	// 	}else{
	// 		var _buttons = { 'Close': function() {
	// 								$(this).dialog("close");									
	// 							}
	// 						}
	// 	}
		
		
	// 	$("#dialog").empty().html(_content).dialog({
    //         modal: _modal,
    //         title: _title,
	// 		show: {effect:"blind",duration:300},
    //         hide: "scale",
    //         buttons:_buttons,
    //         width:_width,
	// 		height:_height,
	// 		open:function(){
	// 			$('.ui-dialog-title').addClass('text-primary');
	// 		},
	// 		close:function(){
	// 			$(this).dialog("destroy");
	// 			if(_focus) $('#'+_focus).focus().select();
	// 		}
	// 	});
		
		
			
	// }

	//New with Swal
	msgbox = function(_title,_content,_focus,_confirm,_modal,_width,_height){
		_title = _title ? _title : 'Alert Message';
		_focus = _focus ? _focus : false;
		_width = _width ? _width : 350;
		_height = _height ? _height : 250;
		_modal = _modal ? _modal : true;
		_is_confirm = count(_confirm) > 0 ? true : false;

		var _msgType;
		var _swalConfiguration = {
			
		};

		if(_is_confirm){
			_swalConfiguration.confirmButtonText = "Yes";
			_swalConfiguration.showCancelButton = true;
			_swalConfiguration.cancelButtonText = "No";

		}else{
			_swalConfiguration.confirmButtonText = "Close";
		}

		var span = document.createElement("span");
		if (_content.indexOf("success") >= 0){
			_msgType = 'success';
			span.innerHTML = `<i class="mdi mdi-check-circle-outline icon-lg text-success"></i> `+_content;
		}else if(_content.indexOf("error") >= 0){
			_msgType = 'error';
			span.innerHTML = `<i class="mdi mdi-alert-circle-outline icon-lg text-danger"></i> `+_content;
		}else if(_content.indexOf("info") >= 0){
			_msgType = 'info';
			span.innerHTML = `<i class="mdi mdi-information-outline icon-lg text-info"></i> `+_content;
		}else{
			_msgType = 'warning';
			span.innerHTML = `<i class="mdi mdi-alert-circle-outline icon-lg text-warning"></i> `+_content;
		}
		
		_swalConfiguration.allowEscapeKey = false;
		_swalConfiguration.allowOutsideClick = false;
		_swalConfiguration.allowEnterKey = false;
		_swalConfiguration.stopKeydownPropagation = false;

		_swalConfiguration.title = _title;
		_swalConfiguration.type = _msgType;
		_swalConfiguration.html = span;


		  Swal.fire(_swalConfiguration)
		  .then((value) => {
			// console.log(value.value);
			if(value.value && _is_confirm){
				var theFunction = eval('(' + _confirm[0] + ')');
				theFunction(_confirm[1]);
			}else{
			
				if(_focus) $('#'+_focus).focus().select();
			}
			// switch (value) {
		
			//   case true:
			// 	var theFunction = eval('(' + _confirm[0] + ')');
			// 	theFunction(_confirm[1]);
			// 	break;

			//   default:
			//   	if(_focus) $('#'+_focus).focus().select();
				
			// }
			});
			
			$('.swal2-modal').draggable();
		
		
			
	}


	
	
	
	
/* FORM SUBMIT ERROR PROMPT */
	formError = function(f, errorInfo){		
		var fieldName;
		if(errorInfo.length > 0){
			if (errorInfo[0][0].type == undefined)
				fieldName = errorInfo[0][0][0].name;
			else
				fieldName = errorInfo[0][0].name;			
			msgbox('Error Message','<p class="error">'+errorInfo[0][1]+'</p>',fieldName);
		}
	}
	
/* PROCESS REQUEST */
	ProcessRequest = function(postURL,postData,postProcess,_loadermsg){

		if(_loadermsg == undefined)
        {
            _loadermsg = "Loading...";
		}
		
		 $.ajax({
			type: 'POST',
			url: postURL,
			data: postData,
			success: function(data){
				if (typeof postProcess == 'function') {
					postProcess(data);
				}else{
					var theFunction = eval('(' + postProcess + ')');
					theFunction(data);
				}				
			},
			beforeSend: function(){
				if(!postData.dashboard)
					$.dimScreen(300, 0.3, function(){}, _loadermsg);
			},
			complete: function(){
				if($.active >= 1)
					$.dimScreenStop();
			},
			error: function(request){
				$.dimScreenStop();
				//showErrorMessage(request.status);
				if(request.status == 500 && request.statusText == 'Internal Server Error'){					
						msgbox('Error Message','<p class="error">Could not load page.<br>Please contact support.</p>');				
				}
			}
		 });
	}
	
/* SHOW ERROR MESSAGE */
	showErrorMessage = function(code){
		switch(code){
			case 500 : loadContent('custom_error/error_500');
		}
	}
	
	msgbox_title = { 'error' : 'Error Message', 'warning' : 'Warning Message', 'info' : 'Information', 'success' : 'Information' }
	
	

	$('#content,#login-wrapper').css('min-height',winHeight - 170);
	
/* TOGGLE BUTTON HEADER */
	//$('.top-right-panel').css('marginRight',(winWidth >=1024 ? -200 : -225));		
	$('.toggle-btn').click(function(){
		var $marginLefty = $('.top-right-panel');
			$marginLefty.animate({
				marginRight: parseInt($marginLefty.css('marginRight'),10) == 0 ? ($marginLefty.outerWidth() - 15) * -1 : 0
			},function(){});
		$('.ui-icon',this).toggleClass('ui-icon-triangle-1-e');
	});

	$('#btn-sidebar-collapse').click(function(){
		
		$('.sidebar').toggleClass('sidebar-collapse');
		$('.main-panel').toggleClass('main-collapse');
		$('.content-wrapper').toggleClass('content-collapse');
		$('.footer').toggleClass('footer-collapse');

		$.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();

		// $($.fn.dataTable.tables(true)).DataTable()
		// 		.columns.adjust();


		// $('.navbar-brand-wrapper').toggleClass('nav-brand-collapse');


	});
	
	//if(logged_in){	
		//if(winWidth >= 1024){
			//$('.toggle-btn').click();
		//}else{
			//$('.top-right-panel').css('marginRight',-225);			
		//}
	// }else{
		// $('.top-right-panel').css('visibility','hidden');	
	// }

	
	
// File Uploader
	$.fn.ajaxUpload = function(param,callback){
		var param = param || {};
		var elem = $('#'+this[0].id)[0];
		var messages = $('p.messages');
		var withconfirm = param.confirm;
		uploader = new qq.FileUploaderBasic({
			button: elem,
			debug: true,
			multiple: false,
			action: 'document/file/upload',
			allowedExtensions: fileExtension,
			sizeLimit: fileSize,
			params: param,
			onSubmit: function(id, fileName){					
				if(withconfirm){
					if(confirm(withconfirm)){
						return true;
					}else{
						return false;
					}
				}
			},
			onUpload: function(id, fileName) {
				messages.html('<img src="assets/images/loading.gif" alt="Initializing... Please hold."> ' + 'Initializing... ' +	'"' + fileName + '"');
			},
			onProgress: function(id, fileName, loaded, total) {					
				if (loaded < total) {
					progress = Math.round(loaded / total * 100) + '% of ' + Math.round(total / 1024) + ' kB';
					messages.html('<img src="assets/images/loading.gif" alt="In progress. Please hold."> ' +	'Uploading... ' + '"' + fileName + '" ' + progress);
				} else {
					messages.html('<img src="assets/images/loading.gif" alt="Saving... Please hold."> ' + 'Saving... ' +	'"' + fileName + '"');
				}
			},
			onComplete : function(d, fileName, responseJSON){
				if (responseJSON.success) {
					messages.html('<span class="success">Saving completed.</span>');
				}else{
					messages.html('<span class="error">Saving failed.</span>');
				}
				if (typeof callback == 'function') {
					callback(responseJSON);
				}
			}
		});
	}


	$('.search-button').click(function(){
		$(this).parent().toggleClass('open');
	});
	
// Scroll To
	$('#scrollToTop').click(function(){
		$.scrollTo(0,100);
	});
	
	
	var window = $('<div />').attr({id:'dialog',style:'display:none;'}).appendTo(document.body);
	
	
});

$(window).resize(function(){
	
});

 $(window).scroll(function () { 
	if($(window).scrollTop() > 400)
		$('#scrollToTop').fadeIn();
	else
		$('#scrollToTop').fadeOut();
 });

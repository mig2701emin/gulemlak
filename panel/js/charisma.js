$(document).ready(function(){
$().UItoTop({ easingType: 'easeInBack' });
	//themes, change CSS with JS
	//default theme(CSS) is cerulean, change it if needed
	var current_theme = $.cookie('current_theme')==null ? 'cerulean' :$.cookie('current_theme');
	switch_theme(current_theme);
	
	$('#themes a[data-value="'+current_theme+'"]').find('i').addClass('icon-ok');
				 
	$('#themes a').click(function(e){
		e.preventDefault();
		current_theme=$(this).attr('data-value');
		$.cookie('current_theme',current_theme,{expires:365});
		switch_theme(current_theme);
		$('#themes i').removeClass('icon-ok');
		$(this).find('i').addClass('icon-ok');
	});
	
	
	function switch_theme(theme_name)
	{
		$('#bs-css').attr('href','css/bootstrap-'+theme_name+'.css');
	}
	
	//ajax menu checkbox
	$('#is-ajax').click(function(e){
		$.cookie('is-ajax',$(this).prop('checked'),{expires:365});
	});
	$('#is-ajax').prop('checked',$.cookie('is-ajax')==='true' ? true : false);
	
	//disbaling some functions for Internet Explorer
	if($.browser.msie)
	{
		$('.login-box').find('.input-large').removeClass('span10');
		
	}
	
	
	//highlight current / active link
	$('ul.main-menu li a').each(function(){
		if($($(this))[0].href==String(window.location))
			$(this).parent().addClass('active');
	});
	
	//establish history variables
	var
		History = window.History, // Note: We are using a capital H instead of a lower h
		State = History.getState(),
		$log = $('#log');

	//bind to State Change
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
		var State = History.getState(); // Note: We are using History.getState() instead of event.state
		$.ajax({
			url:State.url,
			success:function(msg){
				$('#content').html($(msg).find('#content').html());
				$('#loading').remove();
				$('#content').slideDown();
				docReady();
			}
		});
	});
	
	//animating menus on hover
	$('ul.main-menu li:not(.nav-header)').hover(function(){
		$(this).animate({'margin-left':'+=5'},300);
	},
	function(){
		$(this).animate({'margin-left':'-=5'},300);
	});
	
	//other things to do on document ready, seperated for ajax calls
	docReady();
});
		
		
function docReady(){

	//prevent # links from moving to top
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});
	
	//datepicker
        $.datepicker.regional['tr'] = {
                closeText: 'Kapat',
                prevText: '&#x3c;Geri',
                nextText: 'İleri&#x3e',
                currentText: 'Bugün',
                monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
                'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
                monthNamesShort: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
                'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
                dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
                dayNamesShort: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
                dayNamesMin: ['Pz','Pt','Sa','Ça','Pe','Cu','Ct'],
                weekHeader: 'Hf',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['tr']);
	
	$('.datepicker').datepicker({
	dateFormat:"yy-mm-dd",
	showAnim:"slide",
	changeMonth:true,
    changeYear:true
	
	});
	
	//notifications
	$('.noty').click(function(e){
		e.preventDefault();
		var options = $.parseJSON($(this).attr('data-noty-options'));
		noty(options);
	});


	//uniform - styler for checkbox, radio and file input
	$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

	//chosen - improves select
	$('[data-rel="chosen"],[rel="chosen"]').chosen();

	//tabs
	$('#myTab a:first').tab('show');
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	//makes elements soratble, elements that sort need to have id attribute to save the result
	$('.sortable').sortable({
		revert:true,
		cancel:'.btn,.box-content,.nav-header',
		update:function(event,ui){
			//line below gives the ids of elements, you can make ajax call here to save it to the database
			//console.log($(this).sortable('toArray'));
		}
	});
	
	//tooltip
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

	//auto grow textarea
	$('textarea.autogrow').autogrow();

	//popover
	$('[rel="popover"],[data-rel="popover"]').popover();
	
	//iOS / iPhone style toggle switch
	$('.iphone-toggle').iphoneStyle();

	//star rating
	$('.raty').raty({
		score : 4 //default stars
	});

	//datatable
	$('.datatable').dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
			"sLengthMenu": "_MENU_ Kayıt Göster"
			},
			"aaSorting": []
		} );
	$('.btn-close').click(function(e){
		e.preventDefault();
		$(this).parent().parent().parent().fadeOut();
	});
	$('.btn-minimize').click(function(e){
		e.preventDefault();
		var $target = $(this).parent().parent().next('.box-content');
		if($target.is(':visible')) $('i',$(this)).removeClass('icon-chevron-up').addClass('icon-chevron-down');
		else 					   $('i',$(this)).removeClass('icon-chevron-down').addClass('icon-chevron-up');
		$target.slideToggle();
	});
	$('.btn-setting').click(function(e){
		e.preventDefault();
		$('#myModal').modal('show');
	});



		
	//initialize the external events for calender

	$('#external-events div.external-event').each(function() {

		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});
	}


//additional functions for data table
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};
			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
});
function active(feature){
var val=$(feature).val();
var name=$(feature).attr("name");
if(val==1){
$("#"+name+"_bitis").show("slow");
}else{
$("#"+name+"_bitis").hide("slow");
}
}
function change_type(value)
{
if(value=='radio'){
$("#values").show("slow");
$("#between").hide("slow");
$("#multiple").hide("slow");
$("#multiple_field_name").hide("slow");
$("#withfilter").show("slow");
$("#detailed_search").show("slow");
$("#showlist").show("slow");
}else if(value=='checkbox'){
$("#values").show("slow");
$("#between").hide("slow");
$("#multiple").hide("slow");
$("#multiple_field_name").hide("slow");
$("#withfilter").hide("slow");
$("#detailed_search").show("slow");
$("#showlist").hide("slow");
}else if(value=='select'){
$("#values").show("slow");
$("#between").hide("slow");
$("#multiple").show("slow");
$("#multiple_field_name").hide("slow");
$("#withfilter").show("slow");
$("#detailed_search").show("slow");
$("#showlist").show("slow");
}else if(value=='multiple_select'){
$("#values").show("slow");
$("#between").hide("slow");
$("#multiple").show("slow");
$("#multiple_field_name").show("slow");
$("#withfilter").hide("slow");
$("#detailed_search").show("slow");
$("#showlist").hide("slow");
}else if(value=='textarea'){
$("#values").hide("slow");
$("#between").hide("slow");
$("#multiple").hide("slow");
$("#multiple_field_name").hide("slow");
$("#withfilter").hide("slow");
$("#detailed_search").hide("slow");
$("#showlist").hide("slow");
}else{
$("#values").hide("slow");
$("#between").show("slow");
$("#multiple").hide("slow");
$("#multiple_field_name").hide("slow");
$("#withfilter").hide("slow");
$("#detailed_search").show("slow");
$("#showlist").show("slow");
}
}
function change_category(value,div,selected)
{
if(div=='kategori7'){
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}else if(div=='kategori6'){
$("option", $("select[name='kategori7']")).remove();
$("select[name='kategori7']").trigger("liszt:updated");
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}else if(div=='kategori5'){
$("option", $("select[name='kategori6']")).remove();
$("select[name='kategori6']").trigger("liszt:updated");
$("option", $("select[name='kategori7']")).remove();
$("select[name='kategori7']").trigger("liszt:updated");
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}else if(div=='kategori4'){
$("option", $("select[name='kategori5']")).remove();
$("select[name='kategori5']").trigger("liszt:updated");
$("option", $("select[name='kategori6']")).remove();
$("select[name='kategori6']").trigger("liszt:updated");
$("option", $("select[name='kategori7']")).remove();
$("select[name='kategori7']").trigger("liszt:updated");
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}else if(div=='kategori3'){
$("option", $("select[name='kategori4']")).remove();
$("select[name='kategori4']").trigger("liszt:updated");
$("option", $("select[name='kategori5']")).remove();
$("select[name='kategori5']").trigger("liszt:updated");
$("option", $("select[name='kategori6']")).remove();
$("select[name='kategori6']").trigger("liszt:updated");
$("option", $("select[name='kategori7']")).remove();
$("select[name='kategori7']").trigger("liszt:updated");
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}else if(div=='kategori2'){
$("option", $("select[name='kategori3']")).remove();
$("select[name='kategori4']").trigger("liszt:updated");
$("option", $("select[name='kategori4']")).remove();
$("select[name='kategori4']").trigger("liszt:updated");
$("option", $("select[name='kategori5']")).remove();
$("select[name='kategori5']").trigger("liszt:updated");
$("option", $("select[name='kategori6']")).remove();
$("select[name='kategori6']").trigger("liszt:updated");
$("option", $("select[name='kategori7']")).remove();
$("select[name='kategori7']").trigger("liszt:updated");
$("option", $("select[name='kategori8']")).remove();
$("select[name='kategori8']").trigger("liszt:updated");
}
$.get("call_category.php", { id: value,div: div,selected: selected })
.done(function(data) {
$("#"+div).html(data);
});
}
function change_ad_source_type(option){
if(option=='3'){
$("#ad_code").show("slow");
}else{
$("#ad_code").hide("slow");
}
}
function show_end_time(proc){
if(proc=='1'){
$("#bakim_tarih").show("slow");
}else{
$("#bakim_tarih").hide("slow");
}
}
function show_video_price(proc){
if(proc=='1'){
$("#video_ekleme_ucreti").show("slow");
}else{
$("#video_ekleme_ucreti").hide("slow");
}
}
function show_sms_details(proc){
if(proc=='1'){
$(".sms_details").show("slow");
}else{
$(".sms_details").hide("slow");
}
}
function paypal_details(proc){
if(proc=='1'){
$(".login_details").show("slow");
}else{
$(".login_details").hide("slow");
}
}
/* Desarrollo IDS Comercial - 2018 */

/* Funciones */
function openChat(){
	window.open('http://200.94.70.123/ChatSegBancomer/?nSrvID=2', 'mywin','left=20, top=20, width=500, height=500, toolbar=1, resizable=0');
 	return false;
}


/* jQuery - Body onLoad */
$(document).ready(function(){

	/* Menú pre footer - onClick para item de chat - abrir popup */
    $('#menu-item-28605 a').click(function(){
        openChat(); //funcion de la línea 4
	});
	
	/* desplegable de acceso a usuarios */
	$('#openweb-access-lg').click(function(){
		console.log('access button clicked');
		jQuery('#login-in-mobile').collapse('show');
		jQuery('#register-mobile').collapse('hide');
	});
	
	/* desplegable de registro */
	$('#openweb-register-lg').click(function(){
		console.log('register button clicked');
		jQuery('#login-in-mobile').collapse('hide');
		jQuery('#register-mobile').collapse('show');
	});
	

	/* desplegable de acceso a usuarios */
	$('#openweb-access-mobile').click(function(){
		console.log('access button clicked');
		jQuery('#login-in-mobile').collapse('show');
		jQuery('#register-mobile').collapse('hide');
	});
	
	/* desplegable de registro */
	$('#openweb-register-mobile').click(function(){
		console.log('register button clicked');
		jQuery('#login-in-mobile').collapse('hide');
		jQuery('#register-mobile').collapse('show');
	});
	
	/* componente de FAQs - evento click, que muestra el elemento */
	$("div.bhoechie-tab-menu>div.faqs-sidetab>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.bhoechie-tab>div.faqs-tab-content").removeClass("active");
		$("div.bhoechie-tab>div.faqs-tab-content").eq(index).addClass("active");
	});
	

});
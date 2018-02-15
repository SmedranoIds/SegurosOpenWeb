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
	
});
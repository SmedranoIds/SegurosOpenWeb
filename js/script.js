/* Desarrollo IDS Comercial - 2018 */

/* Funciones */
function openChat(){
	// window.open('http://200.94.70.123/ChatSegBancomer/?nSrvID=2', 'mywin','left=20, top=20, width=500, height=500, toolbar=1, resizable=0');
	window.open('https://atentobbvamx.s1gateway.com/api/channel/webchat.php?action=js&cpg_id=10002', 'mywin','left=20, top=20, width=500, height=500, toolbar=1, resizable=0');
	return false;
}


/* jQuery - Body onLoad */
$(document).ready(function(){

	/* Menú pre footer - onClick para item de chat - abrir popup */
    $('#menu-item-28178 a').click(function(){
		openChat(); //funcion de la línea 4
		return false;
	});
	
	// desplegable de acceso a usuarios

	/*
	$('#openweb-access-lg').click(function(){
		console.log('access button clicked');
		jQuery('#login-in-mobile').collapse('show');
		jQuery('#register-mobile').collapse('hide');
	});
	*/
	
	// desplegable de registro
	/*
	$('#openweb-register-lg').click(function(){
		console.log('register button clicked');
		jQuery('#login-in-mobile').collapse('hide');
		jQuery('#register-mobile').collapse('show');
	});
	*/
	

	// desplegable de acceso a usuarios 
	/*
	$('#openweb-access-mobile').click(function(){
		console.log('access button clicked');
		jQuery('#login-in-mobile').collapse('show');
		jQuery('#register-mobile').collapse('hide');
	});
	*/
	
	// desplegable de registro
	/*
	$('#openweb-register-mobile').click(function(){
		console.log('register button clicked');
		jQuery('#login-in-mobile').collapse('hide');
		jQuery('#register-mobile').collapse('show');
	});
	*/
	
	/* componente de FAQs - evento click, que muestra el elemento */
	$("div.faqs-tab-menu>div.faqs-sidetab>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.faqs-tab>div.faqs-tab-content").removeClass("active");
		$("div.faqs-tab>div.faqs-tab-content").eq(index).addClass("active");
		
	});


	// Primer elemento que muestre la información (agregar la clase 'active');
	$("div.faqs-tab>div.faqs-tab-content").eq(0).addClass("active");
	
});

$(function(){
	initGlossaryFilter();
});

// Filter Glossary items
function initGlossaryFilter(){
		// Filter using search box
    $("#glossarySearchInput").bind("keyup", function(){
        var inputValue = $(this).val();

        // Hide all the results & Cards
        $(".glossary__results__row").addClass("inactive");
        $(".glossary__results__item").hide();

        $(".glossary__results__row").each(function(){
            $(".glossary__results__item").each(function(){
                var item = $(this).attr("data-item");

                if(item.toUpperCase().indexOf(inputValue.toUpperCase()) != -1){
                    $(this).parents(".glossary__results__row").removeClass("inactive");
                    $(this).show();
                }
            });
        });
    });
	
		// Filter using navigation
    $(".glossary__nav a").click(function(){
        var nav = $(this).attr("data-nav");

        // Remove & Add active class
        $(".glossary__nav__item").removeClass("active");
        $(this).parent().toggleClass("active");

        // Hide all the results
        $(".glossary__results__row").addClass("inactive");

        // Loop through the row
        $(".glossary__results__row").each(function(){
            var term = $(this).attr("data-term");

            if(nav == term){
                $(this).removeClass("inactive");
            }
        });

        // Only return false if data-toggle is glossary
        if($(this).attr("data-toggle") == "glossary"){
            return false;
        }
    });
}


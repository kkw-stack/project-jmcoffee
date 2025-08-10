/*
* File    : admin.js
* Author  : STUDIO-JT (NICO)
*
* SUMMARY :
* INIT
* FUNCTIONS
*/

jQuery(function($){



	/* **************************************** *
	 * INIT
	 * **************************************** */
	logo_link();


    
	/* **************************************** *
	 * FUNCTIONS
	 * **************************************** */
	// ADD LINK TO FRONT MAIN PAGE
	function logo_link(){
		
		$('#wpadminbar').prepend('<a class="jt_logo_link" href="/"><span class=" screen-reader-text">메인으로</span></a>');
		
	}



})
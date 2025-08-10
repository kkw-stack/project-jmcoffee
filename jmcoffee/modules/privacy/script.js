/*
 * File    : script.js
 * Author  : STUDIO-JT
 *
 * SUMMARY :
 * INIT
 * FUNCTIONS
 */



(function(){



/* **************************************** *
 * INIT
 * **************************************** */    
JT.ui.add( privacy_form_submit, true );
  


/* **************************************** *
 * FUNCTIONS
 * **************************************** */  
function privacy_form_submit(){

    if( !document.querySelector('.privacy-select') ) return;

    const select = document.querySelector('.privacy-select select');

    select.addEventListener('change', () => {

        const form = select.closest('form');
        const formData = new FormData(form);
        const url = form.getAttribute('data-ajax');

        formData.append('action', 'jt_privacy_action');
        formData.append('post_id', select.value);

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(res => {
            document.querySelector('.privacy-content').innerHTML = '<div class="jt-blocks">' + res.data + '</div>';

            gsap.to(window, { duration: .6, scrollTo: JT.offset.top('.privacy_form'), ease: 'power3.out' })
        })
        .catch(error => console.error(error));

        return false;
    });

}



})();

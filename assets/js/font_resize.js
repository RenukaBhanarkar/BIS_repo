

   var p = document.querySelectorAll('p, a, button, td, li, span');
   var pm = document.querySelectorAll('header .sub_header ul li, header .sub_header ul li a');
   function increaseFontSize() {
        $('h1').css('fontSize' , '2.7rem');
    	$('h2').css('fontSize' , '2.2rem');
    	$('h3').css('fontSize' , '1.95rem');
    	$('h4').css('fontSize' , '1.7rem');
    	$('h5').css('fontSize' , '1.45rem');
    	$('h6').css('fontSize' , '1.2rem');
    	
   		for(i=0;i<p.length;i++) {
          p[i].style.fontSize = "17px"
       }
   		for(j=0;j<pm.length;j++) {
            pm[j].style.fontSize = "16px"
         }
     }
    
    function decreaseFontSize() {
        $('h1').css('fontSize' , '2.3rem');
    	$('h2').css('fontSize' , '1.8rem');
    	$('h3').css('fontSize' , '1.55rem');
    	$('h4').css('fontSize' , '1.3rem');
    	$('h5').css('fontSize' , '1.05rem');
    	$('h6').css('fontSize' , '0.8rem');
    	
  		for(i=0;i<p.length;i++) {
          p[i].style.fontSize = "13px"
       }  
  		for(j=0;j<pm.length;j++) {
            pm[j].style.fontSize = "12px"
         }
      }
    function normalFontSize() {
    	$('h1').css('fontSize' , '2.5rem');
    	$('h2').css('fontSize' , '2rem');
    	$('h3').css('fontSize' , '1.75rem');
    	$('h4').css('fontSize' , '1.5rem');
    	$('h5').css('fontSize' , '1.25rem');
    	$('h6').css('fontSize' , '1rem');
    	
    	for(i=0;i<p.length;i++) {
           p[i].style.fontSize = "15px"
        } 
    	for(j=0;j<pm.length;j++) {
          pm[j].style.fontSize = "14px"
         }
      }   
	
      $(document).ready(function() {
         $('#material-tabs').each(function() {
   
               var $active, $content, $links = $(this).find('a');
   
               $active = $($links[0]);
               $active.addClass('active');
   
               $content = $($active[0].hash);
   
               $links.not($active).each(function() {
                     $(this.hash).hide();
               });
   
               $(this).on('click', 'a', function(e) {
   
                     $active.removeClass('active');
                     $content.hide();
   
                     $active = $(this);
                     $content = $(this.hash);
   
                     $active.addClass('active');
                     $content.show();
   
                     e.preventDefault();
               });
         });
   });

   document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth > 992) {

document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

 everyitem.addEventListener('mouseover', function(e){

    let el_link = this.querySelector('a[data-bs-toggle]');

    if(el_link != null){
       let nextEl = el_link.nextElementSibling;
       el_link.classList.add('show');
       nextEl.classList.add('show');
    }

 });
 everyitem.addEventListener('mouseleave', function(e){
    let el_link = this.querySelector('a[data-bs-toggle]');

    if(el_link != null){
       let nextEl = el_link.nextElementSibling;
       el_link.classList.remove('show');
       nextEl.classList.remove('show');
    }


 })
});

}

}); 



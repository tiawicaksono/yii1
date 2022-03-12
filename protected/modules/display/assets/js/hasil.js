/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("html, body").animate({ scrollTop: $(document).height() }, 10000);

setTimeout(function() {
   $('html, body').animate({scrollTop:0}, 10000); 
},90000);


setInterval(function(){
     // 4000 - it will take 4 secound in total from the top of the page to the bottom
$("html, body").animate({ scrollTop: $(document).height() }, 10000);
setTimeout(function() {
   $('html, body').animate({scrollTop:0}, 10000); 
},90000);
    
},90000);


$('html, body').mouseover(function(e) {
$(this).stop(true);
      
    }).mouseout(function() {
         $(this).stop(false);
    });
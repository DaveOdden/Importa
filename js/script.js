/* Author:
David Odden
*/
$(document).ready(function () {
 
    // if user clicked on button, the overlay layer or the dialogbox, close the dialog  
    $('.button, .entry_cancel, #dialog-overlay').click(function () {     
        $('#dialog-overlay, #dialog-box').hide().animate({opacity: 0}, 100 ); 
        return false;
    });
     
    // if user resize the window, call the same function again
    // to make sure the overlay fills the screen and dialogbox aligned to center    
    $(window).resize(function () {     
        //only do it if the dialog box is not hidden
        if (!$('#dialog-box').is(':hidden')) popup();       
    });  
});

//Popup dialog
function newEntry(message) {
         
    // get the screen height and width  
    var maskHeight = $(document).height();  
    var maskWidth = $(window).width();
     
    // calculate the values for center alignment
    var dialogTop =  (maskHeight/2) - ($('#dialog-box').height());  
    var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2); 
     
    // assign values to the overlay and dialog box
    $('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show().animate({opacity: 0.5},00 );
    $('#dialog-box').css({top:dialogTop, left:dialogLeft}).show().animate({opacity: 1}, 100 );
     
    // display the message
    $('#dialog-message').html(message);
             
}






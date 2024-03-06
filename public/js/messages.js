setTimeout(function(){
   var successMessage = document.getElementById('successMessage');
   if(successMessage){
       successMessage.remove();
   }
}, 2000 );

setTimeout(function (){
    var deleteMessage = document.getElementById('deleteMessage');
    if(deleteMessage){
        deleteMessage.remove();
    }
}, 2000);

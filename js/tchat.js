 
var url = "views/tchatAjax.php";
var lastid = 0;
var timer = setInterval(getMessages,2000);
$(function(){
    $("#tchatForm form").submit(function(){
      
       var message =  $("#tchatForm form textarea").val();
        $.post(url,{action:"addMessage",message:message},function(data){
            if(data.erreur=="ok"){
                
              
                $("#tchatForm form textarea").val("");
                 getMessages();
                
            }
            else{
                alert(data.erreur);
            }
            
        },"json");
        
        return false;
    })
});

$(function(){
    $('#message').keyup(function(e) {    
   if(e.keyCode == 13) {
      
       var message =  $("#tchatForm form textarea").val();
        $.post(url,{action:"addMessage",message:message},function(data){
            if(data.erreur=="ok"){
                
              
                $("#tchatForm form textarea").val("");
                 getMessages();
                
            }
            else{
                alert(data.erreur);
            }
            
        },"json");
        
        return false;
    }})
});


function getMessages(){
 $.post(url,{action:"getMessages",lastid:lastid},function(data){
            if(data.erreur=="ok"){
               
               $("#tchat").append(data.result);
            
             
               
                 lastid=data.lastid;
                 
                
              
            }
            else{
                alert(data.erreur);
            }
            
        },"json");
        
        return false;
    
}



 $(function(){
     
            $(".panel.panel-chat > .panel-heading > .chatMinimize").click(function(){
                
                if($(this).parent().parent().hasClass('mini'))
                {
                    $(this).parent().parent().removeClass('mini').addClass('normal');

                    $('.panel.panel-chat > .panel-body').animate({height: "250px"}, 500).show();

                    $('.panel.panel-chat > .panel-footer').animate({height: "75px"}, 500).show();
                }
                else
                {
                    $(this).parent().parent().removeClass('normal').addClass('mini');

                    $('.panel.panel-chat > .panel-body').animate({height: "0"}, 500);

                    $('.panel.panel-chat > .panel-footer').animate({height: "0"}, 500);

                    setTimeout(function() {
                        $('.panel.panel-chat > .panel-body').hide();
                        $('.panel.panel-chat > .panel-footer').hide();
                    }, 500);


                }

            });
            $(".panel.panel-chat > .panel-heading > .chatClose").click(function(){
              
                $(this).parent().parent().remove();
                
            });
        })
 
            <!--
			    function toggle_visibility(id) {
			       var e = document.getElementById(id);
			       if(e.style.display == 'block')
			          e.style.display = 'none';
			       else
			          e.style.display = 'block';
			    }
			//-->

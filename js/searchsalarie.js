$(document).ready(function(){
    
  $("#recherchee").keyup(function(){
      var recherche = $(this).val();
      var data = 'motclef=' + recherche;
      
      if(recherche.length>0){
     
      $.ajax({
      type : "GET",
      url : "models/resultsalarie.php",
      data : data,
      success: function(server_response){
      
      $("#resultatt").html(server_response).show();
  }
      
  });
    
                                 
                                
  }
      if(recherche.length<=0){
     
      $.ajax({
      type : "GET",
      url : "models/resultsalarie.php",
      data : data,
      success: function(server_response){
      
      $("#resultatt").html(server_response).hide();
  }
      
  });
    
                                 
                                
  }
 
  
  });

  
});
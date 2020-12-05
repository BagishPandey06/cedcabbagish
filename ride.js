
$(document).ready(function () {
  var pick="cu";
  var drop="cu";
  var cab="cu";
  var kg=0;
    var cab;
    
   
    $("#pick").change(function(){
        pick=$(this).val();
        
      }); 
      $("#drop").change(function(){
        drop=$(this).val();
      });
      $("#cab").change(function(){
        cab=$(this).val();
        
        if(cab=="CedMicro"){
            $("#kg").prop('disabled',true);
            alert("CedMicro doesnt carry luggage");
            $(".kg").css("display", "none");
        } else {  
            $("#kg").prop('disabled',false);
            $(".kg").css("display", "");
        }
      });
      $("#kg").change(function(){
        kg=$(this).val();
        
      });
      $("#cancel").click(function () {
        $('.rideinfo').hide();
      });
     $(".btn1").click(function () {
      if(pick==drop){
        alert("please select pickup and drop diffrent");
        return;
    }
      if(pick=='cu'){
          alert("please select pickup location");
          return;
      }
      if(drop=='cu'){
        alert("please select Dropp location");
        return;
    }
    if(cab=='cu'){
      alert("ohhoo please select cab first");
      return;
  }
  
        $.ajax({
            
             url: "ride.php",
             method:"post",
             type: "post",
             data:{
                 pick:pick,
                 drop:drop,
                 cab:cab,
                 kg:kg,
                 action:'calculation'
            },dataType: 'json',
            success: function (result) {
             
              $('.rideinfo').show();
              $('.pick').html(result[0]);
              $('.drop').html(result[1]);
              $('.cab').html(result[2]);
              $('.kgm').html(result[3]);
              $('.dis').html(result[4]);            
              $('.cost').html(result[5]);
              
            }
        });
      });
      $(".book").click(function () {
        if(pick==drop){
          alert("please select pickup and drop diffrent");
          return;
      }
        if(pick=='cu'){
            alert("please select pickup location");
            return;
        }
        if(drop=='cu'){
          alert("please select Dropp location");
          return;
      }
      if(cab=='cu'){
        alert("ohhoo please select cab first");
        return;
    }
    
          $.ajax({
              
               url: "ride.php",
               type: "post",
               data:{
                   pick:pick,
                   drop:drop,
                   cab:cab,
                   kg:kg,
                   action: 'book'
              },
              dataType: 'html',
              success: function (result) {
                // debugger;
                // console.log(result);
               if(result=='login'){
                window.location.href='login.php';
               } else {
                window.location.href='userdashboard.php';
               }
                
              },
              error: function(xhr){
                debugger ;
                console.log(xhr);
              }
          });
        });
    });

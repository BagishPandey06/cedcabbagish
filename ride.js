
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
        } else {  
            $("#kg").prop('disabled',false);
        }
      });
      $("#kg").change(function(){
        kg=$(this).val();
        
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
                 kg:kg
            },
            success: function (result) {
                window.location.href="index.php";

            }
        });
      });
    });

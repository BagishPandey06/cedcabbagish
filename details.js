
$(document).ready(function () {
    var name;
    var mobile;
    var old;
    var newp;
    $("#mobile").keypress(function(event) {
        var m=$(this).val();
                 if(m.lenth<=10 || m.length>=10){
                     alert("mobile no. is valid of 10 digits only !");
                    return false;
                 } else {

                  return true;
                  
                 }
            
      });
      $("#mobile").keypress(function(event) {
      var character = String.fromCharCode(event.keyCode);
          return isValidm(character);  
        } );
      function isValidm(str) {
          return !/[~`.!@#$%\^&*()+=\-\[\]\\';(a-z)(A-Z),/{}|\\":<>\?]/g.test(str);
      }
    $("#name").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
    });
    
    function isValid(str) {
        return !/[~`.!@#$%\^&*()+=\-\[\]\\';0123456789,/{}|\\":<>\?]/g.test(str);
    }
    $("#userdash").show();
    $("#updateinfo").hide();
    $("#changepass").hide();
    $("#pnd_ri").hide();
    $("#com_ri").hide();
    $("#all_ri").hide();
    $("#canc").hide();
    $("#fs").hide();
    $(document).on("click","#home",function () {
        $("#userdash").show();
        $("#updateinfo").hide();
        $("#changepass").hide();
        $("#pnd_ri").hide();
        $("#com_ri").hide();
        $("#all_ri").hide();
        $("#canc").hide(); $("#fs").hide();
    });
    //update info
    $(document).on("click","#update",function () {
            $("#userdash").hide();
            $("#updateinfo").show();
            $("#changepass").hide();
            $("#pnd_ri").hide();
            $("#com_ri").hide();
            $("#all_ri").hide();
            $("#canc").hide(); $("#fs").hide();
    });
    //change password
    $(document).on("click","#chngpass",function () {
        $("#userdash").hide();
        $("#updateinfo").hide();
        $("#changepass").show();
        $("#pnd_ri").hide();
        $("#com_ri").hide();
        $("#all_ri").hide(); $("#fs").hide();
        $("#canc").hide();

    });
    $(document).on("click","#info",function () {
       if ($("#name").val()=='') {
           alert('name feild cannot be empty');
           return false;
       } else {name=$("#name").val();}
       if ($("#mobile").val()=='') {
        alert('mobile feild cannot be empty');
        return false;
        } else {
            mobile=$("#mobile").val();
        }
           var action="update";
          $.ajax({
              
               url: "deup.php",
               type: "post",
               data:{
                   name:name,
                   mobile:mobile,
                   action:action,
              },
              success: function (result) {
                  alert("information updated succesfully");
                  $("#name").val('');
                  $("#mobile").val('');
              }
          });
        });

        $(document).on("click",".cpass",function () {
            if ($("#opass").val()=='') {
                alert('old password feild cannot be empty');
                return false;
            } else {
                old=$("#opass").val();
            }
            var chk = $("#npass").val();
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (chk.length <= 6 || chk.length >= 20) {
                alert("Password Must Contain 6 to 20 Characters Only !");
                $("#npass").val('');
                return false;
            } else {
                if (chk.match(passw)) {
                    newp=$("#npass").val();

               var action="pass";
               $.ajax({
                   
                    url: "deup.php",
                    type: "post",
                    data:{
                        old:old,
                        newp:newp,
                        action:action,
                   },
                   success: function (result) {
                       if(result == 'inserted'){
                           alert("password updated succesfully!!please login again");
                           
                           window.location.href="logout.php";
                           
                       }
                   }
               });
                    return true;
                }
                else {
                    alert('Password Must Conatin  at least One Numeric Digit, One Uppercase and One Lowercase Letter !')
                    return false;
                }
            }
            
           
                
             
            
            
        
            });
   
        // -------------------------------------------------ride details----------------------------------------
        //pending ride
        $(document).on("click","#pndri",function(){
            $("#userdash").hide();
            $("#updateinfo").hide();
            $("#changepass").hide();
            $("#pnd_ri").show();
            $("#com_ri").hide();
            $("#all_ri").hide(); $("#fs").hide();
            $("#canc").hide();
            showridea();
        });
        function showridea(){
           
            html = ' <h1 class="text-center">pending rides</h1><table class="table table-striped table-dark">\
            <tr class="font-weight-bold"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td><td>Cab</td><td>Actions</td></tr>';
            var action="pndri";
            $.ajax({
                 url: "deup.php",
                 type: "post",
                 data:{
                     action:action,
                },
                dataType: "json",
                success: function (result) {
                
                    //alert(result);
                    for (var i = 0; i < result.length; i++) {
                       
                        html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                            result[i]['tol'] + '</td><td>'+ result[i]['totaldistance'] + '</td><td>' +
                            result[i]['luggage'] + '</td><td>'+ result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                            '</td><td><button class="btn btn-danger pl-3 delr" \
                            data-id='+ result[i]['rideid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                    }
                    html += '</table>';
                    $("#pnd_ri").html(html);
                }
             });
             }

    //user Delete the ride request
    $(document).on("click",'.delr',function(){
        var x = confirm("Are you sure you want to delete Ride?");
        if (x)
           {
        var id=$(this).data('id');
        var action="delride";
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if(result=="inserted"){
                    alert("ride canceled by you successfully !!");
                    showridea();
                } else{
                    alert("result");
                }
            }
        });} else {
            return false;
        }
    });
    //end prnding ride
    

    //completed ride
    $(document).on("click","#comri",function () {
        $("#userdash").hide();
            $("#updateinfo").hide();
            $("#changepass").hide();
            $("#pnd_ri").hide();
            $("#com_ri").show();
            $("#all_ri").hide();
            $("#canc").hide();
        html = '<h1 class="text-center">completed rides</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td>\
        <td>Amount<small>(inr)</small></td><td>Cab</td><td>Invoice print</td></tr>';
        var action = "compride";
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html +=  '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                    result[i]['tol'] + '</td><td>'+ result[i]['totaldistance'] + '</td><td>' +
                     result[i]['luggage'] + '</td><td>'+ result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                    '</td><td><button class="btn btn-outline-success pl-3 invoice" data-toggle="modal" data-target="#exampleModal"  data-id='+ result[i]['rideid'] + '>\
                    <i class="fas fa-receipt " aria-hidden="true" ></i></button> </td></tr>';
                }
                html += '</table>';
                $("#com_ri").html(html);
            }
        });
    });
    //invoice
    $(document).on("click",".invoice",function () {
        var action = "invoice";
        var id=$(this).data('id');
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                id:id,
                action: action
            },
            dataType: "json",
            success: function (result) {
                var htmll='';
              for(var i=0;i<result.length;i++)
              {
                    htmll+='<table class="table"><tr>\
                    <td>RIDE DATE</td><td>' + result[i]['ridedate'] + '</td></tr>\
                    <tr><td>FROM</td><td>' + result[i]['froml'] + '</td></tr>\
                    <tr><td>TO</td><td>' +result[i]['tol'] + '</td></tr>\
                    <tr><td>TOTAL Distance</td><td>'+ result[i]['totaldistance'] + '<small>Km</small></td></tr>\
                    <tr><td>TOTAL luggage</td><td>' +result[i]['luggage'] + '</td></tr>\
                    <tr><td>TOTAL fare</td><td><i class="fa fa-inr" style="font-size:15px"></i>'+ result[i]['totalefare'] + '</td></tr>\
                    <tr><td>CAB TYPE</td><td>' + result[i]['cab'] +'</td></tr></table>';
                
                // htmll += '</table>';
                $(".modal-body").html(htmll);
             }
        }
    });
    });
    //end invoice
    //end completed ride
    $(document).on("click","#canri",function () {
        $("#userdash").hide();
        $("#updateinfo").hide();
        $("#changepass").hide(); $("#fs").hide();
        $("#pnd_ri").hide();
        $("#com_ri").hide();
        $("#all_ri").hide();
        $("#canc").hide();
        $("#canc").show();
    html = '<h1 class="text-center">Canceled Rides</h1><table class="table table-striped table-dark">\
    <tr class="font-weight-bold"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td>\
    <td>Amount<small>(inr)</small></td><td>Cab</td></tr>';
    var action = "canc";
    $.ajax({
        url: "deup.php",
        type: "post",
        data: {
            action: action
        },
        dataType: "json",
        success: function (result) {
            //alert(result);
            for (var i = 0; i < result.length; i++) {
                html +=  '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                result[i]['tol'] + '</td><td>'+ result[i]['totaldistance'] + '</td><td>' +
                 result[i]['luggage'] + '</td><td>'+ result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                  '</td></tr>';
            }
            html += '</table>';
            $("#canc").html(html);
        }
    });
});
    //All ride
    $(document).on("click","#allri",function () {
            $("#userdash").hide();
            $("#updateinfo").hide();
            $("#changepass").hide();
            $("#pnd_ri").hide();
            $("#com_ri").hide();
            $("#canc").hide();
            $("#all_ri").show(); $("#fs").show();
        html = '<h1 class="text-center">All rides</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td>\
        <td>Amount<small>(inr)</small></td><td>Cab</td><td>status</td></tr>';
        var action = "allride";
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    if (result[i]['status'] == 0) {
                        status = '<td class="text-warning">pending..<i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>';
                    } else if (result[i]['status'] == 1) {
                        status = '<td class="text-success">Completed !</td>';
                    } else {
                        status = '<td class="text-danger">Cancle</td>';
                    }
                    html +=  '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                    result[i]['tol'] + '</td><td>'+ result[i]['totaldistance'] + '</td><td>' +
                     result[i]['luggage'] + '</td><td>'+ result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
        '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#all_ri").html(html);
            }
        });
    });
    
    //end All ride

    //sort by
    $(document).on("change",".sort",function(){
        $("#userdash").hide();
        $("#updateinfo").hide();
        $("#changepass").hide();
        $("#pnd_ri").hide();
        $("#com_ri").hide();
        $("#canc").hide();
        $("#all_ri").show(); $("#fs").show();
        sort=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>status</td></tr>';
        var action = "getsortride";
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                action: action,
                sort: sort
            },
            dataType: "json",
            success: function (result) {
                
                for (var i = 0; i < result.length; i++) {
                    if (result[i]['status'] == 0) {
                        status = '<td class="text-warning">pending..<i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>';
                    } else if (result[i]['status'] == 1) {
                        status = '<td class="text-success"><span>Completed !<i class="fa fa-check-circle" style="font-size:36px;color:green"></i></span></td>';
                    } else {
                        status = '<td class="text-danger">Cancel</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#all_ri").html(html);
            }
        });
      });


      //filter by
      $(document).on("change",".filter",function(){
        $("#userdash").hide();
            $("#updateinfo").hide();
            $("#changepass").hide();
            $("#pnd_ri").hide();
            $("#com_ri").hide();
            $("#canc").hide();
            $("#all_ri").show(); $("#fs").show();
        filter=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>status</td></tr>';
        var action = "getfilterride";
        $.ajax({
            url: "deup.php",
            type: "post",
            data: {
                action: action,
                filter: filter
            },
            dataType: "json",
            success: function (result) {
               
                for (var i = 0; i < result.length; i++) {
                    if (result[i]['status'] == 0) {
                        status = '<td class="text-warning">pending..<i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>';
                    } else if (result[i]['status'] == 1) {
                        status = '<td class="text-success">Completed !<i class="fa fa-check-circle" style="font-size:36px;color:green"></i></td>';
                    } else {
                        status = '<td class="text-danger">Cancel</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#all_ri").html(html);
            }
        });
      });
    //end filter by
        // ---------------------------------------------End ride details----------------------------------------

      
    });
  

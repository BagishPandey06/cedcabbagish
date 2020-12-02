$(document).ready(function () {
    var filter;
    $('#fs').hide();
    $("#chngadminpass").hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        $("#homeadmin").show();
    $(document).on("click","#home", function () {  
        
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        window.location.href="dashboardadmin.php";
    });
    //.........................................ride section..............................................................//
    //pending rides 
    $(document).on("click", "#penride", function () {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
         
        showride();

    });
    function showride() {

        html = ' <h1 class="text-center font-weight-bold">Pending Rides</h1>\
    <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-primary text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small>\
    </td><td>Amount</td><td>Cab</td><td>Actions</td></tr>';
        var action = "getpenride";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                        result[i]['tol'] + '</td><td>' + result[i]['totaldistance'] + '</td><td>' +
                        result[i]['luggage'] + '</td><td>' + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                        '</td><td><button class="btn btn-info mr-3 acptr" data-id=' + result[i]['rideid'] + '>\
                    <i class="fa fa-check-square-o" aria-hidden="true"></i></button><button class="btn btn-danger pl-3 delr" \
                    data-id='+ result[i]['rideid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    }


    //admin accepts the ride
    $(document).on("click", '.acptr', function () {
        var id = $(this).data('id');
        var action = "acceptride";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if (result == "inserted") {
                    showride();
                } else {
                    alert("result");
                }
            }
        });
    });
    //end admin accepts the ride 

    //admin Delete the ride request
    $(document).on("click", '.delr', function () {
        var id = $(this).data('id');
        var action = "delride";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if (result == "inserted") {
                    alert("USER ride canceled");
                    showride();
                } else {
                    alert("result");
                }
            }
        });
    });
    //end admin delete the user ride request 
    //end pending ride




    //Accepted ride
    $(document).on("click", "#compride", function () {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Completed Rides</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold table-success text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td>\
        <td>Amount</td><td>Cab</td><td>Invoice print</td></tr>';
        var action = "compride";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                        result[i]['tol'] + '</td><td>' + result[i]['totaldistance'] + '</td><td>' +
                        result[i]['luggage'] + '</td><td>' + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                        '</td><td><button class="btn btn-outline-success pl-3 invoicead" data-toggle="modal" data-target="#exampleModal"  data-id='+ result[i]['rideid'] + '>\
                        <i class="fas fa-receipt " aria-hidden="true" ></i></button> </td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });

    //end completed ride
 //invoice
 $(document).on("click",".invoicead",function () {
    //$('#fs').hide();
    var action = "invoice";
    var id=$(this).data('id');
    $.ajax({
        url: "trans.php",
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
                <tr><td>TOTAL Distance</td><td>'+ result[i]['totaldistance'] + '</td></tr>\
                <tr><td>TOTAL luggage</td><td>' +result[i]['luggage'] + '</td></tr>\
                <tr><td>TOTAL fare</td><td>'+ result[i]['totalefare'] + '</td></tr>\
                <tr><td>CAB TYPE</td><td>' + result[i]['cab'] +'</td></tr></table>';
            
            // htmll += '</table>';
            $(".modal-body").html(htmll);
         }
    }
});
});
//end invoice

    //Canceled ride
    $(document).on("click", "#cancelride", function () {
        $('#fs').hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#chngadminpass").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Canceled Rides</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold table-danger text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td>\
        <td>Amount</td><td>Cab</td></tr>';
        var action = "canride";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                        result[i]['tol'] + '</td><td>' + result[i]['totaldistance'] + '</td><td>' +
                        result[i]['luggage'] + '</td><td>' + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                        '</td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });

    //end Canceled ride


    //show all rides
    $(document).on("click", "#rideb", function () {
        $('#fs').show();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">All rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td><td>status</td></tr>';
        var action = "getride";
        $.ajax({
            url: "trans.php",
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
                        status = '<td class="text-success">Completed !<i class="fa fa-check-circle" style="font-size:36px;color:green"></i></td>';
                    } else {
                        status = '<td class="text-danger">Cancle</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });

    });
    //show all rides ends
    //filter by
    $(document).on("change",".filter",function(){
        $('#fs').show();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        filter=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td><td>status</td></tr>';
        var action = "getfilterride";
        $.ajax({
            url: "trans.php",
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
                        status = '<td class="text-danger">Cancle</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
      });
    //end filter by
    //sort by
    $(document).on("change",".sort",function(){
        $('#fs').show();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        sort=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td><td>status</td></tr>';
        var action = "getsortride";
        $.ajax({
            url: "trans.php",
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
                        status = '<td class="text-danger">Cancle</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
      });
    //end sort by

    //.........................................user section..............................................................//

    //pending user
    $(document).on("click", "#penuser", function () {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        showdata();

    });
    function showdata() {
        html = '<h1 class="text-center font-weight-bold">Pending User</h1>\
        <table class="table table-striped table-dark"><tr class="font-weight-bold table-warning text-dark"><td>username</td>\
        <td>name</td><td>mobile</td><td>Date of sign up</td> <td>ACTION</td></tr>';
        var action = "getpenuser";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['username'] + '</td><td>' + result[i]['name'] +
                        '</td><td>' + result[i]['mobile'] + '</td><td>' + result[i]['dateofsignup'] +
                        '</td><td><button class="btn btn-info mr-3 acpt" data-id=' + result[i]['userid'] + '>\
                      <i class="fa fa-check-square-o" aria-hidden="true"></i></button><button class="btn btn-danger pl-3 del" \
                      data-id='+ result[i]['userid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    }
    //end pending user

    //admin accepts the user
    $(document).on("click", '.acpt', function () {
        var id = $(this).data('id');
        var action = "acceptuser";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if (result == "inserted") {
                    showdata();
                } else {
                    alert("result");
                }
            }
        });
    });
    //end admin accepts the user 

    //admin Delete the user
    $(document).on("click", '.del', function () {
        var id = $(this).data('id');
        var action = "deluser";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if (result == "inserted") {
                    alert("USER deleted");
                    showdata();
                } else {
                    alert("result");
                }
            }
        });
    });
    //end admin delete the user 



    //Accepted user
    $(document).on("click", "#acptuserb", function () {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Accepted users</h1>\
        <table class="table table-striped table-dark"><tr class="font-weight-bold table-success text-dark"><td>username</td>\
        <td>name</td><td>mobile</td><td>Date of sign up</td><td>Action</td></tr>';
        var action = "getacptuser";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['username'] + '</td><td>' + result[i]['name'] +
                        '</td><td>' + result[i]['mobile'] + '</td><td>' + result[i]['dateofsignup'] +
                        '</td><td>'+'<button class="btn btn-danger pl-3 ban" \
                        data-id='+ result[i]['userid'] + '><i class="fa fa-ban" aria-hidden="true"></i></button>'+'</td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });
    //End Accepted user
 //admin blocks the accepted  user
 $(document).on("click", '.ban', function () {
    var id = $(this).data('id');
    var action = "blockuser";
    $.ajax({
        url: "trans.php",
        type: "post",
        data: {
            action: action,
            id: id
        },
        success: function (result) {
            if (result == "inserted") {
                showdata();
            } else {
                alert("result");
            }
        }
    });
});
//end admin blocks the accepted  user 


    // show all users
    $(document).on("click", "#alluserb", function () {
        $('#fs').hide();
        //$('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">All user</h1>\
        <table class="table table-striped table-dark"><tr class="font-weight-bold table-light text-dark"><td>username</td>\
        <td>name</td><td>mobile</td><td>Date of sign up</td><td>status</td></tr>';
        var action = "getuser";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    if (result[i]['isblock'] == 0) {
                        status = '<td class="text-danger">block..<i class="fa fa-ban" style="font-size:24px"></i></td>';
                    } else if (result[i]['isblock'] == 1) {
                        status = '<td class="text-success">unblocked !<i class="fa fa-check-circle" style="font-size:24px;color:green"></i></td>';
                    } 
                    html += '<tr><td>' + result[i]['username'] + '</td><td>' + result[i]['name'] +
                        '</td><td>' + result[i]['mobile'] + '</td><td>' + result[i]['dateofsignup'] + '</td>'+status+'</tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });

    });

    //end show all users

    //.........................................location section..............................................................//

    //show location
    $(document).on("click", "#location", function() {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        
    location();

    });
    function location(){
        html = '<h1 class="text-center font-weight-bold">Location</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold table-success text-dark"><td>Location</td><td>Distance</td><td>Avilable</td>\
        <td>Action</td></tr>';
        var action = "getloc";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += '<tr><td>' + result[i]['name'] + '</td><td>' + result[i]['distance'] + '</td><td>' + result[i]['isavilable'] +
                        '</td><td><button class="btn btn-outline-info pl-3 mr-2 editlocation" data-id='+ result[i]['id'] + '><i class="fa fa-edit" aria-hidden="true"></i>\
                        </button><button class="btn btn-outline-danger pl-3" data-id='+ result[i]['id'] + '><i class="fa fa-trash" aria-hidden="true"></i>\
                    </button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    }
    //show location ends
    $(document).on("click",".editlocation",function () {
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#addlocation").hide();
        $("#edlocation").hide();
        
        $("#homeadmin").show();
       
        html='<form method="post">';
        var id = $(this).data('id');
        var action = "editloc";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                id:id,
                action: action
            },
            dataType: "json",
            success: function (result) {
                //alert(result);
                for (var i = 0; i < result.length; i++) {
                    html += ' <div class="form-group">\
                      <label for="exampleInputEmail1" class="font-wegiht-bold">LOCATION NAME</label>\
                      <input type="text" class="form-control"  id="locatione" value="'+result[i]['name']+'"  disabled>\
                    </div>\
                    <div class="form-group">\
                      <label for="dsitance" class="font-wegiht-bold">Distance From Charbagh</label>\
                      <input type="NUMBER" class="form-control"  id="distancee" value="'+result[i]['distance']+'">\
                    </div>\
                    <div class="form-group">\
                      <label for="avilabilty" class="font-wegiht-bold">service avilable</label>\
                      <select class="form-control" id="avilablee" >\
                        <option value="1">Avilable</option>\
                        <option value="0">Not-avilable</option>\
                      </select>\
                    </div>\
                    <input type="button" class="btn btn-primary uploc" data-id='+ result[i]['id'] + ' value="update">';
                }
                html += '</form>';
                $("#homeadmin").html(html);
            }
        });
    });
    $(document).on("click",".uploc",function () {
        var avi;
        var id = $(this).data('id');
        avi = $("#avilablee").val();
        var action = "uploc";
        $.ajax({

            url: "trans.php",
            type: "post",
            data: {
                id,id,
                avi, avi,
                action: action
            },
            success: function (result) {

                alert("location updated succesfully");
                $("#locatione").val('');
                $("#distancee").val('');
                
                
            }
        });
    });
    //add location
    $(document).on("click","#alocation",function () {
        $("#homeadmin").hide();
        $("#fs").hide();
        $("#chngadminpass").hide();
        $("#addlocation").show();
        

    });
    $(document).on("click", "#Add", function () {
        var location;
        var distance;
        var avi;
if($("#locationa").val()==''){
    alert("enter location ");
    return false;
}else {
        location = $("#locationa").val();}
if($("#distance").val()==''){
            alert("enter distance ");
            return false;
        } else {
        distance = $("#distance").val();}
        avi = $("#avilable").val();
        var action = "insertloc";
        $.ajax({

            url: "trans.php",
            type: "post",
            data: {
                location: location,
                distance: distance,
                avi, avi,
                action: action
            },
            success: function (result) {
                alert("location succesfully added");
                $("#locationa").val('');
                $("#distance").val('');
            }
        });
    });
    //add location ends

    //.........................................change admin section..............................................................//
    $(document).on("click","#adminpass", function () {
        $('#fs').hide();
        $("#homeadmin").hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
         $("#chngadminpass").show();
    });
    $(document).on("click","#chngpass",function () {
        var old;
        var newp;
        old = $("#op").val();
        newp = $("#np").val();
        var action="password";
        $.ajax({
            
             url: "trans.php",
             type: "post",
             data:{
                 old:old,
                 newp:newp,
                 action:action,
            },
            success: function (result) {
                if(result=='inserted'){
                    alert("password updated succesfully!!please login again");
                    
                    window.location.href="../logout.php";  
                } else {
                    alert("password doesnot match");
                }
            }
        });
    });


    //.........................................location section..............................................................//


});
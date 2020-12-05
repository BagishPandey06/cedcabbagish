$(document).ready(function () {
    var filter;
    $('#fs').hide();
    $("#chngadminpass").hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        $("#homeadmin").show();
        $('#fsp').hide();
        $('#fsc').hide();
    
    $(document).on("click","#home", function () {  
        $('#fsp').hide();
        $('#fsc').hide();
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        window.location.href="dashboardadmin.php";
    });
    //.........................................ride section..............................................................//
    //pending rides 
    $(document).on("click", "#penride", function () {
        $('#fsp').show();
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        $('#fsc').hide();
        showride();

    });
    //sort by
    $(document).on("change",".sortp",function(){
        $('#fsp').show();
        $('#fs').hide();
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        sort=$(this).val();
        html = '<h1 class="text-center font-weight-bold">Pending Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>status</td><td>Actions</td></tr>';
        var action = "getsortpendride";
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
                        status = '<td class="text-danger">Cancel</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'<td><button class="btn btn-outline-info mr-3 acptr" data-id=' + result[i]['rideid'] + '>\
                        <i class="fa fa-check-square-o" aria-hidden="true"></i></button><button class="btn btn-outline-danger pl-3 delr" \
                        data-id='+ result[i]['rideid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
      });
    //end sort by
    $(document).on("change",".filterp",function(){
        $('#fsp').show();
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        filter=$(this).val();
        html = '<h1 class="text-center font-weight-bold">Pending Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>status</td><td>Action</td></tr>';
        var action = "getfilterpendride";
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
                        status = '<td class="text-danger">Cancel</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td>'+status+'<td><button class="btn btn-outline-info mr-3 acptr" data-id=' + result[i]['rideid'] + '>\
                        <i class="fa fa-check-square-o" aria-hidden="true"></i></button><button class="btn btn-outline-danger pl-3 delr" \
                        data-id='+ result[i]['rideid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });
    function showride() {

        html = ' <h1 class="text-center font-weight-bold">Pending Rides</h1>\
    <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-primary text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small>\
    </td><td>Amount<small>(inr)</small></td><td>Cab</td><td>Actions</td></tr>';
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
                        '</td><td><button class="btn btn-outline-info mr-3 acptr" data-id=' + result[i]['rideid'] + '>\
                    <i class="fa fa-check-square-o" aria-hidden="true"></i></button><button class="btn btn-outline-danger pl-3 delr" \
                    data-id='+ result[i]['rideid'] + '><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    }


    //admin accepts the ride
    $(document).on("click", '.acptr', function () {
        var x = confirm("Are you sure you want to accept?");
  if (x){
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
        });} else {
            return false;
        }
    });
    //end admin accepts the ride 

    //admin Delete the ride request
    $(document).on("click", '.delr', function () {
        var x = confirm("Are you sure you want to delete?");
  if (x)
     { var id = $(this).data('id');
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
                 showride();
             } else {
                 alert("result");
             }
         }
     });}
  else
    {return false;}
        
    });
    //end admin delete the user ride request 
    //end pending ride




    //Accepted ride
    //sort by
    $(document).on("change",".sortc",function(){
        $('#fsp').hide();
        $('#fsc').show();
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        sort=$(this).val();
        html = '<h1 class="text-center font-weight-bold">Completed Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>Invoice</td></tr>';
        var action = "getsortcomride";
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
                  
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td><td><button class="btn btn-outline-success pl-3 invoicead" data-toggle="modal" data-target="#exampleModal"  data-id='+ result[i]['rideid'] + '>\
                        <i class="fas fa-receipt " aria-hidden="true" ></i></button> </td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
      });
    //end sort by
    $(document).on("change",".filterc",function(){
        $('#fsc').show();$('#fsp').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        filter=$(this).val();
        html = '<h1 class="text-center font-weight-bold">Completed Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
    <td>Cab</td><td>Invoice</td></tr>';
        var action = "getfiltercomride";
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
                        status = '<td class="text-danger">Cancel</td>';
                    }
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td><td><button class="btn btn-outline-success pl-3 invoicead" data-toggle="modal" data-target="#exampleModal"  data-id='+ result[i]['rideid'] + '>\
                        <i class="fas fa-receipt " aria-hidden="true" ></i></button> </td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });
    $(document).on("click", "#compride", function () {
        $('#fs').hide();
        $('#fsp').hide();
        $('#fsc').show();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Completed Rides</h1>\
        <table class="table table-striped table-dark">\
        <tr class="font-weight-bold table-success text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td>\
        <td>Amount<small>(inr)</small></td><td>Cab</td><td>Invoice</td></tr>';
        var action = "compride";
        var tot=0;
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
                   tot=parseInt(result[i]['totalefare'])+tot;
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' +
                        result[i]['tol'] + '</td><td>' + result[i]['totaldistance'] + '</td><td>' +
                        result[i]['luggage'] + '</td><td>' + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] +
                        '</td><td><button class="btn btn-outline-success pl-3 invoicead" data-toggle="modal" data-target="#exampleModal"  data-id='+ result[i]['rideid'] + '>\
                        <i class="fas fa-receipt " aria-hidden="true" ></i></button> </td></tr>';
                }
                html += '<tr><td></td><td></td><td></td><td></td><td class="font-weight-bolder h5">TOTAL:</td><td class="text-success font-weight-bolder font-size-larger"><i class="fa fa-inr"></i>'+ tot+'</td></tr></table>';
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
                <tr><td>TOTAL Distance</td><td>'+ result[i]['totaldistance'] + '<small>km</small></td></tr>\
                <tr><td>TOTAL luggage</td><td>' +result[i]['luggage'] + '<small>kg</small></td></tr>\
                <tr><td>TOTAL fare</td><td><i class="fa fa-inr" style="font-size:15"></i>'+ result[i]['totalefare'] + '</td></tr>\
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
        $('#fsp').hide();
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Canceled Rides</h1><table class="table table-striped table-dark">\
        <tr class="font-weight-bold table-danger text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td>\
        <td>Amount<small>(inr)</small></td><td>Cab</td></tr>';
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
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $('#fsp').hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">All rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
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
                        status = '<td class="text-danger">Cancel</td>';
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
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        $('#fsp').hide();
        filter=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
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
                        status = '<td class="text-danger">Cancel</td>';
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
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $("#edlocation").hide();
        $("#addlocation").hide();
        $('#fsp').hide();
        sort=$(this).val();
        html = '<h1 class="text-center font-weight-bold">All Rides</h1>\
        <table class="table table-striped table-dark">\
    <tr class="font-weight-bold table-light text-dark"><td>Ridedate</td><td>From</td><td>To</td><td>Distance<small>(km)</small></td><td>Luggage<small>(kg)</small></td><td>Amount<small>(inr)</small></td>\
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
                        status = '<td class="text-danger">Cancel</td>';
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
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $('#fsp').hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        showdata();

    });
    function showdata() {
        html = '<h1 class="text-center font-weight-bold">Pending User</h1>\
        <table class="table table-striped table-dark"><tr class="font-weight-bold table-warning text-dark"><td>Username</td>\
        <td>Name</td><td>Mobile</td><td>Date of Sign Up</td> <td>Action</td></tr>';
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
        var x = confirm("Are you sure you want to Accept user?");
        if (x){
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
        });} else {
            return false;
        }
    });
    //end admin accepts the user 

    //admin Delete the user
    $(document).on("click", '.del', function () {
        var x = confirm("Are you sure you want to Delete user?");
        if (x){
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
                   
                    showdata();
                } else {
                    alert("result");
                }
            }
        });}
        else {
            return false;
        }
    });
    //end admin delete the user 



    //Accepted user
    $(document).on("click", "#acptuserb", function () {
        $('#fs').hide();
        $('#fsc').hide();
        $("#chngadminpass").hide();
        $("#homeadmin").show();
        $('#fsp').hide();
        $("#edlocation").hide();
        $("#addlocation").hide();
        html = '<h1 class="text-center font-weight-bold">Accepted users</h1>\
        <table class="table table-striped table-dark"><tr class="font-weight-bold table-success text-dark"><td>Username</td>\
        <td>Name</td><td>Mobile</td><td>Date of Sign Up</td><td>Action</td></tr>';
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
                    if (result[i]['isadmin']==1){
                        logo='<td class="text-success"><i class="fa fa-user-circle-o"style="font-size:34px" aria-hidden="true"></i>Hey Admin</td>';
                    } else {
                       logo= '<td><button class="btn btn-danger pl-3 ban" \
                        data-id='+ result[i]['userid'] + '><i class="fa fa-close" aria-hidden="true"></i></button></td>'
                    }
                    html += '<tr><td>' + result[i]['username'] + '</td><td>' + result[i]['name'] +
                        '</td><td>' + result[i]['mobile'] + '</td><td>' + result[i]['dateofsignup'] +
                        '</td>'+logo+'</tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    });
    //End Accepted user
 //admin blocks the accepted  user
 $(document).on("click", '.ban', function () {
    var x = confirm("Are you sure you want to block user location?");
    if (x){
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
} else {
    return false;
}
});
//end admin blocks the accepted  user 


    // show all users
    $(document).on("click", "#alluserb", function () {
        $('#fs').hide();
        $('#fsc').hide();
        $('#fsp').hide();
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
                        status = '<td class="text-danger">Block..<i class="fa fa-ban" style="font-size:24px"></i></td>';
                    } else if (result[i]['isblock'] == 1) {
                        status = '<td class="text-success">Unblocked !<i class="fa fa-check-circle" style="font-size:24px;color:green"></i></td>';
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
        $('#fsp').hide();
        $('#fsc').hide();
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
                    if(result[i]['isavilable']==0){
                        avilabilty='<td class="text-danger">Inavilable</td>';
                    } else if(result[i]['isavilable']==1) {
                        avilabilty='<td class="text-success">Avilable</td>';
                    }
                    html += '<tr><td>' + result[i]['name'] + '</td><td>' + result[i]['distance'] + '</td>' + avilabilty +
                        '<td><button class="btn btn-outline-info pl-3 mr-2 editlocation" data-id='+ result[i]['id'] + '><i class="fa fa-edit" aria-hidden="true"></i>\
                        </button><button class="btn btn-outline-danger pl-3 delloc" data-id='+ result[i]['id'] + '><i class="fa fa-trash" aria-hidden="true"></i>\
                    </button></td></tr>';
                }
                html += '</table>';
                $("#homeadmin").html(html);
            }
        });
    }
    //show location ends
    $(document).on("click",".delloc",function () {
        var x = confirm("Are you sure you want to Delete location?");
        if (x){
        var id = $(this).data('id');
        var action = "delloc";
        $.ajax({
            url: "trans.php",
            type: "post",
            data: {
                action: action,
                id: id
            },
            success: function (result) {
                if (result == "inserted") {
                   
                    location();
                } else {
                    alert("result");
                }
            }
        });}
        else {
            return false;
        }
    });
    $(document).on("click",".editlocation",function () {
        
        $('#fs').hide();
        $("#chngadminpass").hide();
        $("#addlocation").hide();
        $("#edlocation").hide();
        $('#fsc').hide();
        $("#homeadmin").show();
        var x = confirm("Are you sure you want to Edit location?");
  if (x){
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
                var avilable;
                for (var i = 0; i < result.length; i++) {
                    if(result[i]['isavilable'] == 0){
                      avilable= ' <option value="1">Avilable</option><option value="0" selected>Not-avilable</option>';
                        } else {
                            avilable=' <option value="1" selected>Avilable</option><option value="0" >Not-avilable</option>';
                            }
                    html += ' <div class="form-group">\
                      <label for="exampleInputEmail1" class="font-wegiht-bold">LOCATION NAME</label>\
                      <input type="text" class="form-control"  id="locatione" value="'+result[i]['name']+'">\
                    </div>\
                    <div class="form-group">\
                      <label for="dsitance" class="font-wegiht-bold">Distance From Charbagh</label>\
                      <input type="NUMBER" class="form-control" id="distancee" value="'+result[i]['distance']+'">\
                    </div>\
                    <div class="form-group">\
                      <label for="avilabilty" class="font-wegiht-bold">service avilable</label>\
                      <select class="form-control" id="avilablee" >"'+avilable+'"</select></div\
                      ><input type="button" class="btn btn-primary uploc" data-id='+ result[i]['id'] + ' value="update">';
                }
                html += '</form>';
                $("#homeadmin").html(html);
            }
        });} else {
            return false;
        }
    });
    $(document).on("click",".uploc",function () {
        var avi;
        var dis;
        var loc;
       
        var id = $(this).data('id');
        avi = $("#avilablee").val();
        dis = $("#distancee").val();
        loc = $("#locatione").val();
        var action = "uploc";
        $.ajax({

            url: "trans.php",
            type: "post",
            data: {
                id: id,
                avi: avi,
                dis: dis,
                loc: loc,
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
        $('#fsc').hide();
        $('#fsp').hide();
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
        $('#fsp').hide();
        $('#fsc').hide();
        $("#addlocation").hide();
         $("#chngadminpass").show();
    });
    $(document).on("click","#chngpass",function () {
        if ($("#opass").val()=='') {
            alert('old password feild cannot be empty');
            return false;
        } else {
            old=$("#opass").val();
        }
        var chk = $("#np").val();
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if (chk.length <= 6 || chk.length >= 20) {
            alert("Password Must Contain 6 to 20 Characters Only !");
            $("#np").val('');
            return false;
        } else {
            if (chk.match(passw)) {
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
                        //alert(result);
                        if(result=='inserted'){
                            alert("password updated succesfully!!please login again");
                            
                            window.location.href="../logout.php";  
                        } else {
                            alert("password doesnot match");
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


    //.........................................location section..............................................................//
  

});
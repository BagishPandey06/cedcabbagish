$(document).ready(function () {
    var filter;
    $("#locationsec").hide();
    $("#addlocation").hide();
    $("#alluser").hide();
    $("#allride").hide();
    $("#penduser").hide();
    $("#pendride").hide();
    $("#acptuser").hide();
    $("#completride").hide();
    $("#canride").hide();
    $("#fs").hide();
    $("#chngadminpass").hide();

    $(document).on("click", "#home", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#chngadminpass").hide();
        $("#canride").hide();
        $("#homeadmin").show();
        $("#fs").hide();
    });
    //.........................................ride section..............................................................//
    //pending rides 
    $(document).on("click", "#penride", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#acptuser").hide();
        $("#chngadminpass").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#pendride").show();
        $("#fs").hide();
        showride();

    });
    function showride() {

        html = ' <h1 class="text-center">pending rides</h1>\
    <table class="table table-striped table-dark">\
    <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small>\
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
                $("#pendride").html(html);
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
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#chngadminpass").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").show();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#fs").hide();

        html = '<h1 class="text-center">completed rides</h1><table class="table table-striped table-dark">\
        <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td>\
        <td>Amount</td><td>Cab</td></tr>';
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
                        '</td></tr>';
                }
                html += '</table>';
                $("#completride").html(html);
            }
        });
    });

    //end completed ride


    //Canceled ride
    $(document).on("click", "#cancelride", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#chngadminpass").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").show();
        $("#homeadmin").hide();
        $("#fs").hide();

        html = '<h1 class="text-center">canceled rides</h1><table class="table table-striped table-dark">\
        <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td>\
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
                $("#canride").html(html);
            }
        });
    });

    //end Canceled ride


    //show all rides
    $(document).on("click", "#rideb", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").show();
        $("#penduser").hide();
        $("#chngadminpass").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#fs").show();
        html = '<h1 class="text-center">All rides</h1>\
        <table class="table table-striped table-dark">\
    <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td></tr>';
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
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td></tr>';
                }
                html += '</table>';
                $("#allride").html(html);
            }
        });

    });
    //show all rides ends
    //filter by
    $(document).on("change",".filter",function(){
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").show();
        $("#penduser").hide();
        $("#chngadminpass").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide()
        $("#fs").show();
        filter=$(this).val();
        html = '<h1 class="text-center">All rides</h1>\
        <table class="table table-striped table-dark">\
    <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td></tr>';
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
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td></tr>';
                }
                html += '</table>';
                $("#allride").html(html);
            }
        });
      });
    //end filter by
    //sort by
    $(document).on("change",".sort",function(){
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").show();
        $("#penduser").hide();
        $("#chngadminpass").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide()
        $("#fs").show();
        sort=$(this).val();
        html = '<h1 class="text-center">All rides</h1>\
        <table class="table table-striped table-dark">\
    <tr><td>Ridedate</td><td>From</td><td>To</td><td>Distance</td><td>Luggage<small>(kg)</small></td><td>Amount</td>\
    <td>Cab</td></tr>';
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
                    html += '<tr><td>' + result[i]['ridedate'] + '</td><td>' + result[i]['froml'] + '</td><td>' + result[i]['tol'] + '</td><td>'
                        + result[i]['totaldistance'] + '</td><td>' + result[i]['luggage'] + '</td><td>'
                        + result[i]['totalefare'] + '</td><td>' + result[i]['cab'] + '</td></tr>';
                }
                html += '</table>';
                $("#allride").html(html);
            }
        });
      });
    //end sort by

    //.........................................user section..............................................................//

    //pending user
    $(document).on("click", "#penuser", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#chngadminpass").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#penduser").show();
        $("#fs").hide();
        showdata();

    });
    function showdata() {
        html = '<h1 class="text-center">pending user</h1><table class="table table-striped table-dark"><tr><td>username</td>\
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
                $("#penduser").html(html);
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
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#chngadminpass").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").show();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#fs").hide();

        html = '<h1 class="text-center">Accepted users</h1><table class="table table-striped table-dark"><tr><td>username</td>\
        <td>name</td><td>mobile</td><td>Date of sign up</td></tr>';
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
                        '</td></tr>';
                }
                html += '</table>';
                $("#acptuser").html(html);
            }
        });
    });
    //End Accepted user



    // show all users
    $(document).on("click", "#alluserb", function () {
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").show();
        $("#chngadminpass").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#fs").hide();

        html = '<h1 class="text-center">All user</h1><table class="table table-striped table-dark"><tr><td>username</td>\
        <td>name</td><td>mobile</td><td>Date of sign up</td></tr>';
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
                    html += '<tr><td>' + result[i]['username'] + '</td><td>' + result[i]['name'] +
                        '</td><td>' + result[i]['mobile'] + '</td><td>' + result[i]['dateofsignup'] + '</td>\
                     </tr>';
                }
                html += '</table>';
                $("#alluser").html(html);
            }
        });

    });

    //end show all users

    //.........................................location section..............................................................//

    //show location
    $(document).on("click", "#location", function() {
        
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#chngadminpass").hide();
        $("#homeadmin").hide();
        $("#fs").hide();
        $("#locationsec").show();
        html = '<h1 class="text-center">Location</h1><table class="table table-striped table-dark">\
        <tr><td>location</td><td>distance</td><td>avilable</td>\
        <td>ACtIoN</td></tr>';
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
                        '</td><td><button class="btn btn-info mr-3" data-id=' + result[i]['id'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i>\
                    </button><button class="btn btn-danger pl-3" data-id='+ result[i]['id'] + '><i class="fa fa-trash" aria-hidden="true"></i>\
                    </button></td></tr>';
                }
                html += '</table>';
                $("#locationsec").html(html);
            }
        });

    });
    //show location ends


    //add location
    $(document).on("click","#alocation",function () {
        $("#locationsec").hide();
        $("#addlocation").show();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#chngadminpass").hide();
        $("#fs").hide();

    });
    $(document).on("click", "#Add", function () {
        var location;
        var distance;
        var avi;
        location = $("#locationa").val();
        distance = $("#distance").val();
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
        $("#locationsec").hide();
        $("#addlocation").hide();
        $("#alluser").hide();
        $("#allride").hide();
        $("#penduser").hide();
        $("#pendride").hide();
        $("#acptuser").hide();
        $("#completride").hide();
        $("#canride").hide();
        $("#homeadmin").hide();
        $("#fs").hide();
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
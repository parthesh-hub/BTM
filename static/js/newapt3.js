
$(document).ready(function(){

    $('#availservice1').click(function(e){
        e.preventDefault();

        var sc1 = $("#shopservices1 option:selected").text();
        console.log(sc1);
        $.ajax({

            type:"POST",
            cache :false,
            url:"checkavailability.php",
            data: {'availservice1':1,'shopservices1':sc1},
            success: function (responsedata){
                $('.msg1').html(responsedata);
            }
        });

    });

    $('#availservice2').click(function(e){
        e.preventDefault();

        var sc2 = $("#shopservices2 option:selected").text();

        $.ajax({

            type:"POST",
            cache :false,
            url:"checkavailability.php",
            data: {'availservice2':1,'shopservices2':sc2},
            success: function (responsedata){
                $('.msg2').html(responsedata);
            }
        });

    });


    $('#availservice3').click(function(e){
        e.preventDefault();

        var sc3 = $("#shopservices3 option:selected").text();

        $.ajax({

            type:"POST",
            cache :false,
            url:"checkavailability.php",
            data: {'availservice3':1,'shopservices3':sc3},
            success: function (responsedata){
                $('.msg3').html(responsedata);
            }
        });

    });


    $('#availservicehome').click(function(e){
        e.preventDefault();

        var sch = $("#homeservices option:selected").text();
        console.log(sch);

        $.ajax({

            type:"POST",
            cache :false,
            url:"checkavailability.php",
            data: {'availservicehome':1,'homeservices':sch},
            success: function (responsedata){
                $('.msgh').html(responsedata);
            }
        });

    });

});
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url() ?>template/assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>template/assets/js/app.js"></script>
<script>

    $(document).ready(function (){
        // $("#progress-bar").width('0%');
        // $("#progress-bar").width(20 + '%');
        // $("#progress-bar").html('<div id="progress-status">' + 20 +' %</div>')

             $('#transfer_form').submit(function(e) {  
                e.preventDefault();
                $("#transfer_form").hide();
                $("#progress-div").fadeIn();
                $("#progress-bar").width('0%');
                $("#progress-bar").width('10%');
                $("#progress-bar").html('<div id="progress-status">' + 10 +' %</div>');
               // setTimeout(step2(),5000);
                 setTimeout(function(){
                step2(); //trigger second step
            }, 5000);
               
    });

    });

    function step2(){
        $("#progress-bar").width('20%');
       $("#progress-bar").html('<div id="progress-status">' + 20 +' %</div>')
        setTimeout(function(){
                step3(); //trigger second step
            }, 5000);
    }

    function step3(){
        $("#progress-bar").width('30%');
       $("#progress-bar").html('<div id="progress-status">' + 30 +' %</div>')
        setTimeout(function(){
                step4(); //trigger second step
            }, 5000);
    }

    function step4(){
        $("#progress-bar").width('40%');
       $("#progress-bar").html('<div id="progress-status">' + 40 +' %</div>')
        setTimeout(function(){
                step5(); //trigger second step
            }, 5000);
    }

    function step5(){
        $("#progress-bar").width('50%');
       $("#progress-bar").html('<div id="progress-status">' + 50 +' %</div>')
        setTimeout(function(){
                step6(); //trigger second step
            }, 5000);
    }

    function step6(){
        $("#progress-bar").width('60%');
       $("#progress-bar").html('<div id="progress-status">' + 60 +' %</div>')
        setTimeout(function(){
                step7(); //trigger second step
            }, 5000);
    }

    function step7(){
        $("#progress-bar").width('70%');
        $('#progress-bar').css('background-color', 'red');
       $("#progress-bar").html('<div id="progress-status">' + 70 +' %</div>')
       setTimeout(function(){
                step8(); //trigger second step
            }, 5000);
    }

    function step8(){
        $("#progress-div").hide();
        $("#results_message").html('<h4 style="color:Red">Sorry , We could not process your fund transfer. Kindly contact support </h4>')
    }

function do_action(status_id , customer_id)
{
    

    var request_data = {
        "action" : status_id,
        "customer_id" : customer_id
    }

    $.ajax({
        type: "POST",
        url: "doaction",
        dataType: 'json',
        data : request_data,
        cache: false,
       success: function (result) {
           
           
           alert("result");
        // $("#option").html(result);
        //alert(result);
   $('#output').empty();
    $('#output_result').html(result);
    $('#output_result').fadeOut(500);
    $('#output_result').show();
    setTimeout(location.reload(), 3000);
    //location.reload();
    //refresh();
     
       }

    }); // end of ajax..


} // end of do_act...

function refresh()
{
    location.reload();
}
</script>
</body>
</html>
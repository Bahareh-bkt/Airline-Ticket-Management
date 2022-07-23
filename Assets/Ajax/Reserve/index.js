$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        var pcode=$this.data('pcode');
        if(action=="delete"){
            var x=confirm("Are you sure you want to delete the reservation?؟");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> Be patient while processing...!");
                $.ajax({
                    url: 'Delete',
                    type: "POST",
                    data: {code:code,pcode:pcode},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> Reservation successfully deleted !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> The reservation was not deleted!");
                        }
                    }
                });
            }
            else
            {
                window.location.href="";
            }
        }
        if(action=="edit"){
            var x=confirm("Do you want to edit the Reserved Ticket?");
            if(x==true)
                {
                    window.location="Reserve_Update/"+code;
                }
            else
                {
                    window.location.href="";
                }
        }
        
    })
    $.ajax({
        type: 'POST',
        url: "Fetch_json",
        data: {
            cat_id: "2"
        },
        dataType: 'json',
        cache: false,
        success: function (result) {
            $('#cat_parent option').remove(); //Remove any existing options.
            $('#cat_parent').append("<option>"+result.cars[1]+"</option>");
        }
    });
})
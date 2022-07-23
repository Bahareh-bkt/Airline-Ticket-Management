$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        if(action=="delete"){
            var x=confirm("Are you sure about deleting the desired Airline?");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> Please be patient while processing...!");
                $.ajax({
                    url: 'Delete',
                    type: "POST",
                    data: {code:code},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> The Airline was successfully deleted!");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> The Airline was not deleted!");
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
            var x=confirm("Do you want to edit the airline?");
            if(x==true)
                {
                    window.location="Airline_Update/"+code;
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
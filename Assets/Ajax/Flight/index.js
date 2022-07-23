$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        if(action=="delete"){
            var x=confirm("Are you sure about removing the desired Flight?");
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
                            $(".result p").html("<i class='fa fa-warning'></i> The Flight was successfully removed!");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> The Flight was not removed!");
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
            var x=confirm("Do you want to edit the Flight?");
            if(x==true)
                {
                    window.location="Flight_Update/"+code;
                }
            else
                {
                    window.location.href="";
                }
        }
    })
    $("#action_change div").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        var state=$this.data('state');
        if(action=="change"){
            var x=confirm("Do you want to change the Flight status?");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> Please be patient while processing...!");
                $.ajax({
                    url: 'Change_State',
                    type: "POST",
                    data: {code:code,state:state},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i>Status changed successfully  !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> The situation did not change  !");
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
            var x=confirm("Do you want to edit the flight?");
            if(x==true)
            {
                window.location="Flight_Update/"+code;
            }
            else
            {
                window.location.href="";
            }
        }
    })

})
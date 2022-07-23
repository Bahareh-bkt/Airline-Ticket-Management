$(document).ready(function(e) {
  //clock show code ------------start
	setInterval(clock,1000);
	document.getElementById("clock1").innerHTML=" <i class='fa fa-clock-o'></i> " + new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
	function clock()
	{
	document.getElementById("clock1").innerHTML=" <i class='fa fa-clock-o'></i> " + new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
	}
	//clock show code ------------end
	$("#shortcut_toggle").click(function(e) {
        $(".body").slideToggle(1000);
    });
    $("#shortcut_toggle_2").click(function(e) {
        $("#body2").slideToggle(1000);
    });
	$("#short_info_toggle").click(function(e) {
        $("#short_info_body").slideToggle(1000);
    });
	
		function state1(){
			 $(".rotate").removeClass("r2");
			 $(".rotate").addClass("r1");
			 setTimeout(state2,90);
		 }
		function state2(){	   
		     $(".rotate").removeClass("r1");
		     $(".rotate").addClass("r2"); 
			 setTimeout(state1,90);
		}
		state1();
/*
chart js
*/
});
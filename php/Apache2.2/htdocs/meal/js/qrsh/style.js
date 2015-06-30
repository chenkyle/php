$(document).ready(function(){
	var radios = $("#address-collection input[name=address]");

	var select_fun = function(){
		radios.each(function(){
			if($(this).attr("checked")){
				$(this).parent().addClass("selected");
			};
		});
		
		if($("#other-address-li input:radio").attr("checked")){
			$("#other-address").show();
		} else {
			$("#other-address").hide();
		};
	};
	select_fun();

	radios.click(function(){
		$("#address-collection li").removeClass("selected");
		select_fun();
	});
});
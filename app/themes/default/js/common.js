(function($) 
{
 
    /* get key code */
    function getKeyCode(key)
    {
        //return the key code
        return (key == null) ? event.keyCode : key.keyCode;
    }
     
    /* get key character */
    function getKey(key)
    {
        //return the key
        return String.fromCharCode(getKeyCode(key)).toLowerCase();
    }
 
    $(document).ready(function()
    {
        $(document).keydown(function (eventObj)
        {
            /* display the key and character code for the key you pressed */
            //alert("Key pressed: "+getKey(eventObj)+ " Code = "+getKeyCode(eventObj));
        });
    });
     
})(jQuery);


$(document).ready(function(){
	$('.navi-b a').each(function(){
		$(this).bind('click', function(){
			var module = $(this).data('module'); 
			var data = {
				'data2': 'y',
				'data3': 'z',
			}
			
			ajax_call(module, data);
		});
	});
});



function ajax_call(module, data){
	console.log(module);
	request = $.ajax({
		url: base_url() + module,
		type: "POST",
		data: { 'data' : data },
		dataType: "html",
		async: false
	});
	request.done(function( result ) {
		$(".content").html(result);
	});
}








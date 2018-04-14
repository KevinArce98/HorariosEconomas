$(function () {

	$('#empty').change(function() {
	   if (this.checked) {
	   	 $('#formHours').each(function(){
	   	 	$( this ).attr('style', 'display:none;');
	   	 	$('[name="from"]').val('12:00 AM');
	   	 	$('[name="to"]').val('12:00 PM');
	   	 	$("#selectColor").val("#d1d7c0").change();
	   	 });
	   	}else{
	   		$('#formHours').each(function(){
	   			$( this ).attr('style', 'display:none;');
	   			$('[name="from"]').val('1:00 AM');
		   	 	$('[name="to"]').val('1:00 AM');
		   	 	$("#selectColor").val("#769fd1").change();
	   		});
	   	}
	});
});
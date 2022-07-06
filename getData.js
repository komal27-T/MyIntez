$(function () {
		$('#sdt').datetimepicker({
		   format:'YYYY-MM-DD'
		});
	});
$(document).ready(function(){  
	$("#sname").change(function() {  
		//header(‘Content-Type: application/javascript‘);  
		var id = $(this).find(":selected").val();
		console.log(id,"hello");
		var dataString = 'pid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(empData) {
				//responseText = JSON.parse(empData);
			   if(empData) { 
					//$("#errorMassage").addClass('hidden').text("");
					//$("#recordListing").removeClass('hidden');							
					$("#semail").val(empData.pay_em);
					$('#sdt').val(empData.pdt);
					$("#samt").val(empData.pamt);
					//$("#empSalary").text("$"+empData.employee_salary);					
				} else {
					//$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});

$(document).ready(function(){  	
	$("#employee").change(function() {    
		var pid = $(this).find(":selected").val();
		var dataString = 'empid='+ pid;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(empData) {
			   if(empData) {
					$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');							
					$("#empId").text(empData.pid);
					$("#empName").text(empData.pname);
					$("#empAge").text(empData.pdt);
					$("#empSalary").text("$"+empData.pamt);					
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});

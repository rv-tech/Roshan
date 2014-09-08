function checkpassword(){
	newp = $("#newpass").val();
	cpass=$("#confpass").val();
	
	if(newp == cpass){
		$(".checkclass").html('<span style="color:green;">Password matched </span>');
		return true;

	}
	else{
			$(".checkclass").html('<span style="color:red;">Enter same password</span>');
			return false;
		}
}

function userchangepassword(){
	newp = $("#newp").val();
	cpass=$("#confp").val();
	
	if(newp == cpass){
		$(".checkpassclass").html('<span style="color:green;">Password matched </span>');
		return true;

	}
	else{
			$(".checkpassclass").html('<span style="color:red;">Enter same password</span>');
			return false;
		}
}
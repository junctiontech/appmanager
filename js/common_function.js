function check_organization(org_name,id)
{
	$.ajax({
			type: 'POST',
			url :'login/verification_new_user',
			data:{val:org_name, field_name:'Organization'},
		  })	
		 .done(function(msg){
			 if(msg!==''){
			 document.getElementById(id).value="";
			 document.getElementById(id).focus();
			 }
			 $("#show_error").html(msg);
			return false;
		 }); 
	return false;
}

function check_email(email,id)
{
	$.ajax({
			type:'POST',
			url:'login/verification_new_user',
			data:{val:email, field_name:'Email'},
		  })
	.done(function(msg){
		if(msg!==''){
		document.getElementById(id).value="";
		document.getElementById(id).focus();
		}
		$("#show_error").html(msg);
		return false;
	});	  
	return false;
}

function check_username(username)
{
	$.ajax({
			type: 'POST',
			url: 'verification_new_user',
			data:{val:username, field_name:'Username'},
		  })
	.done(function(msg){
		$("#show_error").html(msg);
		return false;
		 });
		 return false;
}

function check_dbname(dbname,id)
{
	$.ajax({
			type: 'POST',
			url: 'login/verification_new_user',
			data:{val:dbname, field_name:'Database name'},
		  })
	.done(function(msg){
		if(msg!==''){
		 document.getElementById(id).value="";
		 document.getElementById(id).focus();
		}
		$("#show_error").html(msg);
		return false;
		 });
		 return false;
}

//$(document).ready(function() {
  //  setTimeout(function() {
    //    $("#show_error").fadeOut(1500);
   // },3000);
   // return false;
//});

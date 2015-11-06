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

function application_entry(value)
{	
	if(document.getElementById('chk').checked==true)
		{     
			var name =document.getElementById('name').value;
			var email =document.getElementById('email').value;
			var mobile =document.getElementById('mobile').value;
			var username =document.getElementById('username').value;
			var password =document.getElementById('password').value;
			document.getElementById('app_admin_name').value= name;
			document.getElementById('app_email').value= email;
			document.getElementById('app_mobile').value= mobile;
			document.getElementById('app_username').value= username;
			document.getElementById('app_password').value= password;
		}
	else{
			document.getElementById('app_admin_name').value= '';
			document.getElementById('app_email').value= '';
			document.getElementById('app_mobile').value= '';
			document.getElementById('app_username').value= '';
			document.getElementById('app_password').value= '';
		}
	
	//alert(email);
}


function ajaxindicatorstart(text)
{
	if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="img/ajax-loader.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
	}
	
	jQuery('#resultLoading').css({
		'width':'100%',
		'height':'100%',
		'position':'fixed',
		'z-index':'10000000',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto'
	});	
	
	jQuery('#resultLoading .bg').css({
		'background':'#000000',
		'opacity':'0.7',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});
	
	jQuery('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'fixed',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto',
		'font-size':'16px',
		'z-index':'10',
		'color':'#ffffff'
		
	});

    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

function callAjax()
{
	jQuery.ajax({
		type: "GET",
		url: "fetch_data.php",
		cache: false,
		success: function(res){
				jQuery('#ajaxcontent').html(res);
		}
	});
}

jQuery(document).ajaxStart(function () {
		//show ajax indicator
	ajaxindicatorstart('loading data.. please wait..');
}).ajaxStop(function () {
	//hide ajax indicator
	ajaxindicatorstop();
});
/*
function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
    }
	this.ok = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
var Alert = new CustomAlert();
*/
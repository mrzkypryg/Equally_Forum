var url = $("#base_url").val();


//Login and SignUp form page
function show_login(){
	$("#modal_signup").modal('hide');
	$("#modal_login").modal('show');
}

function account_signup(){
	$("#modal_login").modal('hide');
	$("#modal_signup").modal('show');
}

//Matching Sign Up Password
function check_sign_up() {
    var input = document.getElementById('confirm_pswd');
    if (input.value != document.getElementById('pswd').value) {
        input.setCustomValidity('Password Must be Matching.');
    } else {
        input.setCustomValidity('');
    }
}

//Search function
function show_search(){
	$(".search-box").show();
}

function hide_search(){
    setTimeout(function(){
        $(".search-box").hide();
    }, 300)
	
}


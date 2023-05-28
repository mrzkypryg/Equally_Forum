



$(document).ready(function () {


    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });



    $('nav ul li').click(function(e)
    {
       $(this).toggleClass('active');
    });



    startSlimscroll();
    window.onresize = function() {
        startSlimscroll();
    }
    function startSlimscroll(){
        var h = window.innerHeight;
        var w = window.innerWidth;
        if(w < 960){
            
            nh = h-120;
            $('#nav-div').slimScroll({
                position: 'right',
                height: nh+'px',
                railVisible: true,
                alwaysVisible: false
            });
        }else{
            nh = h - 60;
            $('#nav-div').slimScroll({
                position: 'right',
                height: nh+'px',
                railVisible: true,
                alwaysVisible: false
            });
        }
    }
    $(".vol").show();


    
      

});



function validatLogin(){
    var arr = [
        {id: 'logname',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Username' },
        {id: 'logpswd',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Password'  },
    ]
    var v = smart_validate(arr);
    if(v){
        return true;
    }else{
        return false;
    }
}

function validateResetPswd(){
    var arr = [
        {id: 'nspswd',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Password' },
        {id: 'nscp',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Password' },
    ]
    var v = smart_validate(arr);
    if(v){
        return true;
    }else{
        return false;
    }
}


function smart_validate(arr) {
    var val = 1;
    arr.forEach(function(e) {
        var i = 1;
        var id = e.id;
        if (e.validate.required === undefined || e.validate.required == 0) {} else {
            var content = $("#"+id).val();
            if(content == ''){
               var pro = $("#"+id).prop("tagName");
               if(pro == 'SELECT'){
                  $("#"+id+'-err').text('Select a '+e.msg);
               }else{
                  $("#"+id+'-err').text('Enter valid '+e.msg);
               }

               $("#"+id).addClass('in-err');
               $("#"+id).attr("onfocus","remove_error('"+id+"')");
               $("#"+id+'-err').show();
                val = 0;
                i = 0;
            }
        }
        if (e.validate.mobile === undefined || e.validate.mobile == 0) {} else {
            if(i == 1){
                var mobile =  $("#"+id).val();
                if(mobile.length != 10){
                    $("#"+id+'-err').text('Enter valid '+e.msg);
                    $("#"+id).addClass('in-err');
                    $("#"+id).attr("onfocus","remove_error('"+id+"')");
                    $("#"+id+'-err').show();
                     val = 0;
                     i = 0;
                }
            }
        }
        if (e.validate.email === undefined || e.validate.email == 0) {} else {
            if(i == 1){
                var email =  $("#"+id).val();
                var ec = emailCheck(email);
                if(ec == 0){
                    $("#"+id+'-err').text('Enter valid '+e.msg);
                    $("#"+id).addClass('in-err');
                    $("#"+id).attr("onfocus","remove_error('"+id+"')");
                    $("#"+id+'-err').show();
                     val = 0;
                     i = 0;
                }
            }
        }
        if (e.validate.length === undefined || e.validate.length == 0) {  } else {
            if(i == 1){
                var leng =  $("#"+id).val().length;
                if(leng < e.validate.length){
                    $("#"+id+'-err').text(e.msg+'must be at least '+e.validate.length+' characters.');
                    $("#"+id).addClass('in-err');
                    $("#"+id).attr("onfocus","remove_error('"+id+"')");
                    $("#"+id+'-err').show();
                    val = 0;
                    i = 0;
                }
            }
        }
    })
    return val;
}


function password_validate(p1, p2){
    var pswd1 =  $("#"+p1).val();
    var pswd2 =  $("#"+p2).val();
    if(pswd1 != pswd2){
        $("#"+p2+'-err').text('Password not Match');
        $("#"+p2).addClass('in-err');
        $("#"+p2).attr("onfocus","remove_error('"+p2+"')");
        $("#"+p2+'-err').show();
        return 0;
    }else{
        return 1;
    }
}

function remove_error(id){
    
    $("#"+id).removeClass('in-err');
    $("#"+id+'-err').hide();
}
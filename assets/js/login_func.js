//Login 
var login = new Vue({
    el:"#equally_login",
    data: {},
    methods: {
        login_check: function(){
            var email = $("#email_login").val();
            var pass = $("#email_pass").val();
            var data_login = {'name':email,'pswd':pass}
            axios.post(url+'account/login_validation',data_login).then(function(e){
                if(e.data == 'success'){
                    window.location.href=url;
                }else{
                    $("#err_message").show();
                }
            })

        },
    }
})

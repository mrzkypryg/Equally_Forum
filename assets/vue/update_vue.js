

var login = new Vue({
    el:"#login-vue",
    data: {

    },
    mounted: function(){
      var locale = function(number, index, total_sec) {
        return [
          ['just now', 'right now'],
          ['%s sec ', ' %s sec '],
          ['1 min ', ' 1 minute '],
          ['%s min ', 'in %s min '],
          ['1 hrs ', ' 1 hrs '],
          ['%s hrs ', ' %s hrs '],
          ['1 day ', 'in 1 day '],
          ['%s days ', ' %s days '],
          ['1 wek ', ' 1 wek '],
          ['%s wek ', ' %s wek '],
          ['1 mon ', ' 1 mon '],
          ['%s mon ', ' %s mon '],
          ['1 y ', ' 1 y '],
          ['%s y ', ' %s y ']
        ][index];
      };
      timeago.register('pt_BR', locale);
      var timeagoInstance = timeago();
      var nodes = document.querySelectorAll('.ageo');
      timeagoInstance.render(nodes, 'pt_BR');
      timeago.cancel()
      timeago.cancel(nodes[0])
    },
    methods: {
        userLogin: function(){
            var name = $("#loemail").val();
            var pswd = $("#lopswd").val();
            var arr = [
                {id: 'loemail',validate: {required: 1,email: 0,mobile: 0},msg:'Email Address'},
                {id: 'lopswd',validate: {required: 1,email: 0,mobile: 0},msg:'Password'},
            ]
            var v = smart_validate(arr);
            if(v){
                var carr = {'name':name,'pswd':pswd}
                axios.post(url+'users/login_check',carr).then(function(e){
                    if(e.data == 'success'){
                        window.location.href=url;
                    }else{
                          $("#login-err").show();
                    }
                })
            }
        },
        unic_email: function(){

            var suemail = $("#suemail").val();
            if(suemail != ''){
              var arr = {'suemail':suemail}
                axios.post(url+'users/is_exist',arr).then(function(e){
                    if(e.data == 'yes'){
                        $("#suemail").val('');
                        $.notify('Email address already exisit', 'danger');
                    }
                })
            }
        },
        signup_submit: function(){
            var arr = [
                {id: 'suname',validate: {required: 1,email: 0,mobile: 0},msg:'User Name'},
                {id: 'sudesig',validate: {required: 1,email: 0,mobile: 0},msg:'Nickname'},
                {id: 'suemail',validate: {required: 1,email: 1,mobile: 0},msg:'Email Address'},
                {id: 'supswd',validate: {required: 1,email: 0,mobile: 0},msg:'Password'},
                {id: 'suconfirm',validate: {required: 1,email: 0,mobile: 0},msg:' Password'},
            ]
            var v = smart_validate(arr);
            if(v){
                var p = password_validate('supassword','suconfirm');
                if(p){
                    return false
        
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }
})

var side = new Vue({
    el:"#side",
    data:{
        cat:[],
    },
    mounted: function(){
    },
    methods:{
        getCategory: function(){
            axios.get(url+'category/get_category').then(function(e) {
                side.cat = e.data;
            })
        }
    }
})


var search = new Vue({
    el:'#search',
    data:{
        result:[],
    },
    methods:{
        startSearch: function(e){
          var sk = $("#sk").val();
          if(sk.length > 2){
              axios.post(url+'posts/search_post',{'sk':sk}).then(function(e){
                  if(e != ''){
                      $('.search-box').show();  
                  }
                  search.result = e.data;  
                  
              })    
          }
        }
    }
})

var notify = new Vue({
    el:'#vu-notify',
    data:{
        not:[],
    },
    mounted: function(){
        this.getNotification();
    },
    methods:{
        getNotification: function(e){
            axios.post(url+'notification/get_notification').then(function(e){     
                notify.not = e.data;
            })    
        },
        clear_all_notiy: function(){
            axios.post(url+'notification/clear_all_notiy').then(function(e){     
                notify.not =[];
            })
        }
    }
})

var statsic = new Vue({
    el:'#vu-statsic',
    data:{
        post:0,
        replay:0,
        user:0,
    },
    mounted: function(){
        this.getStatistics();
    },
    methods:{
        formatCount(value) {
           // let val = (value/1).toFixed(2).replace('.', ',')
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        getStatistics: function(e){
            axios.post(url+'update/get_common_count').then(function(e){     
                statsic.post = e.data.post_count;
                statsic.replay = e.data.replay_count;
                statsic.user = e.data.user_count;
            })    
        }
    }
})

function remove_error(id){
    $("#"+id).removeClass('in-err');
    $("#"+id+'-err').hide();
}

var reset = new Vue({
    el:'#vu-reset',
    data:{
        
    },
    mounted: function(){
       
    },
    methods:{
        emailCkeck: function(e){
            var email = $("#reset-email").val();
            axios.post(url+'users/reset_password_link',{'email':email}).then(function(e){     
                 if(e.data == 'err'){
                    $("#errmsg").show();
                 }else{
                    $("#fps").hide();
                    $("#sps").show();
                 }
            })    
        }
    }
})


var pswdreset = new Vue({
    el:'#vu-reset-pswd',
    data:{
        
    },
    mounted: function(){
      
    },
    methods:{
        change_password: function(e){

          
            var arr = [
                {id: 'resetpswd',validate: {required: 1,email: 0,mobile: 0},msg:'User Name'},
                {id: 'resetconfirm',validate: {required: 1,email: 0,mobile: 0},msg:'Nickname'},
            ]
            var v = smart_validate(arr);

            if(v){
               var pswd = $("#resetpswd").val();
                axios.post(url+'users/change_password_reset',{'pswd':pswd}).then(function(e){     
                   if(e.data == 'err'){
                      $("#errmsg").show();
                   }else{
                       setTimeout(function(){
                          window.location.href=url;
                       }, 3000)
                      $("#fps").hide();
                      $("#sps").show();
                   }
              })    
            }
        }
    }
})


var vu_login_new = new Vue({
    el:'#vu-login-new',
    data:{
        
    },
    mounted: function(){
       
    },
    methods:{
        userLoginNew: function(){
            var name = $("#loemailnew").val();
            var pswd = $("#lopswdnew").val();
            var arr = [
                {id: 'loemailnew',validate: {required: 1,email: 0,mobile: 0},msg:'Email Address'},
                {id: 'lopswdnew',validate: {required: 1,email: 0,mobile: 0},msg:'Password'},
            ]
            var v = smart_validate(arr);
            if(v){
                var carr = {'name':name,'pswd':pswd}
                axios.post(url+'users/login_check',carr).then(function(e){
                    if(e.data == 'success'){
                        window.location.href=url;
                    }else{
                          $("#login-err").show();
                    }
                })
            }
        },
    }
})



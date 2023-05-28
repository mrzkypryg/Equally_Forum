var url = $("#b_url").val();
var setting = new Vue({
	el: '#vue-setting',
	data: {
       
	},
  mounted: function(){
    	
  },
	methods: {
		
    updatePassword: function(){
        var soldpswd = $("#soldpswd").val();
        var snewpswd = $("#snewpswd").val();
        var sconpswd = $("#sconp").val();
        var arr = [
            {id: 'soldpswd',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Old Password' },
            {id: 'snewpswd',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'New Password' },
            {id: 'sconp',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Confirm Password' },
        ]
        var v = smart_validate(arr);
        if(v){
            if(snewpswd == sconpswd){
                arr = {'old':soldpswd,'password':snewpswd}
                axios.post(url+'admin/changePassword',arr).then(function(e){
                    if(e.data == 'err'){
                        $("#err").show();
                    }else{
                        $("#err").hide();
                        alert('Password Changed Sucessfully');
                    }
                })
            }
        }else{

        }
       
        
    },
	}
})
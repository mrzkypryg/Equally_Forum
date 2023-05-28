var url = $("#b_url").val();
var table;
var user = new Vue({
	el: '#vue-user',
	data: {
		
    posts:[],
   
	},
  mounted: function(){
    	this.getPost();
  },
	methods: {
		getPost: function() {
           
			axios.post(url+'users/get_users').then(function(e) {
                user.posts = e.data;
                table = $('#table_id').DataTable({
                    data: e.data,
                    columns: [
                        { title: "#", className: "center" },
                        { title: "Name" },
                        { title: "Nickname" },
                        { title: "Email" },
                        { title: "Posts", className: "center" },
                        { title: "Replays", className: "center"},
                        { title: "Action", className: "center" }
                    ],
                   
                });    
                
                
      
            })
        },
        removeUser:function(i){
            axios.post(url+'users/remove_users',{'id':i}).then(function(e) {
                table.destroy();
                user.getPost();
            })
        }
		
	}

})

var r_id = -1;
function removeUser(i){
    r_id = i;
    $("#remove").modal('show');
}
$("#yes").click(function(){
    user.removeUser(r_id);
})
  






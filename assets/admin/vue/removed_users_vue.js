var url = $("#b_url").val();
var table;
var trash_post = new Vue({
	el: '#vue-usertrash',
	data: {
		
    posts:[],
   
	},
  mounted: function(){
    	this.getPost();
  },
	methods: {
		getPost: function() {
           
			axios.post(url+'users/get_trash_users').then(function(e) {
                trash_post.posts = e.data;
                table = $('#table_id').DataTable({
                    responsive: true,
                    "scrollY": "800px",
                    "scrollCollapse": true,
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
        restoreUser:function(i){
            axios.post(url+'users/restore_users',{'id':i}).then(function(e) {
                table.destroy();
                post.getPost();
            })
        }
		
	}

})

var r_id = -1;
function restoreUser(i){
    r_id = i;
    $("#restore").modal('show');
}
$("#yes-restore").click(function(){
    trash_post.restoreUser(r_id);
})
  




var url = $("#b_url").val();
var table;
var post = new Vue({
	el: '#vue-post-trash',
	data: {
		
    posts:[],
   
	},
  mounted: function(){
    	this.getPost();
    
  },
	methods: {
		getPost: function() {
           
			axios.post(url+'posts/get_trash_posts').then(function(e) {
                post.posts = e.data;
                table = $('#table_id').DataTable({
                    responsive: true,
                    "scrollY": "800px",
                    "scrollCollapse": true,
                    data: e.data,
                    columns: [
                        { title: "#", className: "center" },
                        { title: "Title" },
                        { title: "Posted By" },
                        { title: "Replays", className: "center"},
                        { title: "Views", className: "center" },
                        { title: "Action", className: "center" }
                    ],
                });    
            })
        },
        restorePost:function(i){
            axios.post(url+'posts/restore_posts',{'id':i}).then(function(e) {
                table.destroy();
                post.getPost();
            })
        }
		
	}



})

var r_id = -1;
function restorePost(i){
    r_id = i;
    $("#restore").modal('show');
}
$("#yes-restore").click(function(){
    post.restorePost(r_id);
  })
  


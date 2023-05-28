var url = $("#b_url").val();
var table;
var post = new Vue({
	el: '#vue-post',
	data: {
		
    posts:[],
   
	},
  mounted: function(){
    	this.getPost();
    
  },
	methods: {
		getPost: function() {
           
			axios.post(url+'posts/get_posts').then(function(e) {
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
        removePost:function(i){
            axios.post(url+'posts/remove_posts',{'id':i}).then(function(e) {
                table.destroy();
                post.getPost();
            })
        }
		
	}



})

var r_id = -1;
function removeTable(i){
    r_id = i;
    $("#remove").modal('show');
}
$("#yes").click(function(){
    post.removePost(r_id);
  })
  


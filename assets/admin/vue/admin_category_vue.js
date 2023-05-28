var cat = new Vue({
	el: '#vue-category',
	data: {
        category:[],
        del_id: -1,
        edit_id:-1,
	},
  mounted: function(){
    	this.getCategory();
      
  },
	methods: {
		addCategory: function() {
			var name = $("#cat-name").val();
			axios.post('../category/add_category', {
				'name': name
			}).then(function(e) {
          $("#cat-name").val('');
					cat.getCategory();
				  $.notify("Added Sucessfully !", "success");
			})
		},
		getCategory: function() {
      axios.get('../category/get_category').then(function(e) {
				   cat.category = e.data;
			})
		},
    deleteCategory: function(i){
        cat.del_id = i;
        $("#remove").modal('show');
    },
    editCategory: function(i){
        cat.edit_id = i;
    },
    updateCategory: function(i){
        axios.post('../category/update_category',cat.category[i]).then(function(e){
            cat.edit_id = -1;
            $.notify("Updated Sucessfully !", "success");
        })
    },
    deleteConfirm: function(){
      var id = cat.category[cat.del_id].id;
      axios.post('../category/remove_category',{'id':id}).then(function(e){
          cat.category.splice(cat.del_id, 1);
           $.notify("Removed Sucessfully !", "success");
      })
    }
	}
})

$("#yes").click(function(){
  cat.deleteConfirm();
})

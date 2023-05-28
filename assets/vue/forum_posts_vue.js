var post = new Vue({
    el:'#vupost',
    data:{
        replay:[],
        pid:$("#pid").val(),
        edit_id:-1,
        delete_id:-1,
    },
    mounted: function(){
      this.getReplays();
      var timeagoInstance = timeago();
      var nodes = document.querySelectorAll('.needs_to_be_rendered');
      timeagoInstance.render(nodes, 'ENG');
      timeago.cancel()
      timeago.cancel(nodes[0])
    },
    methods: {
        getReplays: function(){
          axios.post(url+'posts/get_replay',{'id':this.pid}).then(function(e){
              post.replay = e.data;
          })
        },
        addReplay: function(){
          var text = $("#summernote").val();
          axios.post(url+'posts/add_replay',{'text':text,'pid':this.pid}).then(function(e){
              $("#replay_post").hide();
              post.getReplays();
              $.notify('Post Added Sucessfully !', 'success');
          })
        },
        timeAgo: function(dat){
          var locale = function(number, index, total_sec) {
            return [
              ['just now', 'right now'],
              ['%s seconds ago', ' %s seconds ago'],
              ['1 minute ago', ' 1 minute ago'],
              ['%s minutes ago', 'in %s minutes ago'],
              ['1 hour ago', ' 1 hou agor'],
              ['%s hours ago', ' %s hours ago'],
              ['1 day ago', 'in 1 day ago'],
              ['%s days ago', ' %s days ago'],
              ['1 week ago', ' 1 week ago'],
              ['%s weeks ago', ' %s weeks ago'],
              ['1 month ago', ' 1 month ago'],
              ['%s months ago', ' %s months ago'],
              ['1 year ago', ' 1 year ago'],
              ['%s years ago', ' %s years ago']
            ][index];
          };
          timeago.register('pt_BR', locale);
          var timeagoInstance = timeago();
          return timeagoInstance.format(dat, 'pt_BR');
        },
        addLike: function(i){
            post.replay[i].is="yes";
            var arr = {'pid':post.replay[i].post_ref,'rid':post.replay[i].id}
            axios.post(url+'posts/add_replay_like',arr).then(function(){
            post.replay[i].lik_count ++;
             
          })
        },
        addUnLik: function(i){
            post.replay[i].is="no";
          var arr = {'pid':post.replay[i].post_ref,'rid':post.replay[i].id}
          axios.post(url+'posts/remove_replay_like',arr).then(function(){
              post.replay[i].lik_count --;
             
          })
        },
        editReplay: function(i){
            $("#edit-replay").modal('show');
            var text = post.replay[i].replay;
            post.edit_id = i;
            $('#edit-sumer').summernote("code", text);
        },
        saveReplay: function(i){
            var text = $('#edit-sumer').summernote('code');
            var id = post.replay[post.edit_id].id;
            axios.post(url+'posts/update_replay',{'id':id,'text':text}).then(function(e){
                post.replay[post.edit_id].replay = text;
                $("#edit-replay").modal('hide');
            })
        },
        deletePost: function(i){
            post.delete_id = i;
            $("#remove").modal('show');
        },
        remvePost: function(i){
            var id = post.replay[post.delete_id].id; 
            axios.post(url+'posts/remove_replay',{'id':id}).then(function(e){
                post.replay.splice(post.delete_id, 1);
            })
        }
    }
})

$("#yes").click(function(){
    post.remvePost();
  })

function post_validate(){
   
    var arr = [
        {id: 'atitle',validate: {required: 1,email: 0,mobile: 0,length:15},msg:'Title' },
        {id: 'acat',validate: {required: 1,email: 0,mobile: 0,length:0},msg:'Category'  },
    ]
    var v = smart_validate(arr);
    if(v){
       var cleanText = $("#summernote").summernote('code');
       var plainText = $("<p>" + cleanText+ "</p>").text();
       if(plainText.length > 60){
          return true;
       }else{
         $("#summernote-err").show();
         $(".note-editable").addClass('in-err');
         return false;
       }

    }else{
        return false;
    }
}

function remove_error(id){
    $("#"+id).removeClass('in-err');
    $("#"+id+'-err').hide();
}

$(document).ready(function() {
    $('#edit-sumer').summernote({
        placeholder: 'Enter your Replay',
        tabsize: 2,
        height: 300,
        callbacks: {
          onImageUpload: function(files, editor, welEditable) {
             var img =  sendFile(files[0], editor, welEditable);
           }
        }
    });
});
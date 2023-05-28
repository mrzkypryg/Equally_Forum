


var user = new Vue({
    el:"#user-vue",
    data:{
        post:0,
        replay:0,
        like:0,
        posts:[],
        replays:[],
        delete_id:-1,
        delete_index:-1,
        item:'none',
    },
    mounted: function(){
        this.getCategory();
        this.getMyLatestPost();
        this.getMyLaestReplay();
    },
    methods:{
        getCategory: function(){
            axios.post(url+'users/user_count').then(function(e){
                user.post = e.data.tot_post;
                user.replay = e.data.tot_replay;
                user.like = e.data.tot_like;
            })
        },
        getMyLatestPost: function(){
          axios.post(url+'users/get_my_post',{'limit':3}).then(function(e){
              user.posts = e.data;
          })
        },
        getMyLaestReplay: function(){
          axios.post(url+'users/get_my_replay',{'limit':2}).then(function(e){
              user.replays = e.data;
          })
        },
        deletePost: function(i){
          user.item = 'post';
          user.delete_id = user_post.posts[i].id;
          user.delete_index = i;
          $("#remove").modal('show');
        },
        remvePost: function(){
          if(user.item == 'post'){
            axios.post(url+'posts/remove_posts',{'id':user.delete_id}).then(function(e){
              user.posts.splice(user.delete_index, 1);
              user_post.posts.splice(user.delete_index, 1);
              alert('Removed Sucessfully');
            })
          }else if(user.item == 'replay'){
            axios.post(url+'posts/remove_replay',{'id':user.delete_id}).then(function(e){
              user.replays.splice(user.delete_index, 1);
              user_post.replays.splice(user.delete_index, 1);
              alert('Removed Sucessfully');
            })
          }
        },
        deleteReplay: function(i){
            user.item = 'replay';
            user.delete_id = user.replays[i].id;
            user.delete_index = i;
            $("#remove").modal('show');
        },
        editPost: function(i){
            window.location.href=user.posts[i].url;
        }
    }
})


var user_post = new Vue({
    el:"#user-post-vue",
    data:{
        posts:[],
    },
    mounted: function(){
        this.getMyLatestPost();
    },
    methods:{
        getMyLatestPost: function(){
          axios.post(url+'users/get_my_post',{'limit':100}).then(function(e){
              user_post.posts = e.data;
          })
        },
        deletePost: function(i){
          user.item = 'post';
          user.delete_id = user_post.posts[i].id;
          user.delete_index = i;
          $("#remove").modal('show');
        }
        
    }
})


var user_reply = new Vue({
    el:"#user-replay-vue",
    data:{
        replays:[],
    },
    mounted: function(){
        this.getMyLaestReplay();
    },
    methods:{
        getMyLaestReplay: function(){
          axios.post(url+'users/get_my_replay',{'limit':100}).then(function(e){
              user_reply.replays = e.data;
          })
        },
        deleteReplay: function(i){
            user.item = 'replay';
            user.delete_id = user_reply.replays[i].id;
            user.delete_index = i;
            $("#remove").modal('show');
        }
    }
})

$("#yes").click(function(){
  user.remvePost();
})



var settings = new Vue({
    el:"#user-settings-vue",
    data:{
        replays:[],
    },
    mounted: function(){
      
    },
    methods:{
        changeDetails: function(){
            var name = $("#usname").val();
            var desig = $("#usdesig").val();
            var mobile = $("#usmobile").val();
            var address = $("#usaddress").val();

            var arr = {'name':name,'desig':desig,'mobile':mobile,'address':address}
            axios.post(url+'users/update_users', arr).then(function(e){
                alert('Updated Sucessfully !');
            })
        },
        changePassword: function(){
            var old = $("#usoldpswd").val();
            var pswd = $("#usnewpswd").val();
            var conf = $("#usconpswd").val();
            if(pswd == conf){
                axios.post(url+'users/change_password',{'pswd':pswd,'old':old}).then(function(e){
                    if(e.data == 'success'){
                        alert('Password Changed Sucessfully!');
                        $("#usoldpswd").val('');
                        $("#usnewpswd").val('');
                        $("#usconpswd").val('');
                    }else{
                        alert('Old Password Wrong');
                    }
                })
            }else{
                alert('Password Not Match');
            }
        }
    }
})
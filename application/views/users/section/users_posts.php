<div v-for="(p, i) in posts" class="col-lg-4 col-md-6">
   <div class="my-post">
     <div class="post-h4">
       <h4>{{p.title}}</h4>
     </div>
     <div class="post-des">
       <p>{{p.description}}</p>
     </div>
     <div class="my-icons row no-margin">
       <ul >
         <li class="flot-btn"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-ellipsis-v"></i>
           <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
             <button v-on:click="editPost(i)" class="dropdown-item" type="button"><i class="far fa-edit"></i> Edit</button>
             <button v-on:click="deletePost(i)" class="dropdown-item" type="button"><i class="far fa-trash-alt"></i> Delete</button>
           </div>
         </li>
       <li><i class="fas fa-retweet reply-color"></i> <small>{{p.co}}</small> </li>
       <li><i class="fas fa-eye reply-color"></i> <small>{{p.count}}</small></li>
     </ul>
     </div>
   </div>
 </div>

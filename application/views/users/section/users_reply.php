<div v-for="(p, i) in replays" class="col-sm-6">
  <div class="my-post">
    <div class="post-des reply">
      <p>{{p.replay}}</p>
    </div>
    <div class="my-icons row no-margin">
      <ul >
        <li class="flot-btn"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button v-on:click="deleteReplay(i)" class="dropdown-item" type="button"><i class="far fa-trash-alt"></i> Delete</button>
          </div>
        </li>
      <li><i class="fas fa-heart heart"></i> <small>{{p.like}}</small></li>
    </ul>
    </div>

  </div>
</div>

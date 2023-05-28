<!--  ************************* Page Title Starts Here ************************** -->
<div class="page-title row no-margin">
	<h4>Manage Category</h4>
	<ul>
		<li><a>Home <i class="fas fa-angle-double-right"></i></a></li>
		<li>Manage Category</li>
	</ul>
</div> 
<div id="vue-category"  class="row body-content">
	<div class="col-lg-6 float-auto">
		<div class="panel-card">
			<div  class="panel-header"> Manage Category </div>
			<div class="form-body">
				<div class="form-group  row">
            <div class="col-sm-4">
                <label for="">Name</label>
                <span class="form-indicat">:</span>
            </div>
            <div class="col-sm-8">
                <input id="cat-name" placeholder="Category Name" type="text" class="form-control form-control-sm" name="" value="">
            </div>
        </div>
				<div class="form-group no-margin-bottom row">
						<div class="col-sm-4">

						</div>
						<div class="col-sm-8">
								<button v-on:click="addCategory(1)" class="btn btn-primary btn-sm">Add Category</button>
						</div>
				</div>
			</div>
			<div class="table-body">
				<table class="table">
					<tr>
						<th class="center">#</th>
						<th>User Name</th>
						<th class="center">Totap posts</th>
						<th class="center">Action</th>
					</tr>
					<tr v-for="(cat, i) in category">
						<td class="center">{{i+1}}</td>
						<td v-if="i != edit_id">{{cat.name}}</td>
						<td v-if="i == edit_id">
							<input v-model="cat.name" type="text" class="form-control form-control-sm">
						</td>
						<td class="center">{{cat.post}}</td>
						<td class="center">
							<button v-if="i != edit_id" v-on:click="editCategory(i)"  class="btn btn-xs btn-primary">
								<i class="fas fa-pencil-alt"></i>
							</button>
							<button v-if="i == edit_id" v-on:click="updateCategory(i)"  class="btn btn-xs btn-info">
								<i class="fas fa-check"></i>
							</button>
							<button v-on:click="deleteCategory(i)" class="btn btn-xs btn-danger">
								<i class="fas fa-times"></i>
							</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

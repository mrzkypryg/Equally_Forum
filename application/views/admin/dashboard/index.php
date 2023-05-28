<div id="vue-home">
	<div class="row info-widget-2 no-padding">
		<div class="col-sm-4">
			<div class="widget-2-cover color-1 row no-margin">
				<div class="col-sm-9">
					<h4>{{user}}</h4>
					<span> Total Users </span>
				</div>
				<div class="col-sm-3 no-padding">
					<div class="widget-icon" id="user-icon">
						<i class="fas fa-users"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="widget-2-cover color-2 row no-margin">
				<div class="col-sm-9">
					<h4>{{post}}</h4>
					<span>Total Posts</span>
				</div>
				<div class="col-sm-3 no-padding">
					<div class="widget-icon">
						<i class="fas fa-sticky-note"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="widget-2-cover color-3 row no-margin">
				<div class="col-sm-9">
					<h4>{{replay}}</h4>
					<span>Todays Replies</span>
				</div>
				<div class="col-sm-3 no-padding">
					<div class="widget-icon">
						<i class="fas fa-reply-all"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!------- Chart ------->
	<div class="row  chart-row">
		<div class="col-12 col-lg-6 col-xl-6">
			<div class="chart-cover">
				<div class="card-header">
					Equally's Posts Report
				</div>
				<div class="card-body">
					<div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
					 class="chartjs-size-monitor">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
						</div>
					</div>
					<canvas id="dashboard-chart-1" height="232" style="display: block; width: 290px; height: 232px;" width="290" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 col-xl-6">
			<div class="chart-cover">
				<div class="card-header">
					Equally's Post Category
				</div>
				<div class="card-body">
					<div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
					 class="chartjs-size-monitor">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
						</div>
					</div>
					<canvas id="dashboard-chart-2" height="232" style="display: block; width: 290px; height: 232px;" width="290" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

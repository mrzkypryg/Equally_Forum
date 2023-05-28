var url = $("#b_url").val();
var table;
var home = new Vue({
	el: '#vue-home',
	data: {
        user:0,
        post:0,
        replay:0
	},
  mounted: function(){
        this.getCount();
        this.getLastWeekpost();
        this.getCatChart();
  },
	methods: {
		getCount: function() {
            axios.post(url+'update/get_common_count').then(function(e) {
                home.user = e.data.user_count;
                home.post = e.data.post_count;
                home.replay = e.data.replay_count;
            })
        },
        getLastWeekpost: function(){
            axios.post(url+'update/get_last_week_post').then(function(e) {
                var ctx = document.getElementById("dashboard-chart-1").getContext('2d');
                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#f54ea2');
                gradientStroke1.addColorStop(1, '#ff7676');
                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#00a8df');
                gradientStroke2.addColorStop(1, '#00a8df');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: e.data.label,
                    datasets: [{
                        label: 'Posts',
                        data: e.data.val,
                        borderColor: gradientStroke2,
                        backgroundColor: gradientStroke2,
                        hoverBackgroundColor: gradientStroke2,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1
                    }]
                    },
                    options:{
                    legend: {
                        position: 'bottom',
                        display: true,
                        labels: {
                            boxWidth:8
                        }
                        },
                    scales: {
                        xAxes: [{
                            barPercentage: .5
                        }]
                        },
                        tooltips: {
                        displayColors:false,
                        }
                    }
                });

            })
        },
        getCatChart: function(){
            axios.post(url+'update/get_post_by_cat').then(function(e) {
                var ctx = document.getElementById("dashboard-chart-2").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: e.data.label,
                        datasets: [{
                            backgroundColor: [
                                "#0dceec",

                                "#fd3550",

                                "#15ca20",
                                "#ff9700"
                            ],
                            data: e.data.val
                        }]
                    },
                    options: {
                        legend: {
                            position: 'bottom',
                            display: true,
                            labels: {
                            boxWidth:40
                            }
                        }
                    }
                });

            })
        }
		
	}

})

var r_id = -1;
function removeUser(i){
    r_id = i;
    $("#remove").modal('show');
}
$("#yes").click(function(){
    user.removeUser(r_id);
})
  






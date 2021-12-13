@extends('layouts._layout')

@section('content')
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-md-11">
    			<h1>Dashboard</h1>
    		</div>
    		<div class="col-md-1">
    			<form method="POST" action="{{ route('logout') }}">
		    		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		    		<button type="submit" class="btn btn-danger mt-3 float-right">Log Out</button>
			    </form>	
    		</div>
    	</div>

    	<div class="row mt-5 mb-5">
    		<div class="col-md-4">
    			<h5 style="text-align: center;">Gender</h5>
    			<canvas id="genderChart"></canvas>
    		</div>
    		<div class="col-md-8">
    			<h5 style="text-align: center;">Barangay</h5>
    			<canvas id="brgyChart"></canvas>
    		</div>
    	</div>

    	<hr>

	    <div class="row">
	    	<div class="col-md-12 mb-3" style="display: flex; justify-content: center; align-items: center;">
	    		<div class="btn-group" role="group">
				  	<button type="button" id="c_btn" class="btn btn-primary">Conventional</button>
				  	<button type="button" id="uc_btn" class="btn btn-primary">Unconventional</button>
				  	<button type="button" id="ks_btn" class="btn btn-primary">Knowledge Seeking</button>
				  	<button type="button" id="ip_btn" class="btn btn-primary">Influential</button>
				</div>
	    	</div>
	    	<hr>
	    	<div class="col-md-12 mt-2">
	    		<div id="c_score_cont"></div>
	    		<div id="uc_score_cont"></div>
	    		<div id="ks_score_cont"></div>
	    		<div id="ip_score_cont"></div>
	    		<div style="height: 500px; max-width: 920px; margin: 0px auto;"></div>
	    	</div>
	    </div>

	    <input type="hidden" id="c_score" value="{{ $c_score }}"/>
    	<input type="hidden" id="uc_score" value="{{ $uc_score }}"/>
    	<input type="hidden" id="ks_score" value="{{ $ks_score }}"/>
    	<input type="hidden" id="ip_score" value="{{ $ip_score }}"/>
    	<input type="hidden" id="gender_count" value="{{ $gender_count }}"/>
    	<input type="hidden" id="gender_label" value="{{ $gender_label }}"/>
    	<input type="hidden" id="brgy_count" value="{{ $brgy_count }}"/>
    	<input type="hidden" id="brgy_label" value="{{ $brgy_label }}"/>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>  
	<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>

	<script>
		$(document).ready(function() {
			var c_score = JSON.parse($("#c_score").val());
			var uc_score = JSON.parse($("#uc_score").val());
			var ks_score = JSON.parse($("#ks_score").val());
			var ip_score = JSON.parse($("#ip_score").val());
			var gender_count = JSON.parse($("#gender_count").val());
			var gender_label = JSON.parse($("#gender_label").val());
			var brgy_count = JSON.parse($("#brgy_count").val());
			var brgy_label = JSON.parse($("#brgy_label").val());

			const genderChart = new Chart(
			 	document.getElementById('genderChart'),
			 	{
			 		type: 'polarArea',
			 		data: {
			 			labels: gender_label,
			 			datasets: [{
			 				label: 'Gender',
			 				data: gender_count
			 			}]
			 		},
			 		options: {}
			 	}
			);

			const brgyChart = new Chart(
			 	document.getElementById('brgyChart'),
			 	{
			 		type: 'bar',
			 		data: {
			 			labels: brgy_label,
			 			datasets: [{
			 				label: 'Barangay',
			 				data: brgy_count
			 			}]
			 		},
			 		options: {}
			 	}
			);

			var cScoreChart = new CanvasJS.Chart("c_score_cont", {
				animationEnabled: true,
				title: {
					text: "Conventional Political Participation"
				},
				axisX: {
					title: "Age"
				},
				axisY: {
					title: "Score"
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: generateChartOptions(c_score)
			});

			var ucScoreChart = new CanvasJS.Chart("uc_score_cont", {
				animationEnabled: true,
				title: {
					text: "Unconventional Political Participation"
				},
				axisX: {
					title: "Age"
				},
				axisY: {
					title: "Score"
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: generateChartOptions(uc_score)
			});


			var ksScoreChart = new CanvasJS.Chart("ks_score_cont", {
				animationEnabled: true,
				title: {
					text: "Knowledge Seeking Political Participation"
				},
				axisX: {
					title: "Age"
				},
				axisY: {
					title: "Score"
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: generateChartOptions(ks_score)
			});

			var ipScoreChart = new CanvasJS.Chart("ip_score_cont", {
				animationEnabled: true,
				title: {
					text: "Influential Political Participation"
				},
				axisX: {
					title: "Age"
				},
				axisY: {
					title: "Score"
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: generateChartOptions(ip_score)
			});

			cScoreChart.render();
			$("#c_score_cont").show();
			$("#uc_score_cont").hide();
			$("#ks_score_cont").hide();
			$("#ip_score_cont").hide();

			$(document).on("click", "#c_btn", function() {
				ucScoreChart.destroy();
				ksScoreChart.destroy();
				ipScoreChart.destroy();

				cScoreChart = new CanvasJS.Chart("c_score_cont", {
					animationEnabled: true,
					title: {
						text: "Conventional Political Participation"
					},
					axisX: {
						title: "Age"
					},
					axisY: {
						title: "Score"
					},
					legend: {
						cursor: "pointer",
						itemclick: toggleDataSeries
					},
					data: generateChartOptions(c_score)
				});

				cScoreChart.render();
				$("#c_score_cont").show();
				$("#uc_score_cont").hide();
				$("#ks_score_cont").hide();
				$("#ip_score_cont").hide();
			});

			$(document).on("click", "#uc_btn", function() {
				cScoreChart.destroy();
				ksScoreChart.destroy();
				ipScoreChart.destroy();

				ucScoreChart = new CanvasJS.Chart("uc_score_cont", {
					animationEnabled: true,
					title: {
						text: "Unconventional Political Participation"
					},
					axisX: {
						title: "Age"
					},
					axisY: {
						title: "Score"
					},
					legend: {
						cursor: "pointer",
						itemclick: toggleDataSeries
					},
					data: generateChartOptions(uc_score)
				});

				ucScoreChart.render();
				$("#c_score_cont").hide();
				$("#uc_score_cont").show();
				$("#ks_score_cont").hide();
				$("#ip_score_cont").hide();
			});

			$(document).on("click", "#ks_btn", function() {
				cScoreChart.destroy();
				ucScoreChart.destroy();
				ipScoreChart.destroy();

				ksScoreChart = new CanvasJS.Chart("ks_score_cont", {
					animationEnabled: true,
					title: {
						text: "Knowledge Seeking Political Participation"
					},
					axisX: {
						title: "Age"
					},
					axisY: {
						title: "Score"
					},
					legend: {
						cursor: "pointer",
						itemclick: toggleDataSeries
					},
					data: generateChartOptions(ks_score)
				});

				ksScoreChart.render();
				$("#c_score_cont").hide();
				$("#uc_score_cont").hide();
				$("#ks_score_cont").show();
				$("#ip_score_cont").hide();
			});

			$(document).on("click", "#ip_btn", function() {
				cScoreChart.destroy();
				ucScoreChart.destroy();
				ksScoreChart.destroy();

				ipScoreChart = new CanvasJS.Chart("ip_score_cont", {
					animationEnabled: true,
					title: {
						text: "Influential Political Participation"
					},
					axisX: {
						title: "Age"
					},
					axisY: {
						title: "Score"
					},
					legend: {
						cursor: "pointer",
						itemclick: toggleDataSeries
					},
					data: generateChartOptions(ip_score)
				});

				ipScoreChart.render();
				$("#c_score_cont").hide();
				$("#uc_score_cont").hide();
				$("#ks_score_cont").hide();
				$("#ip_score_cont").show();
			});
			
		});

		function toggleDataSeries(e) {
			if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			} else {
				e.dataSeries.visible = true;
			}
			e.chart.render();
		}

		function generateChartOptions(obj) {
			var data = [];
			for(var i = 0; i < obj.length; i++) {
				data.push({
					type: "scatter",
					name: "Cluster" + (i+1),
					showInLegend: true,
					toolTipContent: "<span style=\"color:#4F81BC \">{name}</span><br>Age: {y}<br>Score: {x}%",
					dataPoints: generateDataPoints(obj[i])
				});
			}

			return data;
		}

		function generateDataPoints(arr) {
			var data = [];
			cluster = JSON.parse(JSON.stringify(arr));
			for(var key in cluster) {
				data.push({
					x: cluster[key][0],
					y: cluster[key][1]
				});
			}

			return data;
		}
	</script>
@endsection
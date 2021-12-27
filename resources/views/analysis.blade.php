@extends('layouts._layout-admin')

@section('nav')
<div class="nav">
    <div class="sb-sidenav-menu-heading">
        <h5>Political Participation Analyzer</h5>
    </div>
    <a class="nav-link" href="/admin/dashboard">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <div class="sb-sidenav-menu-heading">Analytics</div>
    <a class="nav-link" href="/admin/participants">
        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
        Participants
    </a>
    <a class="nav-link active" href="/admin/analysis">
        <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
        Cluster Analysis
    </a>
	<a class="nav-link" data-bs-toggle="modal" data-bs-target="#PPModal">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Faces of Political Participation
    </a>
</div>
@endsection

@section('content')
    <div class="container-fluid px-4">
    	<div class="mt-4 mb-4">
    		<h3>Cluster Analysis</h3>
	        <small>
        		This page will contain the analysis of the gathered survey responses using KMeans clustering algorithm.
        	</small>
    	</div>
        <div class="row mb-4">
        	<div class="col-md-8">
        		<div class="card">
		            <div class="card-header">
                        <form id="filter_form" method="GET" action="{{ route('analysis') }}">
                    		Cluster By: &nbsp;
                    		<select id="col1" name="col1">
                        		@foreach($filters as $filter)
                        			@if($filter['id'] == $col1)
                        				<option value="{{ $filter['id'] }}" selected>{{ $filter['text'] }}</option>
                        			@else
                        				<option value="{{ $filter['id'] }}">{{ $filter['text'] }}</option>
                        			@endif
                        		@endforeach
                        	</select>
                        	&nbsp; and &nbsp;
                        	<select id="col2" name="col2">
                        		@foreach($filters as $filter)
                        			@if($filter['id'] == $col2)
                        				<option value="{{ $filter['id'] }}" selected>{{ $filter['text'] }}</option>
                        			@else
                        				<option value="{{ $filter['id'] }}">{{ $filter['text'] }}</option>
                        			@endif
                        		@endforeach
                        	</select>
                        	&nbsp;
                        	<input type="hidden" id="k" name="k" value="{{ $k }}" />
                        	<button type="submit" class="btn btn-primary">Generate</button>
                    	</form>
                    </div>
                    <div class="card-body">
                    	<canvas id="ScatterChart" width="100%" height="50"></canvas>
                    	<br>
                    	@for($i = 0; $i < count($demographicAnalysis); $i++)
                    		<div class="card mb-4">
					            <div class="card-header">
			                        <i class="fas fa-chart-bar me-1"></i>
			                        Cluster {{ ($i+1) }} Analysis
			                    </div>
			                    <div class="card-body">
			                    	<p>
			                    		There is a total of <b>{{ $demographicAnalysis[$i]['total'] }}</b> participants in this cluster
			                    		which consists of <b>{{ $demographicAnalysis[$i]['gender']['Female'] }}</b> Female and <b>{{ $demographicAnalysis[$i]['gender']['Male'] }}</b> Male.

			                    		Participants with ages between <b>18-29</b> is 
			                    		<b>{{ round(($demographicAnalysis[$i]['age']['young']/$demographicAnalysis[$i]['total'])*100, 1) }}%</b>; 

			                    		with ages between <b>30-39</b> is 
			                    		<b>{{ round(($demographicAnalysis[$i]['age']['young_2']/$demographicAnalysis[$i]['total'])*100, 1) }}%</b>;

			                    		with ages between <b>40-59</b> is 
			                    		<b>{{ round(($demographicAnalysis[$i]['age']['middle']/$demographicAnalysis[$i]['total'])*100, 1) }}%</b>; 

			                    		and finally, with ages <b>above 60</b> is
			                    		<b>{{ round(($demographicAnalysis[$i]['age']['old']/$demographicAnalysis[$i]['total'])*100, 1) }}%</b>,

			                    		which means a large portion of this cluster are 
			                    		<b>
			                    		@switch ($demographicAnalysis[$i]['max_age'])
			                    			@case('young')
			                    				young adults with ages 18-29.
			                    				@break
		                    				@case('young_2')
			                    				young adults with ages 30-39.
			                    				@break
		                    				@case('middle')
			                    				middle-aged adults with ages 40-59.
			                    				@break
		                    				@case('old')
			                    				old-aged adults with ages above 60.
			                    				@break
			                    		@endswitch
			                    		</b>
			                    	</p>

			                    	<p>
			                    		Here is the percentage of participants per barangay:
			                    		<ul>
			                    			@foreach($demographicAnalysis[$i]['barangay'] as $b => $count)
			                    				<li>
			                    					<b>{{ round(($count/$demographicAnalysis[$i]['total'])*100, 1) }}%</b> in {{ $b }}
			                    				</li>
			                    			@endforeach
			                    			
			                    		</ul>
			                    	</p>

			                    	<p>
			                    		This cluster is most likely
			                    		@switch ($demographicAnalysis[$i]['max_category'])
			                    			@case('c_average')
			                    				a <b>Conventional Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['c_average'] }}</b>.
			                    				@break
		                    				@case('uc_average')
			                    				an <b>Unconventional Type</b> when it comes to political participation with an average score of<b>{{ $demographicAnalysis[$i]['uc_average'] }}</b>.
			                    				@break
		                    				@case('ks_average')
			                    				a <b>Knowledge Seeking Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['ks_average'] }}</b>.
			                    				@break
		                    				@case('ip_average')
			                    				an <b>Influential Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['ip_average'] }}</b>.
			                    				@break
			                    		@endswitch

			                    		In addition, this cluster is less likely 
			                    		@switch ($demographicAnalysis[$i]['min_category'])
			                    			@case('c_average')
			                    				a <b>Conventional Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['c_average'] }}</b>.
			                    				@break
		                    				@case('uc_average')
			                    				an <b>Unconventional Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['uc_average'] }}</b>.
			                    				@break
		                    				@case('ks_average')
			                    				a <b>Knowledge Seeking Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['ks_average'] }}</b>.
			                    				@break
		                    				@case('ip_average')
			                    				an <b>Influential Type</b> when it comes to political participation with an average score of <b>{{ $demographicAnalysis[$i]['ip_average'] }}</b>.
			                    				@break
			                    		@endswitch
			                    	</p>
			                    </div>
			                </div>
                    	@endfor
                    </div>
		        </div>	
        	</div>
        	<div class="col-md-4">
        		<div class="card">
		            <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        What is the best K?
                        <span style="float: right;">
                        	Best K:
                        	<select id="best_k">
                        		@for($i = 0; $i < count($sse_arr); $i++)
                        			@if(($i+1) == $k)
                        				<option value="{{ $i+1 }}" selected>{{ $i+1 }}</option>
                        			@else
                        				<option value="{{ $i+1 }}">{{ $i+1 }}</option>
                        			@endif
                        		@endfor
                        	</select>
                        </span>
                    </div>
                    <div class="card-body">
                    	<table class="table">
                    		<thead>
                    			<th>Cluster</th>
                    			<th>SSE Score</th>
                    		</thead>
                    		<tbody>
                    			@for($i = 0; $i < count($sse_arr); $i++)
                    			<tr>
                    				<td>{{ $i+1 }}</td>
                    				<td>{{ $sse_arr[$i] }}</td>
                    			</tr>
                    			@endfor
                    		</tbody>
                    	</table>
                    	<canvas id="SSEChart" width="100%" height="50"></canvas>
                    </div>
		        </div>	
        	</div>
        </div>
    </div>

    <input type="hidden" id="sse" value="{{ $sse }}"/>
    <input type="hidden" id="clusters" value="{{ $clusters }}"/>
    <input type="hidden" id="clusterDemographics" value="{{ $clusterDemographics }}"/>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>  
	<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>
	<script type="text/javascript">
		var sse = JSON.parse($("#sse").val());
		var clusters = JSON.parse($("#clusters").val());
		var clusterDemographics = JSON.parse($("#clusterDemographics").val());
		var ScatterChart;

		var label = [];
		for (var i = 0; i < sse.length; i++) {
			label[i] = i+1;
		}

		var ctx = document.getElementById("SSEChart");
		var SSEChart = new Chart(ctx, {
		  type: 'line',
		  data: {
		    labels: label,
		    datasets: [{
		    	label: "Score",
		      	data: sse,
		      	backgroundColor: ['#5997e1'],
		    }],
		  },
		  options: {
		  	scales: {
		      y: {
		        min: Math.min.apply(Math,sse),
		        max: Math.max.apply(Math,sse),
		      }
		    }
		  }
		});

		initializeScatter(clusters);
		

		$(document).ready(function() {
			$(document).on("change", "#best_k", function() {
				$("#k").val($(this).val());
				$("#filter_form").submit();

				// $.ajax({
				// 	url: "/admin/analysis",
				// 	type:"GET",
				// 	data: {
				// 		k: $(this).val(),
				// 		col1: $("#col1").val(),
				// 		col2: $("#col2").val()
				// 	},
				// 	success:function(response) {
				// 		clusters = response.clusters;
				// 		clusterDemographics = response.clusterDemographics;
				// 		ScatterChart.destroy();
				// 		initializeScatter(clusters);
				// 	},
				// 	error: function(error) {
				// 		console.log(error);
				// 	}
				// });
			});
		});

		function initializeScatter(clusters) {
			var ctx = document.getElementById("ScatterChart");

			var data = {
				datasets: []
			};

			var colors = randomizeColor(clusters.length);
			console.log(colors);
			for(var i = 0; i < clusters.length; i++) {
				data.datasets.push({
					label: ['Cluster ' + (i+1)],
					data: clusters[i],
					backgroundColor: colors[i]
				});
			}

			ScatterChart = new Chart(ctx, {
			  type: 'bubble',
			  data: data
			});
		}

		function randomizeColor(length) {
			var colors = ["#f25d7c","#bd41d7","#4278de", "#48d6d8", "#43c563", "#d5ae15", "#d34d15", "#14129c", "#138e6e", "#a3e121"];
			var genColors = [];
			var color;

			for(var i = 0; i < length; i++) {
				color = colors[Math.floor(Math.random() * colors.length)];
				while(jQuery.inArray(color, genColors) !== -1) {
					color = colors[Math.floor(Math.random() * colors.length)];
				}

				genColors.push(color);
			}
			
  			return genColors;
		}
	</script>
@endsection
@extends('layouts._layout-admin')

@section('nav')
<div class="nav">
    <div class="sb-sidenav-menu-heading">
        <h5>Political Participation Analyzer</h5>
    </div>
    <a class="nav-link active" href="/admin/dashboard">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <div class="sb-sidenav-menu-heading">Analytics</div>
    <a class="nav-link" href="/admin/participants">
        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
        Participants
    </a>
    <a class="nav-link" href="/admin/analysis">
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
        <h3 class="mt-4 mb-4">Dashboard</h3>

        <div class="row mb-4">
        	<div class="col-md-3">
        		<div class="card card-overview">
		            <div class="card-body">
		            	<div class="row">
		            		<div class="col-md-12">
		            			<h1 style="font-size: 3em; text-align: center;">
		            				<i class="fas fa-users"></i>
		            				<span id="participants">{{ count($participants) }}</span>
		            			</h1>
		            		</div>
		            		<div class="col-md-12">
		            			<h4 style="text-align: center;">Total Participants</h4>
		            		</div>
		            	</div>
		            </div>
		        </div>	
        	</div>
        	<div class="col-md-3">
        		<div class="card card-overview">
		            <div class="card-body">
		            	<div class="row">
		            		<div class="col-md-12">
		            			<h1 style="font-size: 3em; text-align: center;">
		            				<span id="participants">{{ $average }}</span>
		            			</h1>
		            		</div>
		            		<div class="col-md-12">
		            			<h4 style="text-align: center;">Overall Average</h4>
		            		</div>
		            	</div>
		            </div>
		        </div>
        	</div>
        	<div class="col-md-3">
        		<div class="card card-overview">
		            <div class="card-body">
		            	<div class="row">
		            		<div class="col-md-12">
		            			<h1 style="font-size: 3em; text-align: center;">
		            				<i class="fas fa-users"></i>
		            				<span id="participants">{{ count($registered) }}</span>
		            			</h1>
		            		</div>
		            		<div class="col-md-12">
		            			<h4 style="text-align: center;">Registered Voters</h4>
		            		</div>
		            	</div>
		            </div>
		        </div>
        	</div>
        	<div class="col-md-3">
        		<div class="card card-overview">
		            <div class="card-body">
		            	<div class="row">
		            		<div class="col-md-12">
		            			<h1 style="font-size: 3em; text-align: center;">
		            				<i class="fas fa-users"></i>
		            				<span id="participants">{{ count($notregistered) }}</span>
		            			</h1>
		            		</div>
		            		<div class="col-md-12">
		            			<h4 style="text-align: center;">Non-Registered Voters</h4>
		            		</div>
		            	</div>
		            </div>
		        </div>
        	</div>
        </div>

        <div class="row mb-4">
        	<div class="col-md-4">
        		<div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list me-1"></i>
                        Survey Questions
                    </div>
                    <div class="card-body" style="max-height: 550px; overflow-y: scroll;">
                    	<table class="table">
                    		<tbody>
                    			@foreach($questions as $q)
	                    			<tr id="{{ $q['id'] }}">
	                    				<td>{{ $q['id'] }}</td>
	                    				<td>{{ $q['question'] }}</td>
	                    			</tr>
                    			@endforeach
                    		</tbody>
                    	</table>
                    </div>
                </div>	
        	</div>
        	<div class="col-md-8">
        		<div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Survey Results Overview
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                </div>
        	</div>
        </div>
    </div>

    <input type="hidden" id="q_values" value="{{ $q_values }}"/>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>  
	<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>

	<script type="text/javascript">
		var q_values = JSON.parse($("#q_values").val());
		var q_label = Object.keys(q_values[0]);

		var q_count = [];
		Object.keys(q_values[0]).forEach(function(key) {
			q_count.push(q_values[0][key]);
		});

		var ctx = document.getElementById("myBarChart");
		var myLineChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
		    labels: q_label,
		    datasets: [{
		      label: "Average Score",
		      backgroundColor: "rgba(2,117,216,1)",
		      borderColor: "rgba(2,117,216,1)",
		      data: q_count,
		    }],
		  },
		  options: {
		    scales: {
		      xAxes: [{
		        gridLines: {
		          display: false
		        },
		        ticks: {
		          maxTicksLimit: 6
		        }
		      }],
		      yAxes: [{
		        ticks: {
		          min: 0,
		          max: 15000,
		          maxTicksLimit: 5
		        },
		        gridLines: {
		          display: true
		        }
		      }],
		    },
		    legend: {
		      display: false
		    }
		  }
		});
	</script>
@endsection
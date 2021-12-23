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
    <a class="nav-link active" href="/admin/participants">
        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
        Participants
    </a>
    <a class="nav-link" href="/admin/analysis">
        <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
        Cluster Analysis
    </a>
</div>
@endsection

@section('content')
    <div class="container-fluid px-4">
    	<div class="mt-4 mb-4">
    		<h3>Participants</h3>
	        <small>
        		This is the list of people who participated in our survey showing their demographics such as age, sex, barangay, and the like.
        	</small>
    	</div>
        <div class="row mb-4">
        	<div class="col-md-12">
        		<div class="card">
		            <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Participants
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Barangay</th>
                                    <th>Is a Registered Voter?</th>
                                    <th>Voter's ID</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Barangay</th>
                                    <th>Is a Registered Voter?</th>
                                    <th>Voter's ID</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	@foreach($participants as $p)
	                            	<tr>
	                                    <td>{{ $p->name }}</td>
	                                    <td>{{ $p->age }}</td>
	                                    <td>{{ $p->gender }}</td>
	                                    <td>{{ $p->barangay }}</td>
	                                    @if($p->registeredvoter == 1)
	                                    	<td><span class="badge bg-success">Yes</span></td>
	                                   	@else
	                                   		<td><span class="badge bg-danger">No</span></td>
	                                   	@endif
	                                    <td>{{ $p->votersid }}</td>
	                                </tr>
			                    @endforeach
                            </tbody>
                        </table>
                    </div>
		        </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-4">
        		<div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Participants Per Sex
                    </div>
                    <div class="card-body">
                    	<canvas id="myPieChart"></canvas>
                    </div>
                </div>	
        	</div>
        	<div class="col-md-8">
        		<div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Participants Per Barangay
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                </div>
        	</div>
        </div>
    </div>

    <input type="hidden" id="gender_label" value="{{ $gender_label }}"/>
    <input type="hidden" id="gender_count" value="{{ $gender_count }}"/>
    <input type="hidden" id="brgy_label" value="{{ $brgy_label }}"/>
    <input type="hidden" id="brgy_count" value="{{ $brgy_count }}"/>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>  
	<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>
	<script type="text/javascript">
		window.addEventListener('DOMContentLoaded', event => {
		    // Simple-DataTables
		    // https://github.com/fiduswriter/Simple-DataTables/wiki

		    const datatablesSimple = document.getElementById('datatablesSimple');
		    if (datatablesSimple) {
		        new simpleDatatables.DataTable(datatablesSimple);
		    }
		});

		var gender_label = JSON.parse($("#gender_label").val());
		var gender_count = JSON.parse($("#gender_count").val());
		var brgy_label = JSON.parse($("#brgy_label").val());
		var brgy_count = JSON.parse($("#brgy_count").val());

		// Pie Chart Example
		var ctx = document.getElementById("myPieChart");
		var myPieChart = new Chart(ctx, {
		  type: 'pie',
		  data: {
		    labels: gender_label,
		    datasets: [{
		      data: gender_count,
		      backgroundColor: ['#f38eb1', '#5997e1'],
		    }],
		  },
		});

		var ctx = document.getElementById("myBarChart");
		var myLineChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
		    labels: brgy_label,
		    datasets: [{
		      label: "Barangay",
		      backgroundColor: "rgba(2,117,216,1)",
		      borderColor: "rgba(2,117,216,1)",
		      data: brgy_count,
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
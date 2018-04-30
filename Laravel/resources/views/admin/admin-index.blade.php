<?php
 
$dataPoints = array( 
	array("label"=>"Casual", "y"=>$num_casual),
	array("label"=>"Admin", "y"=>$num_admin),
	array("label"=>"Developer", "y"=>$num_developer),
	array("label"=>"Banned", "y"=>$num_ban)
);

$dataPoints_2 = array( 
	array("y" => $dt[0],"label" => "Last 1 Day" ),
	array("y" => $dt[1],"label" => "Last 2 Days" ),
	array("y" => $dt[2],"label" => "Last 3 Days" ),
	array("y" => $dt[3],"label" => "Last 4 Days" ),
	array("y" => $dt[4],"label" => "Last 5 Days" ),
	array("y" => $dt[5],"label" => "Last 6 Days" ),
	array("y" => $dt[6],"label" => "Last 7 Days" )
);
 
?>




@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection
@section('content')
<!-- USER PIE CHART -->

	<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	<br><hr><br>
	<div id="chartContainer-2" style="height: 400px; width: 100%;"></div>


	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection

@section('scripts')
<script type="text/javascript">
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Profile Distribution"
	},
	subtitles: [{
		text: "GameStop"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "###,000",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart_2 = new CanvasJS.Chart("chartContainer-2", {
	animationEnabled: true,
	title:{
		text: "Revenue Of Past Week"
	},
	axisY: {
		title: "Revenue (in USD)",
		prefix: "$",
	},
	data: [{
		type: "bar",
		yValueFormatString: "$#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints_2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart_2.render();
}
</script>
@endsection
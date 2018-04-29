<?php
 
$dataPoints = array( 
	array("label"=>"Casual", "y"=>$num_casual),
	array("label"=>"Admin", "y"=>$num_admin),
	array("label"=>"Developer", "y"=>$num_developer),
	array("label"=>"Banned", "y"=>$num_ban)
);

$dataPoints_2 = array( 
	array("y" => 7,"label" => "Monday" ),
	array("y" => 12,"label" => "Tuesday" ),
	array("y" => 28,"label" => "Wednesday" ),
	array("y" => 18,"label" => "June" ),
	array("y" => 41,"label" => "July" ),
	array("y" => 41,"label" => "July" )
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
		yValueFormatString: "#,0",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart_2 = new CanvasJS.Chart("chartContainer-2", {
	animationEnabled: true,
	title:{
		text: "Revenue Chart Over the Week"
	},
	axisY: {
		title: "Revenue (in USD)",
		prefix: "$",
	},
	data: [{
		type: "bar",
		yValueFormatString: "$#,##0K",
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
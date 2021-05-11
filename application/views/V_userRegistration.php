<html>
<style type="text/css">
	
.reportTable {
	border: solid 1px black;
    border-collapse: collapse;
	border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.reportTable thead th {
    background-color: #DDEFEF;
    border: solid 1px black;
    color: #336B6B;
    padding: 10px;
    text-align: center;
    text-shadow: 1px 1px 1px #fff;
}
.reportTable tbody td {
    border: solid 1px black;
    color: #333;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.row{
	display: flex;
}
div.logo
{
    background-repeat: no-repeat;
    width: 120px;
    height:105px;
    float: left
}
.heading{
	color: #47484d;
	text-align: right;
}
.footer{
	text-align: right;
	padding-top:280px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
b{
	font-family: 'Georgia'serif;
	color: #293247;
}
</style>
<body>
	<!-- calculation for age -->
	<?php
	$dateOfBirth = $user_data[0]->dob;
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dateOfBirth), date_create($today));
	$age = $diff->format('%y');
	?>

		<div class="row">
			<div class="logo" style="background-image: url('logo.jpg')"></div>
			<div class="heading">&nbsp;&nbsp;<h2>Water World Academy- AK Group Griffines Swimming Training Center</h2>
				<i>Wadia Park, Ahamadnagar, Maharashtra.</i></div>
		</div>
			
			<hr>
			<h4 style="text-align: center; color: color: #47484d;">Athlete Profile & Report</h4>
			<section>
			   <strong style="color: #6a747d;font-size: 15px;font-family: 'Georgia'serif;">Student Information</strong><br>
			 	 <table style="width: 100%">
			 		<tr>
			   			<td>Name&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->name; ?></b></td>
			   			<td></td><td></td>
			   			<td>Age&nbsp;:</td>
			   			<td><b><?php echo $age.' Years'; ?></b></td>
			   		</tr>
			   		<tr>
			   			<td>Height&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->height.' cms'; ?></b></td>
			   			<td></td><td></td>
			   			<td>BMI&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->bmi; ?></b></td>
			   		</tr>
			   		<tr>
			   			<td>Weight&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->weight.' Kg'; ?></b></td>
			   			<td></td><td></td>
			   			<td>Blood Group&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->blood_group; ?></b></td>
			   		</tr>
			   		<tr>
			   			<td>Admission Date&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->admission_date; ?></b></td>
			   			<td></td><td></td>
			   			<td>Phone&nbsp;:</td>
			   			<td><b><?php echo $user_data[0]->mobile_number; ?></b></td>
			   		</tr>
			   	</table>	
			   </section>
				

			   	<br><br>
				<h4 style="color: #6a747d;font-size: 15px;font-family: 'Georgia'serif;">Month Wise Track Report</h4>

				<table class="reportTable">
					<thead>
						<tr>
							<th>Month</th>
							<th>Meter</th>
							<th>Free Style<br>(Seconds)</th>
							<th>Breast Stroke<br>(Seconds)</th>
							<th>Back Stroke<br>(Seconds)</th>
							<th>Butterfly Stroke<br>(Seconds)</th>
							<th>Individual Midlay<br>(Seconds)</th>
						</tr>
					</thead>
					<tbody>
							<?php 
								if($report_data){
								for($i=0;$i<sizeof($report_data);$i++) { ?>
						<tr>
							<td>
								<?php 
									$date = strtotime($report_data[$i]['month_wise']);
									$month = date("F",$date);
									$year  = date("Y",$date);
									echo $month.' '.$year;
								?>
							</td>
							<td><?php echo $report_data[$i]['meter'];?></td>
							<td><?php echo $report_data[$i]['freestyle'];?></td>
							<td><?php echo $report_data[$i]['breast_stroke'];?></td>
							<td><?php echo $report_data[$i]['backstroke'];?></td>
							<td><?php echo $report_data[$i]['butterfly_stroke'];?></td>
							<td><?php echo $report_data[$i]['individual_midlay'];?></td>
						
							<?php } }else{ ?> <td>No data Available</td> <?php } ?>
						</tr>
					</tbody>
				</table>
	<div class="footer">
		<small><b>Produced By</b></small><br><br><br>
		<h3>Sarvesh Deshmukh<br>Swimming Coach, Wadiya Park</h3>
	</div>
</body>
</html>
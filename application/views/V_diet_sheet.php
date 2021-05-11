<?php 
//print_r($diet);exit;
?>
<html>
<style type="text/css">
	
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
	padding-top:50px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
b{
	font-family: 'Georgia'serif;
	color: #293247;
}
#dietTab{
	border:  1px solid black;
	width: 100%;
}
#dietTab tr{
	border:  1px solid black;
	height: 50px;
}
#dietTab td{
	border:  1px solid black;	
	height: 50px;
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
			<div class="heading">&nbsp;&nbsp;<h2>Water World Academy-AK Group Griffines Swimming Training Center<br></h2><i>Wadiya Park, Ahamadnagar</i></div>
		</div>
			
			<hr>
			<h4 style="text-align: center; color: color: #47484d;">Athlete Profile & Diet Plan</h4>
			
			<section>
			   <strong style="color: #6a747d;font-size: 15px;font-family: 'Georgia'serif;">Student Information</strong>
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
			
			<div class="diet">
				<br><br>
				<h4 style="color: #6a747d;font-size: 15px;font-family: 'Georgia'serif;">Diet Plan</h4>
				<table id="dietTab" cellpadding="0" cellspacing="0">
					<tr>
						<td>Morning</td>
						<td>&nbsp;<?php echo $diet[0]['morning_diet'] ? $diet[0]['morning_diet'] : '-'; ?></td>
					</tr>
					<tr>
						<td>Afternoon</td>
						<td>&nbsp;<?php echo $diet[0]['afternoon_diet'] ? $diet[0]['afternoon_diet'] : '-'; ?></td>
					</tr>
					<tr>
						<td>Evening</td>
						<td>&nbsp;<?php echo $diet[0]['evening_diet'] ? $diet[0]['evening_diet'] : '-'; ?></td>
					</tr>
					<tr>
						<td>Night</td>
						<td>&nbsp;<?php echo $diet[0]['night_diet'] ? $diet[0]['night_diet'] : '-'; ?></td>
					</tr>
					<tr>
						<td>Post Work-Out Drink</td>
						<td>&nbsp;<?php echo $diet[0]['post_workout_drink'] ? $diet[0]['post_workout_drink'] : '-'; ?></td>
					</tr>
				</table>
			</div>
	<div class="footer">
		<small><b>Produced By</b></small>
		<h3>Sarvesh Deshmukh<br>Swimming Coach, Wadiya Park</h3>
	</div>
</body>
</html>
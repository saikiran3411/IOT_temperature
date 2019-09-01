<?php
include "calls.php";
$user = new User();
$data = $user->view();
$count = $data->num_rows;
for($i=0; $i<$count; $i++){
	$details = $data->fetch_assoc();
	if($i/4 == 0){
		if($i !=0){
			echo '</div>
					<div class="counter-wrap">
					<div class="counter">
							<div class="caption"><h2>'.$details['room'].'</h2></div>
							<div class="number">'. $details['temp'].'</div>	
						</div>';
		}else{
			echo '</div>
					<div class="counter-wrap">
					<div class="counter">
							<div class="caption"><h2>'.$details['room'].'</h2></div>
							<div class="number">'. $details['temp'].'</div>
						</div>';
		}
	}else{
		echo '<div class="counter">
							<div class="caption"><h2>'.$details['room'].'</h2></div>
							<div class="number">'. $details['temp'].'</div>
						</div>';
	}
}
			// echo '<div class="counter-wrap">
			// 			<div class="counter">
			// 				<div class="number">'. $row['lpg'].'</div>
			// 				<div class="caption">LPG</div>
			// 			</div> <!-- .counter -->
			// 			<div class="counter">
			// 				<div class="number">'.$row['propane'].'</div>
			// 				<div class="caption">PROPANE</div>
			// 			</div> <!-- .counter -->
			// 			<div class="counter">
			// 				<div class="number">'.$row['methane'].'</div>
			// 				<div class="caption">METHANE</div>
			// 			</div> <!-- .counter -->
			// 			<div class="counter">
			// 				<div class="number">'.$row['h2'].'</div>
			// 				<div class="caption">HYDROGEN</div>
			// 			</div> <!-- .counter -->
			// 		</div> <!-- .counter-wrap -->
			// 		<div class="counter-wrap">
			// 			<div class="counter second">
			// 				<div class="number">'.$row['alcohol'].'</div>
			// 				<div class="caption">ALCOHOL</div>
			// 			</div> <!-- .counter -->
			// 			<div class="counter second">
			// 				<div class="number">'.$row['smoke'].'</div>
			// 				<div class="caption">SMOKE</div>
			// 			</div> <!-- .counter -->
			// 			<div class="counter second">
			// 				<div class="number">'.$row['co'].'</div>
			// 				<div class="caption">CARBON-MONOXIDE</div>
			// 			</div> <!-- .counter -->
			// 		</div> ';
?>

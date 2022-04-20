<!DOCTYPE html>
<html>
	<head>
		<style>
			table, th, td{
				border:1px solid black;
				text-align:left;
			}
			table{
				border-collapse:collapse;
				width:100%;
			}
			th, td{
				padding:15px;
				margin:0px;
			}
			.colorinchis_blue{
				background-color:blue;
			}
			.colorinchis_green{
				background-color:green;
			}
		</style>
	</head>
	<body>
		
		<table>
			<caption>tabla</caption>
			<?php 
				for($colum=1;$colum<=10;$colum++){
					echo '<tr>';
					for($fila=1;$fila<=10;$fila++){
						//echo  "<td class=\"colorinchis_blue\">$colum - $fila</td>";
						echo '<td ';
						if($colum%2==0&$fila%2==0){
							echo  'class="colorinchis_blue"';
						}else if($colum%3==0&$fila%3==0){
							echo  'class="colorinchis_green"';
						}
						echo  '>'.$colum.' - '.$fila.'</td>';
					}
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>
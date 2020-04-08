<?php

$carpeta='hosts';
$umbral=180; //segundos

$i=0;

    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
		if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
			//define('JSON'.$i, $carpeta.'/'.$archivo);
			$data[$i] = file_get_contents($carpeta.'/'.$archivo);
			$items[$i] = json_decode($data[$i], true);
			$listaItems[$i] = $items[$i]["Equipos"];
			$i ++;
                }
            }
            closedir($dir);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>STATUS PANEL</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" media="all" />
	<meta http-equiv="Refresh" content="5">
    </head>
<body>
<h1>STATUS PANEL</h1>


<div class="datagrid"><table>
        <thead><tr>
                <th>[*] HOST</th>
                <th>[*] IP</th>
                <th>[*] USUARIO</th>
                <th>[*] ESTADO</th>
        </tr></thead>

<tbody>
<?php
	for ($j = 0; $j<$i; $j++){
?>
		<tr <?php if ($j%2==0){echo 'class="alt"';} ?> >
			<td>
				<?php echo $listaItems[$j][0]["host"]; ?>
			</td>
			<td>
				<?php echo '<a href= rdp/RDP_'.$listaItems[$j][0]["ip"].'.rdp >'.$listaItems[$j][0]["ip"]; ?>	
			</td>
			<td>
				<?php echo $listaItems[$j][0]["username"]; ?>
			</td>
			<td>
				<?php 	$time_act=time();
					if(($time_act - $listaItems[$j][0]["time"])> $umbral){
						$status='Inactivo';
					} else { $status='Activo';}
					echo  $status ?>
			</td>
		</tr>
<?php
	}
?>
</tbody>	</table>
</div>

</body>
</html>

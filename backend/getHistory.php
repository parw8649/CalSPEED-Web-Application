<?php
require '../results/telemetry_settings.php';
require_once '../results/telemetry_db.php';

$fetchData= getLatestSpeedtestUsers();

show_data($fetchData);

function show_data($fetchData) {
  
    if(count($fetchData) > 0){
     
    $sn = 1;
      foreach($fetchData as $data){ 
        echo "<tr>
                <td>"$sn"</td>
                <td>"$data['timestamp']"</td>
                <td>"$data['ip']"</td>
                <td>"$data['ua']"</td>
                <td>"$data['lang']"</td>
                <td>"$data['dl']"</td>
                <td>"$data['ul']"</td>
                <td>"$data['ping']"</td>
                <td>"$data['jitter']"</td>
                <td>"$data['ispinfo']"</td>
            </tr>";
        $sn++;
     }
    } else {   
        echo "<tr>
                <td colspan='9'>No Data Found</td>
            </tr>"; 
    }
}
?>
<?php
#include("db.php");
require '../results/telemetry_settings.php';
require_once '../results/telemetry_db.php';


# fetch query
function fetch_data(){
  $query="SELECT * from speedtest_users ORDER BY id DESC Limit 20";
  $exec=mysqli_query($conn, $query);
  if(mysqli_num_rows($exec) > 0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}

$fetchData= getSpeedtestHistory();

show_data($fetchData);

function show_data($fetchData) {
  
    if(count($fetchData) > 0){
     
    $sn = 1;
    echo $sn;
      foreach($fetchData as $data){ 
        echo "<tr>
                <td>".$sn."</td>
                <td>".$data['timestamp']."</td>
                <td>".$data['ip']."</td>
                <td>".$data['ua']."</td>
                <td>".$data['lang']."</td>
                <td>".$data['dl']."</td>
                <td>".$data['ul']."</td>
                <td>".$data['ping']."</td>
                <td>".$data['jitter']."</td>
                <td>".$data['ispinfo']."</td>
            </tr>";
        $sn++;
     }
    } else {   
        echo "<tr>
                <td colspan='9'>No Data Found</td>
            </tr>"; 
    }
}


/**
 * @return array|null|false returns the speedtest data as array, null
 *                          if no data is found or false if there was an error
 *
 * @throws RuntimeException
 */
function getSpeedtestHistory()
{
    $pdo = getPdo();
    if (!($pdo instanceof PDO)) {
        return false;
    }

    try {
        $stmt = $pdo->prepare(
            'SELECT timestamp, ip, ispinfo, ua, lang, dl, ul, ping, jitter, log, extra
            FROM speedtest_users
            ORDER BY timestamp DESC
            LIMIT 20'
        );
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return false;
    }

    if (!is_array($rows)) {
        return null;
    }

    return $rows;
}
?>
<?php
require '../results/telemetry_settings.php';
require_once '../results/telemetry_db.php';

ini_set('display_errors', 1);

$fetchData= fetchSpeedTestHistory();

show_data($fetchData);

function fetchSpeedTestHistory() {

    try {
        $test_pdo = getPdo();
        if (!($test_pdo instanceof PDO)) {
            echo "<tr><td colspan='10'>There was a PDO error.</td></tr>";
            return false;
        }
    
        $stmt = $test_pdo->query(
                'SELECT
                id, timestamp, ip, ispinfo, ua, lang, dl, ul, ping, jitter, log, extra
                FROM speedtest_users
                ORDER BY timestamp DESC
                LIMIT 100'
            );
    
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($rows as $i => $row) {
                $rows[$i]['id_formatted'] = $row['id'];
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='10'>$e</td></tr>"
            return false;
        }

    return $rows;
}



function show_data($fetchData) {

    if (false === $fetchData) {
        echo '<tr><td colspan='10'>There was an error trying to fetch latest speedtest results.</td></tr>';
        return;
    } elseif (empty($fetchData)) {
        echo '<tr><td colspan='10'>Could not find any speedtest results in database.</td></tr>';
        return;
    }
  
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
                <td colspan='10'>No Data Found</td>
            </tr>"; 
    }
}
?>
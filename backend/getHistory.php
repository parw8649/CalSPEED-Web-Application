<?php
require '../results/telemetry_settings.php';
require_once '../results/telemetry_db.php';

$fetchData= fetchSpeedTestHistory();

show_data($fetchData);

function fetchSpeedTestHistory() {


    $dsn = 'mysql:'
    .'host='.$MySql_hostname
    .';port='.$MySql_port
    .';dbname='.$MySql_databasename;

    $test_pdo = new PDO($dsn, $MySql_username, $MySql_password, $pdoOptions);

    if (!($test_pdo instanceof PDO)) {
        echo "<tr><td colspan='10'>There was a PDO error.</td></tr>";
        return false;
    }

    try {
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
    } else {
        echo "<tr><td colspan='5'>$fetchData</td>
        <td colspan='5'>$fetchData['dl']</td>
        </tr>";
    }
}
?>
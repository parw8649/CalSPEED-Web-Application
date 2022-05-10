<?php
include("db.php");
$db=$conn;

// fetch query
function fetch_data(){
 global $db;
  $query="SELECT * from user_results.speedtest_users ORDER BY id DESC";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}

$fetchData= fetch_data();

//show_data($fetchData);

// function show_data($fetchData) {
//     echo '<thead class="table">
//             <tr>
//                 <th>Date</th>
//                 <th>IP</th>
//                 <th>UA</th>
//                 <th>Lang</th>
//                 <th>Download</th>
//                 <th>Upload</th>
//                 <th>Ping</th>
//                 <th>Jitter</th>
//                 <th>ISP Info</th>
//             </tr>
//         </thead><tbody>';

//     if(count($fetchData) > 0){
     
//     //   foreach($fetchData as $data){ 
//     //     echo "<tr>
//     //             <td>".$data['timestamp']."</td>
//     //             <td>".$data['ip']."</td>
//     //             <td>".$data['ua']."</td>
//     //             <td>".$data['lang']."</td>
//     //             <td>".$data['dl']."</td>
//     //             <td>".$data['ul']."</td>
//     //             <td>".$data['ping']."</td>
//     //             <td>".$data['jitter']."</td>
//     //             <td>".$data['ispinfo']."</td>
//     //         </tr>";
//     //  }
//     } else{   
//         echo "<tr>
//                 <td colspan='9'>No Data Found</td>
//             </tr>"; 
//     }

//     echo "</tbody>";
// }
?>
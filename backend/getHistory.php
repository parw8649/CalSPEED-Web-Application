<?php
include("db.php");

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

$fetchData= fetch_data();

show_data($fetchData);

function show_data($fetchData) {
  
    if(count($fetchData) > 0){
     
      foreach($fetchData as $data){ 
        echo "<tr>
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
     }
    } else {   
        echo "<tr>
                <td colspan='9'>No Data Found</td>
            </tr>"; 
    }
}
?>
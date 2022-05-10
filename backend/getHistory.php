<?php
include("db.php");

# fetch query
function fetch_data(){
  $query="SELECT * from speedtest_users ORDER BY id DESC Limit 20";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row= $result->fetch_assoc();
    return $row;  
        
  }else{
    return $row=[];
  }	
}

$data= fetch_data();

show_data($data);

function show_data($data) {

  echo ".$data.";
  
    if(count($data) > 0){
    
      while($data) { 
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
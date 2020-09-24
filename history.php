<?php
include 'databaseconn.php';

?>


<html>
<head>
<title>
Credit transfer system
</title>
<style>



body{

      background-color:lightgrey;
}
button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
th {
  background-color:red;
  color: white;
  border-bottom: 1px solid black;
}
tr,td
{
border-right: 1px solid black;
cursor:pointer;
}

table
{
      align:center;
       border: 1px solid black;
          


 
}

  .top{
        width: 100%;
        margin: 0 auto; /* Center the DIV horizontally */
        background: #8A2BE2;
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }

tr:hover {background-color: #f6f6f6;}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>

<?php

    $sql = "SELECT * FROM transfer";
    $result = mysqli_query($db, $sql);
          ?>
          <body>
         
        <div class="top">
      
   
        <h1><center><p style="color:yellow">Credit Management System</p></center></h1>
          </div>
          <center><h3></>Transaction history</h3></center>
          
        <table border="0" align="center" class="tablec" id="myTable">
        <thead>
        <tr>
        <th>sr_no</th>
        <th>sender_id</th>
        <th>reciever_id</th>
        <th>credit</th>
        <th>date</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo '<td>' . $row['sr_no'] . "</a></td>";
            echo "<td>" . $row['se_id'] . "</td>";
            echo "<td>" . $row['re_id'] . "</td>";
            echo "<td>" . $row['amo'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
           
            echo "</tr>";
          
            
        }
       
        echo"</tbody>";
        echo "</table>";
        echo "<br>";
        echo "<br>";
        
        
        // Free result set
        
    
    



?>
<center><button onclick="location.href='userlist.php'" target="_self">View Users</button></center>
</body>
</html>
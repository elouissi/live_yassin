<?php
include("dynamic_crud.php");
$nom =$_GET["name"];
$description =$_GET["description"];
$status =$_GET["status"];
$date_limite =$_GET["date_limite"];


$con=new mysqli("localhost","root","","live_yassin");
// $query="INSERT INTO `taches` (nom,description,status,date_limite) values ('$nom','$description','$status','$date_limite')";
// $result=mysqli_query($con,$query);
$insertData = array('nom' => $nom, 'description' => $description , 'status' => $status ,'date_limite'=> $date_limite);
insertRecord($con, 'taches', $insertData);
?>
<table>
<thead>
 
    <th>id</th>
    <th>nom</th>
    <th>description</th>
    <th>status</th>
    <th>date limite</th>
  
</thead>

<tbody>
<?php
$selectResult = selectRecords($con, 'taches');
while($row=mysqli_fetch_array($selectResult)){
    ?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['nom']?></td>
    <td><?php echo $row['description']?></td>
    <td><?php echo $row['status']?></td>
    <td><?php echo $row['date_limite']?></td>
  
</tr>

</tbody>



   
 <?php
     
}
?>

 
 
</table>

<?php
include("dynamic_crud.php");
$nom =$_GET["name"];
$description =$_GET["description"];
$status =$_GET["status"];
$date_limite =$_GET["date_limite"];


$con=new mysqli("localhost","root","","live_yassin");
// $query="INSERT INTO `taches` (nom,description,status,date_limite) values ('$nom','$description','$status','$date_limite')";
// $result=mysqli_query($con,$query);
 //DYNAMIC
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
 //DINAMC SELECT
    ?>
<tr>
    <td> </td>
    <td> </td>
    <td></td>
    <td></td>
    <td> </td>
  
</tr>

</tbody>



   
 <?php
     

?>

 
 
</table>

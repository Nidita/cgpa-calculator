


<!DOCTYPE HTML>  
<html>
<head>
<title>CGPA CALCULATOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      html,
        body {
            height: 90%;
        }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 0.25rem solid #dddddd;
  text-align: left;
  padding: 1rem;
}
body
{
  font-size: 1em;
}
th
{
  background-color:LightGray;
}
.center {
  margin: auto;
  width: 58%;
  border: .25rem solid ;
  padding: 10px;
}
  </style>
</head>

<body> 
<div class="center">
<h3 style="background-color:DodgerBlue;alignment:center;">CGPA CALCULATOR</h3>
</div>

<div class="container">
<br>

<form action="index.php" method="post" enctype="multipart/form-data">

<div class="row">
 <div class="col">
 
<input type="text"class="form-control" id="subjects" placeholder="Enter number of subjects" name="subjects"/>
</div>
</div>
<button type="submit" class="btn btn-primary mt-3">Submit</button>

</form>
</div>

<div class="container"> 

<br>

<?php
 if (empty($_POST['subjects'])) {
   //echo "Number of Subjects has not given!!";
  
 }
else
{

$subjects=$_POST['subjects'];
?>

<form action="index.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <th>Subject Name</th>
    <th>Grade</th>
    <th>Credit Hour</th>
  </tr>
<?php
for($i=0;$i<$subjects;$i++)
{
  ?>

<tr>
<td>

<input type="text"class="form-control" id="subjectname" placeholder="Enter The Subject Name" name="subjectname"/>
</td>
<td>

<label for="grade">Choose a Grade:</label>
  <select id="grade" name="grade[]"id="grade"class="form-control"placeholder="Enter The Grade">
    <option  value=4.00>4.00 A+</option>
    <option  value=3.75>3.75 A</option>
    <option  value=3.50>3.50 A-</option>
    <option  value=3.25>3.25 B+</option>
    <option value=3.00>3.00 B</option>
    <option  value=2.75>2.75 B-</option>
    <option  value=2.50>2.50 C+</option>
    <option  value=2.25>2.25 C</option>
   
    <option  value=2.00>2.00 D</option>
    <option  value=0>0.00 F</option>
  </select>
 </td>
  <td>
  <label for="credit">Choose a Credit:</label>
  <select id="credit" name="credit[]"id="credit"class="form-control"placeholder="Enter The Credit">
  <option value=3>3</option>
  <option value=4>4</option>
  <option value=2>2</option>
  <option value=1.50>1.50</option>
   <option value=1.00>1.00</option>
    <option value=0.75>0.75</option>
   
  </select>
  
</td>
</tr>
<?php
}

?>

</table>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
<?php
}

?>
</form>
</div>

<div class="container">

<br>


<?php  
$totalcredit=0.0;
$totalgradepoints=0.0;

$i=0;
$j=1;
$credit=array();
if (isset($_POST['credit'])) {
    $j=0;
    foreach($_POST['credit'] as $w){

          $totalcredit+=(float)$w;
          $credit[$i++]=(float)$w;

}
}
$i=0;

if (isset($_POST['grade'])) {
    if($j==0)
    {
    $j=0;
    }
    foreach($_POST['grade'] as $w){
        $totalgradepoints+=(((float)$w)*$credit[$i++]);
}
}
if($j==0)
{
$cgpa=$totalgradepoints/$totalcredit;
}
if($j==1)
{
    
}
else{
?>
<table>
  <tr>
    <th>Total Credits</th>
    <th>Total Grade Points</th>
    <th>CGPA</th>
  </tr>
<tr>
<td>
   
<?php

echo number_format((float)$totalcredit, 2, '.', ''); 


?>
</td>
<td>
<?php

echo number_format((float) $totalgradepoints, 2, '.', ''); 


?>
</td>
<td>
<?php

echo number_format((float)$cgpa, 2, '.', ''); 
$j=1;
}
?>
</td>
</tr>

</table>






</div>

</body>
</html>
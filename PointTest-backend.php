<?php
include('dbConnection.php');

$Cage = $_POST["Cage"];
$Gage = $_POST["Gage"];
$Cenglish = $_POST["Cenglish"];
$Genglish = $_POST["Genglish"];
$Cwork = $_POST["Cwork"];
$Gwork = $_POST["Gwork"];
$Cqua = $_POST["Cqua"];
$Gqua = $_POST["Gqua"];
$Cstudy = $_POST["Cstudy"];
$Gstudy = $_POST["Gstudy"];
$Cnaati = $_POST["Cnaati"];
$Gnaati = $_POST["Gnaati"];
$Cpartner = $_POST["Cpartner"];
$Gpartner = $_POST["Gpartner"];
$Cpy = $_POST["Cpy"];
$Gpy = $_POST["Gpy"];
$Cstate = $_POST["Cstate"];
$Gstate = $_POST["Gstate"];
$Cfamily = $_POST["Cfamily"];
$Gfamily = $_POST["Gfamily"];
$Carea = $_POST["Carea"];
$Garea = $_POST["Garea"];
$Csum = $_POST["Csum"];
$Gsum = $_POST["Gsum"];

$id = isset($_GET['user'])?$_GET['user']:"";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "INSERT INTO point(Cage, Gage, Cenglish, Genglish, Cwork, Gwork, Cqua, Gqua, Cstudy, Gstudy, Cnaati, Gnaati, Cpartner, Gpartner, Cpy, Gpy, Cstate, Gstate, Cfamily, Gfamily, Carea, Garea, Csum, Gsum) VALUES ('$Carea', '$Gage', '$Cenglish', '$Genglish', '$Cwork', '$Gwork', '$Cqua', '$Gqua', '$Cstudy', '$Gstudy', '$Cnaati', '$Gnaati', '$Cpartner', '$Gpartner', ''$Cfamily', '$Gfamily', '$Carea', '$Garea')";
    echo $query;
    $mysqli->query($query);
}
?>
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idnilai1=$_POST["idnilai1"];
$semester=$_POST["semester"];
$n_bindo=$_POST["n_bindo"];
$n_agama=$_POST["n_agama"];
$n_pkn=$_POST["n_pkn"];
$n_mtk=$_POST["n_mtk"];
$n_pjok=$_POST["n_pjok"];
$n_sbdp=$_POST["n_sbdp"];
$n_bjawa=$_POST["n_bjawa"];
$jml_nilai=$_POST["jml_nilai"]=$n_bindo+$n_agama+$n_pkn+$n_mtk+$n_pjok+$n_sbdp+$n_bjawa;

if($n_bindo > 90){
    $p_bindo=$_POST["p_bindo"] = "A";
}else if($n_bindo <= 90 && $n_bindo > 80){
    $p_bindo=$_POST["p_bindo"] = "B";
}else{
    $p_bindo=$_POST["p_bindo"] = "C";
}

if($n_agama > 90){
    $p_agama=$_POST["p_agama"] = "A";
}else if($n_agama <= 90 && $n_agama > 80){
    $p_agama=$_POST["p_agama"] = "B";
}else{
    $p_agama=$_POST["p_agama"] = "C";
}

if($n_pkn > 90){
    $p_pkn=$_POST["p_pkn"] = "A";
}else if($n_pkn <= 90 && $n_pkn > 80){
    $p_pkn=$_POST["p_pkn"] = "B";
}else{
    $p_pkn=$_POST["p_pkn"] = "C";
}

if($n_mtk > 90){
    $p_mtk=$_POST["p_mtk"] = "A";
}else if($n_mtk <= 90 && $n_mtk > 80){
    $p_mtk=$_POST["p_mtk"] = "B";
}else{
    $p_mtk=$_POST["p_mtk"] = "C";
}

if($n_pjok > 90){
    $p_pjok=$_POST["p_pjok"] = "A";
}else if($n_pjok <= 90 && $n_pjok > 80){
    $p_pjok=$_POST["p_pjok"] = "B";
}else{
    $p_pjok=$_POST["p_pjok"] = "C";
}

if($n_sbdp > 90){
    $p_sbdp=$_POST["p_sbdp"] = "A";
}else if($n_sbdp <= 90 && $n_sbdp > 80){
    $p_sbdp=$_POST["p_sbdp"] = "B";
}else{
    $p_sbdp=$_POST["p_sbdp"] = "C";
}

if($n_bjawa > 90){
    $p_bjawa=$_POST["p_bjawa"] = "A";
}else if($n_bjawa <= 90 && $n_bjawa > 80){
    $p_bjawa=$_POST["p_bjawa"] = "B";
}else{
    $p_bjawa=$_POST["p_bjawa"] = "C";
}

$uploadOk=1;

//membuat query
$sql="update nilai1 set semester='$semester',
                     n_bindo='$n_bindo',
                     p_bindo='$p_bindo',
					 n_agama='$n_agama',
                     p_agama='$p_agama',
                     n_pkn='$n_pkn',
                     p_pkn='$p_pkn',
                     n_mtk='$n_mtk',
                     p_mtk='$p_mtk',
                     n_pjok='$n_pjok',
                     p_pjok='$p_pjok',
                     n_sbdp='$n_sbdp',
                     p_sbdp='$p_sbdp',
                     n_bjawa='$n_bjawa',
                     p_bjawa='$p_bjawa',
                     jml_nilai='$jml_nilai'
					 where idnilai1='$idnilai1'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateRapot.php");
?>
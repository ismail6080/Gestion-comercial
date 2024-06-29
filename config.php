<?php   
$username="root";
$password="";
$bd="project2";

$pdo =new PDO("mysql:host=localhost", $username,$password);
$ins=$pdo->prepare("CREATE DATABASE IF NOT EXISTS $bd");
$ins->execute();


$pdo =new PDO("mysql:host=localhost;dbname=$bd", $username,$password);

$sql = $pdo->prepare(" CREATE TABLE IF NOT EXISTS fournisseur  (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Nomcompl VARCHAR(30),
    tel     VARCHAR(15),
    email VARCHAR(30),
    adress VARCHAR(50) ,
    ville VARCHAR(20)
)
");
$sql->execute();
$sql = $pdo->prepare(" CREATE TABLE IF NOT EXISTS article(
    idar INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    prix  INT,
    qstock INT,
    idfamille INT
)
");
$sql->execute();
$sql = $pdo->prepare(" CREATE TABLE IF NOT EXISTS famillearticle(
    idfa INT PRIMARY KEY AUTO_INCREMENT,
    code  VARCHAR(10),
    designation VARCHAR(40)
)
");
$sql->execute();

$sql = $pdo->prepare("SELECT * FROM famillearticle where code='Aucun' AND designation='Aucun' ");
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->execute();
$tab = $sql->fetchAll();
if(!$tab){
$sql = $pdo->prepare("INSERT INTO `famillearticle` (`idfa`, `code`, `designation`) VALUES ('1', 'Aucun', 'Aucun');");
$sql->execute();
}
?>
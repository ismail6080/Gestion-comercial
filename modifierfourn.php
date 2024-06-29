<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"> 
    <style>
       

    </style>
</head>
<body>
 <div class="container">
    <nav> 
        <a href=""><h1 class="logo">Logo</h1></a>
        <ul id="menulink">
                <li> <a href="fournisseur.php">fournisseur</a></li>
                <li> <a href="article.php">Article</a></li>
                <li><a href="famillearticle.php">Famille Article</a></li>
        </ul>
        
   

    </nav>
    <div class="main">
    <?php 
    $message="";
    include"config.php";
    if(isset($_GET['idmodifier'])){
        $id =$_GET['idmodifier'];
       
        $sql = $pdo->prepare("SELECT * FROM fournisseur WHERE id = ?");
        $sql->execute([$id]);
        $fourn = $sql->fetch(PDO::FETCH_ASSOC); 

    }
    if (isset($_POST["Enregistrer"])) {
        $id =$fourn['id'];
        $nomfor = $_POST["nomfor"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $address=$_POST["address"];
        $ville = $_POST["ville"]; 

        $ins = $pdo->prepare("UPDATE fournisseur SET Nomcompl = ?, tel=? ,email = ?, adress = ?, ville = ? WHERE id = ?;");
        $ins->execute(array($nomfor, $tel, $email, $address, $ville,$id));
        header("Location:fournisseur.php");
        }






    
    ?>
    <div class="formpage">
     <h2>Modifier fournisseur :</h2>
     <form action="" method="post" id="formfourn" >
       <div class="inputb">
        <label for="nomfor">Nom complète</label>
        <input type="text" name="nomfor"id="nomfor" value="<?php echo $fourn['Nomcompl']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
            <label for="tel">Téléphone</label>
            <input type="text" name="tel"id="tel" value="<?php echo$fourn['tel']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
                <label for="nbrp">Email</label>
                <input type="email" name="email" id="eamil" value="<?php echo $fourn['email']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
                <label for="nbrp">Addresse</label>
                <input type="text" name="address" id="address" value="<?php echo $fourn['adress']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
        <label for="ville">ville</label>
        <select name="ville" id="ville" form="formfourn">
            <option id="optionfournisseur" value="<?php echo $fourn['ville']; ?>"><?php echo $fourn['ville']; ?></option>
            <script src="villedata.js" ></script>
        </select>
        </div>
        <!-- <div class="message" id="msg" >
            <?php echo $message; ?>
        </div> -->
        <div class="btnconnexion">
            <input  type="submit" id="connexion" name="Enregistrer" class="btn" value="Enregistrer"> 
        </div>
       </form>

</div>
 </div>
<script>
   function sumbitform(){
    document.getElementById('formfourn').submit();
   }
</script>
</body>
</html>
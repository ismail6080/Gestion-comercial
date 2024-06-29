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
    if (isset($_POST["submit"])) {
        $nomfor = $_POST["nomfor"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $address=$_POST["address"];
        $ville = $_POST["ville"]; 
        $ins = $pdo->prepare("INSERT INTO fournisseur (Nomcompl, tel, email, adress, ville) VALUES (?, ?, ?, ?, ?)");
        $ins->execute(array($nomfor, $tel, $email, $address, $ville));
 
        header("Location:fournisseur.php");
        exit();
        }






    
    ?>
    <div class="formpage">
     <h2>Ajouter nouveau fournisseur </h2>
     <form action="" method="post" id="formfourn" >
       <div class="inputb">
        <label for="nomfor">Nom complète</label>
        <input type="text" name="nomfor"id="nomfor" autocomplete="off">
        </div>
        <div class="inputb">
            <label for="tel">Téléphone</label>
            <input type="text" name="tel"id="tel" value="+212" autocomplete="off">
        </div>
        <div class="inputb">
                <label for="nbrp">Email</label>
                <input type="email" name="email" id="eamil" autocomplete="off">
        </div>
        <div class="inputb">
                <label for="nbrp">Addresse</label>
                <input type="text" name="address" id="address" autocomplete="off">
        </div>
        <div class="inputb">
        <label for="typep">ville</label>
        <select name="ville" id="ville" form="formfourn">
        <option value="">Choisissez une ville...</option>
            <script src="villedata.js" ></script>
        </select>
        </div>
        <!-- <div class="message" id="msg" >
            <?php echo $message; ?>
        </div> -->
        <div class="btnconnexion">
            <input  type="submit" id="connexion" name="submit" class="btn" value="Enregistrer">
        </div>
       </form>

</div>
 </div>

</body>
</html>
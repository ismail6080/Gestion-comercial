<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
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
        $nom = $_POST["nomart"];
        $prix = $_POST["prix"];
        $qstock = $_POST["qstock"];
        $idfamille=$_POST["idfamille"]; 
        $ins = $pdo->prepare("INSERT INTO article (Nom,prix, qstock, idfamille) VALUES (?,?, ?, ?)");
        $ins->execute(array($nom,$prix, $qstock, $idfamille));
 
        header("Location:article.php");
        exit();
        }
        $sql=$pdo->prepare("SELECT * FROM famillearticle where code !='Aucun' ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $tab = $sql->fetchAll();




    
    ?>
    <div class="formpage">
     <h2>Ajouter nouveau article </h2>
     <form action="" method="post" id="formarti" >
     <div class="inputb">
            <label for="nomart">Nom d'article</label>
            <input type="text" name="nomart"id="nomart"  autocomplete="off">
        </div>
        <div class="inputb">
            <label for="prix">prix</label>
            <input type="number" name="prix"id="prix"  autocomplete="off">
        </div>
        <div class="inputb">
                <label for="qstock">quantité de stock</label>
                <input type="number" name="qstock" id="qstock" autocomplete="off">
        </div>
        <div class="inputb">
        <label for="typep">famille de article</label>
        <select name="idfamille" id="idfamille" form="formarti">
            <option value="1"></option>
            <?php 
                foreach ($tab as $farticle):
                 ?>
                   
              <option value="<?php echo $farticle['idfa']; ?>"><?php echo $farticle['designation']; ?></option>
                  
                <?php endforeach; ?>
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
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
    $sql=$pdo->prepare("SELECT * FROM famillearticle where code !='Aucun' ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $tab = $sql->fetchAll();
    if(isset($_GET['idmodifier'])){
        $id =$_GET['idmodifier'];
       
        $sql = $pdo->prepare("SELECT * FROM article WHERE idar = ?");
        $sql->execute([$id]);
        $article = $sql->fetch(PDO::FETCH_ASSOC); 
        
        $sql = $pdo->prepare("SELECT * FROM famillearticle WHERE idfa = ?");
        $sql->execute([$article['idfamille']]);
        $modifierfamileart = $sql->fetch(PDO::FETCH_ASSOC); 
    }
    if (isset($_POST["Enregistrer"])) {
        $id =$article['idar'];
        $nom=$_POST["nomart"];
        $prix = $_POST["prix"];
        $stock = $_POST["qstock"];
        $idfamille = $_POST["idfamille"];

        $ins = $pdo->prepare("UPDATE article SET Nom=?, prix = ?, qstock=? ,idfamille = ? WHERE idar = ?;");
        $ins->execute(array($nom,$prix, $stock, $idfamille,$id));
        header("Location:article.php");
        }






    
    ?>
   <div class="formpage">
     <h2>Modifier article </h2>
     <form action="" method="post" id="formarti" >
     <div class="inputb">
            <label for="nomart">Nom</label>
            <input type="text" name="nomart" id="nomart" value="<?php echo $article['Nom']; ?>"autocomplete="off">
        </div>
        <div class="inputb">
            <label for="prix">prix</label>
            <input type="number" name="prix"id="prix" value="<?php echo $article['prix']; ?>"autocomplete="off">
        </div>
        <div class="inputb">
                <label for="qstock">quantité de stock</label>
                <input type="number" name="qstock" id="qstock"value="<?php echo $article['qstock']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
        <label for="idfamille">famille de article</label>
        <select name="idfamille" id="idfamille" form="formarti">
        <option value="<?php echo $article['idfamille']; ?>"> <?php echo  $modifierfamileart['designation']; ?> </option>
            <?php 
                foreach ($tab as $farticle):
                 ?>
                   
                <option value="<?php echo $farticle['idfa']; ?>"> 
                    <?php if($farticle['idfa']!=$article['idfamille']){ echo $farticle['designation']; }?>  
                </option>
                  
                <?php endforeach; ?>

        </select>
        </div>
        <div class="btnconnexion">
            <input  type="submit" id="connexion" name="Enregistrer" class="btn" value="Enregistrer">
        </div>
       </form>

</div>
 </div>
<script>
</script>
</body>
</html>
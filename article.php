<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articleisseur</title>
    <link rel="stylesheet" href="css/style.css"> 
    <style>
    table{
        width: 90%;
    }
   
    </style>
</head>
<body>
 <div class="container">
    <nav> 
        <a href="index.php"><h1 class="logo">Logo</h1></a>
        <ul id="menulink">
                <li> <a href="fournisseur.php">fournisseur</a></li>
                <li> <a href="article.php">Article</a></li>
                <li><a href="famillearticle.php">Famille Article</a></li>
        </ul>
        
   

    </nav>
    
 
 <div class="main">
 <h2>Liste des articles</h2>
 <a href="ajouterarticle.php" class='btn fa fa-plus-square'> Ajouter article</a>
  <?php 
    include"config.php";
    if(isset($_GET["idsupprimer"])){
        $id=$_GET['idsupprimer'];
        $ins=$pdo->prepare("DELETE FROM article WHERE idar=?");
        $ins->execute([$id]);
        header("location:article.php");
    }
    $sql = $pdo->prepare("SELECT idar,Nom,prix,qstock,code  FROM article
    JOIN famillearticle ON article.idfamille = famillearticle.idfa 
     ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $tab = $sql->fetchAll();

    ?>
    <table  >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom d'article</th>
                    <th>prix</th>
                    <th>quantité de stock</th>
                    <th>Code de famille</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                foreach ($tab as $article): ?>
                    <tr>
                        <td><?php echo $article['idar']; ?></td>
                        <td><?php echo $article['Nom']; ?></td>
                        <td><?php echo $article['prix'].".00 MAD"; ?></td>
                        <td><?php echo $article['qstock']; ?></td>
                        <td><?php echo $article['code']; ?></td>
                        <td><a class="btn" href="modifierart.php?idmodifier=<?php echo $article['idar']; ?>">Mdifier</a>
                        <a class="btn" href="article.php?idsupprimer=<?php echo $article['idar']; ?>">Suprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
        <?php    
        if(!$tab){
        echo"  <p class='message'>Aucun article </p>";
      }
    ?> 





 </div>
 </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournisseur</title>
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
 <h2>Liste des familles d'article</h2>
 <a href="ajouterfamillearticle.php" class='btn fa fa-plus-square'> Ajouter une famille</a>
  <?php 
    include"config.php";
    if(isset($_GET["idsupprimer"])){
        $id=$_GET['idsupprimer'];
        $ins=$pdo->prepare("DELETE FROM famillearticle WHERE idfa=?");
        $ins->execute([$id]);
        header("location:famillearticle.php");
    }
    $sql = $pdo->prepare("SELECT * FROM famillearticle where code !='Aucun'");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $tab = $sql->fetchAll();
   
    ?>
    <table  >
            <thead>
                <tr>
                    <th>Id famille</th>
                    <th>code</th>
                    <th>Désignation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                foreach ($tab as $farticle): ?>
                    <tr>
                        <td><?php echo $farticle['idfa']; ?></td>
                        <td><?php echo $farticle['code']; ?></td>
                        <td><?php echo $farticle['designation']; ?></td>
                        
                        <td><a href="modifierfarticle.php?idmodifier=<?php echo $farticle['idfa']; ?>" class="btn">Mdifier</a>
                        <a href="famillearticle.php?idsupprimer=<?php echo $farticle['idfa']; ?>" class="btn" >Suprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
        <?php if(!$tab){
        echo"  <p class='message'>Aucun famille d'article</p>";
       }
       ?>
       




 </div>
 </div>
</body>
</html>
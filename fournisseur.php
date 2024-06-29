<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournisseur</title>
    <link rel="stylesheet" href="css/style.css"> 
    <style>
   
  
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
 <h2>Liste de fournisseur</h2>
 <a href="ajouterfournisseur.php" class='btn'> Ajouter fournisseur</a>
  <?php 
    include"config.php";
    if(isset($_GET["idsupprimer"])){
        $id=$_GET['idsupprimer'];
        $ins=$pdo->prepare("DELETE FROM fournisseur WHERE id=?");
        $ins->execute([$id]);
        header("location:fournisseur.php");
    }
    $sql = $pdo->prepare("SELECT * FROM fournisseur ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    $tab = $sql->fetchAll();
   
    ?>
    <table  >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom complète</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                foreach ($tab as $fourn): ?>
                    <tr>
                        <td><?php echo $fourn['id']; ?></td>
                        <td><?php echo $fourn['Nomcompl']; ?></td>
                        <td><?php echo $fourn['tel']; ?></td>
                        <td><?php echo $fourn['email']; ?></td>
                        <td><?php echo $fourn['adress']; ?></td>
                        <td><?php echo $fourn['ville']; ?></td>
                        <td><a href="modifierfourn.php?idmodifier=<?php echo $fourn['id']; ?>" class="btn">Mdifier</a>
                            <a href="fournisseur.php?idsupprimer=<?php echo $fourn['id']; ?>"  class="btn">Suprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
        <?php if(!$tab){
        echo"  <p class='message'>Aucun fournisseur </p>";
        }
       ?>





 </div>
 </div>

 <form id="modifierFourn" action="modifierfourn.php" method="post">
  <input type="hidden" name="idmodifier" id="idmodifier" value="">
</form>
</body>
</html>
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
       
        $sql = $pdo->prepare("SELECT * FROM famillearticle WHERE idfa = ?");
        $sql->execute([$id]);
        $farticle = $sql->fetch(PDO::FETCH_ASSOC); 

    }
    if (isset($_POST["Enregistrer"])) {
        $id =$farticle['idfa'];
        $code = $_POST["code"];
        $designation = $_POST["designation"];

        $ins = $pdo->prepare("UPDATE famillearticle SET code = ?, designation = ? WHERE idfa = ?;");
        $ins->execute(array($code, $designation,$id));
        header("Location: famillearticle.php");
        }






    
    ?>
    <div class="formpage">
     <h2>Modifier la famille d'article :</h2>
     <form action="" method="post" id="formfartile" >
        <div class="inputb">
            <label for="code">Code</label>
            <input type="text" name="code"id="code" value="<?php echo $farticle['code']; ?>" autocomplete="off">
        </div>
        <div class="inputb">
                <label for="designation">Désignation</label>
                <input type="text" name="designation" id="designation"value="<?php echo $farticle['designation']; ?>" autocomplete="off">
        </div>
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
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
        $code = $_POST["code"];
        $designation = $_POST["designation"];
        $ins = $pdo->prepare("INSERT INTO famillearticle (code, designation) VALUES (?, ?)");
        $ins->execute(array($code, $designation));
 
        header("Location: famillearticle.php");
        exit();
        }






    
    ?>
    <div class="formpage">
     <h2>Ajouter nouveau famille </h2>
     <form action="" method="post" id="formfartile" >
        <div class="inputb">
            <label for="code">Code</label>
            <input type="text" name="code"id="code"  autocomplete="off">
        </div>
        <div class="inputb">
                <label for="designation">Désignation</label>
                <input type="text" name="designation" id="designation" autocomplete="off">
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
<?php
echo'<strong> Exercice1   </strong><br>';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" >
    </head>
    <body>
    <!--<h1>Exercice 1</h1>-->
    <!--<a href="tp5.php?valeur=15">Cliquer pour avoir la valeur en degré</a>--> <!-- ne pas mettre les slachs dans le lien = le cours est faux !-->
        <form action="tp5.php" method="post">
            Valeur en Fahrenheit :
            <input type="text" name="Fahrenheit"/>
            <input type="submit" value="Convertir"/>
        </form>

    </body>
</html>


<?php
/*if (isset($_GET['valeur'])){ // !isempty ne fonctionne pas
    echo '<br>';
    echo " La valeur en Fahrenheit est : ".$_GET['valeur'];
    $newValeur = ($_GET['valeur']-32)*5/9;
    echo '<br>';
    echo "Le valeur en degré est : ".$newValeur;
}*/
if (isset($_POST['Fahrenheit'])){ // !isempty ne fonctionne pas
    echo '<br>';
    echo " La valeur en Fahrenheit est : ".$_POST['Fahrenheit'];
    $newValeur = ($_POST['Fahrenheit']-32)*5/9;
    echo '<br>';
    echo "Le valeur en degré est : ".$newValeur;
}
echo '<br>';
echo '<br>';
?>
<?php
echo'<strong> Exercice2  </strong><br>';
?>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>

<form action="tp5.php" method="post">
    Nom :
    <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo  $_POST['nom']?>" required/>
    Prenom :
    <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo  $_POST['prenom']?>" required/><br>
    Avancé :
    <input type="radio" name="niveau" value="avancé" <?php if($_POST['niveau']=="avancé") echo "checked" ?>/>
    Débutant :
    <input type="radio" name="niveau" value="débutant" <?php if($_POST['niveau']=="débutant") echo "checked" ?>/><br>
    <input type="submit" value="Effacer"/>
    <input type="submit" value="Envoyer"/>
</form>

</body>
</html>
<?php
   if (isset($_POST['niveau'])){
        echo '<br>';
        echo " Bonjour ".$_POST['prenom']." ".$_POST['nom'];
        echo ". Vous avez un niveau ". $_POST['niveau'];
    }
echo '<br>';
echo '<br>';
?>
<?php
echo'<strong> Exercice 3  </strong><br>';
?>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>

<form action="tp5.php" method="post">
    Nom :
    <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo  $_POST['nom']?>" required/>
    Prenom :
    <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo  $_POST['prenom']?>" required/>
    Age :
    <input type="number" name="age" value="<?php if(isset($_POST['age'])) echo  $_POST['age']?>" required/><br>
    Langues pratiquées (choisir au minimum 2)<br>
    <select name="langue[]" multiple="multiple">
        <option value="francais">français</option>
        <option value="espagnol">espagnol</option>
        <option value="anglais">anglais</option>
        <option value="allemand">allemand</option>
    </select><br /><br />
    Compétences informatiques (choisir au minimum 2)<br>
    HTML
    <input type="checkbox" name="competence[]" value="html" <?php if($_POST['niveau']=="html") echo "checked" ?>/>
    CSS
    <input type="checkbox" name="competence[]" value="css" <?php if($_POST['niveau']=="css") echo "checked" ?>/>
    PHP
    <input type="checkbox" name="competence[]" value="php" <?php if($_POST['niveau']=="php") echo "checked" ?>/>
    SQL
    <input type="checkbox" name="competence[]" value="sql" <?php if($_POST['niveau']=="sql") echo "checked" ?>/>
    C
    <input type="checkbox" name="competence[]" value="c" <?php if($_POST['niveau']=="c") echo "checked" ?>/>
    C++
    <input type="checkbox" name="competence[]" value="c++" <?php if($_POST['niveau']=="c++") echo "checked" ?>/>
    JS
    <input type="checkbox" name="competence[]" value="js" <?php if($_POST['niveau']=="js") echo "checked" ?>/>
    Python
    <input type="checkbox" name="competence[]" value="python" <?php if($_POST['niveau']=="python") echo "checked" ?>/><br><br>
    <input type="submit" value="Effacer"/>
    <input type="submit" value="Envoyer"/>
</form>

</body>
</html>
<?php
if (isset($_POST['competence'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['langue'])&&isset($_POST['age'])){
    echo '<br>';
    echo "<h2> Récapitulatif de votre fiche d'information personnelle : </h2>";
    echo "Vous êtes ".$_POST['prenom']." ".$_POST['nom'] ;
    echo '<br>';
    echo "Vous avez ".$_POST['age']." ans ";
    echo '<br>';
    echo "Vous parlez : ";
    $langues=$_POST['langue'];
    foreach($langues as $value){
        echo " <li> $value </li>";
    }
    echo '<br>';
    echo "Vous avez des compétences informatiques en : ";
    $competences=$_POST['competence'];
    foreach($competences as $value){
        echo " <li> $value </li>";
    }
}
echo '<br>';
echo '<br>';
?>
<?php
echo'<strong> Exercice 4  </strong><br>';
?>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>

<?php
$res = $_POST['res'];
if (isset($_POST['val1']) && isset($_POST['val2'])) {
    switch($res){
        case "Addition x+y":
            $_POST['result']=$_POST['val1']+$_POST['val2'];
            break;
        case "Soustraction x-y":
            $_POST['result']=$_POST['val1']-$_POST['val2'];
            break;
        case "Division x/y":
            if ($_POST['val2']==0){
                $_POST['result']="ERREUR";
            }else{
                $_POST['result']=$_POST['val1']/$_POST['val2'];
            }
            break;
        case "Puissance x^y":
            $_POST['result']= pow($_POST['val1'],$_POST['val2']);
            break;
    }
}

?>

<form action="tp5.php" method="post" enctype="multipart/form-data">
    Nombre 1
    <input type="text" name="val1" value="<?php if(isset($_POST['val1'])) echo  $_POST['val1']?>"/><br>
    Nombre 2
    <input type="text" name="val2" value="<?php if(isset($_POST['val2'])) echo  $_POST['val2']?>"/><br>
    Résultat
    <input type="text" name="result" value="<?php if(isset($_POST['result'])) echo $_POST['result']?>" /><br>

    Cliquer sur un bouton!
    <input type="submit" name="res" value="Addition x+y"/>
    <input type="submit" name="res" value="Soustraction x-y"/>
    <input type="submit" name="res" value="Division x/y"/>
    <input type="submit" name="res" value="Puissance x^y"/>
</form>

</body>
</html>
<?php
echo'<br><br><strong> Exercice 5 </strong><br>';
?>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>

<form action="tp5.php" method="post" enctype="multipart/form-data">
    Fichier 1
    <input type="file" name="fichier1"/><br>
    Fichier 2
    <input type="file" name="fichier2"/><br>
    <input type="submit" value="Envoi"/>
</form>

</body>
</html>
<?php
if(!empty($_FILES['fichier1'])) {
    $fichier1 = $_FILES["fichier1"];
    move_uploaded_file($fichier1["tmp_name"], "fichier1.png");
    echo "Nom : ";
    echo $_FILES["fichier1"]["name"];
    echo '<br>';
    echo "Type : ";
    echo $_FILES["fichier1"]["type"];
    echo '<br>';
    echo "Taille : ";
    echo $_FILES["fichier1"]["size"];
    echo '<br>';
    echo "tmp_name : ";
    echo $_FILES["fichier1"]["tmp_name"];
    echo '<br>';
    echo "error : ";
    echo $_FILES["fichier1"]["error"];
    echo '<br>';
    echo "Image : ";
    echo "<img src='fichier1.png'>";
    echo '<br>';
    echo '<br>';
}
if(!empty($_FILES['fichier2'])){
    $fichier2 =$_FILES["fichier2"];
    move_uploaded_file($fichier2["tmp_name"],"fichier2.png");
    echo "Nom : ";
    echo $_FILES["fichier2"]["name"];
    echo '<br>';
    echo "Type : ";
    echo $_FILES["fichier2"]["type"];
    echo '<br>';
    echo "Taille : ";
    echo $_FILES["fichier2"]["size"];
    echo '<br>';
    echo "tmp_name : ";
    echo $_FILES["fichier2"]["tmp_name"];
    echo '<br>';
    echo "error : ";
    echo $_FILES["fichier2"]["error"];
    echo '<br>';
    echo "Image : ";
    echo "<img src='fichier2.png'>";
    echo '<br>';
    echo '<br>';
}
?>
<?php
echo'<br><br><strong> Exercice 7 </strong><br>';
$_COOKIE['cookie0'];
setcookie('cookie0',"test0");
$_COOKIE['cookie1'];
setcookie('cookie1','test1',time()+60*60*24*15);
echo"Affichage méthode 1 :";
print_r($_COOKIE);
echo '<br>';
echo"Affichage méthode 2 :";
echo $_COOKIE['cookie0'];
echo $_COOKIE['cookie1'];
unset($_COOKIE['cookie1']);
setcookie('cookie0', '',time()+60*60*24);// supprimer le contenu : un cookie vide de n'affiche pas
echo '<br>';
echo $_COOKIE['cookie0'];
echo $_COOKIE['cookie1'];
?>
<?php
echo'<strong> Exercice 8  </strong><br>';
?>



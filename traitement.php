<?php


  $server = "localhost";
$login = "root";
$password = "root88";
$dbname = "utilisateur";
//creation d'un objet de connection à la base de données
try{

  $connect = new PDO('mysql:host='.$server.';dbname='.$dbname.';charset=utf8',$login,$password);
  //$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




}catch(PDOException $e){
    echo 'Erreur !!! '.$e->getMessage();
   }

	//require("connexionBd.php");
 // $connection= new PDO("mysql:host=localhost;dbname=school","root","root88");
	//On récupere les valeurs du formulaire en securisant
 
  function Securisation($donnees)
  {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);

    return $donnees;
  }

  $nom = Securisation($_POST['nom']);
  $prenom = Securisation($_POST['prenom']);
  $adresse = Securisation($_POST['adresse']);
  

  /*if (isset($_POST['save'])) {*/
    
  
  // $requete = $connect->prepare("INSERT INTO personne(Non,Prenom,Adresse,Ville,Code) VALUES(?,?,?,?,?)");
    //$requete = $connect->exec("INSERT INTO personne(Non,Prenom,Adresse,Ville,Code) VALUES('$nom','$prenom','$adresse','$ville','$code')");

    //$requete->exec(array($nom,$prenom,$adresse,$ville,$code));
    //$connect->execute($sql);
 // }
    $sql = "INSERT INTO personne(Prenom,Nom,Adresse)VALUES('$prenom','$nom','$adresse')" ;
      $connect->exec($sql);

  if ($connect){
  
    //header('Location:affiche.php');
    try{
                include('affiche.php');
     }
     catch(Exception $e)
         {
         die('Erreur : '.$e->getMessage());
         }

  }
    
  else{
    try{
                include('Erreur.php');
     }
     catch(Exception $e)
         {
         die('Erreur : '.$e->getMessage());
         }

   // header('Location:Erreur.php');
    }
         
?>
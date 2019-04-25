# WebMVC
Mise en fonctionnement du site en local sur UwAmp ou xAmpp:
  
    // Se rendre dans le fichier config.php et remplacer par les valeurs adaptées
    if($_SERVER['DOCUMENT_ROOT']=='C:/UwAmp/www/') {

    // Si sur xAmpp
    if($_SERVER['DOCUMENT_ROOT']=='C:/xampp/htdocs') {

    // indiquer ici le chemin vers le dossier dans lequel est le Projet Web
    // Par exemple: ajouter un "print_r($_SERVER['DOCUMENT_ROOT'])" juste avant le if et copier le resultat
    define('_localhost','localhost');

    define('_dbname','thomas_bizet'); # nom de la base de donnée associée en localhost
    define('_user','root'); #login mySQL
    define('_password','root'); #password mySQL
    }

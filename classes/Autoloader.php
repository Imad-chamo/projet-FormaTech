<?php
class Autoloader
{
    /**
     * Méthode permettant de charger l'autoload
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__,'autoload']); 
        // Note : on peut aussi remplacer "Autoloader" par __CLASS__ pour récupérer le nom de la classe dans laquelle nous nous trouvons.
        include 'bdd/local_config.php';
    }

    /**
     * Méthode permettant de chercher les classes dans le répertoire concerné
     */
    public static function autoload($nom_classe){
        require "classes/".$nom_classe.'.php';
    }   
}

?>
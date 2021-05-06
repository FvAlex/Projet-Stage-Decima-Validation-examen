- # Ajouter
    - Back du filtre du menu de base pour cacher les colonnes 
    - Filtre d'un menu pour afficher le BDD voulu
    - 

- # Récuperer :

- # Update :    

- # Problemes

    - L'UPDATE ne se fait que sur certain éléments dans toute les BDD sauf HDF
    - L'UPDATE ne s'applique à plusieurs élément par moment et par d'autre moment ne fonctionne pas
    - Le refresh met trop de temps à se finir
    - La div contenant l'ancre des libellées ne se modifie que lors du chargement de page, par la suite il ne prend pas la taille souhaitée
    - PEUT ETRE probleme au niveau des dates qui inverse le jours et le mois 
    - Temps entre le clique sur un "modal" et l'affichage a un petit freeze
    - Le tableau n'a pas la bonne dimension et sors du cadre de l'écran, surement du au probleme de taille de la div de libellé
    - Non modification de l'état dans NPDC
    
- # Verification

    - L'UDPATE de chaque élement sans date : _____________Modal:________________________HDF:________________NPDC:________________PCD:_______________ MBL:_____________
        - Numéro de commande                 | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |      
        - Numéro facturation décima          | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Etat                               | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |  
        - Numéro devis ST                    | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Montant ST                         | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Numéro facturation ST              | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Litige                             | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
                                             _________________________________________________________________________________________________________________________

    [x] = non vérifié           [n] = non fonctionnel           [y] = vérifié et fonctionnel / pas dans le modal            [/] = verifié et non fonctionnel            

    - L'UDPATE de chaque élement avec date : _____________Modal:________________________HDF:________________NPDC:________________PCD:_______________ MBL:_____________
        - Date réception BDC                 | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Date facturation décima            | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Date facturation 4%                | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Date facturation ST                | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
        - Date reception PV                  | [y] |                  | [y,y,y,y] |  |           | [y] |             | [y] |             | [y] |             | [y] | |
                                             _________________________________________________________________________________________________________________________

    - Details des erreurs:

        - La modification des dates fonctionnent sur le tableau mais pas dans le modal. Sois il ne renvoit rien (HDF, NPCD, PCD) sois il renvoit une date ou seul le mois change sans concordance avec la date de modification(MBL).

- # Accomplis 

    - # Explication brute

        - Création d'un tableau et d'une barre nav avec une ancre menant vers la page d'accueil
        - Des th avec les différents champs de chaque table récupéré
        - A chaque devis équivalents le nom de Contrat change(HDF, PCD, NPDC, MBL)
        - Création de deux select : 
            - Etat du devis, permettant de filtrer chaque devis en fonction de leur état
            - Contrat, permettant de filtre par nom de contra
        - Création de fonction permettant de rendre cliquable le numéro de commande si la valeur n'est pas vide elle renvoie donc true ce qui rend le str cliquable et renvoie un pdf de bon de commande sinon le str reste nul donc non cliquable
        - Création de calendrier pour des dates aved datepicker mais avec une surcharge afin que ce soit en francais 
        - Le libellé est le meme principe que le bon de commande
        - Le montant 4% équivaut à un calcul qui permet de calculer 4% du montant de décima, équivalent à l'admnistration que décima fait à la place du client 
        - Création de pop up renvoyant les info sur l'équipement
        - Part magasin équivaut à 6% du montant du ST
        - Création d'une pop up de modification permettant de modifié les champs suivant :
            - numéro de commande décima
            - date de réception décima 
            - numéro de facturation décima
            - date de facturation décima 
            - date facturation 4%
            - numéro de devis ST
            - montant ST
            - numéro de facturation ST
            - date de facturation ST
            - date de pv
            - Litige

        - Création d'un bouton de validation de modification
        - Création d'un menu de checkbox pour cacher les colonnes vouluent (non-fonctionnel)
        - Création de fonction permettant de renvoyer le montant deux chiffres aprés la virgule et pas 4 chiffres après la virgule

        - # Details

            - Récupération de chaque BDD (la premier fut HDF)
            - Modification des éléments avec Ajax et switch case
            - Encodage des dates avec la fonction date() et désencodage lors du réaffichage avec " strtotime" lors de la modification
            - Ajout de filtre sur les th en lien avec leur td permettant de filtrer les résulats
            - Utilisation de jQuery
            - Utilisation de Bootstrap (select, modal)
            - Utilisation de HTML
            - Utilisation de PHP
            - Utilisation de MYSQL
            - Utilisation de WinSCP
            - Utilisation de datepicker + surcharge
            - Utilisation du BEM
            - Utilisation de CSS

    - # Front

        - Tout d'abord j'ai initialisé la page lorsqu'elle serait totalement actualisé le script se chargera. 
        - Le .multifilter permet de filtre chaque th par rapport à son td. 
        - Le .datepicker permet de charger un calendrier étant surcharger par une datepicker en francais. 
        - Le .change permet de mettre à jour l'url permettant d'ajouter les élements dans l'url montrant le résultat attendue. 
        - La fonction valideModificationDevis permet de récuperer la fonction complete_devis en parametre renvoyé au td concerné grace à sa class apporté. Si tout est correct cela envoie une alert disant que le devis à bien été modifie sinon cela renvoie une alert disant que le devis n'a pas pu etre modifié.
        - J'ai utilisé un tableau afin de récuperer tout les infos sur un page sans barre de scrolling (contrainte). 
        - J'ai utlise différent script ( Ajax, Bootstrap, jQuery, datepicker)
        - Utilisation du modal de Bootstrap afin de faire un fentetre pop up rapidemment et facilement contenant les infos impossible à mettre dans le tableau sans barre de scrolling et sur chaque pop up il y a une bouton de validation de modification. 
        - J'ai utilisé le BEM en SCSS pour que mes class soient beaucoup plus propre et compréhensible 

    - # Back

        - Tout d'abord j'ai préféré utiliser une variable contenant le html au lieu de faire un echo afin que le style du code sois plus compréhensible et plus propre.

        - Ce qui concerne l'appelle des quatres base de données j'ai procéde par un appel INIT de chaque BDD configuré au préalabe dans fonction.php avec la database, l'identifiant de connection, mot de passe et    port de connection, tout est groupé dans une variable contenant un tableau avec les 4 base de données puis une boucle avec un SELECT SQL puis le resultat est push dans un tableau vide.

        - Suite à cela j'ai crée une boucle cherchant laquelle des bases de données doit etre appellé puis une autre boucle dans cette boucle pour afficher tout les td concernant cette base de données. Pour les variables $part_4 et $part_magasin un calcule a été fait pour que cela renvoie 4% du montant décima et 6% du montant ST respectueusement tandis que dans le str_replace permet de supprimer un espace par NULL.

        - La variable $color permet de change le background-color par du gris si la valeur est équivalant à un chiffre.

        - Concernant la variable $etat j'ai fais un switch case, en fonction de la valeur choisis chaque etat equivaut à un etat( 0 = en attente, 1 = devis validé, 2 = devis validé et travaux terminé, 3 = refusé, 4 = devis de régularisation, 5 = archiver ), chaque case equivaut a une valeur, si la valeur est sur 3 du coups l'etat du devis sera refusé. Tandis que dans le SELECT qui récupere les données a ete mis une condition disant que ca ne prendra pas en compte les etats ayant comme valeur 5 dans les etats étant archiver ne seront pas afficher. Puis la variable est appelé dans le td voulu. 

        - Ce qui concerne l'affichage du contrat en fonction de son appartenance a été configuré avec un switch case qui récupere le nom de la donnée de "database" et retourne le str voulu (ex: case "cmt_hdf" : return "HDF";break;). Suite à cela j'ai echo dans le td voulue la fonction avec le parametre du tableau des bases de données puis la variable de la boucle et pour finir le parametre avec le nom de la database.

        - Dans certaine ligne HTML une fonction time() est appelé car parfois le cache du site bloque la modification tandis qu'avec cette fonction qui veut dire que sa renvoie  le timestamp UNIX actuel ce qui veut dire que le site doit forcement mettre a jour son cache car à chaque modification le temps (time) change donc il fait une recherche des nouvelles ressources et ré-affiche les modifications et la page à jour. 

        - Par rapport à la fonction date() meme si j'ai surchargé la fonction en francais la date se met au format textuel anglais donc je lui ai passé en parametre "d/m/y" pour que la date fasse bien "01/01/1970"

        - J'ai du utilisé la fonction number_format() pour récupérer seulement la valeur maximum aprés deux chiffres apres la virgule.

        - Ce qui concerne l'UPDATE SQL de certaine table du devis commence par la création d'un switch case qui passe en parametre la variable $fonction qui est égale à $_GET['fonction']. J'ai utilisé un switch case comprennant une seul option alors que de base il faut en avoir plus donc j'ai prevu qu'un autre développeur rajoute tout simplement un case s'il veut rajouter un evenement de modificiation tout sera deja pret. Pour rentrer dans le detail, dans ce switch, j'ai passé en parametre une fonction complete_devis() qui a en parametre tout les tables qui doivent etre modifié dans un ordre bien précis. Cet ordre précis consiste que l'ordre dans lequel j'ai initialisé les parametres doient etre le meme que dans la seconde fonction que je parlerais apres et qui doit aussi correspondre dans l'ordre de la requete SQL UPDATE. Ensuite il y'a un switch dans la fonction complete_devis() qui à le meme principe que le switch précedent c'est à dire que pour chaque case cela renvoie la bonnne base de données qui est récupérer dans la variable $mysql_UPDATE qui est utilisé en dessous dans la requete UPDATE. Et $database concerne le database appelé dans la fonction Ajax pour que la modification sois faite. 



    - # Definitions

        - Page: test-pre.php

            - function ... (){} :  

                - Une fonction permet d'executer une serie d'instruction permettant une simpliciter du code et une taille de programme minimale  

            - include() :

                - Il inclut et éxécute le fichier spécifié en argument

            - str_replace() :

                - Cela retourne un str ou tableau dont tout les éléments passaient dans le premier parametre sont remplacé par le second parametre ayant en target le troisieme parametre

            - strftime() :

                - Formate une date locale avec la configuration locale

            - isset :

                - Détermine si une variable est déclarée et est différente de NULL

            - array :

                - Crée un tableau ou est un tableau

            - session_start():

                - Démarre une session ou reprend une session existante

            - $SESSION:

                - C'est une variable de SESSION qui est une "superglobale". Etant un tableau associatif des valeurs stockées dans les sessions [x]

            - count():

                - Compte tout les éléments d'un tableau ou quelque chose d'un objet

            - executeSQL:
                
                - C'est une execution de requete SQL

            - array_push():

                - Ajoute un ou plusieurs élement à la fin d'un tableau

            - time():

                - Retourne le timestamp UNIX actuel + un ajout dans du html peut servir à forcer le cache du navigateur à se refresh car chaque "temps" est unique donc il recharge les ressources demandé en le changeant 

            - date():

                - Permet de formater une date/heure locale

            - number_format():

                - Formate un nombre pour l'affichage ( deux chiffres apres la virgule par exemple)

            - echo:

                - Affiche un str

            - $(this):

                - Permet de retourner un objet natif 

            - $(document).ready()

                - Permet d'executer le code à l'interieur lorsque la page est entierement chargé donc prete

            - .each:

                - Retourne chaque paire clé/valeur d'un tableau

            - .multifilter:

                - C'est un pulgin jQuery pour filtrer une table en fonctione de plusieurs entrées

            - .datepicker:

                - Permet d'afficher un calendrier pré-fait

            - window.location:

                - Permet de changer l'URL de localisation

            - .change:

                - C'est une fonction qui permet lors de chaque execution un déclenchement d'évenements

            - .attr:

                - Obtiens la valeur d'un attribut pour le premier élement de l'ensemble des élements correspondants
                
            - .val:

                - Obtiens la valeur actuelle du premier élément de l'ensemble des éléments correspondant


            - alert():

                - Affiche une pop up "d'alert"

            - $.ajax: Permet de communiquer avec le serveur en arriere plan pendant que la page est affichée à l'ecran sans besoin de refresh

                - type: 

                    - Renvoie une methode POST ou GET ou si on utilise des versions antérieur de jQuery

                - url:

                    - L'url de la page ciblé

                - data :

                    - Ce sont les données à envoyer au serveur 

                - sucess:

                    - Si le code renvoie TRUE il est passait est renvoie le code contenu dans le sucess

                - error:

                    - Si le code renvoie FALSE il ne passe pas dans le code est renvoie un code d'erreur préféfinie 

        
        - Page: fonction.php

            - require_once():

                - Il est identique à inculde() mise à part qu'il vérifie si le fichier a deja été inclut, et si c'est le cas, ne l'inclut pas une seconde fois

            - MySQL :

                - C'est une class s'occupant du traitement de connection et de sécurisation ( évitant l'injection d'SQL)

            - initSqlHDF(), initSqlASTI_NPC(), initSqlASTI_PCD(), initSqlMBL() :

                - Initialisation de la base de données

            - switch :

                - Equivaut à une serie d'instruction 

            - case :

                - Equivaut à une instruction

            - return :

                - Retourne l'argument qui lui est passé 

            - break: 

                - Permet de sortir d'une structure

        
        - Page: fonctions_ajax.php

            - complete_devis() :

                - C'est une fonction concernant les tables qui seront mise à jour et modifié 

            - json_encode() :

                - Retourne la représentation JSON d'un valeur

            - explode() :

                - Scinde un str en segment
- # Problemes

    - Le refresh met trop de temps à se finir
    - La div contenant l'ancre des libellés ne se modifie que lors du chargement de page, par la suite il ne prend pas la taille souhaitée
    - Temps entre le clique sur un "modal" et l'affichage a un petit freeze dans l'état 'TOUS'
    - Le tableau n'a pas la bonne dimension et sort du cadre de l'écran, surement dù au probleme de taille de la div de libellé
    
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

- # Accomplis 

    - # Explication brute

        - Création d'un tableau et d'une nav barre avec une ancre menant vers la page d'accueil
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
        - Création d'une pop up de modification permettant de modifier les champs suivant :
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
        - Création de fonction permettant de renvoyer le montant deux chiffres aprés la virgule et non 4 chiffres après la virgule

        - # Details

            - Récupération de chaque BDD (la première fut HDF)
            - Modification des éléments avec Ajax et switch case
            - Encodage des dates avec la fonction date() et désencodage lors du réaffichage avec "strtotime" lors de la modification
            - Ajout de filtre sur les th en lien avec leur td permettant de filtrer les résultas
            - Utilisation de jQuery
            - Utilisation de Bootstrap (select, modal)
            - Utilisation de HTML
            - Utilisation de PHP
            - Utilisation de MYSQL
            - Utilisation de WinSCP
            - Utilisation de datepicker + surcharge
            - Utilisation du BEM
            - Utilisation de CSS
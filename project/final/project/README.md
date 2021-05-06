¤ = vert => On a deja les infos 
@ = rouge => Appilcation qui donne les infos
§ = noir => Action decima

Fait :

Contrat => ¤
Numero devis => ¤
Numero commande =>¤ 
Libelle (avec fichier) => ¤
Montant Decima => ¤
Numéro Facturation Decima => §
Date Facturation => @
Etat facturation => @
Montant 4% => @
Date de facturation 4% => §
Numero devis ST => ¤
Montant ST => ¤
Numéro facture ST => ¤
Facturation ST (Date) => ¤
Type travaux => ¤
BDC decima => ¤
Date reception Pv => ¤
Date reception CDE => ¤
Info equipement(UT-BAT-EQUIP) => ¤
Part magasin => @ (peut etre modifié)
Litige ST (O/N) => § ( avec checkbox)

# A modifié:
-   Filtre du menu de base pour cacher les colonnes 
-   Vérifié le code pour une actualisation plus rapide(surtout l'ordre des scripts)
-   La forme des th n'est pas correct, à changer

- # Récuperer :
    -   Le numéro de contract

- # Udpate :    
    - L'etat du devis(probleme d'affichage)

- # Problemes

    -Le <a> du Libelle renvoie une erreur 404 par moment et la fonction faite en php ne fonctionne pas
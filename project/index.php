<?php

// README.md dans le dossier doc

include('./include/fonction.php');

$mysql_HDF = initSqlHDF();
$mysql_NPC = initSqlASTI_NPC();
$mysql_PCD = initSqlASTI_PCD();
$mysql_MBL = initSqlMBL();

$i = 1;

$mysql_Group_BDD = array($mysql_HDF, $mysql_NPC, $mysql_PCD, $mysql_MBL);

$num_devis = str_replace("/", "-", $devis[0]['numero_devis']);

    // Passage en Get de la valeur attribué à la valeur de l'état

$_SESSION['etat_session'] = isset($_SESSION['etat_session']) ? $_SESSION['etat_session'] : 'TOUS';
$where_etat = '';
if(isset($_GET['etat_session']))
{
    $_SESSION['etat_session'] = $_GET['etat_session'];
    $where_etat = $_SESSION['etat_session'] != 'TOUS' ? ' AND etat_devis='.$_SESSION['etat_session'] : '';
}
    ////////////////////

    // Idem pour le nom de contrat (non-fonctionnel, à finir, affiche bien la bonne BDD dans l'url mais ne renvoit pas la valeur souhaité)

$_SESSION['etat_BDD'] = isset($_SESSION['etat_BDD']) ? $_SESSION['etat_BDD'] : 'ALL';

if(isset($_GET['etat_BDD']))
{
    $_SESSION['etat_BDD'] = $_GET['etat_BDD'];
}
    ////////////////////
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Project</title>

    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="fr">
    <meta name="description" content="Project"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.10.4.custom.css"/>
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="js/jquery-ui-1.12.1-custom.min.js"></script>
    <script src="js/datepicker-fr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  

</head>
<body>
    <nav>
        <a href="index.php"><img src="images/logoLeft.png" class="nav_logo_gmao" alt="logo Gmao"></a>
        <div class="nav_box_redirection">
            <div class="nav__box_redirection_droite">
                <div class="redirection_row">
                    <a href="stats.html" class="nav_redirection_ancre nav_redirection_stats">Stats</a>
                </div>
            </div>
            <div>
                <a href="" class="nav_redirection_ancre"><img src="images/logo_deconnection.png" class="nav_logo_deconnection" alt="logo deconnection"></a>
            </div>
        </div>
    </nav>
    <?php 
    
        $select0 = $_SESSION['etat_session'] == 0 && $_SESSION['etat_session'] != 'TOUS' ? 'selected="selected"' : '';
        $select1 = $_SESSION['etat_session'] == 1 ? 'selected="selected"' : '';
        $select2 = $_SESSION['etat_session'] == 2 ? 'selected="selected"' : '';
        $select3 = $_SESSION['etat_session'] == 3 ? 'selected="selected"' : '';
        $select4 = $_SESSION['etat_session'] == 4 ? 'selected="selected"' : '';

        $BDD0 = $_SESSION['etat_BDD'] == 'cmt_hdf' && $_SESSION['etat_BDD'] != 'ALL' ? 'selected="selected"' : '';
        $BDD1 = $_SESSION['etat_BDD'] == 'clim_asti_npdc' ? 'selected="selected"' : '';
        $BDD2 = $_SESSION['etat_BDD'] == 'clim_asti_picardie' ? 'selected="selected"' : '';
        $BDD3 = $_SESSION['etat_BDD'] == 'mobilier_idf' ? 'selected="selected"' : '';

    ?>
    <div class="select_contrat_etat">
        <div class="select_etat">
            <p class="p_etat_devis"><strong>Etat du devis</strong> :</p>
            <select class="filtreSession etat_session" style="display:flex;flex-direction:row;" name="etat_session">
                <option value="TOUS">Tous</option>
                <option value="0" <?=$select0?>>En attente</option>
                <option value="1" <?=$select1?>>Validé / Travaux en attente</option>
                <option value="2" <?=$select2?>>Travaux terminé</option>
                <option value="3" <?=$select3?>>Refusé</option>
                <option value="4" <?=$select4?>>Régularisation</option>
            </select>
        </div>
        <div class="select_contrat">
            <p class="p_contrat"><strong>Contrat</strong> :</p>
            <select class="filtreSession etat_BDD" name="etat_BDD">
                <option value="ALL">Tous</option>
                <option value="cmt_hdf"<?=$BDD0?>>HDF</option>
                <option value="clim_asti_npdc"<?=$BDD1?>>Mobilier</option>
                <option value="clim_asti_picardie"<?=$BDD2?>>Asti Picardie</option>
                <option value="mobilier_idf"<?=$BDD3?>>Asti NPDC</option>
            </select>
        </div>
    </div>
    <div class="parametre_filtre">
        <div class="box_icon_parametre">
            <i type="button" class="fas fa-sliders-h modal_window" style="margin-right: 5px;" data-toggle="modal" data-target="#myModal_4_<?=$i;?>"></i>
        </div>
            <div class="modal" id="myModal_4_<?=$i;?>">
                <div class="pop_up_filtre">
                    <!-- Modal Header -->
                    <div style="background-color: #E1D2B8;" class="modal-header">
                        <h2 class="modal-title">Filtrage spécifique</h2>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body body_pop_up_filtre">
                        <div class="filtrage_decima">
                            <h3 class="titre_filtre">Décima :</h3>
                            <div class="box_checkbox_decima">
                                <label class="taille_p_filtrage">Contrat</label>
                                <input type="checkbox" style="margin-left:249px;height:20px;width:20px;" value="Contrat" selected="selected" checked />
                                <br>
                                <label  class="taille_p_filtrage">N°devis</label>
                                <input type="checkbox" style="margin-left:247px;height:20px;width:20px;" value="Devis" selected="selected" checked >
                                <br>
                                <label  class="taille_p_filtrage">N° CMD</label>
                                <input type="checkbox" style="margin-left:247px;height:20px;width:20px;" value="CMD" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Libellé</label>
                                <input type="checkbox" style="margin-left:257px;height:20px;width:20px;" value="Libelle" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Montant Decima</label>
                                <input type="checkbox" style="margin-left:166px;height:20px;width:20px;" value="MontantDecima" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">N°Facturation Decima</label>
                                <input type="checkbox" style="margin-left:113px;height:20px;width:20px;" value="NFacturationDecima" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Date Facturation</label>
                                <input type="checkbox" style="margin-left:163px;height:20px;width:20px;" value="DateFacturation" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Etat Facturation</label>
                                <input type="checkbox" style="margin-left:168px;height:20px;width:20px;" value="EtatFacturation" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">BDC decima</label>
                                <input type="checkbox" style="margin-left:203px;height:20px;width:20px;" value="BDC" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Date reception CDE</label>
                                <input type="checkbox" style="margin-left:134px;height:20px;width:20px;" value="DateReceptionCDE" selected="selected" checked/>
                                <br>
                                <label class="taille_p_filtrage">Info equipement</label>
                                <input type="checkbox" style="margin-left:166px;height:20px;width:20px;" value="InfoEquipement(UBE)"selected="selected" checked />                      
                            </div>
                        </div>
                        <div class="filtrage_hr_vertical"></div>
                        <div class="filtrage_st_4">
                            <div class="filtrage_st">
                                <h3 class="titre_filtre">Sous-traitant :</h3>
                                <div class="box_checkbox_st">
                                    <label class="taille_p_filtrage">N° devis ST</label>
                                    <input type="checkbox" style="margin-left:160px;height:20px;width:20px;" value="DevisST"selected="selected" checked />
                                    <br>
                                    <label class="taille_p_filtrage">Montant ST</label>
                                    <input type="checkbox" style="margin-left:162px;height:20px;width:20px;" value="MontantST" selected="selected" checked />
                                    <br>
                                    <label class="taille_p_filtrage">N° facture ST</label>
                                    <input type="checkbox" style="margin-left:145px;height:20px;width:20px;" value="NFactureST" selected="selected" checked/>
                                    <br>
                                    <label class="taille_p_filtrage">Date FacturationST</label>
                                    <input type="checkbox" style="margin-left:87px;height:20px;width:20px;" value="DateFacturationST" selected="selected" checked />
                                    <br>
                                </div>
                            </div>
                            <div class="filtrage_hr_horizontal"></div>
                            <div class="filtrage_4">
                                <h3 class="titre_filtre">4% :</h3>
                                <div class="box_checkbox_4">
                                    <label class="taille_p_filtrage">Montant 4%</label>
                                    <input type="checkbox" style="margin-left:158px;height:20px;width:20px;" value="Montant4%" selected="selected" checked />
                                    <br>
                                    <label class="taille_p_filtrage">Date Facturation4%</label>
                                    <input type="checkbox" style="margin-left:84px;height:20px;width:20px;" value="DateFacturation4%" selected="selected" checked />
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="filtrage_hr_vertical"></div>
                        <div class="filtrage_autre">
                            <h3 class="titre_filtre">Autres :</h3>
                            <div class="box_checkbox_autre">
                                <label class="taille_p_filtrage">Type travaux</label>
                                <input type="checkbox" style="margin-left:206px;height:20px;width:20px;" value="Typetravaux" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Date reception Pv</label>
                                <input type="checkbox" style="margin-left:159px;height:20px;width:20px;" value="DateReceptionPv" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Info équipement</label>
                                <input type="checkbox" style="margin-left:173px;height:20px;width:20px;" value="InfoEquip" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Part Magasin</label>
                                <input type="checkbox" style="margin-left:203px;height:20px;width:20px;" value="PartMagasin" selected="selected" checked />
                                <br>
                                <label class="taille_p_filtrage">Litige</label>
                                <input type="checkbox" style="margin-left:274px;height:20px;width:20px;" value="Litige" selected="selected" checked />
                            </div>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" id="filtrage" class="btn btn-info" onclick="">Valider</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div> 
    </div>

    <form method="POST" id="form_questions" action>
        <table class="form_table">
            <thead class="form_head">
                <tr class="form_head_tr mx-auto">
                    <th class="text-center" style="width:90px;padding:10px;">Contrat<br><input class="filter"  style="width:80%;" placeholder="N°" data-col="Contrat"></th>
                    <th class="text-center" style="width:90px;padding:10px;">N° devis<br><input class="filter"  style="width:96%;" placeholder="N°" data-col="N° devis"></th>
                    <th class="text-center" style="width:60px;padding:10px;">N° CMD <br><input class="filter"  style="width:50%;" placeholder="N°" data-col="N° CMD"></th>
                    <th class="text-center padding_non_input">BDC <br>decima</th>
                    <th class="text-center">Date <br>reception CDE<br></th>
                    <th class="text-center libelle_box">Libellé <br><input class="filter"  style="width:50%;" placeholder="Libellé" data-col="Libellé"></th>
                    <th class="text-center padding_non_input" style="width:80px;">Montant Decima</th>
                    <th class="text-center" style="width:80px;">N°Facturation Decima<br><input class="filter"  style="width:60%;" placeholder="N°" data-col="N°Facturation Decima"></th>
                    <th class="text-center">Date <br>Facturation <br></th>
                    <th class="text-center padding_non_input">Etat<br></th>
                    <th class="text-center padding_non_input">Montant 4% <br></th>
                    <th class="text-center">Date <br>Facturation 4% <br></th>
                    <th class="text-center" style="width:80px;">N° devis <br>ST<br><input class="filter"  style="width:80%;" placeholder="N°" data-col="N° devis ST"></th>
                    <th class="text-center padding_non_input" style="width:80px;">Montant <br>ST</th>
                    <th class="text-center">N° facture ST<br><input class="filter"  style="width:60px;" placeholder="N°" data-col="N° facture ST"></th>
                    <th class="text-center">Date <br>Facturation ST<br></th>
                    <th class="text-center padding_non_input">Type <br>travaux</th>
                    <th class="text-center">Date <br>reception Pv<br></th>
                    <th class="text-center">Info equipement </th>
                    <th class="text-center padding_non_input">Part <br>Magasin</th>
                    <th class="text-center">Litige <br>ST (O/N)</th>
                    <th>
                        <div style="display:flex;flex-direction:columns;">
                            <img src="images/logo_pencil.png" style="height:40px;" alt="logo crayon">
                            <p style="font-size:12px;margin-top:10px;margin-right:10px;">Modifier</p>
                        </div>
                        <div style="display:flex;flex-direction:columns;">
                            <img src="images/symbole-valide.png" style="height:15px;margin-left:10px;" alt="logo crayon">
                            <p style="font-size:12px;margin-left:11px;">Valider</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
        <?php
        $i = 1;


        $base = array();
        
        // Récupération de données de chaque BDD respectueusement

        for ($e=0;$e<count($mysql_Group_BDD);$e++){
            $result = $mysql_Group_BDD[$e]->executeSQL('SELECT * FROM devis JOIN equipement ON equipement.id_equipement=devis.id_equipement JOIN batiment ON batiment.id_batiment=equipement.id_batiment JOIN ut ON ut.code_ut=batiment.code_ut WHERE id_devis AND etat_devis != 5'.$where_etat);
            array_push($base,
                array("base" => $mysql_Group_BDD[$e], "result" => $result)
            );
        };

        ////////////////////

        // Variable servant à faire le calcule des montants 4% et Part magasin

        $taux_part_4 = 0.04 ;
        $taux_part_magasin = 0.06;
        $reference_vide = '';

        ////////////////////

        for ($e=0;$e<count($base);$e++){
            foreach($base[$e]["result"] as $d){

                $html = '';
                
                /*Calculer les montants des 4% et de la part magasin respectueusement*/

                $part_4 = $taux_part_4 * str_replace(' ', '', $d['montant']);
                $part_magasin = $taux_part_magasin * str_replace(' ', '', $d['prix_devis_sous_traitant']);
                
                /************************************/

                /*Changer la couleur des lignes une fois sur deux */

                $color = ($i % 2 == 0) ? "#FFF" : "#EEE";

                /************************************/
                
                $etat = '<div class="box" style="padding:4px;"><select name="etat" class="etat_'.$d['id_devis'].' etat" style="width:100px;">';            
                switch($d['etat_devis'])
                {
                    case '0' :
                        $etat .= '<option value="0" class="rapport" selected>En attente</option><option value="1" class="export">Validé / Travaux en attente</option><option value="2" class="module">Travaux terminé</option><option value="3" class="ged">Refusé</option><option value="4" class="info">Régularisation</option>';
                        break;
                    case '1' :
                        $etat .= '<option value="0" class="rapport">En attente</option><option value="1" class="export" selected>Validé / Travaux en attente</option><option value="2" class="module">Travaux terminé</option><option value="3" class="ged">Refusé</option><option value="4" class="info">Régularisation</option>';
                        break;
                    case '2' :
                        $etat .= '<option value="0" class="rapport">En attente</option><option value="1" class="export">Validé / Travaux en attente</option><option value="2" class="module" selected>Travaux terminé</option><option value="3" class="ged">Refusé</option><option value="4" class="info">Régularisation</option>';
                        break;
                    case '3' :
                        $etat .= '<option value="0" class="rapport">En attente</option><option value="1" class="export">Validé / Travaux en attente</option><option value="2" class="module">Travaux terminé</option><option value="3" selected class="ged">Refusé</option><option value="4" class="info">Régularisation</option>';
                        break;
                    case '4' :
                        $etat .= '<option value="0" class="rapport">En attente</option><option value="1" class="export">Validé / Travaux en attente</option><option value="2" class="module">Travaux terminé</option><option value="3" class="ged">Refusé</option><option value="4" class="info" selected>Régularisation</option>';
                        break;
                }
                $etat .= '</div></select>'; 
                
                ?>
                    <tr class="form_body_tr" style="background-color:<?=$color?>;">
                        <td class="Contrat choice data selectof1">
                            <div class="etat_BDD">
                                <?php
                                // Fonction produite dans fonction.php concernant un switch qui appelle la bonne BDD pour chaque devis individuel

                                    echo GetContrat($base[$e]["base"]->database);
                               
                                ?>
                            </div>
                        </td>
                        <td class="Devis choice selectof2"><?=$d['numero_devis']?></td>
                        <td class="CMD CMD_width selectof3">
                            <?php
                                // Permet de mettre le str du num_commande en cliquable qui renvoie le bon de commande s'il y en a un

                                if($d['fichier_commande'] == true){
                                    $html = '<a href="../../hdf/fichiers/commandes_reception_devis/'.$d['fichier_commande'].'?time='.time().'" target="_blank">'.$d['num_commande'].'</a>';
                                }
                                else{
                                    $html = $d['num_commande'];
                                }
                                echo $html;
                            ?>
                        </td>
                        <td> 
                            <a type="button" class="modal_window" data-toggle="modal" data-target="#myModal_3_<?=$i;?>"><img src="images/logo-document.png" class="form_logo_doc" alt="logo document"></a>
                            <div class="modal" id="myModal_3_<?=$i;?>">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:650px;">
                                        <!-- Modal Header -->
                                        <div style="background-color: #E1D2B8;" class="modal-header">
                                            <h4 class="modal-title">Bon de commande du devis <?=$d['numero_devis']?></h4>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <div style="margin-top:10px;">
                                                <p> Référence du devis sous traitant</p>
                                                <input style="height: 40px; width: 300px;" type="text" value="<?=$d['reference_devis_sous_traitant']?>"/>
                                            </div>
                                            <div class="margin-top">
                                                <p> Montant du devis sous traitant</p>
                                                <input type="text" value="<?= $d['prix_devis_sous_traitant'] ?>" />
                                            </div>
                                            <div class="margin-top">
                                                <p> Libellé</p>
                                                <textarea rows="4" cols="45"><?=$d['libelle_devis']?></textarea>
                                            </div>
                                            <div class="margin-top">
                                                <p>Complément</p>
                                                <textarea rows="6" cols="45"><?=$d['complement_libelle']?></textarea>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:110px;">
                                        <input type="text" class="date_commande_tab_<?=$d['id_devis']?> form-control datepicker" name="date_commande_tab_<?=$d['id_devis']?>" value="<?=strftime('%d/%m/%y', $d['date_commande'])?>">
                                    </div>
                                </div>
                            </div>
                        </td>                                  
                        <td class="libelle_box">
                            <?php
                                if($d['nom_fichier'] == true){
                                    $html = '<a href="../../hdf/fichiers/devis/'.$d['nom_fichier'].'">'.$d['libelle_devis'].'</a>';
                                }
                                else{
                                    $html = $d['libelle_devis'];
                                }
                                echo $html;
                            ?> 
                        </td>
                        <td class="MontantDecima"><?=$d['montant']?> €</td>
                        <td class="NFacturationDecima"><?=$d['numero_facturation_decima']?></td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:110px;">
                                        <input type="text" class="date_facture_decima_tab_<?=$d['id_devis']?> form-control datepicker" name="date_facture_decima_tab_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facture'])?>">
                                    </div>
                                </div>
                            </div>
                        </td>             
                        <td><?=$etat?></td>
                        
                        <td class="Montant4%"><?=number_format($part_4, 2)?> €</td>                          
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:110px;margin-left:5px;">
                                        <input type="text" class="date_facturation_4_tab_<?=$d['id_devis']?> form-control datepicker" name="date_facturation_4_tab_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facturation_4'])?>">
                                    </div>
                                </div>
                            </div>
                        </td>                                  
                        <td class="selectof" style="width:100px;">
                            <?php

                                if ($d['reference_devis_sous_traitant'] == true){
                                    $html = ' '.$d['reference_devis_sous_traitant'].'';
                                }
                                else{
                                    $html = ''.$reference_vide.'';
                                }
                                echo $html;
                            ?>
                        </td>
                        <td class="selectof">
                            <?php

                                if(number_format($d['prix_devis_sous_traitant']) == true){
                                    $html = ''.number_format($d['prix_devis_sous_traitant'], 2) .'€';
                                }
                                else{
                                    $html = ''.$reference_vide.'';
                                }
                                echo $html;
                            ?>
                        </td>
                        <td><?=$d['numero_facture_st']?></td>
                        <td style="width:100px">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:110px;">
                                        <input type="text" class="date_facturation_st_tab_<?=$d['id_devis']?> form-control datepicker" name="date_facturation_st_tab_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facturation_st'])?>">
                                    </div>
                                </div>
                            </div>
                        </td>                                  
                        <td><?=$d['type_travaux']?></td>
                        <td style="width:100px">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:110px;">
                                        <input type="text" class="date_reception_tab_<?=$d['id_devis']?> form-control datepicker" name="date_reception_tab_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_reception'])?>">
                                    </div>
                                </div>
                            </div>
                        </td>                                  
                        <td>
                            <a type="button" class="modal_window" data-toggle="modal" data-target="#myModal_2_<?=$i;?>"><img src="images/logo-document.png" class="form_logo_doc" alt="logo document"></a>
                            <div target="_blan" class="modal" id="myModal_2_<?=$i;?>">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:450px;">
                                        <!-- Modal Header -->
                                        <div style="background-color: #E1D2B8;" class="modal-header">
                                            <h4 class="modal-title"> Info equipement du devis <?=$d['numero_devis']?></h4>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <div style="margin-top:10px;">
                                                <p>Code UT</p>
                                                <input style="height: 40px; width: 300px;" type="text" value="<?=$d['code_ut']?>"/>
                                            </div>
                                            <div class="margin-top">
                                                <p>Code BAT</p>
                                                <input type="text" value="<?=$d['num_bat']?>" />
                                            </div>
                                            <div class="margin-top">
                                                <p>Code Equipement</p>
                                                <input type="text" value="<?=$d['code_ensemble']?>" />
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </td>
                        <td>
                            <?php 
                            // Permet de renvoyer la part_magasin s'il y a un montant de devis ST sinon cela renvoie rien
                                if(number_format($part_magasin) == true){
                                    $html = ''.number_format($part_magasin, 2) .'€';
                                }
                                else{
                                    $html = ''.$reference_vide.'';
                                }
                                echo $html;
                            ?>
                        </td>
                        <td><?=$d['litige']?></td>
                        <td style="text-align:start;">
                            <a type="button" class="modal_window" data-toggle="modal" data-target="#myModal_<?=$i;?>"><img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon"></a>
                            <div class="modal" id="myModal_<?=$i;?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div style="background-color: #E1D2B8;" class="modal-header">
                                            <h4 class="modal-title">Modifier le devis <?=$d['numero_devis']?></h4>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <div class="modal_couleur">
                                                <h3 class="title_modification_devis">Commande</h3>
                                                <div>
                                                    <div>
                                                        <p style="margin-left:60px;">Numero</p>
                                                        <div class="modal_padding_input" style="text-align:center;">
                                                            <input type="text" class="commande_<?=$d['id_devis']?>" name="commande_<?=$d['id_devis']?>" value="<?=$d['num_commande']?>" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p style="margin-left:60px;">Date récéption</p>
                                                        <div class="taille_date_modification">
                                                            <input type="text" class="date_commande_<?=$d['id_devis']?> form-control datepicker" name="date_commande_2<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_commande'])?>">
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="modal_couleur">
                                                <h3 class="title_modification_devis">Décima</h3>
                                                <div>
                                                    <div>
                                                        <p style="margin-left:60px;">Numéro facturation</p>
                                                        <div class="modal_padding_input" style="text-align:center;">
                                                            <input type="text" class="numero_facturation_decima_<?=$d['id_devis']?>" name="numero_facturation_decima_<?=$d['id_devis']?>" value="<?=$d['numero_facturation_decima']?>" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p style="margin-left:60px;">Date facturation</p>
                                                        <div class="taille_date_modification">
                                                            <input type="text" class="date_facture_decima_<?=$d['id_devis']?> form-control datepicker" name="date_facture_decima_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facture'])?>">
                                                        </div>
                                                    </div> 
                                                    <div>
                                                        <p style="margin-left:60px;">Date facturation 4%</p>
                                                        <div class="taille_date_modification">
                                                            <input type="text" class="date_facturation_4_<?=$d['id_devis']?> form-control datepicker" name="date_facturation_4_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facturation_4'])?>">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="modal_couleur">
                                                <h3 class="title_modification_devis">Sous-Traitant</h3>
                                                <div>
                                                    <div>
                                                        <p style="margin-left:60px;">Numéro devis</p>
                                                        <div class="modal_padding_input" style="text-align:center;">
                                                            <input type="text" class="reference_st_<?=$d['id_devis']?>" name="reference_st_<?=$d['id_devis']?>" value="<?=$d['reference_devis_sous_traitant']?>" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p style="margin-left:60px;">Montant</p>
                                                        <div class="modal_padding_input" style="text-align:center;">
                                                            <input type="text" class="montant_st_<?=$d['id_devis']?>" name="montant_st_<?=$d['id_devis']?>" value="<?=$d['prix_devis_sous_traitant']?>" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p style="margin-left:60px;">Numéro facturation</p>
                                                        <div class="modal_padding_input" style="text-align:center;">
                                                            <input type="text" class="numero_facture_st_<?=$d['id_devis']?>" name="numero_facture_st_<?=$d['id_devis']?>" value="<?=$d['numero_facture_st']?>" />
                                                        </div>
                                                    </div> 
                                                    <div>
                                                        <p style="margin-left:60px;">Date facturation</p>
                                                        <div class="taille_date_modification">
                                                            <input type="text" class="date_facturation_st_<?=$d['id_devis']?> form-control datepicker" name="date_facturation_st_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_facturation_st'])?>">
                                                        </div>
                                                    </div>     
                                                </div>
                                            </div>
                                            <div class="modal_couleur">
                                                <h3 class="title_modification_devis">Litige & Pv</h3>
                                                <p style="margin-left:60px;">Pv</p>
                                                <div class="taille_date_modification">
                                                    <input type="text" class="date_reception_<?=$d['id_devis']?> form-control datepicker" name="date_reception_<?=$d['id_devis']?>" value="<?=date('d/m/y', $d['date_reception'])?>">
                                                </div>
                                                <p style="margin-left:60px;">Litige</p>
                                                <div class="taille_date_modification">
                                                    <textarea rows="5" cols="33" class="litige_<?=$d['id_devis']?>" name="litige_<?=$d['id_devis']?>" style="height:20px;width:100px;" placeholder="<?=$d['litige']?>"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info valide_<?=$d['id_devis']?>" onclick="valideModificationDevisModal(<?=$d['id_devis']?>, '<?=$base[$e]['base']->database?>')">Valider</button>
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img type="button" class="valide1_<?=$d['id_devis']?> form_logo_valide" onclick="valideModificationDevis(<?=$d['id_devis']?>, '<?=$base[$e]['base']->database?>')" src="images/symbole-valide.png" alt="logo crayon"/>
                        </td>
                    </tr>
                <?php
                        $i++;     
                    };
                };
                ?> 
            </tbody>
        </table>
    </form>  
</body>
</html>

<script>

/* Script de recherche dans un tableau */

(function(e){"use strict";e.fn.multifilter=function(t){var n=e.extend({target:e("table"),method:"thead"},t);jQuery.expr[":"].Contains=function(e,t,n){return(e.textContent||e.innerText||"").toUpperCase().indexOf(n[3].toUpperCase())>=0};this.each(function(){var t=e(this);var r=n.target;var i="tr";var s="td";var o=r.find(e(i));if(n.method==="thead"){var u=r.find("th:Contains("+t.data("col")+")");var a=r.find(e("thead th")).index(u)}if(n.method==="class"){var u=o.first().find("td."+t.data("col")+"");var a=o.first().find("td").index(u)}t.change(function(){var n=t.val();o.each(function(){var t=e(this);var r=e(t.children(s)[a]);if(n){if(r.text().toLowerCase().indexOf(n.toLowerCase())!==-1){r.attr("data-filtered","positive")}else{r.attr("data-filtered","negative")}if(t.find(s+"[data-filtered=negative]").size()>0){t.hide()}else{if(t.find(s+"[data-filtered=positive]").size()>0){t.show()}}}else{r.attr("data-filtered","positive");if(t.find(s+"[data-filtered=negative]").size()>0){t.hide()}else{if(t.find(s+"[data-filtered=positive]").size()>0){t.show()}}}});return false}).keyup(function(){t.change()})})}})(jQuery)

/***********************************************/


$(document).ready(function() {
    $('.filter').multifilter();    
    
    $('.datepicker').each(function(){
        $(this).datepicker();
        //$(this).datepicker( "option", "dateFormat", "dd-mm-yy" ); Optimisation pour le datepicker
        $(this).change(function(){
            $('#input_'+$(this).attr('id')).val($(this).val());
        });
    });
        
    $('.etat_session, .etat_BDD').change(function(){
        window.location = '?&etat_session='+$('.etat_session').val()+'&etat_BDD='+$('.etat_BDD').val();
    });    

    // $('.etat_BDD').change(function(){
    //     window.location = '?&etat_BDD='+$(this).val();
    // });

    $('.modal_window').attr('target', '_blank');
    
});

// Fonction de modification du tableau en brute
function valideModificationDevis(id_devis, database){

    $.ajax({
        type: "GET",
        url: 'php/fonctions_ajax.php',
        data: 'fonction=complete_devis&date_reception='+$('.date_reception_tab_'+id_devis).val()
        +'&date_facture='+$('.date_facture_decima_tab_'+id_devis).val()
        +'&date_commande='+$('.date_commande_tab_'+id_devis).val()
        +'&date_facturation_st='+$('.date_facturation_st_tab_'+id_devis).val()
        +'&date_facturation_4='+$('.date_facturation_4_tab_'+id_devis).val()
        +'&etat='+$('.etat_'+id_devis).val()
        +'&id_devis='+id_devis
        +'&database='+database,
        success: function(data) {
            alert('Le devis a bien été modifié.');
        },
        error: function(resultat, statut, erreur){
            alert('Il y a eu une erreur lors de la modification');
        },
    })
    
};

//Fontion de modification sur la pop-up
function valideModificationDevisModal(id_devis, database){

    $.ajax({
        type: "GET",
        url: 'php/fonctions_ajax.php',
        data: 'fonction_modal=complete_devis_modal&date_reception='+$('.date_reception_'+id_devis).val()
        +'&date_facture='+$('.date_facture_decima_'+id_devis).val()
        +'&date_commande='+$('.date_commande_'+id_devis).val()
        +'&litige='+$('.litige_'+id_devis).val()
        +'&date_facturation_st='+$('.date_facturation_st_'+id_devis).val()
        +'&date_facturation_4='+$('.date_facturation_4_'+id_devis).val()
        +'&numero_facture_st='+$('.numero_facture_st_'+id_devis).val()
        +'&numero_facturation_decima='+$('.numero_facturation_decima_'+id_devis).val()
        +'&reference_devis_st='+$('.reference_st_'+id_devis).val()
        +'&montant_devis_st='+$('.montant_st_'+id_devis).val()
        +'&num_commande='+$('.commande_'+id_devis).val()
        +'&id_devis='+id_devis
        +'&database='+database,
        success: function(data) {
            alert('Le devis a bien été modifié.');
        },
        error: function(resultat, statut, erreur){
            alert('Il y a eu une erreur lors de la modification');
        },
    })
};
</script>
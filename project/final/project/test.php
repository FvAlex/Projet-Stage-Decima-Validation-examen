<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php 
    
    if (isset($_GET['id_devis'])) {
            $devis = $mysql->ExecuteSQL('SELECT * FROM devis WHERE id_devis="'.$_GET['id_devis'].'"')[0];
            $num_devis = str_replace("/", "-", $devis[0]['numero_devis']);
    };

    if(isset($_POST['id_devis'])){
		for($i=$_POST['id_devis']; $i <= $_POST['id_devis']; $i++)
		{
			$mysql->ExecuteSQL('UPDATE id_devis SET .. WHERE id_devis="'.$_GET['id_devis'].'"');	
		}		
	};

echo '
    <!DOCTYPE html>
    <html lang="fr">
        <head>
        <title>Project</title>

        <meta charset="UTF-8">
        <meta http-equiv="content-language" content="fr">
        <meta name="description" content="Project"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <link rel="stylesheet" href="css/style.css?v='.time().'">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/datepicker-fr.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        
    </head>
    <body>
        <nav>
        <img src="images/logoLeft.png" class="nav_logo_gmao" alt="logo Gmao">
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
        <select multiple="multiple" class="selectpicker select_taille_filtre select" style="width:80%;" value="null">
            <option class="nav_select" selected="selected" disabled><label>Selected</label></option>
            <option class="nav_select" value="Contrat"  selected="selected">Contrat</option>
            <option class="nav_select" value="Devis" selected>N°devis</option>
            <option class="nav_select" value="CMD" selected="selected">N° CMD</option>
            <option class="nav_select" value="Libelle" selected="selected">Libellé</option>
            <option class="nav_select" value="MontantDecima" selected="selected">Montant Decima</option>
            <option class="nav_select" value="NFacturationDecima" selected="selected">N°Facturation Decima</option>
            <option class="nav_select" value="DateFacturation" selected="selected">Date Facturation</option>
            <option class="nav_select" value="EtatFacturation" selected="selected">Etat Facturation</option>
            <option class="nav_select" value="Montant4" selected="selected">Montant 4%</option>
            <option class="nav_select" value="DateFacturation4" selected="selected">Date Facturation4%</option>
            <option class="nav_select" value="DevisST"selected="selected">N° devis ST</option>
            <option class="nav_select" value="MontantST" selected="selected">Montant ST</option>
            <option class="nav_select" value="NFactureST" selected="selected">N° facture ST</option>
            <option class="nav_select" value="DateFacturationST" selected="selected">Date FacturationST</option>
            <option class="nav_select" value="Typetravaux" selected="selected">Type travaux</option>
            <option class="nav_select" value="BDC" selected="selected">BDC decima</option>
            <option class="nav_select" value="DateReceptionPv" selected="selected">Date reception Pv</option>
            <option class="nav_select" value="InfoEquip" selected="selected">Info équipement</option>
            <option class="nav_select" value="DateReceptionCDE" selected="selected">Date reception CDE</option>
            <option class="nav_select" value="InfoEquipement(UBE)"selected="selected">Info equipement(Ut-BAT-EQUIP)</option>
            <option class="nav_select" value="PartMagasin" selected="selected">Part Magasin</option>
            <option class="nav_select" value="Litige" selected="selected">Litige</option>
        </select>


        <form methode="post" action>
            <table class="form_table">
                <thead class="form_head">
                    <tr class="form_head_tr mx-auto">
                        <th class="text-center Contrat choice data" style="width:90px;padding:10px;">Contrat<br><input class="filter"  style="width:50%;" placeholder="N°" data-col="Contrat"></th>
                        <th class="text-center Devis choice" style="width:90px;padding:10px;">N° devis<br><input class="filter"  style="width:50%;" placeholder="N°" data-col="N° devis"></th>
                        <th class="text-center CMD" style="width:60px;padding:10px;">N° CMD <br><input class="filter"  style="width:50%;" placeholder="N°" data-col="N° CMD"></th>
                        <th class="text-center Libelle" style="width:60px;padding:10px;">Libellé <br><input class="filter"  style="width:50%;" placeholder="Libellé" data-col="Libellé"></th></th>
                        <th class="text-center MontantDecima padding_non_input" style="width:80px;">Montant Decima</th>
                        <th class="text-center NFacturationDecima" style="width:80px;">N°Facturation Decima<br><input class="filter"  style="width:40%;" placeholder="N°" data-col="N°Facturation Decima"></th></th>
                        <th class="text-center DateFacturation">Date <br>Facturation <br><input class="input_text_thead filter" type="text" placeholder="Date.."></th>
                        <th class="text-center EtatFacturation padding_non_input">Etat <br>Facturation<br></th>
                        <th class="text-center Montant4 padding_non_input">Montant 4% <br></th>
                        <th class="text-center DateFacturation4">Date <br>Facturation 4% <br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center DevisST" style="width:80px;">N° devis <br>ST <br><input class="filter"  style="width:80%;" placeholder="N°" data-col="N° devis ST"></th></th>
                        <th class="text-center MontantST padding_non_input " style="width:80px;">Montant <br>ST</th>
                        <th class="text-center NFactureST">N° facture ST<br><input class="filter"  style="width:60px;" placeholder="N°" data-col="N° facture ST"></th></th>
                        <th class="text-center DateFacturationST">Date <br>Facturation ST<br> <input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center Typetravaux padding_non_input">Type <br>travaux</th>
                        <th class="text-center BDC padding_non_input">BDC <br>decima</th>
                        <th class="text-center DateReceptionPv">Date <br>reception Pv<br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center InfoEquip">Info <br>équipement</th>
                        <th class="text-center DateReceptionCDE">Date <br>reception CDE<br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center InfoEquipement(UBE)">Info equipement <br>(Ut-BAT-EQUIP)</th>
                        <th class="text-center PartMagasin padding_non_input">Part <br>Magasin</th>
                        <th class="text-center Litige">Litige <br>ST (O/N)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="form_body_tr color_td_white">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">'.$id_devis.'</td>
                        <td class="CMD CMD_width">23721-0000115754</td>
                        <td class="libelle Libelle">'.$d['libelle_devis'].'</td>
                        <td class="MontantDecima">'.$d['montant'].' €</td>
                        <td class="NFacturationDecima">6hr</td>
                        <td  class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>             
                        <td class="td_select EtatFacturation">
                            <select value="En attente Refusé" class="select_taille">
                            <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                            <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                            <option value="Travaux terminé">Travaux terminé</option>
                            <option value="Refusé" style="background-color:pink;">Refusé</option>
                            <option value="Réguralisation">Réguralisation</option>
                            <option value="Archiver">Archiver</option>
                            </select>
                        </td>
                        <td class="Montant4%">9</td>                          
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:105px;margin-left:5px;">
                                        <input type="text" style="font-size:10px;" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                                  
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                            <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                                  
                        <td>'.$d['type_travaux'].'</td>
                        <td>15</td>
                            <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                                  
                        <td>2231</td>
                            <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                                  
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <select>
                                <option value="O/N">O/N</option>
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                        </td>
                        <td>
                            <a href="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_grey">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">06/077669/40</td>
                        <td class="CMD CMD_width">485850000006119</td>
                        <td class="libelle Libelle">Devis pour installation de disjoncteur sur le départ des pompes de relevages</td>
                        <td class="MontantDecima">1345.00</td>
                        <td class="NFacturationDecima">66</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                       
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>55</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>7178</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                        <select>
                            <option value="O/N">O/N</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_white">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">06/077669/10</td>
                        <td class="CMD CMD_width">23721-0000115754</td>
                        <td class="libelle Libelle">Devis pour remplacement du moteur sur le rideau cabine magnéto 1</td>
                        <td class="MontantDecima">4132.34</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>2253</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                        <select>
                            <option value="O/N">O/N</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_grey">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">20164372</td>
                        <td class="CMD CMD_width">NaN</td>
                        <td class="libelle Libelle">Remplacement de 4 coffrets de protection BMR</td>
                        <td class="MontantDecima">1459,19</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                       
                        <td>0</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                        <select>
                            <option value="O/N">O/N</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_white">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">20157229</td>
                        <td class="CMD CMD_width">NaN</td>
                        <td class="libelle Libelle">20157229_Mise_en_Place_de_4_radiateurs_B76_20201029D</td>
                        <td class="MontantDecima">1 054,56</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                       
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>5840</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                        <select>
                            <option value="O/N">O/N</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_grey">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">20157140</td>
                        <td class="CMD CMD_width">NaN</td>
                        <td class="libelle Libelle">rinçage de réseaux et remplacement glycol</td>
                        <td class="MontantDecima">14664,73</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                      
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>0</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                        <select>
                            <option value="O/N">O/N</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_white">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">06/077669/14</td>
                        <td class="CMD CMD_width">23721-0000115754</td>
                        <td class="libelle Libelle">Devis pour remplacement du moteur sur le rideau cabine magnéto 2</td>
                        <td>4132.34</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td> 
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>2252</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <select>
                                <option value="O/N">O/N</option>
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_grey">
                        <td class="Contrat choice data">00</td>
                        <td class="Devis choice">06/077669/03</td>
                        <td class="CMD CMD_width">23721-0000115754</td>
                        <td class="libelle Libelle">Devis pour installation d’un rideau métallique au local Aprolis, à la demande de M Duthoit</td>
                        <td class="MontantDecima">4122.11</td>
                        <td class="NFacturationDecima">6</td>
                        <td class="DateFacturation">
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:90px;">
                                        <input type="text" style="color:white;" class="form-control datetimepicker4">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                      
                        <td class="td_select EtatFacturation">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td class="Montant4">9</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>2168</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../">
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>                        
                        <td>15</td>
                        <td>15</td>
                        <td>
                            <select>
                                <option value="O/N">O/N</option>
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                        </td>
                        <td>
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>    
    </body>
    </html>';
?>
<script>

    /* Script de recherche dans un tableau */

    (function(e){"use strict";e.fn.multifilter=function(t){var n=e.extend({target:e("table"),method:"thead"},t);jQuery.expr[":"].Contains=function(e,t,n){return(e.textContent||e.innerText||"").toUpperCase().indexOf(n[3].toUpperCase())>=0};this.each(function(){var t=e(this);var r=n.target;var i="tr";var s="td";var o=r.find(e(i));if(n.method==="thead"){var u=r.find("th:Contains("+t.data("col")+")");var a=r.find(e("thead th")).index(u)}if(n.method==="class"){var u=o.first().find("td."+t.data("col")+"");var a=o.first().find("td").index(u)}t.change(function(){var n=t.val();o.each(function(){var t=e(this);var r=e(t.children(s)[a]);if(n){if(r.text().toLowerCase().indexOf(n.toLowerCase())!==-1){r.attr("data-filtered","positive")}else{r.attr("data-filtered","negative")}if(t.find(s+"[data-filtered=negative]").size()>0){t.hide()}else{if(t.find(s+"[data-filtered=positive]").size()>0){t.show()}}}else{r.attr("data-filtered","positive");if(t.find(s+"[data-filtered=negative]").size()>0){t.hide()}else{if(t.find(s+"[data-filtered=positive]").size()>0){t.show()}}}});return false}).keyup(function(){t.change()})})}})(jQuery)
    
    /***********************************************/


    /*Fonction permettant de filtrer un input dans les th*/

    $(document).ready(function() {
        $('.filter').multifilter();
    });

    /***********************************************/

    /*Fonction permettant de creer un onglet appellant une date*/

    $(document).ready(function () {
        $('.datetimepicker4').datetimepicker($datetimepicker.regional["fr"]);
    });



    /***********************************************/
                       
    /*Fonction permettant la selection de plusieurs filtre avec checkbox*/
    
    $('.select').selectpicker();

    /***********************************************/


    /*Test function permettant d'afficher ou cacher une colonne complete du tabbleau*/

   

    // $(document).ready(function(){
    //     alert('ready');

    //     $('.nav_select').on('change',function(){
    //         alert('.nav_select');

    //         $(".data").hide();
    //         alert('.data');
    //     }).change();
    // });

            //Seul fonction qui fonctionne pour delete la colonne mais la réaffiche pas 
    $(document).ready(function(){
        alert('1');
        $('.select').change('click',function() {
            alert('2');
            $('.Contrat').hide();

            $('.' + $(this).val()).show();
        });
    });


    // $(document).ready(function(){
    //     alert('1');
    //     $('#select').change('click',function() {
    //         alert('2');
    //         if ( this.value == 'selected'){
    //             $('.Contrat').show();
    //         }
    //         else{
    //             $('.Contrat').hide();
    //         }
    //     });
    // });

	// $(document).ready(function(){
    //     alert('1');
    //     $('#select').change('click',function() {
    //         alert('2');
    //         $('.Contrat').hide();
    //         $('#' + $(this).val()).show();
    //     });
    // });

    /***********************************************/
</script>

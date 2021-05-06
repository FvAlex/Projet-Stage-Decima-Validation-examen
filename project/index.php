<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php

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
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
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
        <select multiple="multiple" id="nav_select" class="selectpicker select_taille_filtre select" style="width:80%;" value="null">
            <option selected="selected" disabled>
               <label>Selected</label>
            </option>
            <option value="Contrat" selected="selected">  
                Contrat
            </option>
            <option selected="selected">
                N° CMD
            </option>
            <option selected="selected">
                Libellé
            </option>
            <option selected="selected">
                Montant Decima
            </option>
            <option selected="selected">
                N°Facturation Decima
            </option>
            <option selected="selected">
                Date Facturation
            </option>
            <option selected="selected">
                Etat Facturation
            </option>
            <option selected="selected">
                Montant 4%
            </option>
            <option selected="selected">
                Date Facturation4%
            </option>
            <option selected="selected">
                N° devis ST
            </option>
            <option selected="selected">
                Montant ST
            </option>
            <option selected="selected">
                N° facture ST
            </option>
            <option selected="selected">
                Date FacturationST
            </option>
            <option selected="selected">
                Type travaux
            </option>
            <option selected="selected">
                BDC decima
            </option>
            <option selected="selected">
                Date reception Pv
            </option>
            <option selected="selected">
                Info équipement
            </option>
            <option selected="selected">
                Date reception CDE
            </option>
            <option selected="selected">
                Info equipement(Ut-BAT-EQUIP)
            </option>
            <option selected="selected">
                Part Magasin
            </option>
            <option selected="selected">
                Litige
            </option>
        </select>


        <form methode="post" action>
            <table class="form_table">
                <thead class="form_head">
                    <tr class="form_head_tr mx-auto"">
                        <th class="text-center  Contrat choice" style="width:90px;padding:10px;">Contrat<br><input class="filter"  style="width:50%;" placeholder="N°" data-col="Contrat"></th>
                        <th class="text-center " style="width:90px;padding:10px;">N° devis<br><input class="filter"  style="width:50%;" placeholder="N°" data-col="N° devis"></th>
                        <th class="text-center " style="width:60px;padding:10px;">N° CMD <br><input class="filter"  style="width:50%;" placeholder="N°" data-col="N° CMD"></th>
                        <th class="text-center " style="width:60px;padding:10px;">Libellé <br><input class="filter"  style="width:50%;" placeholder="Libellé" data-col="Libellé"></th></th>
                        <th class="text-center padding_non_input" style="width:80px;">Montant Decima</th>
                        <th class="text-center " style="width:80px;">N°Facturation Decima<br><input class="filter"  style="width:40%;" placeholder="N°" data-col="N°Facturation Decima"></th></th>
                        <th class="text-center ">Date <br>Facturation <br><input class="input_text_thead " type="text" placeholder="Date.."></th>
                        <th class="text-center padding_non_input">Etat <br>Facturation<br></th>
                        <th class="text-center padding_non_input">Montant 4% <br></th>
                        <th class="text-center ">Date <br>Facturation 4% <br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center " style="width:80px;">N° devis <br>ST <br><input class="filter"  style="width:80%;" placeholder="N°" data-col="N° devis ST"></th></th>
                        <th class="text-center padding_non_input" style="width:80px;">Montant <br>ST</th>
                        <th class="text-center ">N° facture ST<br><input class="filter"  style="width:60px;" placeholder="N°" data-col="N° facture ST"></th></th>
                        <th class="text-center ">Date <br>Facturation ST<br> <input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center padding_non_input">Type <br>travaux</th>
                        <th class="text-center padding_non_input">BDC <br>decima</th>
                        <th class="text-center ">Date <br>reception Pv<br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center padding_non_input">Info <br>équipement</th>
                        <th class="text-center ">Date <br>reception CDE<br><input type="text" class="input_text_thead" placeholder="Date.."></th>
                        <th class="text-center padding_non_input">Info equipement <br>(Ut-BAT-EQUIP)</th>
                        <th class="text-center padding_non_input">Part <br>Magasin</th>
                        <th class="text-center ">Litige <br>ST (O/N)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="form_body_tr color_td_white">
                        <td class="Contrat choice">00</td>
                        <td>06/077669/16</td>
                        <td>23721-0000115754</td>
                        <td class="libelle">Devis pour installation de boucle magnétique sur les portes souples, suite réfection du sol</td>
                        <td>1965.14</td>
                        <td>6hr</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                            <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                            <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                            <option value="Travaux terminé">Travaux terminé</option>
                            <option value="Refusé">Refusé</option>
                            <option value="Réguralisation">Réguralisation</option>
                            <option value="Archiver">Archiver</option>
                            </select>
                        </td>
                        <td>
                            <a class="btn p-2 ml-1" href="" role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>                          
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
                        </td>                                  <td>11</td>
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
                            <a href="" re="">
                                <img src="images/logo_pencil.png" class="form_logo_pencil" alt="logo crayon">
                            </a>
                        </td>
                    </tr>
                    <tr class="form_body_tr color_td_grey">
                        <td class="Contrat choice">00</td>
                        <td>06/077669/40</td>
                        <td>485850000006119</td>
                        <td class="libelle">Devis pour installation de disjoncteur sur le départ des pompes de relevages</td>
                        <td>1345.00</td>
                        <td>66</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>06/077669/10</td>
                        <td>23721-0000115754</td>
                        <td class="libelle">Devis pour remplacement du moteur sur le rideau cabine magnéto 1</td>
                        <td>4132.34</td>
                        <td>6</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>20164372</td>
                        <td>NaN</td>
                        <td class="libelle">Remplacement de 4 coffrets de protection BMR</td>
                        <td>1459,19</td>
                        <td>6</td>
                        <td>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6" style="width:125px;">
                                        <input type="text" class="form-control datetimepicker4" placeholder="   ../../..../"/>
                                    </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $(\'.datetimepicker4\').datetimepicker();
                                    });
                                </script>
                                </div>
                            </div>
                        </td>
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>20157229</td>
                        <td>NaN</td>
                        <td class="libelle">20157229_Mise_en_Place_de_4_radiateurs_B76_20201029D</td>
                        <td>1 054,56</td>
                        <td>6</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>20157140</td>
                        <td>NaN</td>
                        <td class="libelle">rinçage de réseaux et remplacement glycol</td>
                        <td>14664,73</td>
                        <td>6</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>06/077669/14</td>
                        <td>23721-0000115754</td>
                        <td class="libelle">Devis pour remplacement du moteur sur le rideau cabine magnéto 2</td>
                        <td>4132.34</td>
                        <td>6</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
                        <td class="Contrat choice">00</td>
                        <td>06/077669/03</td>
                        <td>23721-0000115754</td>
                        <td class="libelle">Devis pour installation d’un rideau métallique au local Aprolis, à la demande de M Duthoit</td>
                        <td>4122.11</td>
                        <td>6</td>
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
                        <td class="td_select">
                            <select class="select_taille">
                                <option value="En attente" style="background-color:#4DB0EB;">En attente</option>
                                <option value="Validé/Travaux en attente">Validé/Travaux en attente</option>
                                <option value="Travaux terminé">Travaux terminé</option>
                                <option value="Refusé">Refusé</option>
                                <option value="Réguralisation">Réguralisation</option>
                                <option value="Archiver"></option>
                            </select>
                        </td>
                        <td>9</td>
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
    
    /**************************************************/    


    /*Fonction permettant de filtrer un input dans les th*/

    $(document).ready(function() {
        $('.filter').multifilter();
    });

    /************************************************/

    /*Fonction permettant de creer un onglet appellant une date*/

    $(function () {
        $('.datetimepicker4').datetimepicker();
    });

    /***********************************************/
                       
    /*Function permettant la selection de plusieurs filtre avec checkbox*/

    $(document).ready(function() {
        $('.select').selectpicker();
    });

    /***********************************************/

    $("#nav_select").on("change", function () {
        var val = $(this).val(),
        target = "." + val;

        $(".choice").hide();
        $(target).show();
    });
    
</script>

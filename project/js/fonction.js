// Permet d'afficher les batiments en relation avec l'ut selectionne (page vision des equipements)
function changeBat(ut) {
	
	$.ajax({
		url: 'php/ajax.php',
		data: 'code_ut='+ut,
		dataType: 'json',
		success: function(json) {
			if(json==-1) {
				$('#geolocalisation').show();
				$('#geolocalisation').attr('href','php/geolocalisation.php?ut='+ut);
				$('#etapeBat').hide();
				$('#batiment').hide();
			} else {
				$('#geolocalisation').hide();
				$('#etapeBat').show();
				$('#batiment').show();
				$.each(json, function(index, value) {
					$('#batiment').append('<option value="'+ index +'">'+ value +' ('+index+')</option>');
				});
			}
			
			$('#erreurEquip').hide();
			$('#continuer').hide();
		}
	});
}

// Fonction permettant d'afficher le bouton suivant si il y a des equipements associes au batiment
// ou d'afficher le message d'erreur s'il n'y a pas d'equipements.
function haveEquipement()
{
	var bat = $('#batiment').val();
	
	$.ajax({
		url: 'php/ajax.php',
		data: 'id_bat='+ bat,
		dataType: 'json',
		success: function(json) {
			if(json != null) {
				$('#continuer').show();
				$('#erreurEquip').hide();
			} else {
				$('#continuer').hide();
				$('#erreurEquip').show();
			}
		}
	});
}



//fonction verifiant les champs de la création ou de la modification d'une UT
//retourne true si le formulaire est correct
function verifFormUt(action) {
	var backgroundError = "#e74c3c",
		colorError = "#ecf0f1",
		color = "#666", 
		background = "",
		ut = $('#code_ut_'+action).val(),
		verifCodeUt = true;
		
	if(action=='u')
	{
		var ancien = $('#code_ut_ancien').val();
		if(ancien==ut)
		{
			verifCodeUt = false;
		}
	}
	var erreur = false;
	if(verifCodeUt)
	{
		erreur = isUt(ut);
	}
	if($('#code_ut_'+action).val().length!=7 || erreur)
	{
		erreur = true;
		$('.lib_code_'+action).css("background-color",backgroundError);
		$('.lib_code_'+action).css("color",colorError);
	}
	else
	{
		$('.lib_code_'+action).css("background-color",background);
		$('.lib_code_'+action).css("color",color);
	}
	if($('#nom_ut_'+action).val()=="")
	{
		erreur = true;
		$('.lib_nom_'+action).css("background-color",backgroundError);
		$('.lib_nom_'+action).css("color",colorError);
	}
	else
	{
		$('.lib_nom_'+action).css("background-color",background);
		$('.lib_nom_'+action).css("color",color);
	}
	if($('#region_'+action).val()=="")
	{
		erreur = true;
		$('.lib_region_'+action).css("background-color",backgroundError);
		$('.lib_region_'+action).css("color",colorError);
	}
	else
	{
		$('.lib_region_'+action).css("background-color",background);
		$('.lib_region_'+action).css("color",color);
	}
	if($('#dept_'+action).val()=="")
	{
		erreur = true;
		$('.lib_dept_'+action).css("background-color",backgroundError);
		$('.lib_dept_'+action).css("color",colorError);
	}	
	else
	{
		$('.lib_dept_'+action).css("background-color",background);
		$('.lib_dept_'+action).css("color",color);
	}
	if($('#type_ut_'+action).val()=="")
	{
		erreur = true;
		$('.lib_type_'+action).css("background-color",backgroundError);
		$('.lib_type_'+action).css("color",colorError);
	}
	else
	{
		$('.lib_type_'+action).css("background-color",background);
		$('.lib_type_'+action).css("color",color);
	}
	if($('#surface_'+action).val()=="" || isNaN($('#surface_'+action).val()))
	{
		erreur = true;
		$('.lib_surface_'+action).css("background-color",backgroundError);
		$('.lib_surface_'+action).css("color",colorError);
	}
	else
	{
		$('.lib_surface_'+action).css("background-color",background);
		$('.lib_surface_'+action).css("color",color);
	}
	if($('#lat_'+action).val()=="")
	{
		$('#lat_'+action).val()=="NULL";
	}
	if($('#lng_'+action).val()=="")
	{
		$('#lng_'+action).val()=="NULL";
	}
	return !erreur;
}

//fonction permettant de verifier si une UT existe ou pas
//retourne true si l'UT existe false sinon
function isUt(code_ut)
{
	$.ajaxSetup({async: false});
	var existe;
	$.ajax({
		url: 'php/ajax.php',
		data: 'is_Ut='+ code_ut,
		dataType: 'json',
		success: function(json) {
			existe = (json!=-1);
		},
		error: function(json) {
			existe = -1;
		}
	});
	if(existe==true)
	{
		return true;
	}
	return false;
}

//fonction verifiant les champs de la création ou de la modification d'une UT
//retourne true si le formulaire est correct
function verifFormBat(action)
{
	var backgroundError = "#e74c3c";
	var colorError = "#ecf0f1";
	var color = "#666";
	var background = "";
	var ut = $('#code_'+action).val();
	var verifNumBat = true;
	var bat = $('#num_'+action).val();
	if(action=='u')
	{
		var ancien = $('#num_u_ancien').val();
		if(ancien==bat)
		{
			verifNumBat = false;
		}
	}
	var erreur = false;
	if(verifNumBat)
	{
		$.ajaxSetup({async: false});
		$.ajax({
			url: '../ajax.php',
			data: 'ut='+ut+'&bat='+bat,
			dataType: 'json',
			success: function(json) {
				var existe = (json!=-1);
				if(existe)
				{
					erreur = true;
				}
			}
		});
	}
	if($('#num_'+action).val().length!=3 || erreur)
	{
		$('#th_num_'+action).css("background-color",backgroundError);
		$('#th_num_'+action).css("color",colorError);	
	}
	if($('#nomi_'+action).val()=="")
	{
		erreur = true;
		$('#th_nomi_'+action).css("background-color",backgroundError);
		$('#th_nomi_'+action).css("color",colorError);
	}
	else
	{
		$('#th_nomi_'+action).css("background-color",background);
		$('#th_nomi_'+action).css("color",color);
	}
	if($('#nomu_'+action).val()=="")
	{
		erreur = true;
		$('#th_nomu_'+action).css("background-color",backgroundError);
		$('#th_nomu_'+action).css("color",colorError);
	}
	else
	{
		$('#th_nomu_'+action).css("background-color",background);
		$('#th_nomu_'+action).css("color",color);
	}
	if($('#type_'+action).val()=="")
	{
		erreur = true;
		$('#th_type_'+action).css("background-color",backgroundError);
		$('#th_type_'+action).css("color",colorError);
	}
	else
	{
		$('#th_type_'+action).css("background-color",background);
		$('#th_type_'+action).css("color",color);
	}
	if($('#prop_'+action).val()=="")
	{
		erreur = true;
		$('#th_prop_'+action).css("background-color",backgroundError);
		$('#th_prop_'+action).css("color",colorError);
	}
	else
	{
		$('#th_prop_'+action).css("background-color",background);
		$('#th_prop_'+action).css("color",color);
	}
	if($('#dept_'+action).val()=="")
	{
		erreur = true;
		$('#th_dept_'+action).css("background-color",backgroundError);
		$('#th_dept_'+action).css("color",colorError);
	}
	else
	{
		$('#th_dept_'+action).css("background-color",background);
		$('#th_dept_'+action).css("color",color);
	}
	if($('#donneur_'+action).val()=="")
	{
		erreur = true;
		$('#th_donneur_'+action).css("background-color",backgroundError);
		$('#th_donneur_'+action).css("color",colorError);
	}
	else
	{
		$('#th_donneur_'+action).css("background-color",background);
		$('#th_donneur_'+action).css("color",color);
	}
	if($('#surfacei_'+action).val()=="")
	{
		erreur = true;
		$('#th_surfacei_'+action).css("background-color",backgroundError);
		$('#th_surfacei_'+action).css("color",colorError);
	}
	else
	{
		$('#th_surfacei_'+action).css("background-color",background);
		$('#th_surfacei_'+action).css("color",color);
	}
	if($('#surfacer_'+action).val()=="")
	{
		erreur = true;
		$('#th_surfacer_'+action).css("background-color",backgroundError);
		$('#th_surfacer_'+action).css("color",colorError);
	}
	else
	{
		$('#th_surfacer_'+action).css("background-color",background);
		$('#th_surfacer_'+action).css("color",color);
	}
	if($('#etat_'+action).val()=="")
	{
		erreur = true;
		$('#th_etat_'+action).css("background-color",backgroundError);
		$('#th_etat_'+action).css("color",colorError);
	}
	else
	{
		$('#th_etat_'+action).css("background-color",background);
		$('#th_etat_'+action).css("color",color);
	}
	if($('#type_'+action).val()=="")
	{
		erreur = true;
		$('#th_type_'+action).css("background-color",backgroundError);
		$('#th_type_'+action).css("color",colorError);
	}
	else
	{
		$('#th_type_'+action).css("background-color",background);
		$('#th_type_'+action).css("color",color);
	}
	return !erreur;
}

//fonction verifiant les champs de la création ou de la modification d'un equipement
//retourne true si le formulaire est correct
function verifFormEquip(action)
{
	var backgroundError = "#e74c3c";
	var colorError = "#ecf0f1";
	var color = "#404040";
	var background = "";
	var ut = $('#code_'+action).val();
	var verifNumBat = true;
	var bat = $('#num_'+action).val();
	var erreur = false;
	if($('#libelle_'+action).val()=='')
	{
		erreur = true;
		$('#th_libelle_'+action).css("background-color",backgroundError);
		$('#th_libelle_'+action).css("color",colorError);	
	}
	else
	{
		$('#th_libelle_'+action).css("background-color",background);
		$('#th_libelle_'+action).css("color",color);
	}
	if(isNaN($('#qte_'+action).val()))
	{
		erreur = true;
		$('#th_qte_'+action).css("background-color",backgroundError);
		$('#th_qte_'+action).css("color",colorError);
	}
	else
	{
		$('#th_qte_'+action).css("background-color",background);
		$('#th_qte_'+action).css("color",color);
	}
	if($('#carac_'+action).val()=="")
	{
		erreur = true;
		$('#th_carac_'+action).css("background-color",backgroundError);
		$('#th_carac_'+action).css("color",colorError);
	}
	else
	{
		$('#th_carac_'+action).css("background-color",background);
		$('#th_carac_'+action).css("color",color);
	}
	if($('#donneur_'+action).val()=="")
	{
		erreur = true;
		$('#th_donneur_'+action).css("background-color",backgroundError);
		$('#th_donneur_'+action).css("color",colorError);
	}
	else
	{
		$('#th_donneur_'+action).css("background-color",background);
		$('#th_donneur_'+action).css("color",color);
	}
	return !erreur;
}

//fonction permettant la vérification des formulaires de gestion d'utilisateur
function verifFormUser(action)
{
	var backgroundError = "#e74c3c",
		colorError = "#ecf0f1",
		color = "#666666",
		background = "",
		erreur = false,
		user = $('#login_'+action).val(),
		verifLogin = true;
		
	if(action == 'u') {
		if(user!=$('#login_ancien').val()) {
			verifLogin = true;
		} else {
			verifLogin = false;
		}
	}
	
	if(verifLogin)
	{
		$.ajax({
			url: 'php/ajax.php',
			data: 'login='+user,
			dataType: 'json',
			async: false,
			success: function(json) {
				var existe = (json!=-1);
				
				if(existe) {
					erreur = true;
				}
			}
		});
	}
	
	if($('#login_'+action).val()=='' || erreur) {
		erreur = true;
		$('#lib_login_'+action).css("background-color",backgroundError);
		$('#lib_login_'+action).css("color",colorError);	
	} else {
		$('#lib_login_'+action).css("background-color",background);
		$('#lib_login_'+action).css("color",color);
	}
	
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var emailaddressVal = $('#mail_'+action).val();
	
	if(emailaddressVal == '' || !emailReg.test(emailaddressVal)) 
	{
		erreur = true;
		$('#lib_mail_'+action).css("background-color",backgroundError);
		$('#lib_mail_'+action).css("color",colorError);
	} 
	else 
	{
		$('#lib_mail_'+action).css("background-color",background);
		$('#lib_mail_'+action).css("color",color);
	}
	if($('#droit_'+action).val()=="")
	{
		erreur = true;
		$('#lib_droit_'+action).css("background-color",backgroundError);
		$('#lib_droit_'+action).css("color",colorError);
	}
	else
	{
		$('#lib_droit_'+action).css("background-color",background);
		$('#lib_droit_'+action).css("color",color);
	}
	return !erreur;
}

//retourne l'index du tableau correspond a la variable search
function getindexofcode_ut(tab,search)
{
	for(i=0;i<tab.length;i++) {
		if(tab[i]==search) {
			return i;
		}
	}
	
	return -1;
}

//permet de charger les ut non selectionné et selectionné et de les ajouter au tableau 
//ou a la zone de recherche (gestion droit_ut)
function chargeUt(id_utilisateur)
{
	var ut = [];
	//recupere la liste de tout les ut existants
	$.ajax({
		url: 'php/ajax.php',
		data: 'listeut=1',
		dataType: 'json',
		async: false,
		success: function(json) {
			if(json!='1')
			{
				$.each(json, function(index, value) {
					ut.push({"code_ut":value['code_ut'],"nom_ut":value['nom_ut']});
				});
			}
		}
	});
	var liste = [];
	//recupere tout les ut dont l'utilisateur selectionne a déja à charge
	$.ajax({
		url: 'php/ajax.php',
		data: 'id_utilisateur='+id_utilisateur,
		dataType: 'json',
		async: false,
		success: function(json) {
			if(json!='1')
			{
				var tabUt = '';
				$.each(json, function(index, value) {
					//on enregistre les code_ut dans un tableau pour pouvoir les enlever
					//de la zone de recherche par la suite
					liste.push(value['code_ut']);
					tabUt += value['code_ut'] + ',';
					$('#table').append('<tr class="'+value['code_ut']+'"><td>'+value['nom_ut']+'</td><td><img id="minus" class="'
						+value['code_ut']+'" src="image/suppr.png" onclick="javascript:moinsUt(\''+value['code_ut']+'\', nonSelect);"/></td></tr>');
				});
				tabUt = tabUt.substring(0,tabUt.length-1);
				$('#table').css('display','');
				$('#tabUt').attr('value',tabUt);
			}
		}
	});
	var nonSelect = [];
	//on enleve les ut déjà selectionnés de la zone de recherche
	ut.forEach(function(elem)
	{
		if(getindexofcode_ut(liste,elem['code_ut'])==-1)
		{
			nonSelect.push(elem['nom_ut']+' ('+elem['code_ut']+')');
		}
	});
	initAutocomplete(nonSelect);
	return nonSelect;
}

//permet de mettre a jour la liste des ut non selectionné (gestion droit_ut)
//supprimer est un booleen permettant de savoir si on supprime ou ajoute un element a la liste
function majSearch(nonSelect,code_ut,supprimer)
{
	var libelle = '';
	if(supprimer)
	{
		$.ajax({
			url: 'php/ajax.php',
			data: 'getNomUt='+ code_ut,
			dataType: 'json',
			async : false,
			success: function(json) {
				libelle = json[0]['nom_ut']+' ('+code_ut+')';
			}
		});
		nonSelect.push(libelle);
	}
	else
	{
		index = getindexofcode_ut(nonSelect,code_ut);
		nonSelect = supprIndex(nonSelect,index);
	}
	initAutocomplete(nonSelect);
	// $('#search').attr('value','');
}

//fonction qui retourne le tableau tab moins l'index index
function supprIndex(tab,index)
{
	var ret = [];
	
	for(i=0;i<tab.length;i++) {
		if(index != i) {
			ret.push(tab[i]);
		}
	}
	
	return ret;
}

//fonction permettant d'inialiser le champ autocomplete dans gestion droit_ut
function initAutocomplete(nonSelect)
{
	$('#search').autocomplete({
		minLength: 3,
		source : nonSelect,
		select: function( event, ui ) {
			$(this).val('');
			tmp = ui.item.value.split('(');
			nom_ut = tmp[0];
			code_ut = tmp[tmp.length-1];
			code_ut = code_ut.substring(0,(code_ut.length)-1);
			plusUt(code_ut,nom_ut);
			majSearch(nonSelect,code_ut);
			$('#search').autocomplete('change');
		},
		change : function(event){
			$(this).val('');
		}
	});
}

function plusUt(code_ut,nom_ut)
{
	tab = $('#tabUt').val();
	$('#tabUt').attr('value',tab+','+code_ut);
	$('#table').append('<tr class="'+code_ut+'"><td>'+nom_ut+'</td><td><img id="minus" class="'
		+code_ut+'" src="image/suppr.png" onclick="javascript:moinsUt(\''+code_ut+'\', nonSelect);"/></td></tr>');
}

//permet de supprimer un ut des ut selectionné (gestion droit_ut)
function moinsUt(code_ut,nonSelect)
{
	majSearch(nonSelect,code_ut,true);
	$('.'+code_ut).remove();
	tab = $('#tabUt').val();
	tab = tab.split(",");
	var newtab = '';
	$.each(tab,function(index,value){
		if(value!=code_ut)
			newtab += value+',';
	});
	newtab = newtab.substring(0,newtab.length-1);
	$('#tabUt').attr('value',newtab);
}
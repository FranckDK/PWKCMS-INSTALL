<?php
$PWK_LG_TITRE = 'Installation de PWK-CMS';
$PWK_LG_DESC = 'Bienvenue sur l\'installeur automatisé PWK-CMS';
$PWK_LG_ETATSERVEUR = 'Etat du serveur officiel d\'installation : ';
$PWK_LG_INSTALLEURV = 'Installeur PWK-CMS v1.0';
$PWK_LG_INSTALLEUR = 'Installeur';
$PWK_LG_VERIFPRE = 'Vérification des pré-requis';
$PWK_LG_PHPATTENDU = 'Version PHP 7.0 et +';
$PWK_LG_SUCCES = 'Succès';
$PWK_LG_ERREUR = 'Erreur';
$PWK_LG_CURL = 'Extension CURL présente';
$PWK_LG_DOWNTITRE = 'Téléchargement de la dernière version';
$PWK_LG_TELECHARGER = 'Cliquer ici pour lancer le téléchargement du package';
$PWK_LG_TELECHARGEMENT_FINI = 'Téléchargement terminé...';
$PWK_LG_TELECHARGEMENT_ENCOURS = 'Téléchargement en cours...';
$PWK_LG_CONFIGURATIONBDD = 'Configuration de la base MySQL';
$PWK_LG_ENTRERINFO = 'Entrer les informations de connexion à la base de données';
$PWK_LG_BDD_CREATE = 'Créer le fichier de configuration';
$PWK_LG_BDD_TEST = 'Tester la connexion à la BDD';
$PWK_LG_BDD_SERV = 'Adresse du serveur';
$PWK_LG_BDD_NAME = 'Nom de la base';
$PWK_LG_BDD_USER = 'Nom utilisateur';
$PWK_LG_BDD_PASS = 'Mot de passe';
$PWK_LG_BDD_ETAT = 'Etat';
$PWK_LG_FINALISATION = 'Finalisation du processus';
$PWK_LG_INSTALLENCOURS = 'Installation en cours';
$PWK_LG_INSTALL_TERMINEE = 'Installation terminée';
$PWK_LG_MESSAGE_FINAL = 'Félicitations, PWK CMS a été installé avec succès. N\'oubliez de supprimer le fichier install.php de ce repertoire ainsi que le répertoire Téléchargement.<br/>Vous pouvez à présent vous connecter avec le login ADMIN et le mot de passe ADMIN en cliquant sur ce texte.';


//TRAITEMENTS AJAX
$mode = $_POST['mode'];
if ($mode == "download"){download();}
if ($mode == "bdd_test"){bdd_test();}
if ($mode == "bdd_ecrire"){bdd_ecrire();}
if ($mode == "finalisation"){finalisation();}
if ($mode == ""){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
	body {
  padding-top: 70px;
  padding-bottom: 30px;
}

.theme-dropdown .dropdown-menu {
  position: static;
  display: block;
  margin-bottom: 20px;
}

.theme-showcase > p > .btn {
  margin: 5px 0;
}

.theme-showcase .navbar .container {
  width: auto;
}
	</style>

    <title><?php echo $PWK_LG_TITRE;?></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">_Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $PWK_LG_INSTALLEURV;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><?php echo $PWK_LG_INSTALLEUR;?></a></li>
            <li><a href="http://www.pwk.fr" target="blank">PWK-CMS</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" id="jumb01">
        <h1><?php echo $PWK_LG_TITRE;?></h1>
        <p><?php echo $PWK_LG_DESC;?></p>
      </div>


      <div class="page-header" id="bloc01">
        <h1><?php echo $PWK_LG_VERIFPRE;?></h1>
      </div>
<?php
$PREREQUIS_ERR='0';
//Vérification de la version installée de PHP_VERSION
?>
	<div id="bloc02">
	  <p>
	  <h4><span class="label label-info"><?php echo $PWK_LG_PHPATTENDU;?></span>
<?php
if (version_compare(PHP_VERSION, '7.0.0') >= 0){echo('<span class="label label-success">'.$PWK_LG_SUCCES.'</span></h4>');}
else{echo('<span class="label label-danger">'.$PWK_LG_ERREUR.'</span></h4>'); $PREREQUIS_ERR++;}
?>
	  </p>
	
<?php
//Vérification de la présence de CURL
?>
	  <p>
	  <h4><span class="label label-info"><?php echo $PWK_LG_CURL;?></span>
<?php
$info_curl = curl_version();
$info_curl_ver = $info_curl["version"];
if($info_curl_ver!=''){echo('<span class="label label-success">'.$PWK_LG_SUCCES.'</span></h4>');}else{echo('<span class="label label-danger">'.$PWK_LG_ERREUR.'</span></h4>');  $PREREQUIS_ERR++;}
?>
	  </p>
	  </div>
<?php
//TELECHARGEMENT DE LA DERNIERE VERSION
if ($PREREQUIS_ERR=='0'){
?>
      <div class="page-header">
        <h1 id="titre01"><?php echo $PWK_LG_DOWNTITRE;?></h1>
      </div>	
<?php
function getInfos($url){
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLINFO_HEADER_OUT, true);
 curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 curl_setopt($ch,CURLOPT_USERAGENT,"INSTALLER PWK-CMS/1.0");
 curl_exec($ch);
 return curl_getinfo($ch);
 }
// ON DIT AU SCRIPT QU'IL A 60 SECONDES POUR S'EXECUTER (EVITE DE PLANTER LE SERVEUR)
ini_set('max_execution_time',60);
// ON VERIFIE SUR LE SERVEUR DISTANT SI UNE MAJ EST DISPO
ini_set('user_agent','INSTALLER PWK-CMS/1.0');
$getVersions = @file_get_contents('http://cms.pwk.fr/cms_install/last_version.txt',null,null);
?>
<div id="bloc03" class="alert alert-<?php if($getVersions!=''){echo("success"); $ETATSERVEUR='ONLINE';}else{echo("danger"); $ETATSERVEUR='OFFLINE';}?>" role="alert">
<?php echo $PWK_LG_ETATSERVEUR; echo $ETATSERVEUR;?>
</div>
<?php
if($ETATSERVEUR=='ONLINE'){echo('<div class="row"><div class="col-lg-12"><button href="" id="button" type="button" class="col-lg-12 btn btn-default">'.$PWK_LG_TELECHARGER.'</button></div></div>');}
?>
<div>&nbsp;</div>
<p>
		<strong id="infomess">&nbsp;</strong>
			<span id="infopercent" class="pull-right text-muted">&nbsp;</span>
	</p>
<div class="progress" id="progressbar1" style="display:none;">
<div id="progressbar1b" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span class="sr-only"></span></div>
</div>
<div class="alert alert-danger" role="alert" id="alert02" style="display:none;"></div>
<?php
} //FIN DU IF PREREQUIS ERR = 0
?>	 
<div class="row">
 <div class="col-sm-12" id="bloc04" style="display:none;">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $PWK_LG_ENTRERINFO;?></h3>
            </div>
            <div class="panel-body">
<form class="form-horizontal" id="formulaire">
  <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo $PWK_LG_BDD_SERV;?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BDD_SERV" placeholder="localhost" value="localhost">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo $PWK_LG_BDD_NAME;?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BDD_NAME" placeholder="localhost" value="pwk_install">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo $PWK_LG_BDD_USER;?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BDD_USER" placeholder="root" value="root">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo $PWK_LG_BDD_PASS;?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BDD_PASS" placeholder="password" value="root" >
    </div>
  </div>
      <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo $PWK_LG_BDD_ETAT;?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BDD_ETAT" placeholder="" disabled="true">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <div id="btn_test_ctr"><button class="btn btn-default" id="btn_test"><?php echo $PWK_LG_BDD_TEST;?></button></div>
	  <button class="btn btn-default" id="btn_save" style="display:none;"><?php echo $PWK_LG_BDD_CREATE;?></button>
    </div>
  </div>
</form>
<p>&nbsp;</p>
<div class="alert alert-info" role="alert" id="alert01" style="display:none;"></div>
            </div>
          </div>
</div>
</div>

<div class="row">
 <div class="col-sm-12" id="bloc05" style="display:none;">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $PWK_LG_INSTALL_TERMINEE;?></h3>
            </div>
            <div class="panel-body">
			<a href="index.php"><?php echo $PWK_LG_MESSAGE_FINAL;?></a>
			</div>
		</div>
	</div>
</div>

<div id="results"></div>
<div id="results2"></div>
		
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Appels Ajax -->
	<script language="JavaScript" type="text/javascript">
	var progressbar1 = document.getElementById("progressbar1"),
	alert01 = document.getElementById("alert01");	
	
	$('#button').on('click', function(event) {
		this.style.display = 'none';
		progressbar1.style.display = 'block';
		infomess.innerHTML = "<?php echo $PWK_LG_TELECHARGEMENT_ENCOURS;?>";
		ajax_download();
	});

	$('#btn_test').on('click', function(event) {
		event.preventDefault();
		//this.style.display = 'none';
		$("#BDD_SERV").prop('disabled',true);
		$("#BDD_NAME").prop('disabled',true);
		$("#BDD_USER").prop('disabled',true); 
		$("#BDD_PASS").prop('disabled',true);
		this.style.display='none';
		bdd_test();
	}); 

	$('#btn_save').on('click', function(event) {
		event.preventDefault();
		//this.style.display = 'none';
		bdd_ecrire();
	});		

	function bdd_ecrire() {
		var BDD_SERV = $("#BDD_SERV").val(),
			BDD_NAME = $("#BDD_NAME").val(),
			BDD_USER = $("#BDD_USER").val(),
			BDD_PASS = $("#BDD_PASS").val();
			$.ajax({
			type:"POST",
			url:"install.php",
			data: "mode=bdd_ecrire&BDD_SERV="+BDD_SERV+"&BDD_NAME="+BDD_NAME+"&BDD_USER="+BDD_USER+"&BDD_PASS="+BDD_PASS,
			success: function(msg){$('#alert01').html('...').delay(2000).queue(function(){$(this).html(msg);}); ecriture_fichiers()}
		});	
		//clearInterval(ErreurTimer);
	}
	
	function ecriture_fichiers(){
		titre01.innerHTML='<?php echo $PWK_LG_FINALISATION;?>';
		bloc04.style.display='none';
		infomess.style.display = 'inline';
		infomess.innerHTML = '<?php echo $PWK_LG_INSTALLENCOURS;?>';
		infopercent.style.display = 'inline';
		infopercent.innerHTML = '0%';
		progressbar1b.style.width = '0%';
		progressbar1.style.display = 'block';
		Timer02 = setInterval(function() { updateProgress() }, 1000);
		//setInterval(function() { updateProgress() }, 100);
					$.ajax({
			type:"POST",
			url:"install.php",
			data: "mode=finalisation"
			//success: function(msg){$('#alert01').html('...').delay(2000).queue(function(){$(this).html(msg);}); ecriture_fichiers()}
		});	
	}

        function updateProgress(){
			bloc04.style.display='none';
            $.getJSON('TELECHARGEMENTS/progress.json',function(data){
				//$('#results').html(data.percentComplete*100 + ' complete');
				//progressbar1b.style.width = data.percentComplete*100+'%';
				progressbar1b.style.width = data.percentComplete*100+'%';
				infopercent.innerHTML = data.percentComplete*100+'%';
				if (data.percentComplete == 1) clearInterval(Timer02);
				if (data.percentComplete == 1) bloc05.style.display ='inline';
				//progressBar.style.width = data.percentComplete+'%';
			}).error(function(data){
                //clearInterval(AJAX_PROGRESS);
                //$('#results').html('ERROR!!!');
            });
        }
	
	function bdd_test() {
		var BDD_SERV = $("#BDD_SERV").val(),
			BDD_NAME = $("#BDD_NAME").val(),
			BDD_USER = $("#BDD_USER").val(),
			BDD_PASS = $("#BDD_PASS").val();
		$.ajax({
			type:"POST",
			url:"install.php",
			data: "mode=bdd_test&BDD_SERV="+BDD_SERV+"&BDD_NAME="+BDD_NAME+"&BDD_USER="+BDD_USER+"&BDD_PASS="+BDD_PASS,
			success: function(msg){$('#alert01').html('...').delay(2000).queue(function(){$(this).html(msg);});}
		});
		//alert01.style.display='inline';
		Timer01 = setInterval(function() { TIM01() }, 1000);
}

function TIM01()
{
	//var BDD_RESULT = $("#alert01").html();
	
	$("#BDD_ETAT").val($("#alert01").html());
	if ($("#BDD_ETAT").val() == 'OK') clearInterval(Timer01);
	//if ($("#BDD_ETAT").val() == 'OK') btn_test.style.display='none';
	if ($("#BDD_ETAT").val() == 'OK') btn_save.style.display='inline';
	var errbdd = $("#BDD_ETAT").val().substring(0,6);
	if(errbdd == 'Erreur')  $("#BDD_SERV").prop('disabled',false);
	if(errbdd == 'Erreur')	$("#BDD_NAME").prop('disabled',false);
	if(errbdd == 'Erreur')	$("#BDD_USER").prop('disabled',false); 
	if(errbdd == 'Erreur')	$("#BDD_PASS").prop('disabled',false);
	if(errbdd == 'Erreur') btn_test.style.display='inline';
}
	
	function ajax_download() {
		$.ajax({
			type: "POST",
			url: "install.php",
			data: "mode=download"
		});
progressTimer = setInterval(function() { getProgress() }, 500);
//ErreurTimer = setInterval(function() { checkErreur() }, 3000);
	}
	
	function getProgress() {
   $.ajax({
      url: "TELECHARGEMENTS/progress.txt",
      cache:false
   })
   .done(function(data) {
      var progressbar1b = document.getElementById("progressbar1b"),percentage = parseInt(data),infopercent=document.getElementById("infopercent"),maj=document.getElementById("buttonmaj");
	  infopercent.innerHTML = percentage+'%'; //MAJ du % en texte sur la droite
	  if (isNaN(percentage) == true) infopercent.innerHTML ='0%';
	  if (isNaN(percentage) == true) alert02.innerHTML = data;
	  if (isNaN(percentage) == true) alert02.style.display='inline';
	  progressbar1b.style.width = percentage+'%';
 //Arrete le timer et affiche un message terminé à 100%
      if (percentage == 100) clearInterval(progressTimer);
	  if (percentage == 100) infomess.innerHTML = "<?php echo $PWK_LG_TELECHARGEMENT_FINI;?>";	
if (percentage == 100) bloc01.style.display='none';
if (percentage == 100) bloc02.style.display='none';
if (percentage == 100) bloc03.style.display='none';
if (percentage == 100) bloc04.style.display='inline';
if (percentage == 100) jumb01.style.display='none';
if (percentage == 100) progressbar1.style.display = 'none';
if (percentage == 100) infomess.style.display = 'none';
if (percentage == 100) infopercent.style.display = 'none';
if (percentage == 100) titre01.innerHTML='<?php echo $PWK_LG_CONFIGURATIONBDD;?>';	  
   });

}
					
</script>
  </body>
</html>
<?php
}

///////////////////////////////////////////////////////////////////
function download()
{
mkdir('TELECHARGEMENTS',0777);
file_put_contents( 'TELECHARGEMENTS/progress.txt', '' );
$targetFile = fopen( 'TELECHARGEMENTS/last_version.zip', 'w' );
$ch = @curl_init( 'http://cms.pwk.fr/cms_install/last_version.zip' );

curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,"0");
curl_setopt($ch,CURLOPT_USERAGENT,"INSTALLER PWK-CMS/1.0");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
curl_setopt( $ch, CURLOPT_PROGRESSFUNCTION, 'progressCallback' );
curl_setopt( $ch, CURLOPT_FILE, $targetFile );
curl_setopt($ch,CURLOPT_FAILONERROR,true);
if(curl_exec($ch) === false)
{
$fp = fopen( 'TELECHARGEMENTS/progress.txt', 'w' );
fputs( $fp, "Erreur: $ch");
fclose( $fp );
}


fclose( $ch );
}
///////////////////////////////////////////////////////////////////
function progressCallback ($ressource, $download_size, $downloaded_size, $upload_size, $uploaded_size)
{
    static $previousProgress = 0;
    
    if ( $download_size == 0 )
        $progress = 0;
    else
        $progress = round( $downloaded_size * 100 / $download_size );
    
    if ( $progress > $previousProgress)
    {
        $previousProgress = $progress;
        $fp = fopen( 'TELECHARGEMENTS/progress.txt', 'w' );
        fputs( $fp, "$progress\n" );
        fclose( $fp );
    }
}
///////////////////////////////////////////////////////////////////
//TEST DE CONNEXION A LA BDD
function bdd_test()
{
// On récupère les variables du formulaire (J'sais pas encore comment)
$BDD_SERV = $_POST['BDD_SERV'];
$BDD_NAME = $_POST['BDD_NAME'];
$BDD_USER = $_POST['BDD_USER'];
$BDD_PASS = $_POST['BDD_PASS'];
// On teste la connexion à la BDD
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$BDD_SERV.';dbname='.$BDD_NAME.'', ''.$BDD_USER.'', ''.$BDD_PASS.'', $pdo_options);
	echo ('OK');
}
catch(Exception $e)
{
	echo('Erreur : '.$e->getMessage());
}
}

//ecriture du fichier de bdd
function bdd_ecrire()
{
$BDD_SERV = $_POST['BDD_SERV'];
$BDD_NAME = $_POST['BDD_NAME'];
$BDD_USER = $_POST['BDD_USER'];
$BDD_PASS = $_POST['BDD_PASS'];
mkdir('02-CONFIG/',0777);
$setup = fopen("02-CONFIG/BDD.php", "w") or die("Erreur...");
$config = ('<?php
//CONNEXION A LA BASE DE DONNEES
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO(\'mysql:host='.$BDD_SERV.';dbname='.$BDD_NAME.'\', \''.$BDD_USER.'\', \''.$BDD_PASS.'\', $pdo_options);
}
catch(Exception $e)
{
	die(\'Erreur : \'.$e->getMessage());
}
?>')
;
 
fwrite($setup ,$config);
fclose($fh);
echo 'bdd.php:ok';
}

//ecriture des fichiers et creation de la base
function finalisation()
{
file_put_contents('TELECHARGEMENTS/progress.json',json_encode(array('percentComplete'=>'0.1','fichier'=>'...')));
$file = ('TELECHARGEMENTS/last_version.zip');	
$zip = new ZipArchive;
if ($zip->open($file) === TRUE) {
	$CURRENT_DIR=__DIR__;
    $zip->extractTo($CURRENT_DIR);
    $zip->close();
    echo 'ok';
	file_put_contents('TELECHARGEMENTS/progress.json',json_encode(array('percentComplete'=>'1','fichier'=>'...')));
	include ('upgrade.php');
} else {
    echo 'échec';
}
}

function finalisation2()
{
$nbfichier='0';
//COMPTE LE NOMBRE DE FICHIERS DU ZIP
$file = ('TELECHARGEMENTS/last_version.zip');
$zip_info = zip_info_generator($file);
$_TOTAL_ENCOURS = '0';
set_time_limit(0);
$_TOTAL_FICHIERS = $zip_info['files'];
echo('<p>_Installation en cours...</p><hr/>');
echo('<p>_Copie des fichiers</p>');
$zipHandle = zip_open('TELECHARGEMENTS/last_version.zip');
file_put_contents('TELECHARGEMENTS/progress.json',json_encode(array('percentComplete'=>'0','fichier'=>'...')));
while ($aF = zip_read($zipHandle) ) 
	{
		//sleep(1);
		$thisFileName = zip_entry_name($aF);
		$thisFileDir = dirname($thisFileName);
		//Continue if its not a file
		if ( substr($thisFileName,-1,1) == '/') continue;
		//Make the directory if we need to...
		if ( !is_dir ( ''.$thisFileDir ) )
			{
				if(file_exists(''.$thisFileDir)){}else{
				mkdir ( ''.$thisFileDir );
				echo('<p>Dir : '.$thisFileDir.' : OK</p>');
				}
			}
					
		//Overwrite the file
		if ( !is_dir(''.$thisFileName) )
		{
		$_TOTAL_ENCOURS++;
		file_put_contents('TELECHARGEMENTS/progress.json',json_encode(array('percentComplete'=>round($_TOTAL_ENCOURS/$_TOTAL_FICHIERS,2),'fichier'=>$thisFileName)));
		echo('<p>'.$thisFileName.'');
		$contents = zip_entry_read($aF, zip_entry_filesize($aF));
		$contents = str_replace("\r\n", "\n", $contents);
		$updateThis = '';

		//If we need to run commands, then do it.
		if ( $thisFileName == 'upgrade.php' )
			{
				$upgradeExec = fopen ('upgrade.php','w');
				fwrite($upgradeExec, $contents);
				fclose($upgradeExec);
				include ('upgrade.php');
				unlink('upgrade.php');
				echo(': Script correctement exécuté</p>');
				$nbfichier++;
			}
			else
			{
				$updateThis = fopen(''.$thisFileName, 'w');
				fwrite($updateThis, $contents);
				fclose($updateThis);
				unset($contents);
				echo(': OK</p>');
				$nbfichier++;
			}
		}
	}
$zipHandle = zip_close('TELECHARGEMENTS/last_version.zip');
echo ('<code>Nombre de fichiers mis à jour : '.$nbfichier.'</code>');
chmod('TELECHARGEMENTS/'.$new_version.'.zip',0777);
array_map('unlink', glob("TELECHARGEMENTS/*.zip/"));
file_put_contents('TELECHARGEMENTS/progress.json',json_encode(array('percentComplete'=>'1','fichier'=>$nbfichier)));	
}


///function zip
function zipFileErrMsg($errno) {
  // using constant name as a string to make this function PHP4 compatible
  $zipFileFunctionsErrors = array(
    'ZIPARCHIVE::ER_MULTIDISK' => 'Multi-disk zip archives not supported.',
    'ZIPARCHIVE::ER_RENAME' => 'Renaming temporary file failed.',
    'ZIPARCHIVE::ER_CLOSE' => 'Closing zip archive failed', 
    'ZIPARCHIVE::ER_SEEK' => 'Seek error',
    'ZIPARCHIVE::ER_READ' => 'Read error',
    'ZIPARCHIVE::ER_WRITE' => 'Write error',
    'ZIPARCHIVE::ER_CRC' => 'CRC error',
    'ZIPARCHIVE::ER_ZIPCLOSED' => 'Containing zip archive was closed',
    'ZIPARCHIVE::ER_NOENT' => 'No such file.',
    'ZIPARCHIVE::ER_EXISTS' => 'File already exists',
    'ZIPARCHIVE::ER_OPEN' => 'Can\'t open file', 
    'ZIPARCHIVE::ER_TMPOPEN' => 'Failure to create temporary file.', 
    'ZIPARCHIVE::ER_ZLIB' => 'Zlib error',
    'ZIPARCHIVE::ER_MEMORY' => 'Memory allocation failure', 
    'ZIPARCHIVE::ER_CHANGED' => 'Entry has been changed',
    'ZIPARCHIVE::ER_COMPNOTSUPP' => 'Compression method not supported.', 
    'ZIPARCHIVE::ER_EOF' => 'Premature EOF',
    'ZIPARCHIVE::ER_INVAL' => 'Invalid argument',
    'ZIPARCHIVE::ER_NOZIP' => 'Not a zip archive',
    'ZIPARCHIVE::ER_INTERNAL' => 'Internal error',
    'ZIPARCHIVE::ER_INCONS' => 'Zip archive inconsistent', 
    'ZIPARCHIVE::ER_REMOVE' => 'Can\'t remove file',
    'ZIPARCHIVE::ER_DELETED' => 'Entry has been deleted',
  );
  $errmsg = 'unknown';
  foreach ($zipFileFunctionsErrors as $constName => $errorMessage) {
    if (defined($constName) and constant($constName) === $errno) {
      return 'Zip File Function error: '.$errorMessage;
    }
  }
  return 'Zip File Function error: unknown';
}

function zip_info_generator($zip_file_name) {

    $zip = zip_open($zip_file_name);



    $folder_count   = 0;

    $file_count     = 0;

    $unzipped_size  = 0;

    $ext_array      = array ();

    $ext_count      = array ();



    if ($zip) {

        while ($zip_entry = zip_read($zip)) {

            if (is_dir(zip_entry_name($zip_entry))) {

                $folder_count++;

            }else {

                $file_count++;

            }

            $path_parts = pathinfo(zip_entry_name($zip_entry));



            $ext = strtolower(trim(isset ($path_parts['extension']) ? $path_parts['extension'] : ''));

            if($ext != '') {

                $ext_count[$ext]['count'] = isset ( $ext_count[$ext]['count']) ?  $ext_count[$ext]['count'] : 0;

                $ext_count[$ext]['count']++;

            }



            $unzipped_size = $unzipped_size + zip_entry_filesize($zip_entry);

        }

    }



    $zipped_size = get_file_size_unit(filesize($zip_file_name));

    $unzipped_size = get_file_size_unit($unzipped_size);



    $zip_info = array ("folders"=>$folder_count,

                       "files"=>$file_count,

                       "zipped_size"=>$zipped_size,

                       "unzipped_size"=>$unzipped_size,

                       "file_types"=>$ext_count

                    );



    zip_close($zip);



    return $zip_info ;

}



function get_file_size_unit($file_size){

    if($file_size/1024 < 1){

        return round($file_size,2)." Bytes";

    }else if($file_size/1024 >= 1 && $file_size/(1024*1024) < 1){

        return (round($file_size/1024,2))." KB";

    }else{

        return round($file_size/(1024*1024),2)." MB";

    }



}
?>


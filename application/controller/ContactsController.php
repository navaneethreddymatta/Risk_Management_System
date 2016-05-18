<?php
require_once 'application/model/ContactsService.php';

class ContactsController {
	private $contactsService = NULL;
	public function __construct() {
		$this->contactsService = new ContactsService();		
	}
	public function redirect($location) {
		header('Location: '.$location);
	}
	public function handleRequest() {
		$op = isset($_GET['op'])?$_GET['op']:NULL;
		try {
			if ( !$op || $op == 'default' || $op == 'login' ) {
				$this->showLogin();
			}
			elseif ( $op == 'logout' ) {
				$this->doLogout();
			}
			elseif ( $op == 'atHome' ) {
                $this->showHomePage();
            }
			elseif ( $op == 'atHome2' ) {
                $this->showAnalystPage();
            }
			elseif ( $op == 'getSettings' ) {
				$val = isset($_GET['val'])?  $_GET['val'] :NULL;			
				$source = isset($_GET['source'])?  $_GET['source'] :NULL;
                $this->getSettings($source,$val);
			}
			elseif ( $op == 'getCategoriesView' ) {
				$this->getCategoriesView();
			}
			elseif ( $op == 'getRisksView' ) {		
				$category = isset($_GET['category'])?  $_GET['category'] :NULL;			
				$this->getRisksView($category);
			}
			elseif ( $op == 'getMAView' ) {
				$ri = isset($_GET['ri'])?  $_GET['ri'] :NULL;
				$this->getMAView($ri);
			}
			elseif ( $op == 'setSelectedBusinessArea' ) {
				$ba = isset($_GET['ba'])?  $_GET['ba'] :NULL;
				$this->setSelectedBA($ba);
			}
			elseif ( $op == 'setRiskScore' ) {
				$ri = isset($_GET['ri'])?  $_GET['ri'] :NULL;
				$score = isset($_GET['score'])?  $_GET['score'] :NULL;
				$this->setRiskScore($ri,$score);
			}			
			else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    public function basePage() {
        include 'application/view/default.php';
    }
	public function showHomePage() {
		$errors = array();		
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if($_SESSION['user']->role!="1"){
			$this->redirect('index.php?op=logout');
		}
		$tab = 1;
		$formval = isset($_POST['val_form'])?   $_POST['val_form'] :NULL;
		if($formval == "ba"){			
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$description = isset($_POST['val_description'])?   $_POST['val_description'] :NULL;			
			$ba = $this->contactsService->setBusinessArea($id,$name,$description);
		}
		else if($formval == "category"){										
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$description = isset($_POST['val_description'])?   $_POST['val_description'] :NULL;			
			$category = $this->contactsService->setCategory($id,$name,$description);
			$tab = 2;
		}
		else if($formval == "risk"){
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$description = isset($_POST['val_description'])?   $_POST['val_description'] :NULL;			
			$category = isset($_POST['val_category'])?   $_POST['val_category'] :NULL;			
			$risk = $this->contactsService->setRisk($id,$name,$description,$category);
			$tab = 3;
		}
		else if($formval == "ma"){
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$description = isset($_POST['val_description'])?   $_POST['val_description'] :NULL;			
			$impReduction = isset($_POST['val_impReduction'])?   $_POST['val_impReduction'] :NULL;			
			$risk = $this->contactsService->setMitigatingAction($id,$name,$description,$impReduction);
			$tab = 4;
		}
		$bas = $this->contactsService->getBusinessAreas();
		$categories = $this->contactsService->getCategories();
		$risks = $this->contactsService->getRisks();
		$mas = $this->contactsService->getMitigatingActions();
		$numRI = $this->contactsService->getNumRIs();
		$numCriticalRI = $this->contactsService->getNumCriticalRIs();
		$criticalBA = $this->contactsService->getCriticalBA(); 
		$criticalCat = $this->contactsService->getCriticalCategory();
		include 'application/view/admin.php';
    }
	public function showAnalystPage() {
		$errors = array();			
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if($_SESSION['user']->role!="2"){
			$this->redirect('index.php?op=logout');
		}		
		$formval = isset($_POST['val_form'])?   $_POST['val_form'] :NULL;
		if($formval == "includedMAs"){
			$riID = isset($_POST['val_riskInstanceID'])?   $_POST['val_riskInstanceID'] :NULL;		
			$incMAs = $_POST['val_masIncluded'];
			$newMAs = array();
			foreach($incMAs as $incMA)
			{
				array_push($newMAs,$incMA);
			}
			$curIncMAs = $this->contactsService->getCurrentMAs($riID);
			$oldMAs = array();
			foreach($curIncMAs as $curIncMA)
			{
				array_push($oldMAs,$curIncMA->ma);
			}
			// Deleting the mas from old list
			foreach($oldMAs as $oldMA)
			{
				if(!(in_array($oldMA, $newMAs)))
				{
					$deleteMAs = $this->contactsService->deleteMAs($riID,$oldMA);
				}
			}
			// Inserting the mas to new list
			foreach($newMAs as $newMA)
			{
				if(!(in_array($newMA, $oldMAs)))
				{
					$insertMAs = $this->contactsService->insertMAs($riID,$newMA);
				}
			}
			
			$updateScore = $this->contactsService->updateRIScore($riID);
		}
		$cUser = $_SESSION['user']->id;
		//$cUser = 2;
		$currentUser = $this->contactsService->getUser($cUser);
		$bas = $this->contactsService->getBusinessAreas();
		$categories = $this->contactsService->getCategories();
		$numRI = $this->contactsService->getNumRIs();
		$numCriticalRI = $this->contactsService->getNumCriticalRIs();
		$criticalBA = $this->contactsService->getCriticalBA(); 
		$criticalCat = $this->contactsService->getCriticalCategory();
		include 'application/view/analyst.php';
    }
	public function getSettings($source,$val) {	
		$errors=array();	
		try{
			if($val==""){
				$settingFor=array();
			}
			else{
				$settingFor = $this->contactsService->getSettingsFor($source,$val); 
			}
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		if($source == "ba"){
			include 'application/view/formBA.php';
		}
		else if($source=="category"){
			include 'application/view/formCat.php';
		}
		else if($source=="risk"){
			$categories2 = $this->contactsService->getCategories();
			include 'application/view/formRisk.php';
		}
		else if($source=="ma"){
			include 'application/view/formMA.php';
		}			
		else{
			include 'application/view/form.php';
		}
    } 
	public function getCategoriesView() {	
		$categories = $this->contactsService->getCategories();
		include 'application/view/categoryTableView.php';
    }
	public function getRisksView($category) {	
		session_start();
		$cUser = $_SESSION['user']->id;
		//$cUser = 2;
		$currentUser = $this->contactsService->getUser($cUser);
		$selBA = $currentUser->selectedBA;
		$risks = $this->contactsService->getRiskInstances($selBA,$category);
		include 'application/view/riskTableView.php';
    }	
	public function getMAView($ri) {
		$mas = $this->contactsService->getSelectedMitigatingActions($ri);
		$rInstScore = $this->contactsService->getRiskInstScore($ri);
		$selectedRI = $ri;
		include 'application/view/maTableView.php';
    }
	public function setSelectedBA($ba) {
		session_start();
		$cUser = $_SESSION['user']->id;
		//$cUser = 2;
		$ba = $this->contactsService->setSelectedBA($ba,$cUser);
    }
	public function setRiskScore($ri,$score) {
		$updScore = $this->contactsService->setRiskScore($ri,$score);
		echo $updScore;
    }	 
	public function showLogin() {
		$email = '';
		$password='';
		$err=isset($_GET['errId'])?   $_GET['errId'] :NULL;
		if($err ==1){
			$error='Incorrect username or password';
		}
		else{
			$error='';
		}
		if ( isset($_POST['form-submitted']) ) {
			$email = isset($_POST['login-email'])?   $_POST['login-email'] :NULL;
			$password = isset($_POST['login-password'])?   $_POST['login-password'] :NULL;
			try {
				$res = $this->contactsService->checkCredentials($email,$password);
				if($res->role=="1"){
					$this->redirect('index.php?op=atHome');
					session_start();
					$_SESSION['user']=$res;
				}
				else if($res->role=='2'){
					echo "---------------";
					$this->redirect('index.php?op=atHome2');
					session_start();
					$_SESSION['user']=$res;
				}
				else {
					$this->redirect('index.php?op=login&errId=1');
				}				
				return $res;
			} catch (ValidationException $e) {
			$errors = $e->getErrors();
			}
		}
		include 'application/view/login.php';
	}
	public function doLogout() {
		$email = '';
		$password='';
	    $errors = array();
		$error='';
		session_start();
		$_SESSION['user']=NULL;
		session_destroy();
        include 'application/view/login.php';
	}
}
?>
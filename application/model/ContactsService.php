<?php
require_once 'application/model/ContactsGateway.php';
require_once 'application/model/ValidationException.php';
class ContactsService {
    private $contactsGateway    = NULL;
    private function openDb() {
        if (!mysql_connect("localhost", "root", "nava")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("rms")) {
            throw new Exception("No recruitment database found on database server.");
        }
    }
    private function closeDb() {
        mysql_close();
    }
    public function __construct() {
        $this->contactsGateway = new ContactsGateway();
    }
	public function getSettingsFor($source,$val){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getSettingsFor($source,$val);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    public function getBusinessAreas() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getBusinessAreas();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function setBusinessArea($id,$name,$description){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setBusinessArea($id,$name,$description);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getCategories() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getCategories();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function setCategory($id,$name,$description){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setCategory($id,$name,$description);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getRisks() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getRisks();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function setRisk($id,$name,$description,$category){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setRisk($id,$name,$description,$category);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function getMitigatingActions(){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getMitigatingActions();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setMitigatingAction($id,$name,$description,$impReduction){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setMitigatingAction($id,$name,$description,$impReduction);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getUser($cUser){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getUser($cUser);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getRiskInstances($selBA,$category){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getRiskInstances($selBA,$category);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getSelectedMitigatingActions($ri){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getSelectedMitigatingActions($ri);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setSelectedBA($ba,$user){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setSelectedBA($ba,$user);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getRiskInstScore($ri){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getRiskInstScore($ri);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function setRiskScore($ri,$score){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setRiskScore($ri,$score);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function getCurrentMAs($riID){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getCurrentMAs($riID);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function deleteMAs($riID,$oldMA){
        try {
            $this->openDb();
            $res = $this->contactsGateway->deleteMAs($riID,$oldMA);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function insertMAs($riID,$newMA){
        try {
            $this->openDb();
            $res = $this->contactsGateway->insertMAs($riID,$newMA);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function updateRIScore($riID){
        try {
            $this->openDb();
            $res = $this->contactsGateway->updateRIScore($riID);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function checkCredentials($email,$password){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->checkCredentials($email,$password);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}	
	public function getNumRIs(){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->getNumRIs();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}	
	public function getNumCriticalRIs(){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->getNumCriticalRIs();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}	
	public function getCriticalBA(){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->getCriticalBA();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}	
	public function getCriticalCategory(){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->getCriticalCategory();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
}
?>
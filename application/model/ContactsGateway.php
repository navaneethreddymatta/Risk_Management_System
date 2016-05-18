<?php

/**
 * Table data gateway.
 * 
 *  OK I'm using old MySQL driver, so kill me ...
 *  This will do for simple apps but for serious apps you should use PDO.
 */
class ContactsGateway {
	public function getSettingsFor($source,$val) {
		$dbId = mysql_real_escape_string($val);
		if($source=="ba"){
			$dbres = mysql_query("SELECT * FROM bas WHERE id=$dbId");
		}
		if($source=="category"){
			$dbres = mysql_query("SELECT * from categories WHERE id=$dbId");
		}
		if($source=="risk"){
			$dbres = mysql_query("SELECT * FROM risks WHERE id=$dbId");
		}
		if($source=="ma"){
			$dbres = mysql_query("SELECT * FROM mas WHERE id=$dbId");
		}	
		return mysql_fetch_object($dbres);
	}
	public function getBusinessAreas() {		
		$dbres = mysql_query("SELECT  * from bas");
		$bas = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$bas[] = $obj;			
		}
		return $bas;
	}
	public function setBusinessArea($id,$name,$description){
        $dbName = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
		$dbDescription = ($description != NULL)?"'".mysql_real_escape_string($description)."'":'NULL';        		
		if($id=="" || $id==NULL){			
			mysql_query("INSERT INTO bas (name,description) VALUES ($dbName,$dbDescription)");		
			$baId = mysql_insert_id();
			/* Create Risk Instances */
			$risks = $this->getRisks();			
			foreach($risks as $risk){
				$category = $risk->category;
				$riskId = $risk->id;
				mysql_query("INSERT INTO riskinstances (ba, category, risk) VALUES ($baId,$category,$riskId)");								
			}
			/* Done Creating Risk Instances */
		}
		else{
			mysql_query("UPDATE bas SET name=$dbName , description=$dbDescription WHERE id=$id");
		}		
		$val = 1;
        return $val;
    }
	public function getCategories() {		
		$dbres = mysql_query("SELECT  * from categories");
		$categories = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$categories[] = $obj;			
		}
		return $categories;
	}
	public function setCategory($id,$name,$description){
        $dbName = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
		$dbDescription = ($description != NULL)?"'".mysql_real_escape_string($description)."'":'NULL';        		
		if($id=="" || $id==NULL){			
			mysql_query("INSERT INTO categories (name,description) VALUES ($dbName,$dbDescription)");			
		}
		else{
			mysql_query("UPDATE categories SET name=$dbName , description=$dbDescription WHERE id=$id");
		}		
		$val = 1;
        return $val;
    }
	public function getRisks() {		
		$dbres = mysql_query("SELECT  r.id as id, r.name as name, r.description as description,r.category as category, k.name as categoryName from risks r,categories k where r.category = k.id");
		$risks = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$risks[] = $obj;			
		}
		return $risks;
	}
	public function setRisk($id,$name,$description,$category){
        $dbName = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
		$dbDescription = ($description != NULL)?"'".mysql_real_escape_string($description)."'":'NULL';        		
		if($id=="" || $id==NULL){			
			mysql_query("INSERT INTO risks (name,description,category) VALUES ($dbName,$dbDescription,$category)");		
			/* Create Risk Instances */
			$riskId = mysql_insert_id();
			$bas = $this->getBusinessAreas();
			foreach($bas as $ba){
				$baId = $ba->id;
				mysql_query("INSERT INTO riskinstances (ba, category, risk) VALUES ($baId,$category,$riskId)");
			}
			/* Done creating Risk Instances */
		}
		else{
			mysql_query("UPDATE risks SET name=$dbName , description=$dbDescription, category=$category WHERE id=$id");
		}		
		$val = 1;
        return $val;
    }
	public function getMitigatingActions() {		
		$dbres = mysql_query("SELECT * from mas");
		$mas = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$mas[] = $obj;			
		}
		return $mas;
	}
	public function setMitigatingAction($id,$name,$description,$impReduction){
        $dbName = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
		$dbDescription = ($description != NULL)?"'".mysql_real_escape_string($description)."'":'NULL';        		
		if($id=="" || $id==NULL){			
			mysql_query("INSERT INTO mas (name,description,impReduction) VALUES ($dbName,$dbDescription,$impReduction)");			
		}
		else{
			mysql_query("UPDATE mas SET name=$dbName , description=$dbDescription, impReduction=$impReduction WHERE id=$id");
		}		
		$val = 1;
        return $val;
    }
	public function getUser($cUser){
        $dbres = mysql_query("SELECT * from people where id=$cUser");
		$people = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$people[] = $obj;			
		}
		if(count($people) == 0){
			return -1;
		}
		return $people[0];
    }
	public function getRiskInstances($selBA,$category){		
        $dbres = mysql_query("SELECT ri.id as id,ri.ba as ba,ri.category as category,ri.risk as risk,ri.score as score,ri.netScore as netScore,r.name as riskName from riskinstances ri, risks r where ri.ba=$selBA and ri.category=$category and ri.risk=r.id");		
		$riskInst = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$riskInst[] = $obj;			
		}
		return $riskInst;
    }
	public function getSelectedMitigatingActions($ri) {			
		$dbres = mysql_query("SELECT distinct m.*,(select count(*) from riskinstmas r where r.ri= $ri and r.ma=m.id) as cnt from mas m");
		$mas = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$mas[] = $obj;			
		}
		return $mas;
	}
	public function setSelectedBA($ba,$user) {		
		$dbres = mysql_query("UPDATE people SET selectedBA = $ba WHERE id=$user");
		return 1;
	}
	public function getRiskInstScore($ri) {		
		$dbres = mysql_query("select * from riskinstances where id=$ri");
		$riskInst = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$riskInst[] = $obj;			
		}
		return $riskInst[0]->score;
	}
	public function setRiskScore($ri,$score) {		
		$dbres = mysql_query("UPDATE riskinstances SET score = $score WHERE id=$ri");
		$updateScore = $this->updateRIScore($ri);
		return $updateScore;
	}
	public function getCurrentMAs($riID) {	
		$dbres = mysql_query("SELECT * from riskinstmas WHERE ri=$riID");
		$riskInstmas = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$riskInstmas[] = $obj;			
		}
		return $riskInstmas;
	}
	public function deleteMAs($riID,$oldMA) {
		$dbres = mysql_query("DELETE from riskinstmas where ri=$riID and ma=$oldMA");
		return 1;
	}
	public function insertMAs($riID,$newMA) {	
		$dbres = mysql_query("INSERT into riskinstmas (ri,ma) values ($riID,$newMA)");
		return 1;
	}
	public function updateRIScore($riID) {	
		$dbres = mysql_query("select r.*,m.impReduction as impReduction from riskinstmas r,mas m where r.ri=$riID and r.ma=m.id");
		$riskInstmas = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$riskInstmas[] = $obj;			
		}
		$dbres2 = mysql_query("select * from riskinstances where id=$riID");
		$ris = array();
		while ( ($obj2 = mysql_fetch_object($dbres2)) != NULL ) {
			$ris[] = $obj2;			
		}
		$ri = $ris[0];
		$gScore = $ri->score;
		foreach($riskInstmas as $riskInstma){
			$impReduction = $riskInstma->impReduction;
			$gScore = ($gScore * (100 - $impReduction)) / 100;
		}
		$dbres3 = mysql_query("UPDATE riskinstances SET netScore=$gScore where id=$riID");
		return $gScore;
	}
	public function checkCredentials($email,$password) {
		$dbEmail = "'".mysql_real_escape_string($email)."'";
		$dbPassword = "'".mysql_real_escape_string($password)."'";
		$dbres = mysql_query("SELECT * FROM people WHERE username=$dbEmail and password=$dbPassword");
		return mysql_fetch_object($dbres);
	}
	public function getNumRIs() {
		$dbres = mysql_query("SELECT * FROM riskinstances;");
		$num = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$num[] = $obj;			
		}
		return count($num);
	}
	public function getNumCriticalRIs() {
		$dbres = mysql_query("SELECT * FROM riskinstances where netScore>=80;");
		$num = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$num[] = $obj;			
		}
		return count($num);
	}
	public function getCriticalBA() {
		$dbres = mysql_query("SELECT COUNT(ri.id), ba.name FROM riskinstances ri,bas ba where ri.ba=ba.id GROUP BY ba ORDER BY count(ri.id) DESC");
		$ba = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$ba[] = $obj;			
		}
		if(count($ba) > 0){
			return $ba[0]->name;
		}
		else{
			return "-";
		}
	}
	public function getCriticalCategory() {
		$dbres = mysql_query("SELECT COUNT(ri.id), cat.name FROM riskinstances ri,categories cat where ri.category=cat.id GROUP BY category ORDER BY count(ri.id) DESC");
		$cat = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$cat[] = $obj;			
		}
		if(count($cat) > 0){
			return $cat[0]->name;
		}
		else{
			return "-";
		}
	}
}
?>
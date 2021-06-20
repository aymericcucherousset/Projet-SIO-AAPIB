<?php
session_start();
// $erreur = "vrai";
if (!empty($_POST["username"]) && !empty($_POST["password"]) ) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
	var_dump($POST);
   
}
	//Error Checking
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	//Set User domain extention
	$LDAPUserDomain = "@AAPIB.LOCAL";  //Needs the @, but not always the same as the LDAP server domain
	if(isset($_POST['password'])){
	/**************************************************
	 Bind to an Active Directory LDAP server and look
	 something up.
	 ***************************************************/
	$SearchFor=htmlspecialchars($_POST['username']);		//What string do you want to find?
	$SearchField="samaccountname";			//In what Active Directory field do you want to search for the string?
	$LDAPHost = $ip_ad;		//Your LDAP server DNS Name or IP Address
	$dn = "DC=AAPIB,DC=LOCAL";		//Put your Base DN here
	$LDAPUser = htmlspecialchars($_POST['username']);		//A valid Active Directory login
	$LDAPUserPassword = htmlspecialchars($_POST['password']);
	$LDAPFieldsToFind = array("*");		//Search Felids, Wildcard Supported for returning all values

	$cnx = ldap_connect($LDAPHost) or die("Could not connect to LDAP");
	ldap_set_option($cnx, LDAP_OPT_PROTOCOL_VERSION, 3);	//Set the LDAP Protocol used by your AD service
	ldap_set_option($cnx, LDAP_OPT_REFERRALS, 0);		//This was necessary for my AD to do anything
	// ldap_bind($cnx,$LDAPUser.$LDAPUserDomain,$LDAPUserPassword) or die("Could not bind to LDAP");
	if (ldap_bind($cnx,$LDAPUser.$LDAPUserDomain,$LDAPUserPassword)) {

		error_reporting (E_ALL ^ E_NOTICE);			//Suppress some unnecessary messages

		$filter="($SearchField=$SearchFor*)";	//Wildcard is * Remove it if you want an exact match
		$sr=ldap_search($cnx, $dn, $filter, $LDAPFieldsToFind);
		$info = ldap_get_entries($cnx, $sr);
		
		echo"<pre>";
		for ($x=0; $x<$info["count"]; $x++) {

			//print_r($info[$x]);
			echo "Name: " .$info[$x]['cn'][0]."<br/>";
			echo "Windows Login: " .$info[$x]['samaccountname'][0]."<br/>";
			// $nom = $info[$x]['sn'][0];
			$cn = explode(" ", $info[$x]['cn'][0]);
			$nom = $cn[0];
			$prenom = $cn[1];
			echo "nom : " . $nom ."<br/>";
			echo "prenom : " . $prenom ."<br/>";
			// echo "Extention: " .$info[$x]['telephonenumber'][0]."<br/>";
			// echo "Email: " .$info[$x]['mail'][0]."<br/>";
			// echo "Office: " .$info[$x]['physicaldeliveryofficename'][0]."<br/>";
			// echo "Main System UID: " .$info[$x]['description'][0]."<br/>";
			// echo "Job Title: " .$info[$x]['title'][0]."<br/>";
			// echo "Department: " .$info[$x]['department'][0]."<br/>";
			// $info[$x]['manager'][0] = explode(",",$info[$x]['manager'][0]);
			// $info[$x]['manager'][0] = str_replace('CN=','',$info[$x]['manager'][0][0]);
			// echo "Line Manager: " .$info[$x]['manager'][0]."<br/>";
			// echo "Company: " .$info[$x]['company'][0]."<br/>";
			$groups = array();
			if($info[$x]['memberof']['count'] != 0){
				foreach($info[$x]['memberof'] as $key){
					$key = explode(",",$key);
					$key = str_replace('CN=','',$key[0]);
					array_push($groups, $key);
					echo "Member of: " .$key."<br/>";
				}
			}
			echo "\n\n";
		}
		echo"</pre>";
		
		if ($x==0) {
			print "Oops, was not found. Please try again.\n";
		}

        $_SESSION['id'] =  getUserId($nom, $prenom);
        $_SESSION['username'] = $username;
        $_SESSION['groups'] = $groups;
		
        header("Location: index.php?url=nouveautes");
    }else {
		header("Location: index.php?url=connexion&error=1");
        
    }
	
}
?>
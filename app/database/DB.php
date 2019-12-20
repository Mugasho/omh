<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/9/2019
 * Time: 10:42 PM
 */

namespace omh\database;


class DB {
	public $mysqli;
	public $pageError;
	public $db_user = '';
	public $last_id;
	public $userID=0;

	/**
	 * DB constructor.
	 */
	public function __construct() {
		$mysqli = new \mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE ) or die( "Cannot connect to " . DB_DATABASE . " at " . DB_HOST );
		$this->mysqli = $mysqli;
		$this->generateDBTables();
		return $mysqli;
	}

	public function connect() {
		$this->mysqli->prepare();
	}

	/**
	 *Auto generate database tables
	 */
	public function generateDBTables() {

		$this->mysqli->query( "CREATE TABLE IF NOT EXISTS users(id INT(11) PRIMARY KEY AUTO_INCREMENT,
        unique_id VARCHAR(23) NOT NULL UNIQUE,username VARCHAR(100) NOT NULL UNIQUE,email VARCHAR(100) NOT NULL UNIQUE,
        encrypted_password VARCHAR(200) NOT NULL,salt VARCHAR(10) NOT NULL,created_at TIMESTAMP DEFAULT NOW(),updated_at TIMESTAMP ,
        status INT(1) DEFAULT '0' ,role INT (8) DEFAULT 0 )" );

		$this->mysqli->query( '
CREATE TABLE IF NOT EXISTS assets (
  id INT(11) NOT NULL AUTO_INCREMENT,
  asset_type_id INT(11) DEFAULT NULL,
  asset_name VARCHAR(100),
  purchase_date VARCHAR(10)  DEFAULT NULL,
  purchase_price INT(10) DEFAULT NULL,
  replacement_value INT(10) DEFAULT NULL,
  replacement_date VARCHAR(10)  DEFAULT NULL,
  serial_number VARCHAR(100),
  supplier_id INT(11),
  notes TEXT,
  file_id INT(11),
  user_id INT(11) NOT NULL DEFAULT 0, 
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP,
  dept_id INT(11) ,PRIMARY KEY (id)) ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS asset_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  asset_name VARCHAR(200) NOT NULL UNIQUE ,
  asset_category VARCHAR(200) NOT NULL ,
  asset_description TEXT,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE asset_valuations (
  id INT(10) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  asset_id INT(11) DEFAULT NULL,
  date_valued VARCHAR(30) DEFAULT NULL,
  amount INT(15) DEFAULT NULL,
  user_id INT(11) NOT NULL DEFAULT 0, 
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP , 
  FOREIGN KEY (asset_id) REFERENCES assets(id) ON DELETE CASCADE,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS departments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  department VARCHAR(200) NOT NULL UNIQUE ,
  hod VARCHAR(200) DEFAULT NULL ,
  description TEXT,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS expenses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  expense_type_id INT(11) NOT NULL , 
  expense_description  VARCHAR(500),
  amount INT(11),
  expense_date DATE,
  recurring INT(2) DEFAULT 0,
  recur_frequency INT(11) DEFAULT NULL ,
  recur_type VARCHAR(10) DEFAULT NULL ,
  recur_start_date DATE DEFAULT NULL ,
  recur_end_date DATE DEFAULT NULL ,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS expense_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  expense_type VARCHAR(200) NOT NULL UNIQUE ,
  expense_description TEXT,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS ledgers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  staff_id INT(11) NOT NULL ,  
  ledger_no VARCHAR(50) NOT NULL UNIQUE ,  
  balance INT(11) DEFAULT 0,  
  ledger_description  VARCHAR(500),
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS ledger_fees (
  id INT(11) NOT NULL AUTO_INCREMENT,
  ledger_fee VARCHAR(200) NOT NULL UNIQUE ,
  fee_action VARCHAR(10) NOT NULL DEFAULT 0,
  fee_description VARCHAR(200),
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS ledger_transactions (
  id INT(11) NOT NULL AUTO_INCREMENT,
  staff_id INT(11) NOT NULL , 
  ledger_id INT(11) NOT NULL , 
  t_amount INT(11) NOT NULL , 
  t_type  VARCHAR(20),
  t_date VARCHAR(20) ,
  t_time  VARCHAR(30) DEFAULT NULL,
  t_notes  VARCHAR(500) ,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  FOREIGN KEY (ledger_id) REFERENCES ledgers(id) ON DELETE CASCADE,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS drug_ledgers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  drug_id INT(11) NOT NULL UNIQUE ,  
  balance INT(11) DEFAULT 0,  
  ledger_description  VARCHAR(500),
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );



		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS patients(id INT(11) NOT NULL AUTO_INCREMENT,
patient_id VARCHAR(50) NOT NULL UNIQUE,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100),sex VARCHAR(8),
address VARCHAR(200),city VARCHAR(100),
country VARCHAR(100),division VARCHAR(100),
village VARCHAR(100),
phone VARCHAR(100),email VARCHAR(200),
dob VARCHAR(50),
profile_pic VARCHAR(200),
user_id INT(11) NOT NULL DEFAULT 0, 
date_added DATETIME DEFAULT NOW(),
updated_at TIMESTAMP ,
PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS visits (
  id INT(11) NOT NULL AUTO_INCREMENT,
  category INT(11) NOT NULL DEFAULT 0,
  patient_id INT(11) NOT NULL,
  visit_no VARCHAR(20) UNIQUE ,
  department VARCHAR(11),
  doctor VARCHAR(11),
  care VARCHAR(10),
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_closed TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS patient_notes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  patient_id INT(11) NOT NULL,
  visit_id INT(11) NOT NULL ,
  notes VARCHAR(1000),
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (visit_id) REFERENCES visits(id) ON DELETE CASCADE,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS procedures (
  id INT(11) NOT NULL AUTO_INCREMENT,
  parent_test VARCHAR(200),
  child_test VARCHAR(200) NOT NULL UNIQUE ,
  price INT(11),
  description TEXT,
  user_id INT(11) NOT NULL DEFAULT 0, 
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP ,
  PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS uploads(id INT(11) NOT NULL AUTO_INCREMENT, 
patient_id INT(11) NOT NULL ,
review_id INT(11)NOT NULL,file_size VARCHAR(100),file_name VARCHAR(200) UNIQUE,
file_link TEXT,
status INT(2) DEFAULT 0,
user_id INT(11) NOT NULL DEFAULT 0, 
date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP ,
PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE lab_requests (
  id INT(11) NOT NULL AUTO_INCREMENT,
  patient_id INT(11) NOT NULL,
  visit_id INT(11) NOT NULL,
  department_id INT(11) NOT NULL,
  test_id INT(11) NOT NULL,
  specimen VARCHAR(100),
  request_notes TEXT DEFAULT NULL,
  result_notes TEXT DEFAULT NULL,
user_id INT(11) NOT NULL DEFAULT 0, 
date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP ,
FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS db_options(id INT(11) NOT NULL AUTO_INCREMENT,
setting VARCHAR(100) NOT NULL UNIQUE ,setting_value TEXT,PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS reviews(id INT(11) NOT NULL AUTO_INCREMENT,
patient_id INT(11)NOT NULL, dept_id VARCHAR(11),primary_condition TEXT,secondary_condition TEXT,PRIMARY KEY (id))
ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS blog (id INT(11) NOT NULL AUTO_INCREMENT,
                                      title VARCHAR(300) NOT NULL, 
                                      content TEXT NOT NULL, 
                                      status INT(11) NOT NULL DEFAULT 1,
                                      blog_pic VARCHAR(200),
                                      category INT(11) NOT NULL DEFAULT 0,
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS post_categories (id INT(11) NOT NULL AUTO_INCREMENT,
                                      category VARCHAR(300) NOT NULL, 
                                      description TEXT , 
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS posts (id INT(11) NOT NULL AUTO_INCREMENT,
                                      title VARCHAR(300) NOT NULL, 
                                      content TEXT NOT NULL, 
                                      status INT(11) NOT NULL DEFAULT 1,
                                      blog_pic VARCHAR(200),
                                      category INT(11) NOT NULL DEFAULT 0,
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,
                                      PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS mails (id INT(11) NOT NULL AUTO_INCREMENT,
                                      title VARCHAR(500) NOT NULL, 
                                      sender VARCHAR(500), 
                                      receiver VARCHAR(500) , 
                                      content VARCHAR(2000), 
                                      status INT(11) NOT NULL DEFAULT 1,
                                      attachments VARCHAR(200),
                                      category INT(11) NOT NULL DEFAULT 0,
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,
                                      PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );


		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS health_workers (id INT(11) NOT NULL AUTO_INCREMENT,
                                      surname VARCHAR(50) NOT NULL, 
                                      first_name VARCHAR(50) NOT NULL, 
                                      other_names VARCHAR(50) NOT NULL, 
                                      title VARCHAR(50),
                                      email VARCHAR(50),
                                      phone VARCHAR(50),
                                      address VARCHAR(100),
                                      reg_no VARCHAR(50),
                                      nationality VARCHAR(200),
                                      profile_pic VARCHAR(200),
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,
                                      PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query('CREATE TABLE  IF NOT EXISTS drugs (id int(11) NOT NULL AUTO_INCREMENT,
        nda_registration_no varchar(16) DEFAULT NULL,
        license_holder varchar(81) DEFAULT NULL,
        local_technical_representative varchar(46) DEFAULT NULL,
        name_of_drug varchar(85) DEFAULT NULL,
        generic_name_of_drug varchar(199) DEFAULT NULL,
        strength_of_drug varchar(101) DEFAULT NULL,
        manufacturer varchar(255) DEFAULT NULL,
        country_of_manufacture varchar(20) DEFAULT NULL,
        dosage_form varchar(54) DEFAULT NULL,
        pack_size varchar(255) DEFAULT NULL, PRIMARY KEY (id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );

		$this->mysqli->query( 'CREATE TABLE IF NOT EXISTS prescriptions (id INT(11) NOT NULL AUTO_INCREMENT,
                                      patient_id INT(11) NOT NULL, 
                                      visit_id INT(11) NOT NULL, 
                                      drug_id INT(11), 
                                      times INT(11), 
                                      days INT(11) ,
                                      period INT(11) ,
                                      qty VARCHAR(11),
                                      user_id INT(11) NOT NULL DEFAULT 0, 
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                      updated_at TIMESTAMP ,
                                      FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  									  FOREIGN KEY (visit_id) REFERENCES visits(id) ON DELETE CASCADE,
                                      PRIMARY KEY(id))ENGINE=' . DB_ENGINE . ' DEFAULT CHARSET=' . DB_CHARSET );
	}

	/**
	 * Storing new user
	 * returns user details
	 *
	 * @param $username
	 * @param $email
	 * @param $password
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function storeUser( $username, $email, $password ) {
		$uuid               = $this->getUUID();
		$hash               = $this->hashSSHA( $password );
		$encrypted_password = $hash["encrypted"]; // encrypted password
		$salt               = $hash["salt"]; // salt

		$stmt = $this->mysqli->prepare( "INSERT INTO users(unique_id, username, email,encrypted_password, salt, created_at) VALUES(?, ?, ?,?, ?, NOW())" );
		$stmt->bind_param( "sssss", $uuid, $username, $email, $encrypted_password, $salt );
		$result = $stmt->execute();
		// check for successful store
		if ( $result ) {
			$this->last_id = $this->mysqli->insert_id;
			$results       = $this->mysqli->query( "SELECT * FROM users WHERE email ='" . $email . "'" );
			$user          = $results->fetch_assoc();
			$stmt->close();
		}
		if ( ! empty( $user ) ) {
			return $user;
		}
	}

	/**
	 * Get user by email and password
	 *
	 * @param $email
	 * @param $password
	 *
	 * @return null
	 */
	public function getUserByEmailAndPassword( $email, $password ) {
		$user    = null;
		$results = $this->mysqli->query( "SELECT * FROM users WHERE email ='" . $email . "'" );
		$user    = $results->fetch_assoc();
		if ( ! is_null( $user ) ) {

			$results->close();

			// verifying user password
			$salt               = $user['salt'];
			$encrypted_password = $user['encrypted_password'];
			$hash               = $this->checkHashSSHA( $salt, $password );
			// check for password equality
			if ( $encrypted_password == $hash ) {
				// user authentication details are correct
				// Get the user-agent string of the user.
				$user_browser = $_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT'];
				// XSS protection as we might print this value

				$user_id             = $user['unique_id'];
				$_SESSION['id']      = $user['id'];
				$_SESSION['user_id'] = $user_id;
				// XSS protection as we might print this value
				$username                 = preg_replace( "/[^a-zA-Z0-9_\-]+/", " ", $user['username'] );
				$_SESSION['timestamp']    = time();
				$_SESSION['username']     = $username;
				$_SESSION['login_string'] = hash( 'sha512',
					$user['encrypted_password'] . $user_browser );
				$user['token']            = $_SESSION['login_string'];

				return $user;
			}
		} else {
			return null;
		}
	}

	/**
	 * Check if user is exists
	 *
	 * @param $email
	 *
	 * @return bool
	 */
	public function isUserExisted( $email ) {
		$stmt = $this->mysqli->prepare( "SELECT email FROM users WHERE email = ?" );

		$stmt->bind_param( "s", $email );

		$stmt->execute();

		$stmt->store_result();

		if ( $stmt->num_rows > 0 ) {
			// user existed
			$stmt->close();

			return true;
		} else {
			// user not existed
			$stmt->close();

			return false;
		}
	}

	/**
	 * Encrypting password
	 *
	 * @param password
	 * returns salt and encrypted password
	 *
	 * @return array
	 */
	public function hashSSHA( $password ) {

		$salt      = sha1( rand() );
		$salt      = substr( $salt, 0, 10 );
		$encrypted = base64_encode( sha1( $password . $salt, true ) . $salt );
		$hash      = array( "salt" => $salt, "encrypted" => $encrypted );

		return $hash;
	}

	/**
	 * Decrypting password
	 *
	 * @param $salt
	 * @param $password
	 *
	 * @return string
	 * @internal param $salt , password
	 * returns hash string
	 */
	public function checkHashSSHA( $salt, $password ) {

		$hash = base64_encode( sha1( $password . $salt, true ) . $salt );

		return $hash;
	}

	/**
	 * Generate a unique user id
	 *
	 * @param int $length
	 *
	 * @return bool|string
	 * @throws \Exception
	 */
	function getUUID( $length = 15 ) {
		// 15 digit Cryptographically Secure Pseudo-random Number
		if ( function_exists( "random_bytes" ) ) {
			$bytes = random_bytes( ceil( $length / 2 ) );
		} elseif ( function_exists( "openssl_random_pseudo_bytes" ) ) {
			$bytes = openssl_random_pseudo_bytes( ceil( $length / 2 ) );
		} else {
			$bytes = uniqid( '', true );
		}

		return substr( bin2hex( $bytes ), 0, $length );
	}

	/**
	 *Starts a php session
	 */
	function start_session() {
		$session_name = 'omh_session_id';   // Set a custom session name
		/*Sets the session name.
		 *This must come before session_set_cookie_params due to an undocumented bug/feature in PHP.
		 */
		session_name( $session_name );

		$secure = true;
		// This stops JavaScript being able to access the session id.
		$httponly = true;
		// Forces sessions to only use cookies.
		if ( ini_set( 'session.use_only_cookies', 1 ) === false ) {
			header( "Location: ../error.php?err=Could not initiate a safe session (ini_set)" );
			exit();
		}
		// Gets current cookies params.
		$cookieParams = session_get_cookie_params();
		/*session_set_cookie_params($cookieParams["lifetime"],
			$cookieParams["path"],
			$cookieParams["domain"],
			$secure,
			$httponly);*/

		session_start();            // Start the PHP session
		session_regenerate_id( true );    // regenerated the session, delete the old one.
	}

	/**
	 * Check whether user is logged in
	 *
	 * @param $uid
	 * @param $token
	 * @param $browser
	 *
	 * @return bool
	 */
	function login_check( $uid, $token, $browser ) {
		// Check if all session variables are set
		if ( ! empty( $token ) ) {

			$user_id      = $uid;
			$login_string = $token;
			// Get the user-agent string of the user.
			$user_browser = $browser;

			if ( $stmt = $this->mysqli->prepare( "SELECT encrypted_password 
                                      FROM users 
                                      WHERE unique_id = ? LIMIT 1" ) ) {
				// Bind "$user_id" to parameter.
				$stmt->bind_param( 's', $user_id );
				$stmt->execute();   // Execute the prepared query.
				$stmt->store_result();

				if ( $stmt->num_rows == 1 ) {
					// If the user exists get variables from result.
					$stmt->bind_result( $password );
					$stmt->fetch();
					$login_check = hash( 'sha512', $password . $user_browser );


					if ( hash_equals( $login_check, $login_string ) ) {
						// Logged In!!!!
						return true;
					} else {
						// Not logged in
						return false;
					}


				} else {
					// Not logged in
					return false;
				}
			} else {
				// Not logged in
				return false;
			}
		} else {
			// Not logged in
			return false;
		}
	}

	public function hasAccess($return='') {

		$return = ! empty( $return ) ? '?return=' . $return : '';
		if ( isset( $_SESSION['user_id'],
			$_SESSION['username'],
			$_SESSION['login_string'] ) ) {
			$this->userID=$_SESSION['user_id'];

			if ( ! $this->login_check( $_SESSION['user_id'], $_SESSION['login_string'], $_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT'] ) ) {
				header( 'Location:' . BASE_PATH . 'login/'.$return );
			}
		} else {
			header( 'Location:' . BASE_PATH . 'login/'.$return );
		}

	}

	function logout() {
		session_destroy();
		header( 'Location:' . BASE_PATH . 'login/' );
	}

	/**
	 * Get all users
	 * @return array|bool
	 */
	public function getAllUsers() {
		$results  = $this->mysqli->query( "SELECT * FROM users" );
		$allUsers = array();
		while ( $user = $results->fetch_assoc() ) {
			$allUsers[] = $user;
		}

		return ! empty( $allUsers ) ? $allUsers : false;
	}

	public function getUserByUID( $uid ) {
		$user = $this->mysqli->query( "SELECT * FROM users WHERE unique_id = '$uid'" )->fetch_assoc();

		return ! empty( $user ) ? $user : null;
	}


    function deleteUser( $id ) {
        $stmt = $this->mysqli->prepare( "DELETE FROM users WHERE id = ?" );
        $stmt->bind_param( "i", $id );
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

	function getOptions( $setting_value ) {
		$dbOption = $this->mysqli->query( "SELECT * FROM db_options WHERE setting='$setting_value' LIMIT 1" )->fetch_assoc();

		return ! empty( $dbOption ) ? $dbOption['setting_value'] : null;
	}

	function updateOptions( $setting, $setting_value ) {
		$this->mysqli->query( "UPDATE db_options SET setting_value='$setting_value' WHERE setting='$setting'" );

		return true;
	}

	function setPageError( $title, $message, $type ) {
		$this->pageError['title']   = $title;
		$this->pageError['message'] = $message;
		$this->pageError['type']    = $type;
	}

	function showPageError() {
		if ( ! empty( $this->pageError ) ) {
			echo "<script>$(function(){new PNotify({
                title: '" . $this->pageError['message'] . "',
                text: '" . $this->pageError['title'] . "',
                type: '" . $this->pageError['type'] . "'
            });});</script>";
		}
	}

	function getPatients( $limit ) {
		if ( ! is_null( $limit ) ) {
			$limit = " DESC LIMIT " . $limit;
		}
		$stmt     = $this->mysqli->query( "SELECT * FROM patients ORDER BY id" . $limit );
		$patients = array();
		while ( $patient = $stmt->fetch_assoc() ) {
			$patients[] = $patient;
		}

		return ! empty( $patients ) ? $patients : null;
	}

	function addPatient( $data ) {
		$stmt = $this->mysqli->prepare( "INSERT INTO patients(patient_id,first_name,last_name,sex,
		address,city,division,village,email,country,phone,dob,profile_pic) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)" );
		$stmt->bind_param( "sssssssssssss", $data['patient_id'], $data['first_name'], $data['last_name'],
			$data['sex'], $data['address'], $data['city'], $data['division'], $data['village'], $data['email'],
			$data['country'], $data['phone'], $data['dob_submit'], $data['profile_pic'] );
		$result        = $stmt->execute();
		$this->last_id = $this->mysqli->insert_id;
		$stmt->close();

		return $result ? true : false;
	}

	function editPatient( $data, $id ) {
		$patient_id  = $data['patient_id'];
		$first_name  = $data['first_name'];
		$last_name   = $data['last_name'];
		$sex         = $data['sex'];
		$address     = $data['address'];
		$city        = $data['city'];
		$division    = $data['division'];
		$village     = $data['village'];
		$email       = $data['email'];
		$country     = $data['country'];
		$phone       = $data['phone'];
		$dob         = $data['dob'];
		$profile_pic = $data['profile_pic'];
		$this->mysqli->query( "UPDATE patients SET patient_id = '$patient_id', first_name = '$first_name', 
		last_name = '$last_name', sex = '$sex', address = '$address', city = '$city', country = '$country', 
		division = '$division', village = '$village', phone = '$phone', email = '$email', dob = '$dob', 
		profile_pic = '$profile_pic' WHERE id = $id;" );
	}

	function getPatientByID( $id ) {
		$patient = $this->mysqli->query( "SELECT * FROM patients WHERE id= $id" )->fetch_assoc();

		return ! empty( $patient ) ? $patient : null;
	}

	function getPatientFiles( $id ) {
		$stmt  = $this->mysqli->query( "SELECT * FROM uploads WHERE patient_id=" . $id );
		$files = array();
		while ( $file = $stmt->fetch_assoc() ) {
			$files[] = $file;
		}

		return ! empty( $files ) ? $files : null;
	}

	function getAllFiles() {
		$stmt  = $this->mysqli->query( "SELECT * FROM uploads" );
		$files = array();
		while ( $file = $stmt->fetch_assoc() ) {
			$files[] = $file;
		}

		return ! empty( $files ) ? $files : null;
	}

	function addPatientFile( $data ) {
		$patient_id = $data['patient_id'];
		$review_id  = $data['review_id'];
		$file_size  = $data['file_size'];
		$file_name  = $data['file_name'];
		$file_link  = $data['file_link'];
		$user_id    = $data['user_id'];
		$stmt       = $this->mysqli->prepare( "INSERT INTO uploads (patient_id, review_id,file_size,file_name,file_link, user_id) VALUES (?,?,?,?,?,?)" );
		$stmt->bind_param( "ssssss", $patient_id, $review_id, $file_size, $file_name, $file_link, $user_id );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function unPublishFile( $id, $value ) {
		$this->mysqli->query( "UPDATE uploads SET status = $value WHERE id = $id" );
	}

	function deleteFile( $id ) {
		$stmt = $this->mysqli->prepare( "DELETE FROM uploads WHERE id = ?" );
		$stmt->bind_param( "s", $id );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}


	/**
	 * @param $data
	 *Add asset from Post Data
	 * @return bool
	 */
	function addAsset( $data ) {

		$asset_type_id  = $data['asset_type'];
		$asset_name     = $data['asset_name'];
		$supplier_id    = $data['supplier'];
		$serial_number  = $data['serial'];
		$purchase_price = $data['pprice'];
		$purchase_date  = $data['pdate'];
		$r_price        = $data['rprice'];
		$r_date         = $data['rdate'];
		$notes          = $data['notes'];
		$file_id        = $data['file_id'];
		$dept_id        = $data['dept_id'];
		$user_id        = $data['user_id'];
		$stmt           = $this->mysqli->prepare( "INSERT INTO assets (user_id, asset_type_id,asset_name, purchase_date, purchase_price, replacement_value, replacement_date, serial_number, supplier_id, notes, file_id, dept_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);" );
		$stmt->bind_param( "iissiissisii", $user_id, $asset_type_id, $asset_name, $purchase_date, $purchase_price, $r_price, $r_date, $serial_number, $supplier_id, $notes, $file_id, $dept_id );
		$result = $stmt->execute();
		$this->setLastId( $this->mysqli->insert_id );
		$stmt->close();

		return $result;
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	function updateAsset( $data ) {
		$asset_id       = $data['asset_id'];
		$asset_type_id  = $data['asset_type'];
		$asset_name     = $data['asset_name'];
		$supplier_id    = $data['supplier'];
		$serial_number  = $data['serial'];
		$purchase_price = $data['pprice'];
		$purchase_date  = $data['pdate'];
		$r_price        = $data['rprice'];
		$r_date         = $data['rdate'];
		$notes          = $data['notes'];
		$file_id        = $data['file_id'];
		$dept_id        = $data['dept_id'];
		$this->mysqli->query( "UPDATE assets SET asset_type_id = '$asset_type_id', asset_name = '$asset_name', 
							purchase_date = '$purchase_date', purchase_price = '$purchase_price', replacement_value = '$r_price', 
							replacement_date = '$r_date', serial_number = '$serial_number', supplier_id = '$supplier_id', 
							notes = '$notes', file_id = '$file_id', updated_at = CURRENT_TIMESTAMP, dept_id = '$dept_id' 
							WHERE id = $asset_id" );

		return true;
	}

	function getAssets() {
		$stmt   = $this->mysqli->query( "SELECT * FROM assets" );
		$assets = array();
		while ( $asset = $stmt->fetch_assoc() ) {
			$assets[] = $asset;
		}

		return ! empty( $assets ) ? $assets : null;
	}

	function getAssetByID( $asset_id ) {
		$asset = $this->mysqli->query( "SELECT * FROM assets WHERE id= $asset_id" )->fetch_assoc();

		return ! empty( $asset ) ? $asset : null;
	}

	function deleteAsset( $id ) {
		$stmt = $this->mysqli->prepare( "DELETE FROM assets WHERE id = ?" );
		$stmt->bind_param( "i", $id );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function addAssetValuation( $data ) {
		$asset_id    = $data['asset_id'];
		$user_id     = $data['user_id'];
		$date_valued = $data['date_valued'];
		$amount      = $data['amount'];
		$stmt        = $this->mysqli->prepare( "INSERT INTO asset_valuations (user_id, asset_id, date_valued, amount) VALUES (?,?,?,?)" );
		$stmt->bind_param( "issi", $user_id, $asset_id, $date_valued, $amount );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getAssetValuations( $asset_id ) {
		$stmt       = $this->mysqli->query( "SELECT * FROM asset_valuations WHERE asset_id='$asset_id'" );
		$valuations = array();
		while ( $valuation = $stmt->fetch_assoc() ) {
			$valuations[] = $valuation;
		}

		return ! empty( $valuations ) ? $valuations : null;
	}

	function updateAssetValuation( $data ) {
		$amount      = $data['amount'];
		$date_valued = $data['date_valued'];
		$id          = $data['value_id'];
		$this->mysqli->query( "UPDATE asset_valuations SET amount='$amount', date_valued='$date_valued', updated_at=CURRENT_TIMESTAMP WHERE id=$id" );
	}

	function deleteAssetValuations( $id ) {
		$stmt = $this->mysqli->prepare( "DELETE FROM asset_valuations WHERE asset_id = ?" );
		$stmt->bind_param( "s", $id );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function deleteAssetValuationByID( $id ) {
		$stmt = $this->mysqli->prepare( "DELETE FROM asset_valuations WHERE id = ?" );
		$stmt->bind_param( "s", $id );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}
	function getAssetTypeByID( $id ) {
		$asset = $this->mysqli->query( "SELECT  id,asset_name,asset_category,asset_description FROM asset_types WHERE id= $id" )->fetch_assoc();

		return ! empty( $asset ) ? $asset : null;
	}

	function addAssetType( $data ) {
		$asset_name        = $data['asset_name'];
		$asset_description = $data['asset_description'];
		$asset_category    = $data['asset_category'];
		$stmt              = $this->mysqli->prepare( "INSERT INTO asset_types (asset_name, asset_description,asset_category) VALUES (?,?,?)" );
		$stmt->bind_param( "sss", $asset_name, $asset_description, $asset_category );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getAssetTypes() {
		$stmt   = $this->mysqli->query( "SELECT * FROM asset_types" );
		$assets = array();
		while ( $asset = $stmt->fetch_assoc() ) {
			$assets[] = $asset;
		}

		return ! empty( $assets ) ? $assets : null;
	}


	function getDepartments() {
		$stmt        = $this->mysqli->query( "SELECT * FROM departments" );
		$departments = array();
		while ( $department = $stmt->fetch_assoc() ) {
			$departments[] = $department;
		}

		return ! empty( $departments ) ? $departments : null;
	}

	function addDepartment( $data ) {
		$department  = $data['department'];
		$hod         = $data['hod'];
		$description = $data['description'];
		$stmt        = $this->mysqli->prepare( "INSERT INTO departments (department, hod,description) VALUES (?,?,?)" );
		$stmt->bind_param( "sss", $department, $hod, $description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function updateDepartment( $data ) {
		$department  = $data['department'];
		$hod         = $data['hod'];
		$description = $data['description'];
		$id          = $data['id'];
		$this->mysqli->query( "UPDATE departments SET department='$department', hod='$hod',description='$description', updated_at=CURRENT_TIMESTAMP WHERE id=$id" );

		return true;
	}

	function getDepartmentByID( $id ) {
		$department = $this->mysqli->query( "SELECT  id,department,hod,description FROM departments WHERE id= '$id'" )->fetch_assoc();

		return ! empty( $department ) ? $department : null;
	}

	function addExpenseType( $data ) {
		$expense_type        = $data['expense_type'];
		$expense_description = $data['expense_description'];
		$stmt                = $this->mysqli->prepare( "INSERT INTO expense_types (expense_type, expense_description) VALUES (?,?)" );
		$stmt->bind_param( "ss", $expense_type, $expense_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function addExpense( $data ) {
		$expense_type_id     = $data['expense_type_id'];
		$expense_description = $data['expense_description'];
		$amount              = $data['amount'];
		$expense_date        = $data['expense_date'];
		$recurring           = $data['recurring'];
		$recur_frequency     = $data['recur_frequency'];
		$recur_type          = $data['recur_type'];
		$recur_start_date    = $data['recur_start_date'];
		$recur_end_date      = $data['recur_end_date'];
		$stmt                = $this->mysqli->prepare( "INSERT INTO expenses (expense_type_id, 
		expense_description,amount,expense_date,recurring,recur_frequency,recur_type,recur_start_date,recur_end_date) VALUES (?,?,?,?,?,?,?,?,?)" );
		$stmt->bind_param( "isissssss", $expense_type_id, $expense_description, $amount, $expense_date, $recurring, $recur_frequency,
			$recur_type, $recur_start_date, $recur_end_date );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getExpenseByID( $id ) {
		$expense = $this->mysqli->query( "SELECT  * FROM expenses WHERE id= $id" )->fetch_assoc();

		return ! empty( $expense ) ? $expense : null;
	}

	function getExpenses() {
		$stmt     = $this->mysqli->query( "SELECT * FROM expenses" );
		$expenses = array();
		while ( $expense = $stmt->fetch_assoc() ) {
			$expenses[] = $expense;
		}

		return ! empty( $expenses ) ? $expenses : null;
	}

	function updateExpense( $data ) {
		$expense_id          = $data['expense_id'];
		$expense_type_id     = $data['expense_type_id'];
		$expense_description = $data['expense_description'];
		$amount              = $data['amount'];
		$expense_date        = $data['expense_date'];
		$recurring           = $data['recurring'];
		$recur_frequency     = $data['recur_frequency'];
		$recur_type          = $data['recur_type'];
		$recur_start_date    = $data['recur_start_date'];
		$recur_end_date      = $data['recur_end_date'];

		$this->mysqli->query( "UPDATE expenses SET expense_type_id = '$expense_type_id', 
		expense_description = '$expense_description', amount = '$amount', expense_date = '$expense_date', 
		recurring = '$recurring', recur_frequency = '$recur_frequency', recur_type = '$recur_type', 
		recur_start_date = '$recur_start_date', recur_end_date = '$recur_end_date', updated_at = CURRENT_TIMESTAMP() 
		WHERE id = $expense_id" );

		return true;
	}

	function getExpenseTypes() {
		$stmt          = $this->mysqli->query( "SELECT * FROM expense_types" );
		$expense_types = array();
		while ( $expense_type = $stmt->fetch_assoc() ) {
			$expense_types[] = $expense_type;
		}

		return ! empty( $expense_types ) ? $expense_types : null;
	}

	function getExpenseTypeByID( $id ) {
		$expense = $this->mysqli->query( "SELECT  id,expense_type,expense_description FROM expense_types WHERE id= $id" )->fetch_assoc();

		return ! empty( $expense ) ? $expense : null;
	}

	function updateExpenseType( $data ) {
		$expense_type        = $data['expense_type'];
		$expense_description = $data['expense_description'];
		$id                  = $data['id'];
		$this->mysqli->query( "UPDATE expense_types SET expense_type='$expense_type', expense_description='$expense_description', updated_at=CURRENT_TIMESTAMP WHERE id=$id" );

		return true;
	}

	function deleteExpenseType( $id ) {
		$expense = $this->mysqli->query( "DELETE  FROM expense_types WHERE id= $id" );

		return $expense;
	}

	function addStaffLedger( $data ) {
		$staff_id           = $data['staff_id'];
		$ledger_no           = $data['ledger_no'];
		$ledger_description = $data['ledger_description'];
		$stmt               = $this->mysqli->prepare( "INSERT INTO ledgers (staff_id, ledger_no,ledger_description) VALUES (?,?,?)" );
		$stmt->bind_param( "iss", $staff_id,$ledger_no, $ledger_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getStaffLedgers() {
		$stmt    = $this->mysqli->query( "SELECT * FROM ledgers" );
		$ledgers = array();
		while ( $ledger = $stmt->fetch_assoc() ) {
			$ledgers[] = $ledger;
		}

		return ! empty( $ledgers ) ? $ledgers : null;
	}

	function updateStaffLedger( $data ) {
		$id=$data['id'];
		$ledger_no          = $data['ledger_no'];
		$ledger_description = $data['ledger_description'];
		$stmt               = $this->mysqli->prepare( "UPDATE ledgers SET ledger_no=?,ledger_description=? WHERE id=$id" );
		$stmt->bind_param( "ss", $ledger_no, $ledger_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function updateStaffLedgerBalance( $id,$balance) {
		$stmt               = $this->mysqli->prepare( "UPDATE ledgers SET balance=? WHERE id=$id" );
		$stmt->bind_param( "i", $balance );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getStaffLedgerByID( $id ) {
		$ledger = $this->mysqli->query( "SELECT *  FROM ledgers WHERE id= $id" )->fetch_assoc();

		return ! empty( $ledger ) ? $ledger : null;
	}
	
	function addLedgerFee( $data ) {
		$ledger_fee      = $data['ledger_fee'];
		$fee_action      = $data['fee_action'];
		$fee_description = $data['fee_description'];
		$stmt             = $this->mysqli->prepare( "INSERT INTO ledger_fees (ledger_fee, fee_action,fee_description) VALUES (?,?,?)" );
		$stmt->bind_param( "sis", $ledger_fee,$fee_action, $fee_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}


	function getLedgerFees() {
		$stmt         = $this->mysqli->query( "SELECT * FROM ledger_fees" );
		$ledger_fees = array();
		while ( $ledger_fee = $stmt->fetch_assoc() ) {
			$ledger_fees[] = $ledger_fee;
		}

		return ! empty( $ledger_fees ) ? $ledger_fees : null;
	}

	function getLedgerFeeByID( $id ) {
		$ledger_fee = $this->mysqli->query( "SELECT  id,ledger_fee,fee_action,fee_description FROM ledger_fees WHERE id= $id" )->fetch_assoc();

		return ! empty( $ledger_fee ) ? $ledger_fee : null;
	}

	function updateLedgerFee( $data ) {
		$ledger_fee      = $data['ledger_fee'];
		$fee_action      = $data['fee_action'];
		$fee_description = $data['fee_description'];
		$id               = $data['id'];
		$stmt=$this->mysqli->prepare( "UPDATE ledger_fees SET ledger_fee=?, fee_action=?,fee_description=?, updated_at=CURRENT_TIMESTAMP WHERE id=$id" );
		$stmt->bind_param( "sss", $ledger_fee,$fee_action, $fee_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;

	}

	function deleteLedgerFee( $id ) {
		$expense = $this->mysqli->query( "DELETE  FROM ledger_fees WHERE id= $id" );

		return $expense;
	}

	function addLedgerTransaction( $data ) {
		$staff_id      = $data['staff_id'];
		$ledger_id      = $data['ledger_id'];
		$t_amount      = $data['t_amount'];
		$t_type      = $data['t_type'];
		$t_date      = $data['t_date'];
		$t_time      = $data['t_time'];
		$t_notes = $data['t_notes'];
		$stmt             = $this->mysqli->prepare( "INSERT INTO ledger_transactions (staff_id,ledger_id,t_amount, t_type,t_date,t_time,t_notes) VALUES (?,?,?,?,?,?,?)" );
		$stmt->bind_param( "iiissss", $staff_id,$ledger_id,$t_amount,$t_type, $t_date,$t_time ,$t_notes);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getLedgerTransactions() {
		$stmt    = $this->mysqli->query( "SELECT * FROM ledger_transactions " );
		$ledgers = array();
		while ( $ledger = $stmt->fetch_assoc() ) {
			$ledgers[] = $ledger;
		}

		return ! empty( $ledgers ) ? $ledgers : null;
	}

	function deleteLedgerTransaction( $id ) {
		$asset = $this->mysqli->query( "DELETE  FROM ledger_transactions WHERE id= $id" );

		return $asset;
	}

	function addDrugLedger( $data ) {
		$drug_id           = $data['drug_id'];
		$ledger_description = $data['ledger_description'];
		$stmt               = $this->mysqli->prepare( "INSERT INTO drug_ledgers (drug_id,ledger_description) VALUES (?,?)" );
		$stmt->bind_param( "is", $drug_id, $ledger_description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getDrugLedgers() {
		$stmt    = $this->mysqli->query( "SELECT * FROM drug_ledgers" );
		$ledgers = array();
		while ( $ledger = $stmt->fetch_assoc() ) {
			$ledgers[] = $ledger;
		}

		return ! empty( $ledgers ) ? $ledgers : null;
	}

	function updateAssetType( $data ) {
		$asset_name        = $data['asset_name'];
		$asset_description = $data['asset_description'];
		$asset_category    = $data['asset_category'];
		$id                = $data['id'];
		$this->mysqli->query( "UPDATE asset_types SET asset_name='$asset_name', asset_description='$asset_description',asset_category='$asset_category', updated_at=CURRENT_TIMESTAMP WHERE id=$id" );

		return true;
	}

	function deleteAssetType( $id ) {
		$asset = $this->mysqli->query( "DELETE  FROM asset_types WHERE id= $id" );

		return $asset;
	}


	public function addHW( $hw ) {
		$stmt = $this->mysqli->prepare( "INSERT INTO health_workers(surname,first_name,other_names,title,phone,email,
            address,reg_no,nationality,profile_pic) 
            VALUES (?,?,?,?,?,?,?,?,?,?)" );
		$stmt->bind_param( "ssssssssss", $hw[0], $hw[1], $hw[2],
			$hw[3], $hw[4], $hw[5], $hw[6], $hw[7], $hw[8], $hw[9] );
		$result = $stmt->execute();
		$stmt->close();

		return $result ? true : false;
	}

	function getHealthWorkers() {
		$stmt           = $this->mysqli->query( "SELECT * FROM health_workers" );
		$health_workers = array();
		while ( $health_worker = $stmt->fetch_assoc() ) {
			$health_workers[] = $health_worker;
		}

		return ! empty( $health_workers ) ? $health_workers : null;
	}

	function getHealthWorkerByID( $id ) {
		$hw = $this->mysqli->query( "SELECT  * FROM health_workers WHERE id= $id" )->fetch_assoc();

		return ! empty( $hw ) ? $hw : null;
	}

	function addVisit( $data ) {
		$category   = $data['category'];
		$patient_id = $data['patient_id'];
		$visit_no = $data['visit_no'];
		$department = $data['department'];
		$doctor     = $data['doctor'];
		$care       = $data['care'];
		$stmt       = $this->mysqli->prepare( "INSERT INTO visits (patient_id,category,visit_no,department,doctor,care) VALUES (?,?,?,?,?,?)" );
		$stmt->bind_param( "iissss", $patient_id,$category,$visit_no, $department, $doctor, $care );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	public function addPost( $post ) {
		$stmt = $this->mysqli->prepare( "INSERT INTO posts(title, content,user_id,status,blog_pic,category,date_added) VALUES (?,?,?,?,?,?,?)" );
		$stmt->bind_param( "sssssss", $post[0], $post[1], $post[2], $post[3], $post[4], $post[5], $post[6] );
		$result = $stmt->execute();
		$stmt->close();

		return $result ? true : false;
	}


	public function getAllPosts( $limit = 0 ) {
		$limit   = ! $limit == 0 ? "LIMIT " . $limit : "";
		$stmt    = $this->mysqli->query( "SELECT * FROM posts ORDER BY date_added DESC " . $limit );
		$allBlog = array();
		while ( $batch = $stmt->fetch_assoc() ) {
			$allBlog[] = $batch;
		}

		return ! empty( $allBlog ) ? $allBlog : false;

	}

	public function getPostCategories() {
		$stmt          = $this->mysqli->query( "SELECT * FROM post_categories" );
		$allCategories = array();
		while ( $category = $stmt->fetch_assoc() ) {
			$allCategories[] = $category;
		}

		return ! empty( $allCategories ) ? $allCategories : false;

	}

	function getVisits($id) {
		$stmt   = $this->mysqli->query( "SELECT * FROM visits WHERE patient_id=$id ORDER BY id DESC " );
		$visits = array();
		while ( $visit = $stmt->fetch_assoc() ) {
			$visits[] = $visit;
		}

		return ! empty( $visits ) ? $visits : null;
	}

	function getVisitByID($id) {
		$stmt   = $this->mysqli->query( "SELECT * FROM visits WHERE id=$id" );
		$visits = array();
		while ( $visit = $stmt->fetch_assoc() ) {
			$visits[] = $visit;
		}

		return ! empty( $visits ) ? $visits : null;
	}

	function getProcedures() {
		$stmt       = $this->mysqli->query( "SELECT * FROM procedures" );
		$procedures = array();
		while ( $procedure = $stmt->fetch_assoc() ) {
			$procedures[] = $procedure;
		}

		return ! empty( $procedures ) ? $procedures : null;
	}

	function getProcedureByID( $id ) {
		$procedure = $this->mysqli->query( "SELECT * FROM procedures WHERE id= $id" )->fetch_assoc();

		return ! empty( $procedure ) ? $procedure : null;
	}


	function getPatientLabRequests( $patient_id, $visit ) {
		$stmt   = $this->mysqli->query( "SELECT * FROM lab_requests WHERE patient_id='$patient_id' AND visit_id='$visit' ORDER BY id DESC " );
		$visits = array();
		while ( $visit = $stmt->fetch_assoc() ) {
			$visits[] = $visit;
		}

		return ! empty( $visits ) ? $visits : null;
	}

	function getAllLabRequests() {
		$stmt   = $this->mysqli->query( "SELECT * FROM lab_requests" );
		$visits = array();
		while ( $visit = $stmt->fetch_assoc() ) {
			$visits[] = $visit;
		}

		return ! empty( $visits ) ? $visits : null;
	}

	function addLabRequest( $data ) {
		$patient_id    = $data['patient_id'];
		$visit_id      = $data['visit_id'];
		$department_id = $data['department_id'];
		$test_id       = $data['test'];
		$specimen      = $data['specimen'];
		$request_notes = $data['request_notes'];

		$stmt = $this->mysqli->prepare( "INSERT INTO lab_requests (patient_id, visit_id,department_id,test_id,specimen,request_notes) VALUES (?,?,?,?,?,?)" );
		$stmt->bind_param( "iiiiss", $patient_id, $visit_id, $department_id, $test_id, $specimen, $request_notes );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function addLabTest( $data ) {
		$parent_test = $data['parent_test'];
		$child_test  = $data['child_test'];
		$price       = $data['price'];
		$description = $data['description'];

		$stmt = $this->mysqli->prepare( "INSERT INTO procedure (parent_test,child_test, price,description) VALUES (?,?,?,?)" );
		$stmt->bind_param( "ssis", $parent_test, $child_test, $price, $description );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function addPatientNotes( $data ) {
		$patient_id    = $data['patient_id'];
		$visit_id      = $data['visit_id'];
		$notes = $data['notes'];

		$stmt = $this->mysqli->prepare( "INSERT INTO patient_notes(patient_id, visit_id,notes) VALUES (?,?,?)" );
		$stmt->bind_param( "iis", $patient_id, $visit_id, $notes );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getPatientNotes($patient_id,$visit_id) {
		$stmt   = $this->mysqli->query( "SELECT * FROM patient_notes WHERE patient_id=$patient_id 
												AND visit_id=$visit_id ORDER BY id DESC " );
		$notes = array();
		while ( $note = $stmt->fetch_assoc() ) {
			$notes[] = $note;
		}

		return ! empty( $notes ) ? $notes : null;
	}
	function getPatientNoteByID($id) {
		$note   = $this->mysqli->query( "SELECT * FROM patient_notes WHERE id=$id" )->fetch_assoc();

		return ! empty( $note ) ? $note : null;
	}

	function deletePatientNote( $id ) {
		$note = $this->mysqli->query( "DELETE  FROM patient_notes WHERE id= $id" );

		return $note;
	}

	function updatePatientNote( $data ) {
		$id=$data['note_id'];
		$notes=$data['notes'];
		$note = $this->mysqli->query( "UPDATE patient_notes SET notes='$notes' WHERE id= $id" );

		return $note;
	}

	/**
	 * @param $data
	 *Array
	 * @return bool
	 */
	function addMail( $data ) {
		$title    = $data['title'];
		$sender      = $data['sender'];
		$receiver      = $data['receiver'];
		$content = $data['content'];

		$stmt = $this->mysqli->prepare( "INSERT INTO mails(title, sender,receiver,content) VALUES (?,?,?,?)" );
		$stmt->bind_param( "ssss", $title, $sender, $receiver,$content );
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getUserInbox($email) {
		$stmt   = $this->mysqli->query( "SELECT * FROM mails" );
		$mails = array();
		while ( $mail = $stmt->fetch_assoc() ) {
			$mails[] = $mail;
		}

		return ! empty( $visits ) ? $visits : null;
	}
	public function addDrug($drug)
	{

		$stmt = $this->mysqli->prepare("INSERT INTO drugs(nda_registration_no,license_holder ,
        local_technical_representative ,name_of_drug ,generic_name_of_drug ,strength_of_drug ,
        manufacturer ,country_of_manufacture,dosage_form,pack_size) VALUES(?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssss", $drug[0], $drug[1], $drug[2], $drug[3], $drug[4], $drug[5],
			$drug[6], $drug[7], $drug[8], $drug[9]);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getAllDrugs($limit, $begin, $search) {
		$to_limit = $limit != null ? " LIMIT " . $limit : '';
		$start     = $begin != null ? ' AND id >' . $begin : '';
		$name=isset($search['s'])?$search['s']:'';
		$l=isset($search['l'])?" AND country_of_manufacture LIKE '%". $search['l'] . "%' ":'';
		$c=isset($search['c'])?" AND local_technical_representative LIKE '%". $search['c'] . "%' ":'';
		$to_search = " WHERE name_of_drug LIKE '%". $name . "%'".$l.$c.$start.$to_limit;

		$result = $this->mysqli->query("SELECT * FROM drugs"  . $to_search);
		$allDrugs = array();
		while ($drug = $result->fetch_assoc()) {
			$allDrugs[] = $drug;
		}
		return !empty($allDrugs) ? $allDrugs : false;
	}

	function getDrugNames($limit,$begin,$search){
		$to_limit = $limit != null ? " LIMIT " . $limit : '';
		$start     = $begin != null ? ' AND id >' . $begin : '';
		$name=isset($search['s'])?$search['s']:'';
		$to_search = " WHERE name_of_drug LIKE '". $name . "%'".$start.$to_limit;

		$result = $this->mysqli->query("SELECT id,name_of_drug as text FROM drugs"  . $to_search);
		$allDrugs = array();
		while ($drug = $result->fetch_assoc()) {
			$allDrugs[] = $drug;
		}
		return !empty($allDrugs) ? $allDrugs : false;
	}

	function getDrugByID( $id ) {
		$drug = $this->mysqli->query( "SELECT * FROM drugs WHERE id= $id" )->fetch_assoc();

		return ! empty( $drug ) ? $drug : null;
	}
	function countDrugs($search)
	{
		$name=isset($search['s'])?$search['s']:'';
		$l=isset($search['l'])?" AND country_of_manufacture LIKE '%". $search['l'] . "%' ":'';
		$c=isset($search['c'])?" AND local_technical_representative LIKE '%". $search['c'] . "%' ":'';
		$to_search = " WHERE name_of_drug LIKE '%". $name . "%'".$l.$c;

		$stmt = $this->mysqli->prepare("SELECT * FROM drugs" . $to_search);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows;
	}

	function addPrescription( $data ) {
		$patient_id      = $data['patient_id'];
		$drug_id      = $data['drug_id'];
		$visit_id      = $data['visit_id'];
		$times      = $data['times'];
		$days      = $data['days'];
		$period      = $data['period'];
		$qty=$data['qty'];
		$stmt             = $this->mysqli->prepare( "INSERT INTO prescriptions(patient_id,visit_id,drug_id, times,days,period,qty) VALUES (?,?,?,?,?,?,?)" );
		$stmt->bind_param( "iiiiiis", $patient_id,$visit_id,$drug_id,$times, $days,$period,$qty);
		$result = $stmt->execute();
		$stmt->close();

		return $result;
	}

	function getPrescriptions($patient_id,$visit_id){
		$result = $this->mysqli->query("SELECT * FROM prescriptions WHERE patient_id=$patient_id AND visit_id=$visit_id");
		$allDrugs = array();
		while ($drug = $result->fetch_assoc()) {
			$allDrugs[] = $drug;
		}
		return !empty($allDrugs) ? $allDrugs : false;
	}
	function count_patients() {
		$stmt = $this->mysqli->query( "SELECT * FROM patients" );
		$stmt->fetch_assoc();

		return $stmt->num_rows;
	}

	function count_HW() {
		$stmt = $this->mysqli->query( "SELECT * FROM health_workers" );
		$stmt->fetch_assoc();

		return $stmt->num_rows;
	}
	function count_assets() {
		$stmt = $this->mysqli->query( "SELECT * FROM assets" );
		$stmt->fetch_assoc();

		return $stmt->num_rows;
	}

	function countDistinctCountry() {
		$stmt = $this->mysqli->query( "SELECT count(country_of_manufacture) as count ,country_of_manufacture FROM drugs GROUP BY country_of_manufacture" );
		$allDrugs = array();
		while ($drug = $stmt->fetch_assoc()) {
			$allDrugs[] = $drug;
		}
		return !empty($allDrugs) ? $allDrugs : false;
	}

	function countDistinctCompany() {
		$stmt = $this->mysqli->query( "SELECT count(local_technical_representative) as count ,local_technical_representative FROM drugs GROUP BY local_technical_representative" );
		$allDrugs = array();
		while ($drug = $stmt->fetch_assoc()) {
			$allDrugs[] = $drug;
		}
		return !empty($allDrugs) ? $allDrugs : false;
	}

	function getPatientsByDate(){
		$stmt=$this->mysqli->query("SELECT COUNT(id) as patient_count,date(date_added) AS added FROM patients GROUP BY added");
		$allPatients = array();
		while ($patient = $stmt->fetch_assoc()) {
			$allPatients[] = $patient;
		}
		return !empty($allPatients) ? $allPatients : false;
	}

	/**
	 * @return mixed
	 */
	public function getLastId() {
		return $this->last_id;
	}

	/**
	 * @param mixed $last_id
	 */
	public function setLastId( $last_id ) {
		$this->last_id = $last_id;
	}

	/**
	 * Reduce word length
	 * @param $text
	 * @param $max
	 * @param string $end
	 * @return string
	 */
	function limitChars($text, $max, $end = '...')
	{
		$output = '';
		if (!empty($text)) {
			if (strlen($text) > $max || $text == '') {
				$words = preg_split('/\s/', $text);
				$output = '';
				$i = 0;
				while (1) {
					$length = strlen($output) + strlen($words[$i]);
					if ($length > $max) {
						break;
					} else {
						$output .= " " . $words[$i];
						++$i;
					}
				}
				$output .= $end;
			} else {
				$output = $text;
			}
		}
		return $output;
	}

}

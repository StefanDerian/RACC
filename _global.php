<?php




const EMAIL = "raccdesign02@gmail.com";
const EMAIL_PASSWORD = "raccaustralia";


const SERVER_IP = "localhost";

const PORT = "80";


const DATABASE_NAME = "racc";

const DATABASE_USERNAME = "root";



const PASSWORD = "";




const ACCOUNT = array(
	'table_name' => 'account',
	'collumns'=>array(
		'user_id'=> 'UserID',
		'display_name'=> 'DisplayName',
		'username' => 'UserName',
		'user_type' => 'UserType',
		'password' => 'Password',
		'created' => 'Created',
	)
);
const ACCOUNT_INSERT = array(
	'table_name' => 'account',
	'collumns'=>array(
		'user_id'=> 'UserID',
		'display_name'=> 'DisplayName',
		'username' => 'UserName',
		'user_type' => 'UserType',
		'password' => 'Password',
	)
);

const USERACCOUNT = array(
	'table_name' => 'useraccount',
	'collumns'=>array(
		'user_id'=> 'UserID',
		'firstname'=> 'FirstName',
		'lastname' => 'LastName',
		'preffername' => 'PreferName',
		'dob' => 'DateofBirth',
		'nationality' => 'Nationality',
		'gender' => 'Gender',
		'mobile' => 'Mobile',
		'email' => 'Email',
		'who' => 'Who',
		'created' => 'Created'
	)
);


const USERACCOUNT_INSERT = array(
	'table_name' => 'useraccount',
	'collumns'=>array(
		'firstname'=> 'FirstName',
		'lastname' => 'LastName',
		'preffername' => 'PreferName',
		'dob' => 'DateofBirth',
		'nationality' => 'Nationality',
		'gender' => 'Gender',
		'mobile' => 'Mobile',
		'email' => 'Email',
		'who' => 'Who'
	)
);


const CLIENT = array(
	'table_name' => 'client',
	'collumns'=>array(
		'user_id'=> 'UserID',
		'firstname'=> 'FirstName',
		'lastname' => 'LastName',
		'preffername' => 'PreferName',
		'dob' => 'DateofBirth',
		'nationality' => 'Nationality',
		'gender' => 'Gender',
		'mobile' => 'Mobile',
		'email' => 'Email',
		'created' => 'Created'
	)
);

const CLIENT_INSERT = array(
	'table_name' => 'client',
	'collumns'=>array(
		'firstname'=> 'FirstName',
		'lastname' => 'LastName',
		'preffername' => 'PreferName',
		'dob' => 'DateofBirth',
		'nationality' => 'Nationality',
		'gender' => 'Created',
		'mobile' => 'Mobile',
		'email' => 'Email',
	)
);





?>
<?php
	class Users{
	    protected static $table_name="core_users";
		
		public $user_id;
		public $group_id;
		public $firstname;
		public $middlename;
		public $lastname;
		public $email;
		public $password;
		public $language;
		public $last_login;
		public $stamp;
		
		### added variable, field not included
		### on the user table.
		
		public static function authenticate($email="", $password="") {
			global $mysqli;
			$email = $mysqli->real_escape_string($email);
			$password = $mysqli->real_escape_string($password);
		
			$sql  = "SELECT * FROM ".self::$table_name." ";
			$sql .= "WHERE email = '{$email}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";
			$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
		}
		public static function find_all(){
			return self::find_by_sql("SELECT * FROM ".self::$table_name.";");
		}
		public static function find_by_sql($sql=""){
			global $mysqli;
			$result = $mysqli->query($sql) or die($mysqli->error);
			$object_array = array();
			while($row = $result->fetch_assoc() ){
				$object_array[] = self::instantiate($row);
			}
			return $object_array;
		}
		public static function find_by_id($user_id=0){
			$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id = \"$user_id\";");
			return !empty($result_array)?array_shift($result_array):false;
		}
		public static function find_by_email($email=''){
			$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE email = \"$email\";");
			return !empty($result_array)?array_shift($result_array):false;
		}
		public static function instantiate($record){
		
			$object = new self;
			$object_vars = get_object_vars($object);
			foreach($record as $attribute => $value){		
				if(array_key_exists($attribute, $object_vars) ){
					$object->$attribute = $value;
				}	
			}
			return $object;
		}
		public function rel_profile_image(){
			return 'ufiles/photos/001_'.$this->string_id().'.jpg';
		}
		public function string_id(){
			return (string)str_pad($this->user_id, 12, '0', STR_PAD_LEFT);
		}
		public function profile_image($size){
			$img_absolute = $this->get_image_url($size, 'absolute');
			$img_relative = $this->get_image_url($size, 'relative');
			
			if(!is_file($img_relative)){
				if($size != 'original')
					return img_url().'bugsbunny50x50.jpg';
				else
					return img_url().'Classic_bugsbunny.png';
			}
			else{
				return $img_absolute;
			}
		}
		public function get_image_url($size='', $type=''){
			/*
			 * @types: relative, absolute
			 * @size: original, 50x50, 32x32
			 *
			 */
			$relative_url	= 'ufiles/';
			$absolute_url	= ufiles_url();
			$selected_url	= '';
			$folder_50x50	= 's50x50/';
			$folder_32x32	= 's32x32/';
			$folder_photos	= 'photos/';
			$folder_used	= '';
			$img_name		= '001_'.$this->string_id().'.jpg';
			$url 			= '';

			switch($type){
				case 'absolute':
					$selected_url = $absolute_url;
					break;
				case 'relative':
					$selected_url = $relative_url;
					break;
				default:
					$selected_url = $relative_url;
			}
			
			switch($size){
				case '50x50':
					$folder_used = $folder_50x50;
					break;
				case '32x32':
					$folder_used = $folder_32x32;
					break;
				case 'original':
					$folder_used = $folder_photos;
					break;
				default:
					$folder_used = $folder_photos;
			}
			$url = $selected_url.$folder_used.$img_name;
			return  $url;
		}
		public function save(){
			return isset($this->id)?$this->update():$this->create();
		}		
		public function update(){
			global $mysqli;
			$sql = "UPDATE ".self::$table_name." SET group_id = '";
			$sql.= $mysqli->real_escape_string($this->group_id)."', firstname = '";
			$sql.= $mysqli->real_escape_string($this->firstname)."', middlename = '";
			$sql.= $mysqli->real_escape_string($this->middlename)."', lastname = '";
			$sql.= $mysqli->real_escape_string($this->lastname)."', email = '";
			$sql.= $mysqli->real_escape_string($this->email)."', password = '";
			$sql.= $mysqli->real_escape_string($this->password)."', language = '";
			$sql.= $mysqli->real_escape_string($this->language)."', last_login = '";
			$sql.= $mysqli->real_escape_string($this->last_login)."' ";
			$sql.= "WHERE user_id = '";
			$sql.= $mysqli->real_escape_string($this->user_id)."';";
			$mysqli->query($sql) or die($mysqli->error);
			
			if($mysqli->affected_rows == 1){
				return true;
			}
			else{
				return false;
			}
		}
		public function create(){
			global $mysqli;
		
			$sql = "INSERT INTO ".self::$table_name."(group_id, firstname, middlename, lastname, email, password, language, last_login) VALUES('";
			$sql.= $mysqli->real_escape_string($this->group_id)."', '";
			$sql.= $mysqli->real_escape_string($this->firstname)."', '";
			$sql.= $mysqli->real_escape_string($this->middlename)."', '";
			$sql.= $mysqli->real_escape_string($this->lastname)."', '";
			$sql.= $mysqli->real_escape_string($this->email)."', '";
			$sql.= $mysqli->real_escape_string($this->password)."', '";
			$sql.= $mysqli->real_escape_string($this->language)."', '";
			$sql.= $mysqli->real_escape_string($this->last_login)."');";
			if($mysqli->query($sql) or die($mysqli->error)){
				$this->user_id = $mysqli->insert_id;
				return true;
			}
		}
		public function delete(){
			global $mysqli;
			$sql = "DELETE FROM ".self::$table_name;
			$sql.= " WHERE user_id = '";
			$sql.= $mysqli->real_escape_string($this->user_id)."' LIMIT 1;";
			$mysqli->query($sql) or die($mysqli->error);	
			return $mysqli->affected_rows?true:false;
		}
	}
?>
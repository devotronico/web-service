<?php
namespace api\models;

use config\Database;

use PDO;

class Post {


    private $conn;


    public function __construct() {

        $db = new Database;
        $this->conn = $db->getConnection();
    }
   
    


    /**
    * POST SINGLE DATA
    * 
    * 
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */
    public function postSingleData(object $data) {
       
        $query = 'INSERT INTO users (name, gender, email, birth, country) VALUES (:name, :gender, :email, :birth, :country)';
      
        $stmt = $this->conn->prepare($query);

        $name = htmlspecialchars(strip_tags($data->name));
        $gender = htmlspecialchars(strip_tags($data->gender));
        $email = htmlspecialchars(strip_tags($data->email));
        $birth = htmlspecialchars(strip_tags($data->birth));
        $country = htmlspecialchars(strip_tags($data->country));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':country', $country);

        if($stmt->execute()) {
          return true;
    }

    printf("Error: %s.\n", $stmt->error);

    return false;
  }







} // chiude classe

/*

die( $ );
die( '' );
var_dump( $ );
echo '<pre>';print_r( $ );
if ( isset( $ )) { var_dump( $ ); echo '<pre>';print_r( $ ); die(); }

$test = "";
if ( is_null( $var )) {$test .= "null, ";}
if ( isset( $var )) { $test .= "settata, "; }
if ( !$var ) {$test .= "false, ";} 
if ( empty( $var )) {$test .= "empty, ";}
echo $test;

*/


/**
 * Get photo from blog author
 * 
 * Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id volutpat 
 * orci. Etiam pharetra eget turpis non ultrices. Pellentesque vitae risus 
 * sagittis, vehicula massa eget, tincidunt ligula.
 *
 * @access private
 * @author Firstname Lastname
 * @global object $post
 * @param int $id Author ID
 * @param string $type Type of photo
 * @param int $width Photo width in px
 * @param int $height Photo height in px
 * @return object Photo
 */

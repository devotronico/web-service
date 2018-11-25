<?php
namespace api\models;

use config\Database;

use PDO;

class Delete {


    private $conn;


    public function __construct() {

        $db = new Database;
        $this->conn = $db->getConnection();
    }
   
    


    /**
    * DELETE SINGLE DATA
    * 
    * 
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */
    public function deleteSingleData(int $id) {

        
      
       
        $query = 'DELETE FROM users WHERE id = :id';
      
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
    
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

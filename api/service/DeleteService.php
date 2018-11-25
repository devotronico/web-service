<?php
namespace api\service;

use api\models\Delete;
//use api\models\JsonManager;

class DeleteService extends Service{

  
    private $delete;
    //private $jsonManager;
   

    public function __construct() {

        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        // Class
        $this->delete = new Delete; 
    }
   
    


    


    /**
     * POST DATA
     * 
     *  Restituisce la lista di tutti gli utenti presenti nel database
     *
     * 
     * @access public
     * @return string
     */
    public function deleteSingle($id) {

        $id = htmlspecialchars(strip_tags($id));

     
        // $data = json_decode(file_get_contents("php://input"));


        $result = $this->delete->deleteSingleData($id);

      
        if ( $result ) {

            echo json_encode(array('message' => 'Utente Cancellato'));
        } else {

            echo json_encode(array('message' => 'Utente Non Cancellato'));
        }
    }





    


} // Chiude la Classe



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
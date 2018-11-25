<?php
namespace api\Service;

use api\models\Post;

class PostService extends Service{


    private $post;


    public function __construct() {

        // Headers
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        // Class
        $this->post = new Post; 
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
    public function postSingle() {

      //  if ( isset( $_POST )) { var_dump( $_POST ); echo '<pre>';print_r( $_POST ); }


        // Get raw posted data
        $data = json_decode(file_get_contents("php://input"));


        $result = $this->post->postSingleData($data);
        // $result = $this->post->postSingleData($data->name, $data->gender, $data->email, $data->birth, $data->country);

      
        if ( $result ) {

        echo json_encode(array('message' => 'Utente Creato'));
        } else {

        echo json_encode(array('message' => 'Utente Non Creato'));
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
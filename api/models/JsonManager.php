<?php
namespace api\models;

use PDO;

class JsonManager {



    public function __construct() {

     
    }
   
    



                                          
    /**
    * GET JASON DATA
    * 
    *  `extract`: http://php.net/manual/en/function.extract.php
    * @access public
    * @author Daniele Manzi
    * @return string
    */

    public function getJsonData($result) {

        $data_arr = array();
         
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // se vogliamo selezionare i dati da ottenre e quelli da escludere
            // es. è stata escluso la proprietà created_at
            extract($row);

            $data_item = array(
            'id' => $id,
            'name' => $name,
            'gender' => $gender,
            'email' => $email,
            'birth' => $birth,
            'country' => $country
            );

            array_push($data_arr, $data_item);
            
            // array_push($data_arr, $row); // se vogliamo passare tutti i dati di ogni oggetto
        }

        return json_encode($data_arr);
    }












} // chiude classe


/**
 * die( $ );
 * die( '' );
 * var_dump( $ );
 * echo '<pre>';print_r( $ );
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



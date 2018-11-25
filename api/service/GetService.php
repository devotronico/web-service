<?php
namespace api\service;

use api\models\Get;


class GetService extends Service{

  
    private $get;
    

    public function __construct() {

         // Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        // Classes
        $this->get = new Get;
    }
   
    


    /**
     * GET ALL DATA
     * 
     *  Restituisce la lista di tutti gli utenti presenti nel database
     * 
     * @access public
     * @return string
     */
    public function getAll() {

        $totalPosts = $this->get->totalPosts();

        if ( empty($totalPosts ) ) { 
       
            echo json_encode(array('message' => 'Non ci sono dati da caricare'));
       
        } else {

            $jsonstring = $this->get->getAllData();

            echo $jsonstring;
        }
    }


    /**
     * GET SINGLE DATA
     * 
     *  Restituisce la lista di tutti gli utenti presenti nel database
     *
     * 
     * @access public
     * @return string
     */
    public function getSingle($id) {

        $totalPosts = $this->get->totalPosts();

        if ( empty($totalPosts ) ) { 
       
    
            echo json_encode(array('message' => 'Non ci sono dati da caricare'));
       
        } else {

            $jsonstring = $this->get->getSingleData($id);

            echo $jsonstring;
        }
    }


    /**
     * GET PAGE DATA
     * 
     *  Restituisce la lista di tutti gli utenti presenti nel database
     *
     * 
     * @access public
     * @return string
     */
    public function getPage($start, $num) {

        $start = htmlspecialchars(strip_tags($start));
        $num = htmlspecialchars(strip_tags($num));

        
        $totalPosts = $this->get->totalPosts();

        if ( empty($totalPosts ) ) { 
       
            echo json_encode(array('message' => 'Non ci sono dati da caricare'));
       
        } else {

            $jsonstring = $this->get->getPageData($start, $num);

            echo $jsonstring;
        }
    }





    


} // Chiude la Classe



/**
 * die( $ );
 * die( '' );
 * var_dump( $ );
 * echo '<pre>';print_r( $ );
 * gettype( $ ));
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
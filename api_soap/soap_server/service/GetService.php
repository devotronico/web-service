<?php
namespace api\service;

use api-soap\soap-server\models\Get;


class GetService extends Service{

  
    private $get;
    

    public function __construct() {

         // Headers
         $server = new SoapServer("books.wsdl",[
            'classmap'=>[
                'book'=>'Book',
            ]
        ]);

        $server->addFunction('getBook');
        $server->handle();

        // Classes
        $this->get = new Get;
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



        
function getBook($bookId)
{
    //simulazione di una ricerca. In un caso reale probabilmente faremo
    //una query sul database per restituire l'oggetto
    $book = new Book();
    $book->name = 'The Lord of the Rings';
    $book->year = 2017;
    return $book;
}

        $totalPosts = $this->get->totalPosts();

        if ( empty($totalPosts ) ) { 
       
    
            echo json_encode(array('message' => 'Non ci sono dati da caricare'));
       
        } else {

            $jsonstring = $this->get->getSingleData($id);

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

/*
function getBook($bookId)
{
    //simulazione di una ricerca. In un caso reale probabilmente faremo
    //una query sul database per restituire l'oggetto
    $book = new Book();
    $book->name = 'The Lord of the Rings';
    $book->year = 2017;
    return $book;
}

*/
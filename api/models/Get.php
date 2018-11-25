<?php
namespace api\models;

use config\Database;

use PDO;

class Get {


    private $conn;


    public function __construct() {

        $db = new Database;
        $this->conn = $db->getConnection();
    }
   
    


/*******************************************************************************************************|
* TOTAL POSTS                                                                                           |
* questo metodo verrà richiamato solo per la pagina posts/blog per creare la paginazione                |
* Otteniamo il numero totale in assoluto di tutti i post presenti nella tabella 'posts'                 |
* Lo scopo è quello di calcolare il numero di pagine per i post                                         |
* es. se abbiamo 30 post e vogliamo che vengano visualizzati 3 post ogni pagina                         |
* allora faremo 30post / 3 che ci darà 10 pagine. in questo modo potremo fare la paginazione            |
********************************************************************************************************/
public function totalPosts(){
    
    $sql = 'SELECT COUNT(*) FROM users';
    if ($res = $this->conn->query($sql)) {
        $rows = $res->fetchColumn();
        return $rows;
    }
}


                                          
    /**
    * GET ALL DATA
    * 
    * Metodo `query()`: (http://php.net/manual/en/pdo.query.php) 
    * Il metodo `query()` di PDO esegue un'istruzione SQL di tipo SELECT  
    * e ritorna un oggetto PDOStatement del set di risultati.
    * Eseguendo un fetchAll sull' oggetto PDOStatement viene restituita
    * una matrice contenente tutte le righe del set di risultati
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */

    public function getAllData() {

        $sql = "SELECT * FROM users";

        if ($stmt = $this->conn->query($sql)) {
        
            if ($stmt->execute()) {
               
                $data_arr = array();
         
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
                    // se vogliamo selezionare i dati da ottenre e quelli da escludere
                    // es. è stata escluso la proprietà created_at
                    extract($row);
        
                    $data_obj = array(
                    'id' => $id,
                    'name' => $name,
                    'gender' => $gender,
                    'email' => $email,
                    'birth' => $birth,
                    'country' => $country
                    );
        
                    array_push($data_arr, $data_obj);  
                    
                }
        
                return json_encode($data_arr);

            } else {
                die("ERRORE");
            }
        }
    }




    /**
    * GET SINGLE DATA
    * 
    * 
    * 
    * e ritorna un oggetto PDOStatement del set di risultati.
    * Eseguendo un fetchAll sull' oggetto PDOStatement viene restituita
    * una matrice contenente tutte le righe del set di risultati
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */
    public function getSingleData(int $id) {

        $sql = "SELECT * FROM users WHERE id = :id";
 
        if ($stmt = $this->conn->prepare($sql)) {
        
            $stmt->bindParam(':id', $id, PDO::PARAM_INT, 10);

            if ($stmt->execute()) {
               
             //   $data_arr = array();
         
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
                    // se vogliamo selezionare i dati da ottenre e quelli da escludere
                    // es. è stata escluso la proprietà created_at
                    extract($row);
        
                    $data_obj = array(
                    'id' => $id,
                    'name' => $name,
                    'gender' => $gender,
                    'email' => $email,
                    'birth' => $birth,
                    'country' => $country
                    );
        
                   // array_push($data_arr, $data_obj);  
                    
                }
        
                return json_encode($data_obj);

            } else {
                die("ERRORE");
            }
        }
    }








    /**
    * GET PAGE DATA
    * 
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */

    public function getPageData(int $postStart=0, int $postForPage=5) {

        $sql = "SELECT * FROM users LIMIT $postStart, $postForPage";

        if ($stmt = $this->conn->query($sql)) {
        
            if ($stmt->execute()) {
               
                $data_arr = array();
         
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
                    // se vogliamo selezionare i dati da ottenre e quelli da escludere
                    // es. è stata escluso la proprietà created_at
                    extract($row);
        
                    $data_obj = array(
                    'id' => $id,
                    'name' => $name,
                    'gender' => $gender,
                    'email' => $email,
                    'birth' => $birth,
                    'country' => $country
                    );
        
                    array_push($data_arr, $data_obj);  
                    
                }
        
                return json_encode($data_arr);

            } else {
                die("ERRORE");
            }
        }

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


<?php
namespace app\models;

use config\Database;

use PDO;

class Data {


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
    * ALL USERS
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

        if ($stmt = $this->conn->query($sql)) 
        {
        
            if ($stmt->execute()) 
            {
               
                $users = $stmt->fetchAll(PDO::FETCH_OBJ); 
             

                return $users; // ritorna un array di oggetti
            } else {
                die("ERRORE");
            }
        }

    }

    /**
    * GET PAGE DATA
    * 
    * Facciamo una JOIN tra posts e users per ottenere tutti i posts con i dati dell' autore del post       
    * dalla tabella posts prendiamo [post_ID, title, datecreated, message]                                  
    * dalla tabella users prendiamo [user_email, user_name]                                                 
    * la relazione tra le tabelle posts e users è il campo posts.user_id e users.ID                         
    * in questo modo per ogni post abbiamo accesso ai dati dell'utente che ha scritto quel determinato post 
    *
    * @access private
    * @author Daniele Manzi
    * @return array di oggetti.
    */

    public function getPageData($postStart=0, $postForPage=5) {

        $sql = "SELECT * FROM users LIMIT $postStart, $postForPage";

        if ($stmt = $this->conn->query($sql)) 
        {
        
            if ($stmt->execute()) 
            {
               
                $users = $stmt->fetchAll(PDO::FETCH_OBJ); // FETCH_ASSOC |  FETCH_OBJ
             

                return $users; // ritorna un array di oggetti
            } else {
                die("ERRORE");
            }
        }

    }





//---------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * LOAD USERS
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
    public function loadUsers(){


        $filename = './public/data/data.json';

        if (!file_exists($filename)) {
            die("The file $filename NOT exists");
        }
       

        $jsondata = file_get_contents($filename);


        $data = json_decode($jsondata, true);

        $sql = 'INSERT INTO users (name, gender, email, birth, country) VALUES (:name, :gender, :email, :birth, :country)';
            
        $stmt = $this->conn->prepare($sql); 

        foreach ( $data as $d ) {

            $stmt->bindParam(':name',     $d['name'],    PDO::PARAM_STR, 32);
            $stmt->bindParam(':gender',   $d['gender'],  PDO::PARAM_STR, 1);
            $stmt->bindParam(':email',    $d['email'],   PDO::PARAM_STR, 255);
            $stmt->bindParam(':birth',    $d['birth'],   PDO::PARAM_STR, 10);
            $stmt->bindParam(':country',  $d['country'], PDO::PARAM_STR, 32);
            $stmt->execute();
        }
        $this->conn = null;
    
    }




    /**
     * RESET USERS
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
    public function resetUsers(){
        
        $sql = 'TRUNCATE TABLE users';

        $stmt = $this->conn->prepare($sql); 

        $stmt->execute();
        
        $this->conn = null;
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



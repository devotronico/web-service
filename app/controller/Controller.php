<?php
namespace app\controller;



class Controller{

  
    protected $layout = 'layout/index.tpl.php';
 
    protected $template;
    protected $page;
   


    public function __construct() {

        
    }
   
    
    /** 
    * DISPLAY
    * Il metodo display è l'ultimo metodo che verrà richiamato
    * esso caricherà il LAYOUT generale che sarà quello di default per ogni pagina del sito.
    * Nella variabile '$layout' abbiamo l'indirizzo del file che contiene il LAYOUT per tutte le pagine
    * All' interno del LAYOUT andremo a inserire i TEMPLATE che non sono altro che variabili che
    * al loro interno contengono codice html e altre variabili php
    * @access public
    * @return null
    */
    public function display(){
      
        require $this->layout;  
    }




    /**
     * AJAX
     * 
     * Caricare dati in modo asincrono dal server utilizzando AJAX
     * Il file javascript main.js si occupa di gestire la chiamata ajax
     * cliccando nella Navbar sul link AJAX attiveremo la rotta "/ajax/3"  
     * questa rotta va inviata al server che tramite la classe Router
     * la indirizza alla classe controller: Controller 
     * al metodo: ajax
     * con argomento: 3
     * 
     * @access public
     * @return string
     */
    public function ajax($id) {

        die( "namespace: ".__NAMESPACE__."<br>classe: ".__CLASS__."<br>metodo: ".__METHOD__."<br>argomento: ".$id."<br>");
     }
   
    

        
    //-----------------------------------------------------------------------------|
    /**
     * ERROR 404    
     * 
     * Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
     * @access public
     * @return null
     */
    public function error(){
        
        $this->page = 'error';
        $this->template = "<h1>".$this->page."</h1>";
    }








    //-----------------------------------------------------------------------------|
    /**
     * ABOUT    
     * 
     * Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
     * @access public
     * @return null
     */
    public function about() {

        $this->page = 'about';
        $this->template = "<h1>".$this->page."</h1>";
    }


    
    //-----------------------------------------------------------------------------|
    /**
     * CONTACT    
     * 
     * Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
     * @access public 
     * @return null
     */
    public function contact() {

        $this->page = 'contact';
        $this->template = "<h1>".$this->page."</h1>";
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
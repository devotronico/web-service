<?php
ini_set('soap.wsdl_cache_ttl', 1);// Imposta una durata della cache
ini_set('soap.wsdl_cache_enabled', 0);
//ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);
class Book
{
    public $name;
    public $year;
}

// argomento 1 il path del file WSDL é da remoto.
// argomento 2 valori da richiedere.
$client = new SoapClient(
        'http://localhost/soap-server/books.wsdl',
        array(
                'classmap' => array('book' => "Book"),
        )
);


### richiamiamo la funzione getBook definita nel file WSDL:
// > <wsdl:operation name="getBook">
$response = $client->getBook(1);
$book = $response->enc_value;
var_dump($book);


// var_dump($client->__getFunctions());

// extension=soap

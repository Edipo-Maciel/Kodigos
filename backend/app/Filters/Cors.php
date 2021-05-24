<?php

/** * Comentário de cabeçalho de arquivos *
 *  Classe Cors - Habilitar CORS (Compartilhamento de Recursos de Origem Cruzada)  * * 
 * @author Edipo Maciel <macieledipo@gmail.com> *
 *  @version 0.1 *
 *  @package Filters *
 *  @subpackage <ResquestInterface><ResponseInterface><FilterInterface> *
 *  @example Classe Cors. */


namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{

  /** * Comentário de variáveis 
   * * Implementa o Cors para o FRONT END, se comunicar com a API REST
   *  * @access public
   * * @name Cors */

  public function before(RequestInterface $request, $arguments = null)
  {

    /** * Função para habilitar o CORS , e autorizar o FRONT END a se comunicar com API REST
     *  * @access public
     *  * @param ResquestInterface $request , $arguments
     * * @return void */


    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == "OPTIONS") {
      die();
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}

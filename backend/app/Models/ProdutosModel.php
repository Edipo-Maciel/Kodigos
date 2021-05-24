<?php 

/** * Comentário de cabeçalho de arquivos *
 *  Classe ProdutosModel - aqui a Classe, lista os campos da tabela no banco de dados que receberão alterações  * * 
 * @author Edipo Maciel <macieledipo@gmail.com> *
 *  @version 0.1 *
 *  @package Models *
 *  @subpackage <Models> *
 *  @example Classes ProdutosModel. */


namespace App\Models;
 
use CodeIgniter\Model;
 
class ProdutosModel extends Model
{
/** * $table = tabela no banco de dados, responsável pelos produtos
 * $primaryKey = é a chave da tabela produtos, ID 
 * Nome, Descricao e Unidade_Medida são as colunas da tabela produtos * 
 * Variáveis da Classe ProdutosModel que receberão instruções para o Banco de dados
 * * */

    protected $table = 'produto'; //tabela no banco
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Nome','Descricao','Unidade_Medida'];
}
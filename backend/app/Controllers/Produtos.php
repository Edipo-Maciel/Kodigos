<?php

/** * Comentário de cabeçalho de arquivos *
 *  Classe Controller - Produtos, aqui é elaborado os comandos CREATE, DELETE, UPDATE PARA API REST  * * 
 * @author Edipo Maciel <macieledipo@gmail.com> *
 *  @version 0.1 *
 *  @package Controllers *
 *  @subpackage <ResourceController><ResponseTrait><ProdutosModel> *
 *  @example Classe Produtos. */


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProdutosModel;

class Produtos extends ResourceController
{
    use ResponseTrait;
    
    /** * Função que lista todos os proutos cadastrados  *
     *  @param Int $id * Id do produto
     *  @return 
     * */
    public function index()
    {
        $model = new ProdutosModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    /** * Função que mostra um produto  *
     *  @param Int $id * Id do produto
     *  @return 
     * */
    public function show($id = null)
    {
        $model = new ProdutosModel();
        $data = $model->getWhere(['Id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }

    /** * Função que cadastra um produto no banco de dados  *
     *  @param 
     *  @return $response = resposta da requisição POST na API 
     * */
    public function create()
    {
        $model = new ProdutosModel();
        $data = [
            'Nome' => $this->request->getPost('Nome'),
            'Descricao' => $this->request->getPost('Descricao'),
            'Unidade_Medida' => $this->request->getPost('Unidade_Medida')
        ];
        $data = json_decode(file_get_contents("php://input"));

        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];

        //   return $this->respondCreated($data, 201);
        return $this->respondCreated($response);
    }

    // create a product
    /* public function create()
     {
         $model = new ProdutosModel();
         $data = [
             'Nome' => $this->request->getVar('Nome'),
             'Descricao' => $this->request->getVar('Descricao'),
             'Unidade_Medida' => $this->request->getVar('Unidade_Medida')
 
         ];
         $model->insert($data);
         $response = [
             'status'   => 201,
             'error'    => null,
             'messages' => [
                 'success' => 'Data Saved'
             ]
         ];
         return $this->respondCreated($response);
     }
  */


   /** * Função que atualiza um produto específico *
     *  @param Int $id * Id do produto
     *  @return $response = resposta da requisição PUT na  
     * */
    public function update($id = null)
    {
        $model = new ProdutosModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'Nome' => $json->Nome,
                'Descricao' => $json->Descricao,
                'Unidade_Medida' => $json->Unidade_Medida


            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'Nome' => $input['Nome'],
                'Descricao' => $input['Descricao'],
                'Unidade_Medida' => $input['Unidade_Medida']

            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    /** * Função que deleta um produto específico *
     *  @param Int $id * Id do produto a ser deletado
     *  @return $response = resposta da requisição DELETE na API
     * */
    public function delete($id = null)
    {
        $model = new ProdutosModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }
}

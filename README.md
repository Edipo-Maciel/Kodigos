## CRUD Simples no React consumindo API REST PHP no CodeIgniter 4

Este pequeno projeto apresenta um CRUD básico que trabalha no front-end, utilizando REACT.JS  capaz de operar funcionalidades: inserir, editar e remover registros de produtos que estão sendo acessados a uma API RESTful [PHP] e um banco de dados [MySQL] que foram implementados em CodeIgniter 4.

### Documentação da API REST

>Documentação da API REST , desenvolvida em CodeIgniter 4
>
>Link : https://documenter.getpostman.com/view/15853202/TzXukJuD


### Tecnologias

Most of the technologies used for the projects:

* [React Js] - Uma biblioteca JavaScript para criar interfaces de usuário - https://pt-br.reactjs.org/
* [PHP] - PHP é uma linguagem de script de uso geral popular, especialmente adequada para desenvolvimento web. https://www.php.net/
* [CodeIgniter] - Framework do PHP - http://codeigniter.com/
* [MySQL] - Banco de Dados - https://www.mysql.com/
* [node.js] - Javascript runtime enviroment.
* [Postman] - Every back-end developers favorite front-end.
* [Visual Studio Code] - https://code.visualstudio.com/
* [Github] - https://github.com/



### Configuração do banco de dados Mysql

>1. No banco de dados, crie uma database com o comando a seguir:
>
>create database kodigos;
>
>![image-20210524072007600](C:\Users\Edipo Maciel\AppData\Roaming\Typora\typora-user-images\image-20210524072007600.png)
>
>2. Depois, vá para a aba Importar, conforme imagem a seguir, clique em Escolher ficheiro e abra o arquivo kodigos.sql que está no diretório raiz.
>3. ![image-20210524072229089](C:\Users\Edipo Maciel\AppData\Roaming\Typora\typora-user-images\image-20210524072229089.png),
>
>



3. Depois de executado, você terá a base de dados kodigos, com as tabelas estoque e produto.

### Instalação e execução da API REST (PHP)
>Para rodar a API REST, precisa de um servidor Apache com PHP, neste exemplo , estou usando o XAMPP na minha máquina local:
>
>Link para download Xampp: https://www.apachefriends.org/pt_br/download.html
>
>Depois de instalado o Xampp , descompacte o arquivo do GitHub na pasta htdocs/ no Xampp.
>
>No seu terminal, caminhe para  a pasta onde se encontra o projeto e entre na pasta backend: xampp/htdocs/projetoKodigos/backend e rode o seguinde comando:
```sh
$ php spark serve
```

Isso irá inicializar o servidor para funcionar a API REST na porta : http//:localhost:8080/produtos

### Instalação do Front-End

>Requisitos: Node.js e Npm instalados na sua máquina:
>
>Link para download do Node.js , caso não tenha: https://nodejs.org/en/
>
>No seu terminal, caminhe para  a pasta onde se encontra o projeto Front-End e entre na pasta frontend: xampp/htdocs/projetoKodigos/frontend e rode o seguinde comando:

```sh

$ npm start
```

Isso irá iniciar o servidor do React, e irá executar o frontend da aplicação:



----
Created by: Edipo Maciel
Livre para uso, livre para modificar.
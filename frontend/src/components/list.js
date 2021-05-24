import React from 'react';
import { Link } from 'react-router-dom';
 
class Products extends React.Component {
    constructor(props) {
        super(props);
        this.state = {products: []};
        this.headers = [
            { key: 'Id', label: 'Id'},
            { key: 'Nome', label: 'Nome' },
            { key: 'Descricao', label: 'Descricao' },
            { key: 'Unidade_Medida', label: 'Unidade_Medida' }
        ];
        this.deleteProduct = this.deleteProduct.bind(this);
    }
     
     async componentDidMount() {
        fetch('http://localhost:8080/produtos')
             .then(response => {
                return response.json();
            }).then(result => {
                console.log(result);
                this.setState({
                    products:result
                });
            });
    }
     
    deleteProduct(Id) {
        if(window.confirm("Are you sure want to delete?")) {
            fetch('http://localhost:8080/produtos/' + Id, {
                                method : 'DELETE'
                                   }).then(response => { 
                    if(response.status === 200) {
                        alert("Product deleted successfully");
                        fetch('http://localhost:8080/produtos')
                        .then(response => {
                            return response.json();
                        }).then(result => {
                            console.log(result);
                            this.setState({
                                products:result
                            });
                        });
                    } 
             });
        }
    }
     
    render() {
        return (
            <div id="container">
                <Link to="/create">Adicionar Produto</Link>
                <p/>
                <table>
                    <thead>
                        <tr>
                        {
                            this.headers.map(function(h) {
                                return (
                                    <th key = {h.key}>{h.label}</th>
                                )
                            })
                        }
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            this.state.products.map(function(item, key) {
                            return (
                                <tr key = {key}>
                                  <td>{item.Id}</td>
                                  <td>{item.Nome}</td>
                                  <td>{item.Descricao}</td>
                                  <td>{item.Unidade_Medida}</td>
                                 
                                  <td>
                                        <Link to={`/update/${item.Id}`}>Editar</Link>
                                        &nbsp;&nbsp;
                                        <a href="javascript:void(0);" onClick={this.deleteProduct.bind(this, item.Id)}>Deletar</a>
                                  </td>
                                </tr>
                                            )
                            }.bind(this))
                        }
                    </tbody>
                </table>
            </div>
        )
    }
}
 
export default Products;
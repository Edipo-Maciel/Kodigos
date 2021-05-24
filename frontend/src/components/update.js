import React from 'react';
import { Link, withRouter } from 'react-router-dom';

class Update extends React.Component {

    

    constructor(props) {
        super(props);
        this.state = { Id: '', Nome: '', Descricao: '', Unidade_Medida: ''};
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    componentDidMount() {
        fetch("http://localhost:8080/produtos/" + this.props.match.params.Id)
            .then(response => {
                return response.json();
            }).then(result => {
                console.log(result);
                this.setState({
                    Id: result.Id,
                    Nome: result.Nome,
                    Descricao: result.Descricao,
                    Unidade_Medida: result.Unidade_Medida
                    
                });
            });
    }
    handleChange(event) {
        const state = this.state
        state[event.target.name] = event.target.value
        this.setState(state);
    }
    handleSubmit(event) {
        event.preventDefault();
        alert(this.props.match.params.Id);
        fetch("http://localhost:8080/produtos/"+ this.props.match.params.Id, {
            method: 'PUT',
            body: JSON.stringify({
                Nome: this.state.Nome,
                Descricao: this.state.Descricao,
                Unidade_Medida: this.state.Unidade_Medida
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(response => {
            if (response.status === 200) {
                alert("Product update successfully.");
            }
        });
    }
    render() {
        return (
            <div id="container">
                <Link to="/">Products</Link>
                <p />
                <form onSubmit={this.handleSubmit}>
                    <input type="hidden" name="Id" value={this.state.Id} />
                    <p>
                        <label>Nome:</label>
                        <input type="text" name="Nome" value={this.state.Nome} onChange={this.handleChange} placeholder="Nome" />
                    </p>
                    <p>
                        <label>Descricao:</label>
                        <input type="text" name="Descricao" value={this.state.Descricao} onChange={this.handleChange} placeholder="Descricao" />
                    </p>
                    <p>
                        <label>Selling Price:</label>
                        <input type="text" name="Unidade_Medida" value={this.state.Unidade_Medida} onChange={this.handleChange} placeholder="Unidade_Medida" />
                    </p>
                    
                    <p>
                        <input type="submit" value="Submit" />
                    </p>
                </form>
            </div>
        );
    }
}
export default Update;
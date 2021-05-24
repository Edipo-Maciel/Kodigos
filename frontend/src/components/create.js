import React from 'react';
import { Link } from 'react-router-dom';
 
class Create extends React.Component {

    $url = "http://localhost:8080/produtos" ;
   
  constructor(props) {
    super(props);
    this.state = {Nome: '', Descricao:'', Unidade_Medida:''};
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
   
  handleChange(event) {
      const state = this.state
      state[event.target.name] = event.target.value
      this.setState(state);
  }
   
  handleSubmit(event) {
      event.preventDefault();
      fetch(this.$url, {
            method: 'POST',
            body: JSON.stringify({
                Nome: this.state.Nome,
                Descricao: this.state.Descricao,
                Unidade_Medida: this.state.Unidade_Medida
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(response => {
                if(response.status === 201) {
                    alert("New product saved successfully");
                    
                }
            });
  }
   
  render() {
    return (
        <div id="container">
          <Link to="/">Products</Link>
              <p/>
              <form onSubmit={this.handleSubmit}>
                <p>
                    <label>Name:</label>
                    <input type="text" name="Nome" value={this.state.Nome} onChange={this.handleChange} placeholder="Nome" />
                </p>
                <p>
                    <label>Price:</label>
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
 
export default Create;
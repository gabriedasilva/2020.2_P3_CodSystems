/*global require*/
import api from './services/api.js';
import qs from 'qs'
import { Alert } from 'react-native';

var matricula = '';
var senha = '';
var customToken = '';


//var dataJson_string = "data=" + JSON.stringify(dataJSON_obj);
const loginAction = async (matricula,senha) =>{
    var usuario_OBJ;
var dataJSON_obj = {"matricula": matricula,"senha":senha}
   await api.post("/mob/signin", qs.stringify(dataJSON_obj))  ///POST REFERENTE AO LOGIN
        .then(function (response) {
if(response.data.content !== null){            
   if(response.data.content.data != null){
    usuario_OBJ = (response.data.content.data)
        if(usuario_OBJ != null){
        console.log('Usuário Coletado Com Sucesso!')
        console.log(usuario_OBJ)
        return usuario_OBJ
    }else{
        console.error('Falha ao Coletar O Usuário')
    }
    console.warn('OBJETO COLETADO');
    console.log(response.data.content.data)
   
   }else{
       console.log('Erro >>>')
       var ex = (response.data.content.responseMessage);
       Alert.alert('Erro!',ex);
       console.log(response.data.content.responseMessage);
   }
}else{
    console.error('ERRO CONTENT DATA NULO??')
    console.log(response.data.content.data)
}
        })
        .catch((err) => {
            console.error(err);
        });     
}


async function homeInfos(matricula, idAluno) {
    console.log(matricula + " " + idAluno);
    var dataHomeJSON_obj = { "matricula": matricula, "id": idAluno };
   await api.post("/mob/homeAcc", qs.stringify(dataHomeJSON_obj))
        .then(function (response) {
            console.log(idAluno + "  " + matricula);
            const aulasMateria = Object.values(response.data.content.horario);
            console.log(aulasMateria);
            return this.response.data.content.horario;
        })
        .catch((err) => {
            console.log(err);
        });
}
export{
    loginAction,
    homeInfos}
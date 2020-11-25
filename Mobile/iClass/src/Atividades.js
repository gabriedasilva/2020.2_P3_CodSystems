import React, { Component } from 'react'
import { Text, View, ScrollView, StyleSheet,TouchableOpacity,SafeAreaView,FlatList} from 'react-native'
import api from './services/api'
import { Card, Title } from 'react-native-paper'
import qs from 'qs'
import AsyncStorage from '@react-native-async-storage/async-storage'
export class Atividades extends Component {

  state = {
    docs:[],doc: [],doc1:[],doc2:[],doc3:[],doc4:[]
  }
  componentDidMount() {
   this.getUsuario();
  }
  getUsuario = async()=>{
    const usuarioJSONstr = await AsyncStorage.getItem('Usuario');
    const usuarioJSON = await JSON.parse(usuarioJSONstr)
    const user = usuarioJSON
    const turma = user.turma;
    console.log("SAIU NA HOME KRL:"+usuarioJSONstr);
    console.log(user.id)
    this.getAtividades(turma);
  }
  
  getAtividades = async (turma) => {
    const data_OBJ = { 'turma': turma };
    const response = await api.post('/mob/atividades', qs.stringify(data_OBJ));
    const docc = response.data.content.atividades;
    const ativString = JSON.stringify(docc);
    const ativOBJ = JSON.parse(ativString);
    const docs = ativOBJ;
   
    this.setState({ docs })

    console.log(docs)
  }
 
  renderiTem=({item})=>(
    <View style={styles.cardView}>
    <Card style={styles.cardModel}>
      <Card.Content >
  <Title style={styles.cardTitle}>{item.disciplina}</Title>
  <Text >{item.titulo}</Text>
  <Text>{item.descricao}</Text>
  <Text>{item.entrega}</Text>
      </Card.Content>
    </Card>
    </View>

  )

  render() {
    return(
      <View style={{flex:1}}>
      <View style={styles.background}>
    
       <FlatList
        data={this.state.docs}
        keyExtractor={item => item.id}
       renderItem={this.renderiTem}
       />
       </View>
       <View style={{width:'100%'}}>
       <TouchableOpacity style={styles.btnBack} onPress={() => this.props.navigation.navigate("Home")}>
            <Text style={styles.textBtnBack}>Voltar</Text>
        </TouchableOpacity>
        </View>
        </View>
     );
    }
  }
const styles = StyleSheet.create({
  cardModel:{
    padding:20,
  },
  cardView:{
    margin:10
  },
  cardTitle:{
    fontSize:24,
    fontWeight:'bold',
    alignSelf:"center"
  }
  ,btnBack: {
    backgroundColor: '#2196f3',
    alignItems: 'center',
    padding: 10,
    borderRadius: 10,
    margin: 16,
},
textBtnBack: {
    color: '#ffffff',
    fontSize: 18,
    fontWeight: "bold"
},
background: {
  backgroundColor: '#2196f3',
  borderBottomEndRadius:16,
  borderBottomStartRadius:16,
  padding:10,
  flex: 1,
  alignItems: 'center'
},
scrollStyle: {
  backgroundColor: '#2196f3',
  flex: 1,
  margin:10,
  borderRadius:16
},
})
export default Atividades

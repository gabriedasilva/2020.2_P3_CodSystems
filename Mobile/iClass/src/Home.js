
import * as React from 'react';
import {
  Text,
  View,
  SafeAreaView,
  Image,
  TouchableOpacity,
  ScrollView,
  StyleSheet
} from 'react-native';
import api from './services/api'
import qs from 'qs'
import AsyncStorage from '@react-native-async-storage/async-storage'
import { Card } from 'react-native-paper'
import Carousel from 'react-native-snap-carousel';

const avisoCard1 = ['Aviso1', "AVISO SERÃO COLOCADOS AQUI"];
const avisoCard2 = ['Aviso2', "AVISO SERÃO COLOCADOS AQUI"];
const avisoCard3 = ['Aviso3', "AVISO SERÃO COLOCADOS AQUI"];
const avisoCard4 = ['Aviso4', "AVISO SERÃO COLOCADOS AQUI"];





const numeroRandom = () => {
  const rand = Math.floor(Math.random() * 7);
  console.log(rand)
  return rand;
}

const diaAtual = new Date().getDay();
const diasSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado']
const horaSeg = ['1a', '1b', '1c', '1d'];
const horaTer = ['2a', '2b', '2c', '2d'];
const horaQua = ['3a', '3b', '3c', '3d'];
const horaQui = ['4a', '4b', '4c', '4d'];
const horaSex = ['5a', '5b', '5c', '5d'];


class App extends React.Component {

  
    state = {
      activeIndex: 0,
      enableSnap: true,
      carouselItems:[]
    }
  
    getUsuario = async()=>{
      const usuarioJSONstr = await AsyncStorage.getItem('Usuario');
      const usuarioJSON = await JSON.parse(usuarioJSONstr)
      const user = usuarioJSON
      const idAluno = user.id;
      const matAluno = user.matricula;
      console.log("SAIU NA HOME KRL:"+usuarioJSONstr);
      console.log(user.id)
      this.loadHorario(matAluno,idAluno);
    }
  
    componentDidMount() {
      this.getUsuario();
     
  
    }
    loadHorario = async (matricula,id) => {
      var dataJSON_obj = { "matricula":matricula, "id":id}
      const response = await api.post("/mob/homeAcc", qs.stringify(dataJSON_obj));
      const docs = response.data.content.horario//DOCCCS JA é um OBJ BASTA SE REFERIRR A VARIAVEL REFENTENTE AO OBJETO
      this.montar(docs)
    };
    montar = async(docs)=>{
      console.log("dentro do montar")
      const dom_OBJ = {"id":0,"a":'N/A',"b":'N/A',"c":'N/A',"d":'N/A',"dia":"Domingo"}
      const seg_OBJ = {"id":1,"a":docs.segA,"b":docs.segB,"c":docs.segC,"d":docs.segD,"dia":"Segunda-Feira"}
      const ter_OBJ = {"id":2,"a":docs.terA,"b":docs.terB,"c":docs.terC,"d":docs.terD,"dia":"Terça-Feira"}
      const qua_OBJ = {"id":3,"a":docs.quaA,"b":docs.quaB,"c":docs.quaC,"d":docs.quaD,"dia":"Quarta-Feira"}
      const qui_OBJ = {"id":4,"a":docs.quiA,"b":docs.quiB,"c":docs.quiC,"d":docs.quiD,"dia":"Quinta-Feira"}
      const sex_OBJ = {"id":5,"a":docs.sexA,"b":docs.sexB,"c":docs.sexC,"d":docs.sexD,"dia":"Sexta-Feira"}
      const sab_OBJ = {"id":6,"a":'N/A',"b":'N/A',"c":'N/A',"d":'N/A',"dia":"Sábado"}
     const carouselItems = [dom_OBJ,seg_OBJ,ter_OBJ,qua_OBJ,qui_OBJ,sex_OBJ,sab_OBJ]
     this.setState({carouselItems})
     console.log(carouselItems)
      
    }

  _renderItem({ item, index }) {  /////RENDER
    return (
      <TouchableOpacity >
        <View style={{
          backgroundColor: 'floralwhite',
          borderRadius: 4,
          height: 250,
          padding: '10%',
          marginLeft: 25,
          marginRight: 25,
        }}>

          <Text style={{ fontSize: 28,fontWeight:'bold',color:'#2196f3' }}>{item.dia}</Text>
          <Text style={styles.textCarousel}>A-{item.a}</Text>
          <Text style={styles.textCarousel}>B-{item.b}</Text>
          <Text style={styles.textCarousel}>Intervalo</Text>
          <Text style={styles.textCarousel}>C-{item.c}</Text>
          <Text style={styles.textCarousel}>D-{item.d}</Text>
        </View>
      </TouchableOpacity>
    )
  }

  render() {
    return (

      <SafeAreaView style={{ flex: 1, backgroundColor: '#2196f3',alignItems:"center"}}>
         <View style={styles.headerStyle}>
          <View style={styles.topLogo}>
            <Image style={styles.imageContainer} source={require('./assets/logo.png')} />
          </View>
          <View style={styles.usericonContaier}>
            <TouchableOpacity onPress={()=> this.props.navigation.navigate('Perfil')}>
              <Image style={styles.usericon} source={require('./assets/icon/usericon.png')} />
            </TouchableOpacity>
          </View>
        </View>
        <View style={{ backgroundColor: '#2196f3', height: '10%' }} />
        <View style={{ width: '100%', paddingTop: 8, paddingBottom: 8, flexDirection: 'row', justifyContent: 'center', backgroundColor: '#2196f3' }}>
          <Carousel
            layout={"default"}
            ref={ref => this.carousel = ref}
            data={this.state.carouselItems}
            sliderWidth={420}
            itemWidth={300}
            renderItem={this._renderItem}
            onSnapToItem={index => this.setState({ activeIndex: index })}
            firstItem={diaAtual}

          />
        </View>
        <View style={{ backgroundColor: '#2196f3' }}>
          <View style={{ padding: -20, flexDirection: 'row' ,flex:1,margin:10}}>
            <View style={styles.btnNAVS}>
            <TouchableOpacity onPress={()=> this.props.navigation.navigate('Atividades')}>
            <Text style={{marginLeft:25,fontSize:18,fontWeight:'bold',color:"#fff"}}>ATIVIDADES</Text>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/pencil-ruler.png')}
              />
            
            </TouchableOpacity>
            </View>
            <View style={styles.btnNAVS}>
              
            <TouchableOpacity onPress={()=> this.props.navigation.navigate('Notas')}>
            <Text style={{marginLeft:55,fontSize:18,fontWeight:'bold',color:"#fff"}}>NOTAS</Text>
              <Image
                style={styles.imageView2}
                source={require('./assets/icon/award-solid.png')}
              />
            </TouchableOpacity>
            </View>
          </View>
        </View>
        
      </SafeAreaView>
    );
  }
}

const styles = StyleSheet.create({
  imageView: {
    alignItems:"center",
    justifyContent:'center',
width:100,
height:100,
marginLeft:25,
tintColor:'white'
},
textCarousel:{
  fontSize:16,
  margin:4
},
  imageView2: {
    alignItems:'center',
    justifyContent:"center",
    marginTop:0,
    width:90,
    height:120,
    marginLeft:40,
    tintColor:"white"
      },
  avisosView: {
    flex: 1, backgroundColor: '#989989',
  },
  btnNAVS:{width:150,height:150,margin:20},
  btnNAV_img:{width:120,height:120,padding:10},
  avisosCard: {
    margin: 6,
    padding: 10
  },
  usericon: {
    width: 50,
    height: 50,
    tintColor: '#FFF'
  },
  usericonContaier: {
    marginLeft: 60
  },
  imageContainer: {
    width: 160,
    height: 80,
  },
  headerStyle: {
    flexDirection: 'row',
    width: '40%',
    alignItems: "center",
  },
  topLogo: {
    padding: 10,
    borderRadius: 16,
    backgroundColor: '#262626'
  },
});



export default App;

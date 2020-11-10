import * as React from 'react';
import {
  Text,
  View,
  SafeAreaView,
  TouchableOpacity,
  StyleSheet
} from 'react-native';

import Carousel from 'react-native-snap-carousel';


const numeroRandom = () => {
 const rand = Math.floor(Math.random() * 7);
  console.log(rand)
  return rand;
}
 

const diaAtual = new Date().getDay().toString();
const diasSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado']
const horaSeg = ['1a', '1b', '1c', '1d'];
const horaTer = ['2a', '2b', '2c', '2d'];
const horaQua = ['3a', '3b', '3c', '3d'];
const horaQui = ['4a', '4b', '4c', '4d'];
const horaSex = ['5a', '5b', '5c', '5d'];

export default class App extends React.Component {

  constructor(props) {
    
    super(props);
    this.state = {
      activeIndex: 0,
      enableSnap: true,
      carouselItems: [
        {
          title: diasSemana[0],
          aHora: "",
          bHora: '',
          cHora: '',
          dHora: '',

        },
        {
          title: diasSemana[1],
          aHora: horaSeg[0],
          bHora: horaSeg[1],
          cHora: horaSeg[2],
          dHora: horaSeg[3],

        },
        {
          title: diasSemana[2],
          aHora: horaTer[0],
          bHora: horaTer[1],
          cHora: horaTer[2],
          dHora: horaTer[3],
        },
        {
          title: diasSemana[3],
          aHora: horaQua[0],
          bHora: horaQua[1],
          cHora: horaQua[2],
          dHora: horaQua[3],
        },
        {
          title: diasSemana[4],
          aHora: horaQui[0],
          bHora: horaQui[1],
          cHora: horaQui[2],
          dHora: horaQui[4],
        },
        {
          title: diasSemana[5],
          aHora: horaSex[0],
          bHora: horaSex[1],
          cHora: horaSex[2],
          dHora: horaSex[3],
        },
        {
          title: diasSemana[6],
          aHora: "",
          bHora: '',
          cHora: '',
          dHora: '',

        },
      ]
    }
  }

  _renderItem({ item, index }) {
    return (
      <View style={{
        backgroundColor: 'floralwhite',
        borderRadius: 5,
        height: 250,
        padding: 50,
        marginLeft: 25,
        marginRight: 25,
      }}>

        <Text style={{ fontSize: 30 }}>{item.title}</Text>
        <Text>{item.aHora}</Text>
        <Text>{item.bHora}</Text>
        <Text>Intervalo</Text>
        <Text>{item.cHora}</Text>
        <Text>{item.dHora}</Text>
      </View>
    )
  }

  render() {
  
    return (
        
      <SafeAreaView style={{ flex: 1, backgroundColor: 'rebeccapurple', paddingTop: 50, }}>



        <View style={{ flex: 1, flexDirection: 'row', justifyContent: 'center', }}>

          <Carousel
            layout={"default"}
            ref={ref => this.carousel = ref}
            data={this.state.carouselItems}
            sliderWidth={300}
            itemWidth={300}
            renderItem={this._renderItem}
            onSnapToItem={index => this.setState({ activeIndex: index })} 
            firstItem={diaAtual}
            />
        </View>
        <View> 
          <TouchableOpacity onPress={() => this.carousel.snapToItem(diaAtual)}
            style={styles.btnTeste}>
            <Text>{diaAtual}</Text>

          </TouchableOpacity>
        </View>
      </SafeAreaView>

    );
  }
}



const styles = StyleSheet.create({
  btnTeste:
  {
    backgroundColor: '#FFFFFF', margin: 16, padding: 8, alignItems: 'center', borderRadius: 8
  }
})


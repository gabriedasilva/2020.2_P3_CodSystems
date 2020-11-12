
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
      <TouchableOpacity >
        <View style={{
          backgroundColor: 'floralwhite',
          borderRadius: 4,
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
      </TouchableOpacity>
    )
  }

  render() {
    return (

      <SafeAreaView style={{ flex: 1, backgroundColor: 'rebeccapurple' }}>
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
          <View style={{ padding: 11, flexDirection: 'row' }}>
            <TouchableOpacity onPress={() => console.log("SOCORRO")}>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/clock.png')}
              />
            </TouchableOpacity>
            <TouchableOpacity>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/calendar.png')}
              />
            </TouchableOpacity>
            <TouchableOpacity>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/documento.png')}
              />
            </TouchableOpacity>
          </View>
        </View>
        <ScrollView style={styles.avisosView}>

          <Card style={styles.avisosCard}>
            <Card.Title title={avisoCard1[0]} ></Card.Title>
            <Card.Content>
              <Text>{avisoCard1[1]}</Text>
            </Card.Content>
          </Card>

          <Card style={styles.avisosCard}>
            <Card.Title title={avisoCard2[0]} ></Card.Title>
            <Card.Content>
              <Text>{avisoCard2[1]}</Text>
            </Card.Content>
          </Card>

          <Card style={styles.avisosCard}>
            <Card.Title title={avisoCard3[0]} ></Card.Title>
            <Card.Content>
              <Text>{avisoCard3[1]}</Text>
            </Card.Content>
          </Card>

          <Card style={styles.avisosCard}>
            <Card.Title title={avisoCard4[0]} ></Card.Title>
            <Card.Content>
              <Text>{avisoCard4[1]}</Text>
            </Card.Content>
          </Card>


        </ScrollView>
      </SafeAreaView>
    );
  }
}

const styles = StyleSheet.create({
  imageView: {
    width: 110,
    height: 110,
    marginLeft: 12,
    marginRight: 12,
    borderColor: '#2196f3',
    borderWidth: 1,
  },
  avisosView: {
    flex: 1, backgroundColor: '#989989',
  },
  avisosCard: {
    margin: 6,
    padding: 10
  }
});



export default App;

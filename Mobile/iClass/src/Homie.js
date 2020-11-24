import React, { Component } from 'react'
import { ScrollView, FlatList, TouchableOpacity, Image, Text, View } from 'react-native'
import api from './services/api'
import qs from 'qs'
import { Card } from 'react-native-paper'
import { StyleSheet } from 'react-native'
import { useNavigation } from '@react-navigation/native'
export default class Home extends Component {

 state = {
    docs: [],
  }
 
  componentDidMount() {

    this.loadHorario();

  }
  loadHorario = async () => {
    var dataJSON_obj = { "matricula": '123123', "id": 11 }
    const response = await api.post("/mob/homeAcc", qs.stringify(dataJSON_obj));
    const docs = response.data.content.horario//DOCCCS JA é um OBJ BASTA SE REFERIRR A VARIAVEL REFENTENTE AO OBJETO
    
    console.log(docs)
    this.setState({ docs })
  };

  render() {
    return (
      <View style={styles.background}>
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
        <ScrollView style={styles.scrollContainer} showsHorizontalScrollIndicator={false} horizontal={true}>
          <View style={styles.cardContainer}>
            <Card style={styles.cardView}>
              <Card.Title>Segunda</Card.Title>
              <Card.Content>
                <Text>A:{this.state.docs.segA}</Text>
                <Text>B:{this.state.docs.segB}</Text>
                <Text>C:{this.state.docs.segC}</Text>
                <Text>D:{this.state.docs.segD}</Text>
              </Card.Content>
            </Card>
          </View>
          <View style={styles.cardContainer}>
            <Card style={styles.cardView}>
              <Card.Title>Terça</Card.Title>
              <Card.Content>
                <Text>A:{this.state.docs.terA}</Text>
                <Text>B:{this.state.docs.terB}</Text>
                <Text>C:{this.state.docs.terC}</Text>
                <Text>D:{this.state.docs.terD}</Text>
              </Card.Content>
            </Card>
          </View>
          <View style={styles.cardContainer}>
            <Card style={styles.cardView}>
              <Card.Title>Segunda</Card.Title>
              <Card.Content>
                <Text>A:{this.state.docs.quaA}</Text>
                <Text>B:{this.state.docs.quaB}</Text>
                <Text>C:{this.state.docs.quaC}</Text>
                <Text>D:{this.state.docs.quaD}</Text>
              </Card.Content>
            </Card>
          </View>
          <View style={styles.cardContainer}>
            <Card style={styles.cardView}>
              <Card.Title>Segunda</Card.Title>
              <Card.Content>
                <Text>A:{this.state.docs.quiA}</Text>
                <Text>B:{this.state.docs.quiB}</Text>
                <Text>C:{this.state.docs.quiC}</Text>
                <Text>D:{this.state.docs.quiD}</Text>
              </Card.Content>
            </Card>
          </View>
          <View style={styles.cardContainer}>
            <Card style={styles.cardView}>
              <Card.Title>Segunda</Card.Title>
              <Card.Content>
                <Text>A:{this.state.docs.sexA}</Text>
                <Text>B:{this.state.docs.sexB}</Text>
                <Text>C:{this.state.docs.sexC}</Text>
                <Text>D:{this.state.docs.sexD}</Text>
              </Card.Content>
            </Card>
          </View>
        </ScrollView>
        <View style={{ backgroundColor: '#2196f3' }}>
          <View style={{ padding: 11, flexDirection: 'row' }}>
            <TouchableOpacity onPress={() => console.log("SOCORRO")}>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/clock.png')}
              />
            </TouchableOpacity>
            <TouchableOpacity onPress={()=> this.props.navigation.navigate('Atividades')}>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/calendar.png')}
              />
            </TouchableOpacity>
            <TouchableOpacity onPress={()=> this.props.navigation.navigate('Notas')}>
              <Image
                style={styles.imageView}
                source={require('./assets/icon/documento.png')}
              />
            </TouchableOpacity>
          </View>
        </View>
        <ScrollView style={styles.avisosView}>


        </ScrollView>


      </View>
    )
  }
}
const styles = StyleSheet.create({
  background: {
    backgroundColor: '#2196f3',
    flex: 1,
    alignItems: 'center'
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
  imageContainer: {
    width: 160,
    height: 80,
  },
  cardContainer: {
    width: 250,
    height: 250,
    margin: 20
  },
  cardView: {
    width: 250,
    height: 250,
    padding: 10,
    alignItems: 'center',
    justifyContent: 'center'
  },
  scrollContainer: {
    flex: 1
  },
  usericon: {
    width: 50,
    height: 50,
    tintColor: '#FFF'
  },
  usericonContaier: {
    marginLeft: 60
  }
})

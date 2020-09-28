import React from 'react';
import { View, KeyboardAvoidingView, Image, TextInput, TouchableOpacity, StyleSheet, Text } from 'react-native';

const App = () => {
  return (

    <KeyboardAvoidingView style={styles.background}>
      <View style={styles.imgContainer}>
        <Image

          source={require('./src/assets/logo256w.png')}
        />
      </View>

      <View style={styles.container}>

        <TextInput
          style={styles.input}
          placeholder="Matrícula"
          autoCorrect={false}
        />

        <TextInput
            style={styles.input}
          placeholder="Senha"
          autoCorrect={false}
        />

        <TouchableOpacity style={styles.btnSubmit}>
          <Text style={styles.submitText}
          onPress={() => { }}>Acessar</Text>
        </TouchableOpacity>

        <TouchableOpacity>
          <Text style={styles.textWhiteL} onPress={() => { }}>Esqueci a Senha!</Text>
        </TouchableOpacity>

      </View>
      <View style={styles.emptyContainer}></View>
      <View>
<Text style={styles.textWhiteL}>iClass - CodSystems 2020</Text>
      </View>
    </KeyboardAvoidingView>

  )
};
const styles = StyleSheet.create({ // Estilos
  background: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#2196f3'
  },
  imgContainer: {
    justifyContent: 'center',
    flex: 1,
  },
  container: {
    backgroundColor:'#212121',
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    width: '90%',
    borderRadius:30,

  },
  input:{
    backgroundColor:'#EEEEEE',
    width:'90%',
    borderRadius:10,
    marginBottom:10,
    fontSize:17,
    padding:10,
    color:'#222',
  },
  textWhiteL:{
color:'#fff'
  },
  btnSubmit:{
    backgroundColor:'#009900',
    padding:10,
    width:'90%',
    justifyContent:'center',
    alignItems:'center',
    borderRadius:10
  },
  submitText:{
color:'#fff',
fontSize:20
  },
  emptyContainer:{
  height:'20%'
  }
  

});

export default App;

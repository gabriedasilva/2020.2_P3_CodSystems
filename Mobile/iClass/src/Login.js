
import { View, KeyboardAvoidingView, Image, TextInput, TouchableOpacity, StyleSheet, Text } from 'react-native';
import {NavigationContainer, useTheme} from '@react-navigation/native';
import React from 'react';

export default function App({navigation}) {
  return (

    <KeyboardAvoidingView style={styles.background}>
     

      <View style={styles.container}>
      <View style={styles.imgContainer}>
        <Image

          source={require('./assets/logo.png')}
        />
      </View>
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

        <TouchableOpacity style={styles.btnSubmit} onPress={() => navigation.navigate('Home') }>
          <Text style={styles.submitText}>Acessar</Text>
        </TouchableOpacity>

        <TouchableOpacity    onPress={() => navigation.navigate('Profile') }>
          <Text style={styles.textWhiteS}>Esqueci a Senha!</Text>
        </TouchableOpacity>

      </View>
      <View style={styles.emptyContainer}></View>
      <View>
<Text style={styles.textWhiteL}>iClass - CodSystems 2020</Text>
      </View>
    </KeyboardAvoidingView>
  );
}

const styles = StyleSheet.create({ // Estilos
  background: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#2196f3'
  },
  imgContainer: {
    justifyContent: 'center',
    marginBottom:'10%'
  },
  container: {
    backgroundColor:'#262626',
    padding:'5%',
    alignItems: 'center',
    justifyContent: 'center',
    width: '80%',
     borderRadius:15,

  },
  input:{
    backgroundColor:'#EEEEEE',
    width:'90%',
    borderRadius:10,
    marginBottom:10,
    fontSize:20,
    padding:10,
    color:'#222',
  },
  textWhiteL:{
color:'#fff'
  },
  textWhiteS:{
    color:'#fff',
    textDecorationLine:'underline'
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


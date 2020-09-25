import React from 'react';
import { View, KeyboardAvoidingView, Image, TextInput, TouchableOpacity, StyleSheet, Text } from 'react-native';

const App = () => {
  return (
    
<KeyboardAvoidingView style={styles.background}>
      <View>
        <Image
          source={require('./src/assets/logo.png')}
        />
      </View>
      <View>
        <TextInput
          placeholder="Email"
          autoCorrect={false}
          onChangeText={() => { }}
        />

        <TextInput
          placeholder="Senha"
          autoCorrect={false}
          onChangeText={() => { }}
        />

        <TouchableOpacity>
          <Text onPress={() => {}}>Acessar</Text>
        </TouchableOpacity>
        <TouchableOpacity>
          <Text onPress={() => {}}>Esqueci a Senha!</Text>
        </TouchableOpacity>
      </View>
      </KeyboardAvoidingView>
 
  );
};
const styles = StyleSheet.create({ // Estilos
  background:{
    flex: 1,
    alignContent: 'center',
    justifyContent: 'center',
    backgroundColor: '#191919'
  }
});

export default App;

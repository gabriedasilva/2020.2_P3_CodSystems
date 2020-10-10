import React from 'react';
import { View, Text,StyleSheet } from 'react-native';

export default function Home() {
  return (
    <View
    style={styles.bgHome}
    >
      <View style={styles.div1}>
    <Text>aqui</Text>
      </View>
      <Text>Home</Text>
     </View>
  );

}
const styles = StyleSheet.create({
bgHome:{
  backgroundColor:'#FFF',
  flex:1,justifyContent:'center',
  alignItems:'center'
},
div1:{
  backgroundColor:'#2196f3',
}


});


import React from 'react';
import { View, Text,StyleSheet } from 'react-native';
import { FAB } from 'react-native-paper';


export default function Home() {
  return (
    <View
    style={styles.bgHome}
    >
     <FAB
    style={styles.fab}
    medium
    icon='icon'
    onPress={() => console.log('Pressed')}
  />
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
},
fab: {
  position: 'absolute',
  margin: 20,
  right: 0,
  bottom: 10,
  backgroundColor:'#2196f3'
},


});


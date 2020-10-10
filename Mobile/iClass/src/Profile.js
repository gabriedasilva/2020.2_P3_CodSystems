import React from 'react';
import { View, Text,StyleSheet,Image } from 'react-native';

export default function Profile() {
  return (
    <View style={style.containerBg}>
    <View style={style.profileContainer}>
       <View style={style.imageContainer}>
        <Image
          source={require('./assets/user.jpg')}
        />
      </View>
      <View style={style.container}>
        <View style={style.infosContainer}>
        <Text>
          Nome
        </Text>
      </View>
      <View style={style.infosContainer}>
        <Text>
          Nome
        </Text>
      </View>
      <View style={style.infosContainer}>
        <Text>
          Serie 
        </Text>
      </View>
      <View style={style.infosContainer}>
        <Text>
          idade 
        </Text>
        </View>
      </View>
     </View>
     <View style={style.teste}>
       <Text>
       </Text>
     </View>
     </View>
  );
}
      const style = StyleSheet.create({
profileContainer:{
borderRadius:15,
flexDirection:'row',
backgroundColor:'#2196f3',
},
imageContainer:{
margin:10,
justifyContent:'center',
alignItems:'center'
},
container:{
justifyContent:'center',
width:'100%',
padding:15
},
infosContainer:{
backgroundColor:'#fff',
width:'60%',
borderColor:'#262626',
borderBottomWidth:2,
borderRadius:5,
marginBottom:5,
padding:8
},
teste:{
backgroundColor:'#ffff00',
height:'50%'
},
containerBg:{
  backgroundColor:'#FF00FF',
  height:'100%'
}
});
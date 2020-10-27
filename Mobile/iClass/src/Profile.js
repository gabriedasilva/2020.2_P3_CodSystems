import React from 'react';
import { View, Text,StyleSheet,Image } from 'react-native';
import {DataTable} from 'react-native-paper'
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
         João Miguel
        </Text>
      </View>
      <View style={style.infosContainer}>
        <Text>
          Infantil III-B
        </Text>
      </View>
      <View style={style.infosContainer}>
        <Text>
          Matutino
        </Text>
        </View>
      </View>
     </View>
     <View style={style.testeTable}>
       <Text>
         NOTAS
       </Text>
       <DataTable>
<DataTable.Header>
  <DataTable.Title>Matéria</DataTable.Title>
  <DataTable.Title nume>1º</DataTable.Title>
  <DataTable.Title >2º</DataTable.Title>
  <DataTable.Title >3º</DataTable.Title>
  <DataTable.Title >4º</DataTable.Title>
</DataTable.Header>
<DataTable.Row>
  <DataTable.Cell>{ materia1[0]}</DataTable.Cell>
  <DataTable.Cell>{ materia1[1]}</DataTable.Cell>
  <DataTable.Cell>{ materia1[2]}</DataTable.Cell>
  <DataTable.Cell>{ materia1[3]}</DataTable.Cell>
  <DataTable.Cell>{ materia1[4]}</DataTable.Cell>
</DataTable.Row>
<DataTable.Row>
  <DataTable.Cell>{materia2[0]}</DataTable.Cell>
  <DataTable.Cell>{materia2[1]}</DataTable.Cell>
  <DataTable.Cell>{materia2[2]}</DataTable.Cell>
  <DataTable.Cell>{materia2[3]}</DataTable.Cell>
  <DataTable.Cell>{materia2[4]}</DataTable.Cell>
</DataTable.Row>
<DataTable.Row>
<DataTable.Cell>{array[materia1[1]]}</DataTable.Cell>
<DataTable.Cell>{materia3[1]}</DataTable.Cell>
<DataTable.Cell>{materia3[2]}</DataTable.Cell>
<DataTable.Cell>{materia3[3]}</DataTable.Cell>
<DataTable.Cell>{materia3[4]}</DataTable.Cell>
</DataTable.Row>
     </DataTable>
     </View>
     </View>
  );
}

var array =[materia1,materia2,materia3]
var materia1 = ['MAT',9.2,9,10,8.0];
var materia2 = ['CIE',9.2,9.3,4,8.0];
var materia3 = ['HIST',6,9,5,8.0];

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
borderBottomRightRadius:2,
borderRightWidth:2,
borderRadius:5,
marginBottom:5,
padding:8
},
testeTable:{
backgroundColor:'#ffff00',
height:'50%',
width:'80%'
},
containerBg:{
  backgroundColor:'#FF00FF',
  height:'100%'
}
});
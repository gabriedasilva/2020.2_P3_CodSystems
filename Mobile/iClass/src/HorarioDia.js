import React,{useState} from 'react';
import { View, Text,SafeAreaView,FlatList,StatusBar,StyleSheet } from 'react-native';


const arrayAulasDoDia = [ // Array das Aulas
    'Matématica','Português','História','Artes'
];


const aulasDia = [
  {
    id:'horaA',
    title:'A:',
    text:arrayAulasDoDia[0],
  },
    {
        id: 'horaB',
        title: 'B:',
        text:arrayAulasDoDia[1],
    },
    {
        id: 'horaC',
        title: 'C:',
        text:arrayAulasDoDia[2],  
    },
    {
        id: 'horaD',
        title: 'D:',
        text:arrayAulasDoDia[3],
    },
        
  
];
const hoje = new Date();
const Item = ({title,text}) =>(
    <View style={styles.item}>
        <Text style={styles.title}>{title}</Text>
        <Text style={styles.text}>{text}</Text>
    </View>
)

const Horario = () => {
    const renderItem = ({item})=>(
        <Item title={item.title}
              text={item.text}
        />
       
    );
    return (
      <SafeAreaView style={styles.container}>
        <Text>SEGUNDA</Text>
          <FlatList 
          data={aulasDia}
          renderItem={renderItem}
          keyExtractor={item => item.id}
          />
      </SafeAreaView>
    );
}
const styles = StyleSheet.create({
    container: {
      flex: 1,
  
      marginTop: StatusBar.currentHeight || 0,    
    },
    item: {
      flexDirection:'row',
      backgroundColor: '#2196f3',
      padding: 16,
      marginVertical: 4,
      marginHorizontal:8,
      borderRadius:4,
    },
    title: {
      fontSize: 32,
      color:'white',
      textTransform:"uppercase"
    },
    text:{
      margin:8,
      color:'white',
      fontSize:20
    }
  });
export default Horario;

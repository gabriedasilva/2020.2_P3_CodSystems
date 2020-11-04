import React,{useState} from 'react';
import { View, Text,SafeAreaView,FlatList,StatusBar,StyleSheet } from 'react-native';

const DiasSemana = [
  {
    id:'1dom',
    title:'Domingo',
  },
    {
        id: '2seg',
        title: 'Segunda'    
    },
    {
        id: '3terc',
        title: 'Terça'      
    },
    {
        id: '4quar',
        title: 'Quarta'
    },
    {
        id: '5quin',
        title: 'Quinta'       
    },
    {
        id: '6sexta',
        title: 'Sexta'     
    },
    {
      id: '7sab',
      title: 'Sábado'     
  }
];
const hoje = new Date();
const Item = ({title}) =>(
    <View style={styles.item}>
        <Text style={styles.title}>{title}</Text>
    </View>
)

const Horario = () => {
    const renderItem = ({item})=>(
        <Item title={item.title}
         />
    );
    return (
      <SafeAreaView style={styles.container}>
        <Text style={{alignSelf:'center',fontSize:18}}>{hoje.toDateString()}</Text>
          <FlatList 
          data={DiasSemana}
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
      backgroundColor: '#2196f3',
      padding: 16,
      marginVertical: 4,
      marginHorizontal:8,
      borderRadius:4,
    },
    title: {
      fontSize: 20,
      textAlign:"center",
      color:'white',
      textTransform:"uppercase"
    },
  });
export default Horario;

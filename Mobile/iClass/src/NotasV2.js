import React, { Component } from 'react'
import { ScrollView, StyleSheet, Text, TouchableOpacity, View, Image, FlatList } from 'react-native'
import { DataTable } from 'react-native-paper';
import api from './services/api'
import qs from 'qs'
import AsyncStorage from '@react-native-async-storage/async-storage'
export default class NotasV2 extends Component {

    componentDidMount() {
        this.getUsuario();

    }
    getUsuario = async () => {
        const usuarioJSONstr = await AsyncStorage.getItem('Usuario');
        const usuarioJSON = await JSON.parse(usuarioJSONstr)
        const user = usuarioJSON
        const idAluno = user.id;
        const matAluno = user.matricula;
        console.log("Notas:" + usuarioJSONstr);
        console.log(idAluno)
        this.setNotas(idAluno);
    }
    state = {
        docs: [],
    }
    setNotas = async (id) => {
        var dataUser = { 'id': id };
        const response = await api.post('/mob/notas', qs.stringify(dataUser));
        const doc = response.data.content.notas;
        const docs = doc;
        this.setState({ docs })
        console.log(docs)
    }
    renderiTem = ({ item }) => (
        <View>
            <DataTable.Row>
                <DataTable.Cell ><Text style={styles.textCellMateria}>{item.nome}</Text></DataTable.Cell>
                <DataTable.Cell numeric><Text style={styles.textCellNotas}>{item.prova1bm}</Text></DataTable.Cell>
                <DataTable.Cell numeric><Text style={styles.textCellNotas} >{item.prova2bm}</Text></DataTable.Cell>
                <DataTable.Cell  numeric><Text style={styles.textCellNotas}>{item.prova3bm}</Text></DataTable.Cell>
                <DataTable.Cell  numeric><Text style={styles.textCellNotas}>{item.prova4bm}</Text></DataTable.Cell>
            </DataTable.Row>

        </View>

    )

    render() {
        return (
          
            <View style={styles.backgroundScrollView}>
                <View style={{backgroundColor:'#2196f3'}}>
                <Text style={{fontSize:50,color:'#fff',fontWeight:'bold',textTransform:'uppercase',alignSelf:'center'}}>Notas</Text>
                </View>
                     <DataTable.Header style={{backgroundColor:'#2196f3'}}>
                    <DataTable.Title></DataTable.Title>
                    <DataTable.Title ><Text style={styles.textHeaders}>Bimestres</Text></DataTable.Title>
                </DataTable.Header>
                <DataTable.Header style={{backgroundColor:'#2196f3'}}>
                    <DataTable.Title><Text style={styles.textHeaders}>Matéria</Text></DataTable.Title>
                    <DataTable.Title numeric><Text style={styles.textHeaders}>1º</Text></DataTable.Title>
                    <DataTable.Title numeric><Text style={styles.textHeaders}>2º</Text></DataTable.Title>
                    <DataTable.Title numeric><Text style={styles.textHeaders}>3º</Text></DataTable.Title>
                    <DataTable.Title numeric><Text style={styles.textHeaders}>4º</Text></DataTable.Title>
                </DataTable.Header>
                <FlatList
                    data={this.state.docs}
                    keyExtractor={item => item.id}
                    renderItem={this.renderiTem}
                />
                    <TouchableOpacity style={styles.btnBack} onPress={() => this.props.navigation.navigate("Home")}>
                <Text style={styles.textBtnBack}>Voltar</Text>
            </TouchableOpacity>
            </View>
        );
    }
}
const styles = StyleSheet.create({
    backgroundScrollView: {
        flex: 1,
    },
    topViewBar: {
        backgroundColor: '#FFFFFF',
        height: '12%',
        flexDirection: 'row',
        justifyContent: "center",
        paddingTop: 8
    },
    btnBack: {
        backgroundColor: '#2196f3',
        alignItems: 'center',
        padding: 10,
        borderRadius: 10,
        margin: 16,
    },
    textBtnBack: {
        color: '#ffffff',
        fontSize: 18,
        fontWeight: "bold"
    },
    tableView: {
        padding: 4,
        borderColor: '#f6f6f6',
        margin: 8,
        flex:1,
    },
    tableFontHeader: {
        color: '#FFFFFF',
        fontSize: 16,
    },
    tableText: {
        color: '#FFFFFF',
        fontSize: 14,
    },
    imageTopView: {
        width: 70,
        height: 70,

    },
    textTopView: {
        fontSize: 72,
        fontWeight: "500",
        textTransform: "capitalize"
    },
    textCellMateria:{
        fontSize:16,
        fontWeight:'bold',
        color:'#161616'
    },
    textCellNotas:{
        fontSize:22,
        color:'#161616'
      },
      textHeaders:{
          fontSize:22,
          color:'#fff'
      }
});

import React, { Component } from 'react'
import {  ScrollView, StyleSheet, Text, TouchableOpacity, View, Image  } from 'react-native'
import { DataTable } from 'react-native-paper';
import api from './services/api'
import qs from 'qs'
const titles = ['Matéria', 'Bimestres'];
const subtitles = ['1º', '2º', '3º', '4º'];
const testeJSON = ['Matématica', '10', '7.6', '8', '9'];
export default class NotasV2 extends Component {
    
   componentDidMount(){
        this.setNotas();
    
    }

    state={
        docs:[],
    }
     setNotas = async() =>{
        var dataUser = {'id':11};
        const response = await api.post('/mob/notas',qs.stringify(dataUser));
         const doc = response.data.content.notas;
         const docs = doc[0];
         this.setState({docs})
         console.log(docs.nome)
    }
    render() {
        return (
            <View style={{ flex: 1 }}>
            <View style={styles.topViewBar}>
                <Image style={styles.imageTopView} source={require('./assets/icon/checklist.png')} />
                <Text style={styles.textTopView}>Notas</Text>
            </View>
            <View>
                <DataTable.Row>
                    <DataTable.Cell>{titles[0]}</DataTable.Cell>
                    <DataTable.Cell>{titles[1]}</DataTable.Cell>
                </DataTable.Row>
                <DataTable.Header>
                    <DataTable.Title></DataTable.Title>
                    <DataTable.Title>{subtitles[0]}</DataTable.Title>
                    <DataTable.Title>{subtitles[1]}</DataTable.Title>
                    <DataTable.Title>{subtitles[2]}</DataTable.Title>
                    <DataTable.Title>{subtitles[3]}</DataTable.Title>
                </DataTable.Header>
            </View>
            <ScrollView style={styles.backgroundScrollView}>
                <View style={styles.tableView}>
                    <DataTable>
                        <DataTable.Row>
                            <DataTable.Cell>{this.state.docs.nome}</DataTable.Cell>
                            <DataTable.Cell>{this.state.docs.prova1bm}</DataTable.Cell>
                            <DataTable.Cell>{this.state.docs.prova2bm}</DataTable.Cell>
                            <DataTable.Cell>{this.state.docs.prova3bm}</DataTable.Cell>
                            <DataTable.Cell>{this.state.docs.prova4bm}</DataTable.Cell>
                        </DataTable.Row>
                  

                    </DataTable>
                </View>

            </ScrollView>

            <TouchableOpacity style={styles.btnBack} onPress={() => this.props.navigation.navigate("Home")}>
                <Text style={styles.textBtnBack}>Voltar</Text>
            </TouchableOpacity>

        </View>
              )
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
    }

});

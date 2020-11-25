import React, { Component } from 'react'
import { ScrollView, StyleSheet, Text, TouchableOpacity, View, Image, FlatList } from 'react-native'
import { DataTable } from 'react-native-paper';
import api from './services/api'
import qs from 'qs'
import AsyncStorage from '@react-native-async-storage/async-storage'
const titles = ['Matéria', 'Bimestres'];
const subtitles = ['1º', '2º', '3º', '4º'];
const testeJSON = ['Matématica', '10', '7.6', '8', '9'];
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
        console.log("SAIU NA HOME KRL:" + usuarioJSONstr);
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

                <DataTable.Cell>{item.nome}</DataTable.Cell>
                <DataTable.Cell numeric>{item.prova1bm}</DataTable.Cell>
                <DataTable.Cell numeric>{item.prova2bm}</DataTable.Cell>
                <DataTable.Cell numeric>{item.prova3bm}</DataTable.Cell>
                <DataTable.Cell numeric>{item.prova4bm}</DataTable.Cell>
            </DataTable.Row>

        </View>

    )

    render() {
        return (
            <View style={styles.backgroundScrollView}>
                <DataTable.Header>
                    <DataTable.Title></DataTable.Title>
                    <DataTable.Title >Bimestes</DataTable.Title>
                </DataTable.Header>
                <DataTable.Header>
                    <DataTable.Title>Matéria</DataTable.Title>
                    <DataTable.Title numeric>1º</DataTable.Title>
                    <DataTable.Title numeric>2º</DataTable.Title>
                    <DataTable.Title numeric>3º</DataTable.Title>
                    <DataTable.Title numeric>4º</DataTable.Title>
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
    }

});

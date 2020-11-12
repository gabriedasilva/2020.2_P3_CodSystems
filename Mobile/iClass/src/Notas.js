import React from 'react';
import { ScrollView, StyleSheet, Text, TouchableOpacity, View, Image } from 'react-native';
import { DataTable } from 'react-native-paper';

const titles = ['Matéria', 'Bimestres'];
const subtitles = ['1º', '2º', '3º', '4º'];
const testeJSON = ['Matématica', '10', '7.6', '8', '9'];
const Notas = ({ navigation }) => {
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
                            <DataTable.Cell>{testeJSON[0]}</DataTable.Cell>
                            <DataTable.Cell>{testeJSON[1]}</DataTable.Cell>
                            <DataTable.Cell>{testeJSON[2]}</DataTable.Cell>
                            <DataTable.Cell>{testeJSON[3]}</DataTable.Cell>
                            <DataTable.Cell>{testeJSON[4]}</DataTable.Cell>
                        </DataTable.Row>
                  

                    </DataTable>
                </View>

            </ScrollView>

            <TouchableOpacity style={styles.btnBack} onPress={() => navigation.navigate("Login")}>
                <Text style={styles.textBtnBack}>Voltar</Text>
            </TouchableOpacity>

        </View>
    );
}

export default Notas;

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

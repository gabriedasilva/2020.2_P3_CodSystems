import { StyleSheet, Text, Image, View, TouchableOpacity } from 'react-native';
import React, { Component } from 'react'
import AsyncStorage from '@react-native-async-storage/async-storage'

export class Profile extends Component {

    state = {
        doc: [],
    }
    componentDidMount() {
        this.getInfos();
    }
    getInfos = async () => {
        const usuarioJSONstr = await AsyncStorage.getItem('Usuario');
        const usuarioJSON = await JSON.parse(usuarioJSONstr)
        const doc = usuarioJSON
        await this.setState({ doc })
        console.log("PERFIL:" + usuarioJSONstr);
        console.log(doc.id)
    }

    render() {
        return (
            <View style={{flex:1,backgroundColor:'#2196f3'}}>
                <View style={{width:'100%',alignItems:'flex-end'}}>
          <TouchableOpacity onPress={()=> this.props.navigation.navigate('Login')} style={{margin:2,backgroundColor:'#262626',padding:4,borderRadius:8}}><Text style={{fontSize:18,color:'#fff'}}>SAIR</Text></TouchableOpacity>
          </View>
            <View style={styles.background}>
                <Text style={{fontSize:50,color:'#fff',fontWeight:'bold',textTransform:'uppercase'}}>Perfil</Text>
                <View style={styles.infosContainer}>
                    <Text style={styles.inf}>Nome:</Text>
                    <View style={styles.textContainer}>
                        <Text style={styles.textInfo}>{this.state.doc.nomeAluno}</Text>
                    </View>
                    <Text style={styles.inf}>Turma:</Text>
                      <View style={styles.textContainer}>
                        <Text style={styles.textInfo}>{this.state.doc.turma}</Text>
                    </View>
                    <Text style={styles.inf}>Total de Faltas:</Text>
                      <View style={styles.textContainer}>
                        <Text style={styles.textInfo}>{this.state.doc.faltas}</Text>
                    </View>
                    <Text style={styles.inf}>Responsável</Text>
                      <View style={styles.textContainer}>
                        <Text style={styles.textInfo}>{this.state.doc.nomeResponsavel}</Text>
                    </View>
                    <Text style={styles.inf}>Telefone:</Text>
                      <View style={styles.textContainer}>
                        <Text style={styles.textInfo}>{this.state.doc.telefone}</Text>
                    </View>
                </View>
                <View style={{height:100}}>

                </View>
                </View>
                <View style={{ width: '100%'}}>
                    <TouchableOpacity style={styles.btnBack} onPress={() => this.props.navigation.navigate("Home")}>
                        <Text style={styles.textBtnBack}>Voltar</Text>

                    </TouchableOpacity>
                </View>
                </View>
        )
    }
}

export default Profile


const styles = StyleSheet.create({
    background: {
        flex: 1,
        backgroundColor: '#2196f3',
        alignItems:'center',
        justifyContent:'center',
        borderBottomLeftRadius:20,
        borderBottomRightRadius:20
 },
    textInfo: {
        fontSize: 22,
        fontWeight: "500",
        color:'#262626'
    },
    inf:{
        color:'#fff'
    },
    textContainer: {
        margin: 8,
        backgroundColor: "#fff",
        padding:4,
        borderRadius: 8,
        width:300

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
    infosContainer: {
        padding: 10,
        backgroundColor: '#2196f3',
        margin: 16,
        borderRadius: 16,
        justifyContent:'center'
    }
});

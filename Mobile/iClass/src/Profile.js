import { StyleSheet, Text, Image, View,TouchableOpacity } from 'react-native';
import React, { Component } from 'react'
import api from './services/api'
import qs from 'qs'
import AsyncStorage from '@react-native-async-storage/async-storage'

export class Profile extends Component {

    state ={
        doc:[],
    }
    componentDidMount(){
        this.getInfos();
    }
    getInfos = async ()=>{
        const usuarioJSONstr = await AsyncStorage.getItem('Usuario');
        const usuarioJSON = await JSON.parse(usuarioJSONstr)
        const doc = usuarioJSON
       await this.setState({doc})
        console.log("SAIU NO PERFIL KRL:"+usuarioJSONstr);
        console.log(doc.id)
       
    }
    
    
 render() {
        return (
            <View style={styles.background}>
            <View style={styles.inV}>
                <View style={styles.topV}>
                    <Image source={require('./assets/profileBg.jpg')}/>
                </View>
                <View style={styles.midV}>
                    <View style={styles.imageContainer}>
                        <Image style={styles.imageView} source={require('./assets/user.jpg')} />
                    </View>
                    <View style={styles.infosContainer}>
                        <View style={styles.textContainer}>
                            <Text style={{fontSize:20,fontWeight:'800'}}>Nome:{this.state.doc.nomeAluno}</Text>
                        </View>
                        <View style={styles.textContainerRow}>
        <Text style={{fontSize:20,fontWeight:'800'}}>Turma:{this.state.doc.turma}</Text>
                            <Text style={{marginLeft:42,fontSize:20,fontWeight:'800'}}>Faltas:{this.state.doc.faltas}</Text>
                        </View>
                        <View style={styles.textContainer}>
                            <Text style={{alignSelf:"center",fontSize:20,fontWeight:'800'}}>Telefone:{this.state.doc.telefone}</Text>
                        </View>
                        <View style={styles.textContainer}>
                            <Text style={{alignSelf:"center",fontSize:20,fontWeight:'800'}}>Responsável:{this.state.doc.nomeResponsavel}</Text>
                        </View>
                    </View>
                </View>
                <View style={styles.botV}>
                    <View style={{width:'100%',justifyContent:"flex-end",flex:1}}>
                <TouchableOpacity style={styles.btnBack} onPress={() => this.props.navigation.navigate("Home")}>
                <Text style={styles.textBtnBack}>Voltar</Text>
              
            </TouchableOpacity>
            </View>
                </View>
            </View>
        </View>
        )
    }
}

export default Profile


const styles = StyleSheet.create({
    inV: {
        flex: 1
    },
    imageContainer: {
        padding: 8,
        borderRadius: 32,
        backgroundColor: '#fff',
        position: 'relative',
        marginTop: '-35%',

    },
    imageView: {
        width: 120,
        height: 120,
        borderRadius: 24,
    },
    background: {
        flex: 1,
        backgroundColor: '#FF0213'
    },
    topV: {
        flex: 1,
        backgroundColor: '#ffaa00'
    },
    midV: {
        alignItems: 'center',
        justifyContent: "center",
        flex: 2.0,
        backgroundColor: '#2196f3',
        borderTopColor: '#fff',
        borderTopWidth: 8,
        borderBottomEndRadius:16,
        borderBottomStartRadius:16
    },
    botV: {
        alignItems: 'center',
        justifyContent: "center",
        flex: 1.5,
        backgroundColor: '#f332aa',
    },
    textInfo: {
        fontSize: 22,
        fontWeight: "400",
    },
    subTextInfo: {
        fontSize: 22,
        fontWeight: "400",
        marginRight: 110
    },
    textContainer: {
        margin:8,
        backgroundColor: "#ccc",
        padding: 4,
      
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
    textContainerRow: {
        margin:8,
        backgroundColor: "#ccc",
        padding: 4,
        flexDirection:"row"
    },
    infosContainer: {
        padding: 10,
        backgroundColor: '#fff',
        margin:16
    }
});

import { StyleSheet, Text, Image, View } from 'react-native';
import React, { Component } from 'react'
import api from './services/api'
import qs from 'qs'
var infosAluno = ['Luiza devolve o João', 'Inf III', 'B', 'Matutino']     

export class Profile extends Component {

    state ={
        doc:[]
    }
    componentDidMount(){
        this.getLogin(123123,123123);
    }

 getLogin = async(user,senha)=>{
        const dataUser = {'matricula':user,'senha':senha}
        const response = await api.post('/mob/signin',qs.stringify(dataUser));
         const doc = response.data.content.data
         console.log(doc)
         this.setState({doc})
         if(doc == null){
             Alert.alert("Erro",response.data.content.responseMessage)
         } 
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

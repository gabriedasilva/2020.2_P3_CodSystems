import React, { Component, useState } from 'react'
import {
    View, KeyboardAvoidingView, Image,
    TextInput, TouchableOpacity, StyleSheet, Text, Alert,
} from 'react-native';
import qs from 'qs'
import api from './services/api'
import { useNavigation } from '@react-navigation/native';
import Home from './Homie';

var doc;
const getLogin = async(user,senha)=>{
    const dataUser = {'matricula':user,'senha':senha}
    const response = await api.post('/mob/signin',qs.stringify(dataUser));
     doc = response.data.content.data
     if(doc == null){
         Alert.alert("Erro",response.data.content.responseMessage)
     }
     return doc; 
}

const Login = ({ navigation }) => {
    const [user, setUser] = useState(''); // GANCHO
    const [senha, setSenha] = useState('');
    return (
        <KeyboardAvoidingView style={styles.background}>
            <View style={styles.container}>
                <View style={styles.imgContainer}>
                    <Image
                        source={require('./assets/logo.png')}
                    />
                </View>
                <TextInput // Input Matricula
                    style={styles.input}
                    onChangeText={user => setUser(user)}
                    defaultValue={user}
                    placeholder="Matrícula"
                    keyboardType='numeric'
                    returnKeyType='next'
                    autoCorrect={false}
                />
                <TextInput // Input Senha
                    style={styles.input}
                    onChangeText={senha => setSenha(senha)}
                    defaultValue={senha}
                    secureTextEntry={true}
                    placeholder="Senha"

                    autoCorrect={false}
                />
                <TouchableOpacity style={styles.btnSubmit}
                    onPress={async() => await getLogin(user,senha)!=null?navigation.navigate('Home'):null}>
                    <Text style={styles.submitText}>Acessar</Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => { }}>
                    <Text style={styles.textWhiteS}>Esqueci a Senha!</Text>
                </TouchableOpacity>
            </View>
        </KeyboardAvoidingView>
    );
}

const styles = StyleSheet.create({ // Estilos
    background: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#2196f3'
    },
    imgContainer: {
        justifyContent: 'center',
        marginBottom: '10%'
    },
    container: {
        backgroundColor: '#262626',
        padding: '5%',
        alignItems: 'center',
        justifyContent: 'center',
        width: '80%',
        borderRadius: 15,
    },
    input: {
        backgroundColor: '#EEEEEE',
        width: '90%',
        borderRadius: 10,
        marginBottom: 10,
        fontSize: 20,
        padding: 10,
        color: '#222',
    },
    textWhiteL: {
        color: '#fff'
    },
    textWhiteS: {
        color: '#fff',
        textDecorationLine: 'underline'
    },
    btnSubmit: {
        backgroundColor: '#009900',
        padding: 10,
        width: '90%',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 10
    },
    submitText: {
        color: '#fff',
        fontSize: 20,
    },
    emptyContainer: {
        height: '20%',
    }
});
export default Login;

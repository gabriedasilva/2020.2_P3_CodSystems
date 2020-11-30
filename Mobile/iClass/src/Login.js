import React, { useState } from 'react'
import {
    View, KeyboardAvoidingView, Image,
    TextInput, TouchableOpacity, StyleSheet, Text, Alert,
} from 'react-native';
import qs from 'qs'
import api from './services/api'
import AsyncStorage from '@react-native-async-storage/async-storage'

var doc;
const getLogin = async (user, senha) => {

    const dataUser = { 'matricula': user, 'senha': senha }
    const response = await api.post('/mob/signin', qs.stringify(dataUser));
    doc = response.data.content.data
    const string_OBJ = JSON.stringify(doc)


    console.log(doc)
    console.log(string_OBJ)
    if (doc == null) {
        const erro = (response.data.content.responseMessage)
        console.log(erro)
        const erroMat_Str = JSON.stringify(erro.matriculaError)
        const erroSen_Str = JSON.stringify(erro.senhaError)
        Alert.alert("Alerta!", "Confira As Credenciais!")

    } else {
        await AsyncStorage.setItem('Usuario', string_OBJ);
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
                    onPress={async () => await getLogin(user, senha) != null ? navigation.navigate('Home') : null}>
                    <Text style={styles.submitText}>Acessar</Text>
                </TouchableOpacity>
                <TouchableOpacity onPress={() => { }}>
                    <Text style={styles.textWhiteS}> iClass - CODSystems 2020 </Text>
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
        marginTop: 10,
        textDecorationLine: 'none',
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

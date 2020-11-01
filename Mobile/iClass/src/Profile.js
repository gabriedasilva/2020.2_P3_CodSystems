import React, {useState } from 'react'
import { View, StyleSheet, Image, Text } from 'react-native';

const getInfoAluno = (user) => {
    if (user == 'admin') {

    }
}
const Profile = () => {
    const [nome, setNome] = useState('');
    const [turno, setTurno] = useState('');
    const [turma, setTurma] = useState('');
    return (
        
        <View style={style.containerBg}>
            <View style={style.profileContainer}>
                <View style={style.imageContainer}>
                    <Image
                        source={require('./assets/user.jpg')}
                    />
                </View>
                <View style={style.container}>
                    <View style={style.infosContainer}>
                        <Text>Nome:{nome}</Text>
                    </View>
                    <View style={style.infosContainer}>
                        <Text>Série:{turma}</Text>
                    </View>
                    <View style={style.infosContainer}>
                        <Text>Turno:{turno}</Text>
                    </View>
                </View>
            </View>
        </View>
    );
}
const style = StyleSheet.create({ //Estilo
    profileContainer: {
        borderRadius: 15,
        flexDirection: 'row',
        backgroundColor: '#2196f3',
    },
    imageContainer: {
        margin: 10,
        justifyContent: 'center',
        alignItems: 'center'
    },
    container: {
        justifyContent: 'center',
        width: '100%',
        padding: 15
    },
    infosContainer: {
        backgroundColor: '#fff',
        width: '60%',
        borderColor: '#262626',
        borderBottomWidth: 2,
        borderBottomRightRadius: 2,
        borderRightWidth: 2,
        borderRadius: 5,
        marginBottom: 5,
        padding: 8
    },
    testeTable: {
        backgroundColor: '#ffff00',
        height: '50%',
        width: '80%'
    },
    containerBg: {
        backgroundColor: '#FF00FF',
        height: '100%'
    },
});

export default Profile;

import React, { Component } from 'react';
import { StyleSheet } from 'react-native';
import { createStackNavigator, createAppContainer } from '@react-navigation/stack';
import { NavigationContainer } from '@react-navigation/native'

const Stack = createStackNavigator();
import HorarioScreen from './src/Atividades'
import LoginScreen from './src/Login';
import ProfileScreen from './src/Profile';
import HomeScreen from './src/Home';
import NotasScreen from './src/Notas';
export default function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName='Login'> 
                <Stack.Screen name="Login" component={LoginScreen} options={{ headerShown: false }} /> 
                <Stack.Screen name="Profile" component={ProfileScreen}/>
                <Stack.Screen name ="Horario" component={HorarioScreen}/>
                <Stack.Screen name ="Home" component={HomeScreen}/>
                <Stack.Screen name="Notas" component={NotasScreen} options={{ headerShown: false }}/>
            </Stack.Navigator>
        </NavigationContainer>

    )
};
const styles = StyleSheet.create({
    TopBarColor: {
        backgroundColor: '#2196f3',
    }
});
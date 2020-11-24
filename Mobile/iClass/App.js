import React, { Component } from 'react';

import { createStackNavigator, createAppContainer } from '@react-navigation/stack';
import { NavigationContainer } from '@react-navigation/native'

const Stack = createStackNavigator();
import HorarioScreen from './src/Atividades'
import LoginScreen from './src/Login';
import ProfileScreen from './src/Profile';
import HomeScreen from './src/Homie';
import NotasScreen from './src/NotasV2';
import HoraDiaScreen from './src/HorarioDia';
import NewHome from './src/NewHome'
export default function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName='Login'> 
                <Stack.Screen name="Login" component={LoginScreen} options={{ headerShown: false }} /> 
                <Stack.Screen name="Perfil" component={ProfileScreen} options={{headerShown:false}}/>
                <Stack.Screen name ="Horario" component={HorarioScreen}/>
                <Stack.Screen name ="TESTE" component={NewHome}/>
                <Stack.Screen name ="Home" component={HomeScreen} options={{headerShown:false}}/>
                <Stack.Screen name ="HoraDia" component={HoraDiaScreen} options={{ headerShown: false }}/>
                <Stack.Screen name="Notas" component={NotasScreen} options={{ headerShown: false }}/>
            </Stack.Navigator>
        </NavigationContainer>

    )
};

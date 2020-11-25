import React, { Component } from 'react';

import { createStackNavigator, createAppContainer } from '@react-navigation/stack';
import { NavigationContainer } from '@react-navigation/native'

const Stack = createStackNavigator();
import Atividades from './src/Atividades'
import LoginScreen from './src/Login';
import ProfileScreen from './src/Profile';
import HomeScreen from './src/Homie';
import NotasScreen from './src/NotasV2';
import HoraDiaScreen from './src/HorarioDia';
import NewHome from './src/Home'
export default function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName='Login'> 
                <Stack.Screen name="Login" component={LoginScreen} options={{ headerShown: false }} /> 
                <Stack.Screen name="Perfil" component={ProfileScreen} options={{headerShown:false}}/>
                <Stack.Screen name ="TESTE" component={NewHome}/>
                <Stack.Screen name ="Atividades" component={Atividades} options={{headerShown:false}}/>
                <Stack.Screen name ="Home" component={NewHome} options={{headerShown:false}}/>
                <Stack.Screen name ="HoraDia" component={HoraDiaScreen} options={{ headerShown: false }}/>
                <Stack.Screen name="Notas" component={NotasScreen} options={{ headerShown: false }}/>
            </Stack.Navigator>
        </NavigationContainer>

    )
};

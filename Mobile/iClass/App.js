import React,{Component} from 'react';
import {StyleSheet} from 'react-native';
import {createStackNavigator , createAppContainer} from '@react-navigation/stack';
import {NavigationContainer} from '@react-navigation/native'
import Home from './src/Home';

const Stack = createStackNavigator();
import HomeScreen from './src/Home';
import ProfileScreen from './src/Profile';
import LoginScreen from './src/Login';
export default function App(){
    return(
<NavigationContainer>
<Stack.Navigator initialRouteName='Login'>
<Stack.Screen name="Login" component={LoginScreen} options={{headerShown:false}}/>
<Stack.Screen name="Home" component={HomeScreen} options={{headerStyle:styles.TopBarColor,headerTintColor:'#FFF',}}/>
<Stack.Screen name="Profile" component={ProfileScreen}/>
</Stack.Navigator>
</NavigationContainer>

    )
};
const styles = StyleSheet.create({
TopBarColor:{
 backgroundColor:'#2196f3',
}
});
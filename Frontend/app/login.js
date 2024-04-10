import React, { useState } from 'react';
import { Text, View, StyleSheet, TextInput, Button, Alert } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import axios from 'axios';
import { useRouter } from 'expo-router'; // Importez le hook useRouter
import { SERVER_IP } from '@env';

export default function Login({ navigation }) {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const router = useRouter(); // Initialisez le hook useRouter

  const handleLogin = async () => {
    try {
  const response = await axios.post(`http://${SERVER_IP}:8000/api/auth/login`, {
        adresse_mail: email,
        password: password,
      });

      if (response.status === 200) {
        await AsyncStorage.setItem('loginToken', response.data.access_token);
        Alert.alert('Success', 'Login successful');
        console.log(response.data.access_token);
        
        // Utilisez le hook useRouter pour rediriger l'utilisateur vers la page "home"
        router.push('/home');
      } else {
        Alert.alert('Error', 'Login failed');
      }

      setEmail('');
      setPassword('');
    } catch (error) {
      console.error('Erreur lors de la requête :', error.message);
      Alert.alert('Error', 'Erreur lors de la connexion', error.message);
    }
  };

  return (
    <View style={styles.container}>
      <Text style={styles.label}>Email</Text>
      <TextInput
        style={styles.input}
        placeholder="Adresse e-mail"
        value={email}
        onChangeText={setEmail}
      />
      <Text style={styles.label}>Password</Text>
      <TextInput
        style={styles.input}
        placeholder="Mot de passe"
        secureTextEntry={true}
        value={password}
        onChangeText={setPassword}
      />
      <Button title="Se connecter" onPress={handleLogin} />
      <Text style={styles.forgotPasswordText} onPress={() => navigation.navigate("RequestOTP")}>
        Forgot Password? Reset Here!
      </Text>
      <Button
        title="Register Here"
        onPress={() => navigation.navigate("Register")}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    paddingHorizontal: 20,
    backgroundColor: '#fff',
  },
  label: {
    alignSelf: 'flex-start',
    marginBottom: 5,
  },
  input: {
    width: '100%',
    height: 40,
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
    paddingHorizontal: 10,
    marginBottom: 20,
  },
  forgotPasswordText: {
    marginTop: 10,
    color: 'blue',
    textDecorationLine: 'underline',
  },
});

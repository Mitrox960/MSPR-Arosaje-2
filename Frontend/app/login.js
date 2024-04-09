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
    backgroundColor: '#e6f7ff', // Bleu clair pour un aspect futuriste
    alignItems: 'center',
    justifyContent: 'center',
    padding: 20,
  },
  form: {
    width: '100%',
  },
  input: {
    backgroundColor: '#fff',
    borderColor: '#ccc',
    borderWidth: 1,
    borderRadius: 5,
    padding: 10,
    marginBottom: 10,
  },
  errorMessage: {
    color: 'red',
    marginBottom: 10,
  },
  button: {
    backgroundColor: '#48c774', // Vert écologique pour un aspect écologique
    padding: 15,
    borderRadius: 5,
    alignItems: 'center',
    justifyContent: 'center',
    marginTop: 10,
  },
  buttonText: {
    color: '#fff',
    fontWeight: 'bold',
    fontSize: 16,
  },
});


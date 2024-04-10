import React, { useState } from 'react';
import { View, TextInput, Button, StyleSheet, ScrollView } from 'react-native';
import { Picker } from '@react-native-picker/picker';
import axios from 'axios';
import { SERVER_IP } from '@env';
import { useRouter } from 'expo-router'; // Importez le hook useRouter

const SignUpForm = () => {
  const [nom, setNom] = useState('');
  const [prenom, setPrenom] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirmation, setPasswordConfirmation] = useState('');
  const [ville, setVille] = useState('');
  const [codePostal, setCodePostal] = useState('');
  const [nomVoie, setNomVoie] = useState('');
  const [numeroVoie, setNumeroVoie] = useState('');
  const [dateNaissance, setDateNaissance] = useState('');
  const [telephone, setTelephone] = useState('');
  const [role, setRole] = useState('utilisateur'); // Définir le rôle par défaut sur "utilisateur"
  const router = useRouter(); // Initialisez le hook useRouter

  const handleSignUp = async () => {
    try {
      const response = await axios.post(`http://${ SERVER_IP }:8000/api/register`, {
        nom: nom,
        prenom: prenom,
        adresse_mail: email,
        mot_de_passe: password,
        mot_de_passe_confirmation: passwordConfirmation,
        ville: ville,
        code_postal: codePostal,
        nom_voie: nomVoie,
        numero_voie: numeroVoie,
        telephone: telephone,
        date_de_naissance: dateNaissance,
        nom_role: role,
      });
    
      console.log('Réponse de l\'API :', response.data);
      router.push('/login'); // Redirigez vers la page de connexion après l'inscription
    } catch (error) {
      console.error('Erreur lors de la requête :', error);
    }
  };
  return (
    <ScrollView contentContainerStyle={styles.container}>
      <View style={styles.form}>
        <TextInput
          style={styles.input}
          placeholder="Nom"
          value={nom}
          onChangeText={setNom}
        />
        <TextInput
          style={styles.input}
          placeholder="Prénom"
          value={prenom}
          onChangeText={setPrenom}
        />
        <TextInput
          style={styles.input}
          placeholder="Adresse e-mail"
          value={email}
          onChangeText={setEmail}
        />
        <TextInput
          style={styles.input}
          placeholder="Mot de passe"
          secureTextEntry={true}
          value={password}
          onChangeText={setPassword}
        />
        <TextInput
          style={styles.input}
          placeholder="Confirmation mot de passe"
          secureTextEntry={true}
          value={passwordConfirmation}
          onChangeText={setPasswordConfirmation}
        />
        <TextInput
          style={styles.input}
          placeholder="Ville"
          value={ville}
          onChangeText={setVille}
        />
        <TextInput
          style={styles.input}
          placeholder="Code Postal"
          value={codePostal}
          onChangeText={setCodePostal}
        />
        <TextInput
          style={styles.input}
          placeholder="Nom de la voie"
          value={nomVoie}
          onChangeText={setNomVoie}
        />
        <TextInput
          style={styles.input}
          placeholder="Numéro de la voie"
          value={numeroVoie}
          onChangeText={setNumeroVoie}
        />
        <TextInput
          style={styles.input}
          placeholder="Date de naissance (YYYY-MM-DD)"
          value={dateNaissance}
          onChangeText={setDateNaissance}
        />
        <TextInput
          style={styles.input}
          placeholder="Téléphone"
          value={telephone}
          onChangeText={setTelephone}
        />
        <Picker
          selectedValue={role}
          style={styles.input}
          onValueChange={(itemValue, itemIndex) => setRole(itemValue)}
        >
          <Picker.Item label="Utilisateur" value="utilisateur" />
          <Picker.Item label="Botaniste" value="botaniste" />
        </Picker>
        <Button title="S'inscrire" onPress={handleSignUp} />
      </View>
    </ScrollView>
  );
};

const styles = StyleSheet.create({
  container: {
    paddingTop: 15,
    flexGrow: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff', // Fond blanc pour l'application
  },
  form: {
    width: '80%',
    alignItems: 'center',
  },
  input: {
    width: '100%',
    borderWidth: 1,
    borderColor: '#000', // Couleur de bordure noire
    marginBottom: 10,
    padding: 10,
    color: '#000', // Couleur du texte noir
  },
});

export default SignUpForm;

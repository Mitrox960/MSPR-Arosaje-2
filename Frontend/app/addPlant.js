import React, { useState } from 'react';
import { Button, Image, View, StyleSheet, TextInput, Alert } from 'react-native';
import * as ImagePicker from 'expo-image-picker';
import axios from 'axios';
import { SERVER_IP } from '@env';
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function ImagePickerExample() {
  const [image, setImage] = useState(null);
  const [nom, setNom] = useState('');
  const [description, setDescription] = useState('');
  const [conseilEntretien, setConseilEntretien] = useState('');

  const pickImageFromGallery = async () => {
    let result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.All,
      allowsEditing: true,
      aspect: [4, 3],
      quality: 1,
    });

    if (!result.cancelled) {
      setImage(result.assets[0].uri);
    }
  };

  const takePhoto = async () => {
    let result = await ImagePicker.launchCameraAsync({
      allowsEditing: true,
      aspect: [4, 3],
      quality: 1,
    });

    if (!result.cancelled) {
      setImage(result.uri);
    }
  };

  const handleSubmit = async () => {
    if (!nom || !description || !conseilEntretien || !image) {
      Alert.alert('Tous les champs sont requis');
      return;
    }

    try {
      const token = await AsyncStorage.getItem('loginToken');
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

      const formData = new FormData();
      formData.append('nom', nom);
      formData.append('description', description);
      formData.append('conseil_entretien', conseilEntretien);
      formData.append('image', {
        uri: image,
        name: 'image.jpg',
        type: 'image/jpg',
      });

      const response = await axios.post(`http://${SERVER_IP}:8000/api/plants/createplant`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });

      if (response.status === 201) {
        Alert.alert('Plante ajoutée avec succès!');
        setNom('');
        setDescription('');
        setConseilEntretien('');
        setImage(null);
      } else {
        console.error('Erreur lors de l\'envoi de la requête:', response.status);
        Alert.alert('Une erreur s\'est produite. Veuillez réessayer.');
      }
    } catch (error) {
      console.error('Erreur lors de l\'envoi de la requête:', error);
      Alert.alert('Une erreur s\'est produite. Veuillez réessayer.');
    }
  };

  return (
    <View style={styles.container}>
      <TextInput
        placeholder="Nom de la plante"
        style={styles.input}
        value={nom}
        onChangeText={text => setNom(text)}
      />
      <TextInput
        placeholder="Description de la plante"
        style={styles.input}
        value={description}
        onChangeText={text => setDescription(text)}
      />
      <TextInput
        placeholder="Conseil d'entretien"
        style={styles.input}
        value={conseilEntretien}
        onChangeText={text => setConseilEntretien(text)}
      />
      <Button title="Choisir une image depuis la galerie" onPress={pickImageFromGallery} />
      <Button title="Prendre une photo" onPress={takePhoto} />
      {image && <Image source={{ uri: image }} style={styles.image} />}
      <Button title="Ajouter la plante" onPress={handleSubmit} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  input: {
    width: '80%',
    marginBottom: 10,
    padding: 10,
    borderWidth: 1,
    borderColor: '#ccc',
    borderRadius: 5,
  },
  image: {
    width: 200,
    height: 200,
    marginTop: 10,
    marginBottom: 10,
  },
});

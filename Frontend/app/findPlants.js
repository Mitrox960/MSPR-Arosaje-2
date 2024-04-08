import React, { useState, useEffect } from 'react';
import { View, Text, StyleSheet, FlatList, Image, Button } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import axios from 'axios';
import { SERVER_IP } from '@env';

const AllPlantsScreen = () => {
  const [userPlants, setUserPlants] = useState([]);
  const [userId, setUserId] = useState(null);

  useEffect(() => {
    getUserPlants();
    getUserId();
  }, []);

  const getUserId = async () => {
    try {
      const token = await AsyncStorage.getItem('loginToken');
      const response = await axios.get(`http://${SERVER_IP}:8000/api/auth/me`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      setUserId(response.data.id);
    } catch (error) {
      console.error('Error fetching user id:', error);
    }
  };

  const getUserPlants = async () => {
    try {
      const token = await AsyncStorage.getItem('loginToken');
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      const response = await axios.get(`http://${SERVER_IP}:8000/api/plants/get-all-plants`);
      const decodedPlants = response.data.map(plant => ({
        ...plant,
        image: `data:image/jpeg;base64,${plant.image}`,
      }));
      setUserPlants(decodedPlants);
    } catch (error) {
      console.error('Error fetching plants:', error);
    }
  };

  const handleRemovePlant = async (plantId) => {
    try {
      await axios.patch(`http://${SERVER_IP}:8000/api/plants/remove-plant/${plantId}`);
      // Mettez à jour la liste des plantes après la suppression
      setUserPlants(prevPlants => prevPlants.filter(plant => plant.id !== plantId));
    } catch (error) {
      console.error('Error removing plant:', error);
    }
  };

  const renderItem = ({ item }) => (
    <View style={styles.plantContainer}>
      <Image source={{ uri: item.image }} style={styles.plantImage} />
      <View style={styles.plantDetails}>
        <Text style={styles.plantName}>{item.nom}</Text>
        <Text style={styles.detailText}>Description: {item.description}</Text>
        <Text style={styles.detailText}>Conseil d'entretien: {item.conseil_entretien}</Text>
        <Text style={styles.detailText}>Prénom du propriétaire: {item.utilisateur.prenom}</Text>
        <Text style={styles.detailText}>Nom du propriétaire: {item.utilisateur.nom}</Text>
        <Text style={styles.detailText}>Téléphone: {item.utilisateur.telephone}</Text>
        <Text style={styles.detailText}>Mail: {item.utilisateur.adresse_mail}</Text>
        {userId === item.utilisateur.id && (
          <Button
            title="Retirer"
            onPress={() => handleRemovePlant(item.id)}
            color="red"
          />
        )}
      </View>
    </View>
  );

  return (
    <View style={styles.container}>
      <FlatList
        data={userPlants}
        renderItem={renderItem}
        keyExtractor={(item, index) => index.toString()}
        contentContainerStyle={styles.listContent}
      />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  listContent: {
    marginTop: 20,
    paddingHorizontal: 10,
  },
  plantContainer: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: '#f0f0f0',
    borderRadius: 10,
    marginBottom: 10,
    padding: 10,
    width: '100%',
  },
  plantImage: {
    width: 80,
    height: 80,
    borderRadius: 40,
    marginRight: 10,
  },
  plantDetails: {
    flex: 1,
  },
  plantName: {
    fontSize: 18,
    fontWeight: 'bold',
    marginBottom: 5,
  },
  detailText: {
    marginTop: 15,
    fontSize: 16,
  },
});

export default AllPlantsScreen;

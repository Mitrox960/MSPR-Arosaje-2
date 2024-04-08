import React from 'react';
import { View, StyleSheet, TouchableOpacity, Text } from 'react-native';
import { Link } from 'expo-router';

export default function Home() {
  return (
    <View style={styles.container}>
      <TouchableOpacity style={styles.button}>
        <Link href="/addPlant">
          <Text style={styles.buttonText}>Ajouter une plante</Text>
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/myPlants">
          <Text style={styles.buttonText}>Mes plantes</Text>
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/findPlants">
          <Text style={styles.buttonText}>Trouver des plantes</Text>
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/profile">
          <Text style={styles.buttonText}>Mon profil</Text>
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/map">
          <Text style={styles.buttonText}>Voir la carte</Text>
        </Link>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  button: {
    backgroundColor: 'blue',
    padding: 10,
    marginVertical: 10,
    borderRadius: 5,
  },
  buttonText: {
    color: 'white',
    fontSize: 16,
    fontWeight: 'bold',
  },
});

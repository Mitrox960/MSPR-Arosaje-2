import React from 'react';
import { View, Text, StyleSheet } from 'react-native';
import { Link } from 'expo-router';

export default function Page() {
  return (
    <View style={styles.container}>
      <Text>Bienvenue sur Arosaje! </Text>
      <Link href="/register" style={styles.link}>Register</Link>
      <Link href="/login" style={styles.link}>Login</Link>
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
  link: {
    backgroundColor: '#fff',
    borderColor: '#ccc',
    borderWidth: 1,
    borderRadius: 5,
    padding: 10,
    marginBottom: 10,
    marginVertical: 30,
    paddingHorizontal: 50
  },
  
});

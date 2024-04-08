import React from 'react';
import { View, Text, StyleSheet } from 'react-native';
import { Link } from 'expo-router';

export default function Page() {
  return (
    <View style={styles.container}>
      <Link href="/register" style={styles.link}>Register</Link>
      {/* ...other links */}
      <Link href="/login" style={styles.link}>Login</Link>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  link: {
    fontSize: 18,
    color: 'blue', // Change the color of the link text to blue
    textDecorationLine: 'underline', // Add underline decoration
    marginBottom: 10, // Add space between links
  },
});

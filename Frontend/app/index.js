import React from 'react';
import { View, Text, StyleSheet } from 'react-native';
import { Link } from 'expo-router';

export default function Page() {
  return (
    <View style={styles.pageContainer}>
      <View style={styles.header}>
        <Text style={styles.headerText}>AROSAJE</Text>
      </View>
      <View style={styles.content}>
        <Link href="/register" style={styles.link}>Register</Link>
      
        <Link href="/login" style={styles.link}>Login</Link>
      </View>
      <View style={styles.footer}>
        <Text style={styles.footerText}>2024</Text>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  pageContainer: {
    flex: 1,
    backgroundColor: 'white',
  },
  header: {
    backgroundColor: 'green',
    padding: 20,
    alignItems: 'center',
  },
  headerText: {
    fontSize: 24,
    color: 'white',
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  link: {
    fontSize: 18,
    color: 'blue',
    textDecorationLine: 'underline',
    marginBottom: 10,
  },
  footer: {
    backgroundColor: 'green',
    padding: 10,
    alignItems: 'center',
  },
  footerText: {
    color: 'white',
  },
});

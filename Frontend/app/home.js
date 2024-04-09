import React from 'react';
import { View, StyleSheet, TouchableOpacity, Text } from 'react-native';
import { Link } from 'expo-router';
import { Image } from 'react-native';

export default function Home() {
  return (
    <View style={styles.view}>
    <View style={styles.container}>
      <TouchableOpacity style={styles.button}>
        <Link href="/addPlant" style={styles.link}>
          <Image source={require('../assets/images/logohomeaddplant.png')} style={styles.image} />
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/myPlants" style={styles.link}>
        <Image source={require('../assets/images/logohomeplant.png')} style={styles.image} />
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/findPlants" style={styles.link}>
          <Image source={require('../assets/images/logohomesearch.png')} style={styles.image} />
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/map" style={styles.link}>
        <Image source={require('../assets/images/logohomemap.png')} style={styles.image} />
        </Link>
      </TouchableOpacity>
      <TouchableOpacity style={styles.button}>
        <Link href="/profile" style={styles.link}>
          <Image source={require('../assets/images/logohomeprofile.png')} style={styles.image} />
        </Link>
      </TouchableOpacity>
      
    </View></View>
  );
}

const styles = StyleSheet.create({
  view: {
    flex: 1,
   justifyContent: 'flex-end', 
  },
  container: {
    flexDirection: 'row',
  },
  button: {
    borderRightColor: 'grey',
    borderRightWidth: 1,
    flex: 1,
    alignItems: 'center',
  },
  buttonText: {
    color: 'white',
    fontSize: 16,
    fontWeight: 'bold',
    
  },
  image: {
    width: 50,
    height: 50,
    
  },
  link: {
    height: 100,
    justifyContent: 'center',
    alignItems: 'center',
  }
});

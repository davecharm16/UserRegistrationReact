import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import StudentRegister from './screen/studenInsert';

export default function App() {
  return (
    <View style={styles.container}>
      <StudentRegister/>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
});

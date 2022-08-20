import { useState } from 'react';
import { Alert, Button, StyleSheet, Text, TextInput, View } from 'react-native';

export default function StudentRegister() {
    const [rollNo, setRoll] = useState('');
    const [studentName, setStudentName] = useState('');
    const [course, setCourse] = useState('');



    const insertRecord =()=>{
        if(rollNo.length==0||  studentName.length==0|| course.length==0){
            Alert.alert("required field is missing");
        }
        else{
            var insertAPIURL = "http:10.0.2.2:80/api/insert.php";
            var headers = {
                'Accept': 'application/json',
                'Content-Type':'application.json'
            };

            var data = {
                //API KEY : local value
                RollNo : rollNo,
                StudentName : studentName,
                Course : course,
            };

            fetch(insertAPIURL, 
                 {
                    method:'POST',
                    headers:headers,
                    body: JSON.stringify(data)
                 }
            )
            .then((response) => response.json())
            .then((response) => 
                 {
                    Alert.alert(response[0].message);
                 }
            )
            .catch((error) =>
                {
                    console.log(error);
                    Alert.alert("Error" + error);
                }
            )
            // Alert.alert("fetch");
        }
    }

    return (
        <View style={styles.container}>
            <TextInput placeholder='Roll No' keyboardType={'numeric'} style={styles.input}
                onChangeText = {
                    (val)=>{setRoll(val)}
                }
            />
            <TextInput placeholder='Student Name' style={styles.input}
                onChangeText = {
                    (val)=>{setStudentName(val)}
                }
            />
            <TextInput placeholder='Course' style={styles.input}
                onChangeText = {(val)=>{setCourse(val)} }
            />
            <Button title='Save Record'
                onPress={ insertRecord }
            />
        </View>
    );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  input:{
    alignSelf: 'stretch',
    padding: 5,
    margin: 20,
    borderBottomWidth: 1,
    borderBottomColor: '#000',
  }
});

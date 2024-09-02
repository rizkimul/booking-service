require('./bootstrap');
// require('datatables.net');
// require('bootstrap-social');
// require('jquery');
// require('jquery-slim');

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBFKHeDd-r7Zkwt4ypmUtX1HuIgldjbGDE",
    authDomain: "laravel-fcm-105e5.firebaseapp.com",
    projectId: "laravel-fcm-105e5",
    storageBucket: "laravel-fcm-105e5.appspot.com",
    messagingSenderId: "897161688988",
    appId: "1:897161688988:web:4d3f7bd3a6bce216543a59",
    measurementId: "G-K34MG3L9Z2"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

onMessage(messaging, (payload) => {
    console.log('Message received. ', payload);
    // ...
    alert("notifikasi baru")
});
getToken(messaging, { vapidKey: 'BI3BBdN--LQVb8hs6BRokBx6XLmA-aUzpF-nuCmxMQKm16gaiOWlKPYJ9Sce9tzoOB_XbdGnUqSMYx4DbT9oDCM' }).then((currentToken) => {
    if (currentToken) {
        // Send the token to your server and update the UI if necessary
        // ...
        console.log(currentToken);
    } else {
        // Show permission request UI
        requestPermissions();
        console.log('No registration token available. Request permission to generate one.');
        // ...
    }
}).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);
    // ...
});

function requestPermissions() {
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve a registration token for use with FCM.
            // ...
        } else {
            alert("aktifkan notifikasi")
        }
    });
}

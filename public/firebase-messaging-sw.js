// Import Firebase scripts required for messaging
importScripts(
    "https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"
);

// Initialize Firebase with your config
firebase.initializeApp({
    apiKey: "AIzaSyAHqQ8MtIXpKNZU0-F88eC6uQ3vV_uzU58",
    authDomain: "entre-71253.firebaseapp.com",
    projectId: "entre-71253",
    storageBucket: "entre-71253.appspot.com",
    messagingSenderId: "784120664599",
    appId: "1:784120664599:web:02fc5d702d67fc59438252",
    measurementId: "G-YS1X4HL0FE",
});

// Retrieve an instance of Firebase Messaging so that it can handle background messages
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );
    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});

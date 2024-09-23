import "./bootstrap";

import { messaging, getToken, onMessage } from "./firebase-config";

const requestPermission = async () => {
    try {
        const registration = await navigator.serviceWorker.register(
            "/firebase-messaging-sw.js"
        );
        const token = await getToken(messaging, {
            vapidKey: import.meta.env.VITE_FIREBASE_VAPID_KEY,
            serviceWorkerRegistration: registration,
        });

        if (token) {
            // Send token to your server and store it
            Livewire.dispatch("fcm-token", { token: token });
        } else {
            console.log("No registration token available.");
        }
    } catch (error) {
        console.error("Error while fetching FCM token:", error);
    }
};

// Request permission for notifications
Notification.requestPermission().then((permission) => {
    if (permission === "granted") {
        requestPermission();
    } else {
        console.log("Permission not granted for notifications.");
    }
});

onMessage(messaging, (payload) => {
    Livewire.dispatch("receivedMsg", { payload: payload });
});

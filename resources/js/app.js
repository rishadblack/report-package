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
        // Call this function when appropriate
        showNotificationPrompt();
        console.log("Permission not granted for notifications.");
    }
});

function showNotificationPrompt() {
    const modal = document.createElement("div");
    modal.innerHTML = `
        <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            padding: 20px; background: white; border: 1px solid #ccc; z-index: 1000;">
            <h2>Enable Notifications</h2>
            <p>We'd like to send you notifications for updates and messages.</p>
            <button id="allow-notifications">Allow Notifications</button>
            <button id="deny-notifications">No, Thanks</button>
        </div>
    `;
    document.body.appendChild(modal);

    document.getElementById("allow-notifications").onclick = async () => {
        // Remove modal
        document.body.removeChild(modal);
        // Request notification permission
        const permission = await Notification.requestPermission();
        if (permission === "granted") {
            requestPermission(); // Call your function to handle successful permission
        } else {
            console.log("Permission not granted for notifications.");
        }
    };

    document.getElementById("deny-notifications").onclick = () => {
        // Close modal
        document.body.removeChild(modal);
        console.log("User denied notifications.");
    };
}

onMessage(messaging, (payload) => {
    Livewire.dispatch("receivedMsg", { payload: payload });
});

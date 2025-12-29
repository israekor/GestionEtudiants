import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
    apiKey: "AIzaSyDhyIurWeL-HhzEB8lVv-yHivdTpAVma9E",
    authDomain: "gestion-ecole-88bfa.firebaseapp.com",
    projectId: "gestion-ecole-88bfa",
    storageBucket: "gestion-ecole-88bfa.firebasestorage.app",
    messagingSenderId: "24842036318",
    appId: "1:24842036318:web:6f2ecd21521417b05040cf",
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

export { auth };

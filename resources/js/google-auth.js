// resources/js/google-auth.js
import { auth } from "./firebase";
import { GoogleAuthProvider, signInWithPopup } from "firebase/auth";

const provider = new GoogleAuthProvider();

document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("googleLoginBtn");

    if (!btn) return;

    btn.addEventListener("click", async () => {
        try {
            const result = await signInWithPopup(auth, provider);
            const token = await result.user.getIdToken();

            const response = await fetch("/auth/google", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({ token }),
            });
            const data = await response.json();

            // 🔁 REDIRECTION DÉCIDÉE PAR LARAVEL
            window.location.href = data.redirect;
        } catch (error) {
            console.error(error);
            alert("Erreur de connexion Google");
        }
    });
});

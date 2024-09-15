
const firebaseConfig = {
    apiKey: "AIzaSyCncyZum_ABDLTYs4VoSTIbVAt4Q9R62J8",
    authDomain: "formulario-requerimento-ifpe.firebaseapp.com",
    projectId: "formulario-requerimento-ifpe",
    storageBucket: "formulario-requerimento-ifpe.appspot.com",
    messagingSenderId: "850486247777",
    appId: "1:850486247777:web:6e76a4943f9f0c51c68520"
  };
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth();

  function loginGoogle() {
    auth.signOut().then(() => {
      const provider = new firebase.auth.GoogleAuthProvider();
      auth.signInWithPopup(provider)
        .then((result) => {
          const user = result.user;
          document.getElementById("userEmail").innerText = user.email;
        })
        .catch((error) => {
          console.error("Erro no login:", error);
        });
    }).catch((error) => {
      console.error("Erro ao deslogar:", error);
    });
  }

  function displayUserEmail() {
    const user = auth.currentUser;
    if (user) {
      document.getElementById("userEmail").innerText = user.email;
    }
  }

  window.onload = displayUserEmail;

  document.addEventListener("DOMContentLoaded", function () {
    const userEmail = localStorage.getItem("userEmail");
    if (userEmail) {
      document.getElementById("userEmail").textContent = userEmail;
    }
  });
  function mudarPagina() {
    window.location.href = "dados_pessoais.html";
  }

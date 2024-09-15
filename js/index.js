const firebaseConfig = {
    apiKey: "AIzaSyCncyZum_ABDLTYs4VoSTIbVAt4Q9R62J8",
    authDomain: "formulario-requerimento-ifpe.firebaseapp.com",
    projectId: "formulario-requerimento-ifpe",
    storageBucket: "formulario-requerimento-ifpe.appspot.com",
    messagingSenderId: "850486247777",
    appId: "1:850486247777:web:6e76a4943f9f0c51c68520"
  };
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth()

  function loginGoogle() {
      const provider = new firebase.auth.GoogleAuthProvider();
      auth.signInWithPopup(provider)
        .then((result) => {
          console.log("Usuário logado:", result.user,);

          const userEmail = result.user.email;
          localStorage.setItem("userEmail", userEmail);
          window.location.href = "/pages/informativa.php";
        })
        .catch((error) => {
          console.error("Erro no login:", error);
        });
    }
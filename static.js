let button = document.getElementById("button");
let idUser = document.getElementById("id-user");
let Username = document.getElementById("name");
let email = document.getElementById("email");
let password = document.getElementById("password");
let Apikey = "CwwM?7kefP48Sy5J598VOECd=Tqn=e0q";

async function ShowDatas() {
  const url = "http://localhost:5000/utilisateurs";

  // Autorisation de la clé API
  const options = {
    headers: {
      Authorization: `Bearer '${Apikey}'`,
    },
  };

  try {
    const response = await fetch(url, options);
    const data = await response.json();
    console.log("Données récupérées:", data);

    // data.array.forEach((Object) => {
    //   Object.entries(Object).forEach(([key, value]) => {
    //     console.log(`${key} ${value}`);
    //   });
    // });

    idUser.textContent = "id:" + data[0].id_utilisateur;
    Username.textContent = "name:" + data[0].nom_utilisateur;
    email.textContent = "email:" + data[0].email_utilisateur;
    password.textContent = "password:" + data[0].password_utilisateur;

    console.log(Apikey);
  } catch (error) {
    console.error("Erreur inatttendue:", error);
  }
}
button.addEventListener("click", ShowDatas);

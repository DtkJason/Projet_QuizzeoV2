//------------------***Construction de l'API avec le serveur Express***---------------------\\

const express = require("express");
const mysql = require("mysql");
const { Connection } = require("mysql2/typings/mysql/lib/Connection");
//const uuid = require("uuid").v4;

const port = process.env.PORT || 5000;
const server = express();

server.get("/", function (req, res) {
  res.json({ message: "Statistiques des quiz" });
});

server.listen(port, () => {
  console.log("Server Statistic");
});

//------------------***Connexion à la base de données***---------------------\\

const db = mysql.createConnection({
  database: "test_quizzeo",
  host: "localhost",
  user: "root",
  password: "",
});
console.log("Connecté à la base de données");

//------------------***Insertion des clés***---------------------\\
const ApiGenere = GenerateApiKey();
const req = "INSERT INTO clé_api(clé_api_utilisateur) VALUE (:cleApi)";
const longueur = 32;

db.query(req, (err, res) => {
  if (err) {
    console.error("Erreur lors de linsertion des données");
  } else {
    console.log(res);
  }
});
//------------------***Fonction de génération des clés API***---------------------\\
function GenerateApiKey() {
  let cleApi = "";
  for (let i = 0; i < longueur; i++) {
    const indexCaractere = Math.floor(Math.random() * caracteres.length);
    cleApi += caracteres[indexCaractere];
  }
  return ApiGenere;
}

//app.get("/utilisateurs", (req, res) => {

//document.getElementById("textkey").value = cleApi;

//------------------------------------------------------------------------------------------------------------------------------

// Connexion à la base de données

//Si il y a une erreur lors de la connexion(if) si il n'y en a pas (else)
/*if (err) {
  console.error("Erreur lors de la connexion");
} else {
  console.log("Connecté à la base de données");
}

let button = document.getElementById("button-api");
const GenerateApiKey = () => {
  const cleApi = uuidv4();
  console.log(cleApi);
};
button.addEventListener("click", GerenateApiKey());

//document.getElementById("textkey").value = cleApi;

app.get("/utilisateurs", (req, res) => {
  db.connect(function (err) {
    // if (err) throw err;
    //console.log("Unique ID:", cleApi);

    db.query(
      "INSERT INTO clé_api(clé_api_utilisateur) VALUE (:cleApi)",
      function (err, res) {
        if (err) {
          console.error("Erreur lors de l'insertion de la clé");
        }
        console.log(res);
      }
    );
    console.log("Connecté à la base de données");
  });
});*/

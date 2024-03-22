const caracteres =
  "AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn1234567890&+=-*?";
const longueur = 32;

function GenerateApiKey() {
  let cleApi = "";
  for (let i = 0; i < longueur; i++) {
    const indexCaractere = Math.floor(Math.random() * caracteres.length);
    cleApi += caracteres[indexCaractere];
  }
  document.getElementById("textkey").value = cleApi;
  console.log(cleApi);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*const PageConnection = require("./index");

const ApiGenere = GenerateApiKey();
const req = "INSERT INTO clé_api(clé_api_utilisateur) VALUE (:cleApi)";
const longueur = 32;

connection.query(req, (err, res) => {
  if (err) {
    console.error("Erreur lors de linsertion des données");
  } else {
    console.log(res);
  }
});

function GenerateApiKey() {
  let cleApi = "";
  for (let i = 0; i < longueur; i++) {
    const indexCaractere = Math.floor(Math.random() * caracteres.length);
    cleApi += caracteres[indexCaractere];
  }
  return ApiGenere;
  //console.log(cleApi);
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//const mysql = require("mysql");

//------------------------------------------------------------------------------------
/*let button = document.getElementById("button-api");
var cleApi = "";
var Caracteres =
  "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-";

var CaractereLength = Caracteres.length;

function generateApiKey(length) {
  for (var i = 0; i < length; i++) {
    cleApi += Caracteres.charAt(Math.floor(Math.random() * CaractereLength));
  }
  return cleApi;
}
console.log(cleApi);
console.log("Clé générée");
button.addEventListener("click", generateApiKey);



*/

//--------------------------------------------------------------------------------

/*var generate_api_key = require("generate-api-key");

let button = document.getElementById("button-api");

function APIKeyGenerate(rep, res) {
  const apikey = generate_api_key.generateApiKey({
    method: "string",
    pool: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-/",
    min: 16,
    max: 32,
  });

  if (strRandom(apikey)) {
    apikey.query(
      "INSERT INTO clé_api((clé_api_utilisateur) VALUES (:clé_api_utlisateur))"
    );
    return res.json({ message: "Clé généré dans la base de données" });
  }
  console.log(res);
}

button.addEventListener("click", APIKeyGenerate);
*/
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*let button = document.getElementById("Button");

function PageQuiz() {
  window.href.location = "PageQuiz.html";
}

button.addEventListener("click", PageQuiz);
*/

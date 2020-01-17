// *** Traitement des favoris ***
function addFavorite()
{
    // Je souhaite trouver l'id du post liké
    let parent = this.parentElement;

        // console.log(parent.id);

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "data.php", true);
    // l'envoie en POST nous demande de lui préciser le content type pour traitement correct
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Nous passons ici un nouvel argument afin de transmettre l'information au serveur que nous traitons bien du AJAX
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
            console.log("Result: " + result);

            // Si l'opération est un succès (retour de la string true), alor on injecte une nouvelle classe
            if(result == "true")
            {
                parent.classList.add("favorite");
            }

        }
    };

    // Nous récisons ici l'id traité
    xhr.send("id=" + parent.id);
}

let favButtons = document.getElementsByClassName("btn-favorite");
    // console.log(favButtons);
// On créé une boucle pour cibler tous ls boutons
for (let i = 0; i < favButtons.length; i++)
{
    favButtons.item(i).addEventListener("click", addFavorite);
}

// *** Traitement de la deconnexion ***
function deconnectSession()
{
    let xhr = new XMLHttpRequest();

    let url = "data.php?a=deconnect";

    xhr.open("GET", url, true);

    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
                // console.log(result);
            if(result == "true")
            {
                let objBtnAsFav = document.getElementsByClassName("favorite");
                // REPRENDRE ICI >> CONVERTIR EN ARRAY
                let btnAsFav = Object.values(objBtnAsFav);
                    // console.log(btnAsFav);
                btnAsFav.forEach((item,index) => {
                    item.classList.remove("favorite");
                });
            }

        }
    };

    xhr.send();
}

let btnDeconnect = document.getElementById("btn-deconnect");
    // console.log(btnDeconnect);
btnDeconnect.addEventListener("click", deconnectSession);

// *** Traitement du unfavorite ***
function removeFavorite()
{
    // Je souhaite trouver l'id du post liké
    let parent = this.parentElement.parentElement;

        // console.log(parent.id);

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "data.php", true);
    // l'envoie en POST nous demande de lui préciser le content type pour traitement correct
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Nous passons ici un nouvel argument afin de transmettre l'information au serveur que nous traitons bien du AJAX
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
            console.log("Result: " + result);

            // Si l'opération est un succès (retour de la string true), alor on injecte une nouvelle classe
            if(result == "true")
            {
                parent.classList.remove("favorite");
            }

        }
    };

    // Nous récisons ici l'id traité et l'action
    xhr.send("id=" + parent.id + "&a=remove");
}

let unfavButtons = document.getElementsByClassName("marker");
    // console.log(favButtons);
// On créé une boucle pour cibler tous les boutons
for (let i = 0; i < unfavButtons.length; i++)
{
    unfavButtons.item(i).addEventListener("click", removeFavorite);
}

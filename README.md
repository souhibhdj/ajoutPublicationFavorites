<a href="www.keepizi.com"><img src="https://www.keepizi.com/wp-content/uploads/2018/08/Logo-Keepizi_violet_mobile.png" alt="Keepizi"></a>

***Exercice de mise en lign d'un projet AJAX via Git***

# AJOUT D'ARTICLES FAVORIS VIA AJAX
> Des articles apparaissent pour l'utilisateur au clic, l'artcile est ajouté au favoris via la session. Lors du déclic, l'icône favoris disparait et l'article est enlevé de la SESSION. 

> Tech: AJAX, Javascript, PHP

***N'oubliez pas de ...***
- Si vous souhaitez lier à une base de données, créez votre fichier d'initialisation dans le dossier inc.
- Les article apparaissent en "dur" dans notree index, veuillez les remplacer par les vôtres.

> Ajout de notre GIF [![LES FAVORIS SELON HARRY POTTER](https://media.giphy.com/media/8VjxKsr4HdZqU/giphy.gif)]()

## Table des matières

- [Explication](#explication)
- [Remerciements](#remerciements)

---
## Explication
---

```PHP
 // Traitement du retrait des favoris
    if(isset($_POST["a"]) && $_POST["a"] == "remove")
    {
        foreach ($_SESSION['favorites'] as $key => $value)
        {
            if($id == $value)
            {
            unset($_SESSION['favorites'][$key]);
            }
        }
    }
```

- Pour retirer les favoris de ma SESSION, je regarde bien que l'action demandée est un "remove".
- Je fais concorder le $id envoyé en POST avec les enregistrées en SESSION

---
## Remerciements
---

A tous les étudiants !
[![Veuillez visitee notre site](https://media.giphy.com/media/WTlH9XMLIAD4I/giphy.gif)](https://www.keepizi.com)
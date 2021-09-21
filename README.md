# Challenge Conversion ManyToMany

## Préambule

Après avoir cloné :

- Installer les vendors via `composer install`
- Créez votre fichier `.env.local`
- Exécuter les migrations en local chez vous via `php bin/console doctrine:migrations:migrate`  
  (il ne faut surtout pas créer de migration avant un premier `d:m:m`)

## Objectifs

> Les entités Genre, Movie et Person sont déjà créées !

Créer une _vraie_ entité avec des champs additionnels entre `Movie` et `Person`.  
L'idée est de convertir la relation `ManyToMany` en une vraie entité (classe PHP) `ManyToOne/OneToMany`, comme décrit sur ce schéma ci-dessous :

![](https://github.com/O-clock-Alumni/fiches-recap/blob/master/symfony/themes/img/conversion-m2m-m2o.svg)

- Nous appellerons cette liaison (entité) `Casting` et elle contiendra deux propriétés :
  - `role` : rôle de la personne dans le film.
  - `creditOrder` ordre d'affichage de ce rôle sur la fiche du film.
  - Et bien sûr les deux relations vers `Movie` et `Person` !
    - Note : N'oubliez pas de supprimer la relation ManyToMany d'origine dans chaque entité `Movie` et `Person` (propriété, construct, les 3 getters/setters)
  - Faites en sorte de créer le schéma Doctrine qui fonctionne (vérifiez dans le concepteur PMA si ça correspond).
  - En code (dans un controller par exemple), ajoutez des personnes et des films à `Casting` et sauvegardez-les en BDD.
  - Affichez la liste des films sur la page principale.
  - Affichez le détail de chaque film avec **TOUTES** les infos liées dans une autre page.

#### Bonus 

Trouver le moyen de classer automatiquement les acteurs par ordre de `creditOrder`.

## Ressources

- Si besoin [tuto disponible sur le site de Doctrine](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/composite-primary-keys.html#use-case-3-join-table-with-metadata) (cet exemple insiste plus particulièrement sur les clés primaires _composées_ de la table de jointure).

Exemple MCD avec clef composite

<details>
  
  ![](https://github.com/O-clock-Alumni/fiches-recap/blob/master/symfony/themes/img/mcd-casting-m2m-m2o-concat-key.png)
  
</details>

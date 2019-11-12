<h1>Temps Libre</h1>
Une application qui vous aide à organiser vos loisirs grâce à l'agenda de vos amis<br>

<h1>Analyse et Conception</h1>
<h2>Etude des besoins</h2>
3 entretiens réalisés<br>

<h2>Analyse de l’existant</h2>
Doodle, Open Agenda, Ziwego, Multi-planning<br>
Login, Planification, Groupement de participant, Vue agenda, Alerte, Invitation, Format d’exportation, Frais<br>

<h2>Scénario</h2>
Quoi, où, qui, quand<br>
<h2>Maquette</h2>
Axure RP<br>

<h1>Développement</h1>
<h2>Base de données</h2>
  phpMyadmin<br>
  Tables : days, events, users<br>
  
<h2>Fonctionnalités réalisées</h2>
  Login/inscription par compte Google ou avec email<br>
  Importer Google Agenda<br>
  Afficher la vue globale du temps disponibles<br>
  Ajouter une activité<br>
  Comparer les temps disponibles des participants<br>
  
<h2>Langages de programmation</h2>
PHP accompagné par Javascript, HTML et CSS<br>
librairies de Bootstrap, font-awesome et JQuery.

<h1>Structure des fichiers</h1>
Le répertoire « calendar » comprend des librairies de Template « Full Calendar » pour réaliser la vue de calendrier.<br>
Le répertoire « controller » contient des fichier php qui gérer l’échange de donnée avec la base de données.<br>
Tous les fichiers de css qui contrôler l’apparence de site sont placés dans le répertoire « css ».<br>
Dans le répertoire « element », il y a des composants comme footer et header qui sont inclus dans tous les pages.<br>
Le répertoire « GoogleAPI » contient des fichiers qui fait fonctionner des services de Google.<br>
Le répertoire « img » comprend les images utilisées dans ce site.<br>
Les fichier js qui personnalise l’animation de site sont inclus dans le répertoire « js ».<br>
Dans le répertoire « vendor », il y a des librairies de Bootstrap, font-awesome et JQuery.<br>
Finalement, les fichiers de php qui se situent directement sur le chemin racine représente des pages de cette application web.<br>

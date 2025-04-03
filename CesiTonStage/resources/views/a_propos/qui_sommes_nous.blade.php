@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-3">
    <div class="bg-zinc-100 shadow-md rounded-lg p-8">
        <!-- Titre -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Qui sommes-nous ?</h1>
        
        <!-- Introduction -->
        <p class="text-lg text-center text-gray-600 mb-6">
            Web4All est une agence de communication spécialisée dans le développement web, partenaire de l'école d'ingénieurs CESI. Dans le cadre de notre collaboration avec CESI, nous avons été chargés du développement d'une plateforme en ligne destinée à faciliter le suivi des recherches de stage des étudiants de l'établissement.
        </p>

        
        <div class="my-4">
            <img src="{{ asset('images/teams/Organigramme_Web4All_2.jpg') }}" alt="Teams" class="w-[45em] mx-auto shadow-md">
        </div>

        

        <!-- Contexte et objectifs -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contexte et objectifs du projet</h2>
        <p class="text-lg text-gray-600 mb-6">
            L'objectif principal de ce projet est de simplifier la gestion des recherches de stage pour les étudiants tout en permettant aux enseignants responsables pédagogiques de suivre l’avancement des promotions. Le projet repose sur une méthodologie agile Scrum, ce qui garantit une livraison incrémentale et une réactivité face aux besoins évolutifs de CESI.
        </p>
        
        <!-- Rôles et responsabilités -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Les rôles et responsabilités de notre équipe Scrum</h2>
        <p class="text-lg text-gray-600 mb-6">
            Notre équipe Scrum se compose de professionnels spécialisés dans chaque domaine, permettant ainsi une gestion optimisée du projet. Voici un aperçu des rôles clés de notre équipe :
        </p>
        
        <ul class="list-disc pl-6 text-lg text-gray-600 mb-6">
            <li><strong>Product Owner :</strong> Morgane - Elle représente la voix de CESI dans le projet, gère le backlog produit et priorise les fonctionnalités.</li>
            <li><strong>Architecte logicielle :</strong> Estelle - Elle conçoit l'architecture du système et choisit les technologies adaptées.</li>
            <li><strong>Scrum Master :</strong> Mathieu - Il facilite l’adoption des pratiques Scrum et veille à la bonne organisation des sprints et réunions.</li>
            <li><strong>Chef de projet :</strong> Jean-Marc - Il assure la coordination entre Web4All et CESI pour garantir le bon déroulement du projet.</li>
            <li><strong>Développeur Frontend :</strong> Dominique - Elle s’occupe de l’interface utilisateur et travaille en étroite collaboration avec le designer pour rendre le site interactif et intuitif.</li>
            <li><strong>Développeur Backend :</strong> Sami - Il gère la partie serveur du site, assurant la sécurité, l’intégration des bases de données et les performances.</li>
            <li><strong>Web Designer :</strong> Julie - Elle crée les maquettes et prototypes pour garantir une expérience utilisateur fluide et agréable.</li>
            <li><strong>Admin Sys/DevOps :</strong> Rodriguez - Il configure les environnements, effectue les tests de performance et assure la gestion des déploiements automatiques.</li>
        </ul>
        
        <!-- Projet agile -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Un projet agile et collaboratif</h2>
        <p class="text-lg text-gray-600 mb-6">
            Nous utilisons un <strong>workflow GitHub</strong>, un outil flexible et collaboratif qui permet à notre équipe de travailler efficacement ensemble. Ce système garantit des déploiements fréquents et assure une amélioration continue du produit, tout en permettant une gestion optimale des versions.
        </p>

        <!-- Conclusion -->
        <p class="text-lg text-center text-gray-600">
            Nous sommes fiers de ce projet, et chaque membre de notre équipe joue un rôle essentiel pour sa réussite. Notre approche agile nous permet de répondre rapidement aux besoins de CESI et d’offrir un produit de qualité supérieure, conçu pour améliorer l’expérience des étudiants.
        </p>

    </div>
</div>
@endsection

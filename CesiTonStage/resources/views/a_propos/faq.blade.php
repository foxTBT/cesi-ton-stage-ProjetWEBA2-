@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-zinc-100 shadow-md rounded-lg p-8">
        <!-- Titre de la page -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Foire aux questions (FAQ)</h1>

        <!-- Introduction -->
        <p class="text-lg text-center text-gray-600 mb-6">
            Vous avez des questions ? Consultez notre FAQ ci-dessous pour trouver des réponses à vos interrogations. Si vous avez d'autres questions, n'hésitez pas à <a href="mailto:contact@cts.fr" class="text-yellow-500 hover:underline">nous contacter</a>.
        </p>

        <!-- Liste des questions et réponses -->
        <div class="space-y-4">
            @foreach(range(1, 25) as $i)
                <div class="border-b pb-4" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left text-lg font-semibold text-gray-800 hover:text-yellow-500 focus:outline-none">
                        <!-- Question -->
                        <div class="flex justify-between items-center">
                            <span>
                                @if($i == 1)
                                    Quel est l'objectif principal de la plateforme de suivi de recherche de stage ?
                                @elseif($i == 2)
                                    Comment la plateforme aide-t-elle les étudiants dans leur recherche de stage ?
                                @elseif($i == 3)
                                    Qui est responsable de la gestion des offres de stage sur la plateforme ?
                                @elseif($i == 4)
                                    La plateforme permet-elle de gérer des candidatures ?
                                @elseif($i == 5)
                                    Quelle méthodologie est utilisée pour développer la plateforme ?
                                @elseif($i == 6)
                                    Comment la plateforme facilite-t-elle la collaboration entre les étudiants et les enseignants ?
                                @elseif($i == 7)
                                    Qui sont les utilisateurs finaux de la plateforme ?
                                @elseif($i == 8)
                                    Comment les entreprises partenaires peuvent-elles publier des offres de stage ?
                                @elseif($i == 9)
                                    La plateforme propose-t-elle un suivi des candidatures des étudiants ?
                                @elseif($i == 10)
                                    Quels sont les rôles dans l’équipe Scrum de développement de la plateforme ?
                                @elseif($i == 11)
                                    Qu’est-ce que la méthodologie Scrum ?
                                @elseif($i == 12)
                                    Pourquoi Web4All utilise-t-elle GitHub pour ce projet ?
                                @elseif($i == 13)
                                    Quelle est la durée du projet de développement de la plateforme ?
                                @elseif($i == 14)
                                    Comment les enseignants responsables peuvent-ils suivre les progrès des étudiants ?
                                @elseif($i == 15)
                                    Les étudiants peuvent-ils interagir directement avec les entreprises via la plateforme ?
                                @elseif($i == 16)
                                    La plateforme est-elle accessible sur mobile ?
                                @elseif($i == 17)
                                    Quelles sont les technologies utilisées pour développer la plateforme ?
                                @elseif($i == 18)
                                    La plateforme prend-elle en compte les besoins des étudiants en situation de handicap ?
                                @elseif($i == 19)
                                    Comment les bugs et erreurs sont-ils gérés pendant le développement ?
                                @elseif($i == 20)
                                    Qui est responsable de la sécurité des données des étudiants et des entreprises ?
                                @elseif($i == 21)
                                    Comment la plateforme s’assure-t-elle de la conformité avec la réglementation RGPD ?
                                @elseif($i == 22)
                                    Quand la plateforme sera-t-elle disponible pour les étudiants de CESI ?
                                @elseif($i == 23)
                                    Comment les étudiants peuvent-ils créer un profil sur la plateforme ?
                                @elseif($i == 24)
                                    Les enseignants peuvent-ils modifier les offres de stage ?
                                @elseif($i == 25)
                                    Qui contacter en cas de problème ou pour des suggestions concernant la plateforme ?
                                @else
                                    Question générique {{ $i }}
                                @endif
                            </span>
                            <!-- Flèche -->
                            <svg :class="open ? 'transform rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <!-- Réponse -->
                    <div x-show="open" x-transition class="mt-2 text-gray-600 text-lg">
                        @if($i == 1)
                            L'objectif principal de la plateforme est d'aider les étudiants de CESI à suivre et à gérer leur recherche de stage, en facilitant l'interaction avec les entreprises partenaires et en permettant un suivi des candidatures et des offres.
                        @elseif($i == 2)
                            La plateforme permet aux étudiants de consulter les offres de stage disponibles, de postuler directement, et de suivre l'état de leur candidature en temps réel.
                        @elseif($i == 3)
                            Les offres de stage sont gérées par les entreprises partenaires, qui peuvent les publier sur la plateforme. Les étudiants peuvent alors postuler à ces offres.
                        @elseif($i == 4)
                            Oui, les étudiants peuvent soumettre leur candidature directement via la plateforme. Les enseignants responsables peuvent également suivre les candidatures et aider les étudiants si nécessaire.
                        @elseif($i == 5)
                            Nous utilisons la méthodologie agile Scrum pour le développement de la plateforme. Cela nous permet de répondre aux besoins changeants des utilisateurs et d'assurer une livraison incrémentale et continue du produit.
                        @elseif($i == 6)
                            La plateforme permet aux enseignants de suivre les progrès des étudiants, d’évaluer leurs candidatures et de les guider dans leur recherche de stage.
                        @elseif($i == 7)
                            Les utilisateurs finaux de la plateforme sont les étudiants de CESI, les enseignants responsables pédagogiques, et les entreprises partenaires.
                        @elseif($i == 8)
                            Les entreprises partenaires peuvent publier des offres de stage en créant un compte sur la plateforme, puis en soumettant les offres pour approbation avant qu'elles ne soient visibles par les étudiants.
                        @elseif($i == 9)
                            Oui, les étudiants peuvent suivre l'état de leurs candidatures et recevoir des notifications lorsque leur candidature est acceptée, rejetée ou mise en attente.
                        @elseif($i == 10)
                            L’équipe Scrum du projet comprend un Product Owner, un Scrum Master, des développeurs Frontend et Backend, un Web Designer, et un Architecte Logiciel.
                        @elseif($i == 11)
                            Scrum est une méthodologie agile de gestion de projet qui permet une collaboration continue, avec des livraisons fréquentes et une gestion flexible des besoins du projet.
                        @elseif($i == 12)
                            GitHub est utilisé pour le versionnement du code, la collaboration entre les développeurs, et la gestion des tâches via des issues et des pull requests. Il permet également de déployer le code de manière continue.
                        @elseif($i == 13)
                            Le projet de développement de la plateforme a une durée prévue de 6 à 8 mois, en fonction des exigences évolutives et des feedbacks des utilisateurs.
                        @elseif($i == 14)
                            Les enseignants peuvent suivre les progrès des étudiants via la plateforme, en accédant à l'état des candidatures et aux interactions des étudiants avec les entreprises partenaires.
                        @elseif($i == 15)
                            Oui, les étudiants peuvent interagir avec les entreprises en envoyant des messages, posant des questions et sollicitant des informations supplémentaires sur les offres de stage.
                        @elseif($i == 16)
                            Oui, la plateforme est responsive et fonctionne aussi bien sur ordinateur que sur mobile.
                        @elseif($i == 17)
                            La plateforme est développée avec des technologies modernes telles que PHP, Laravel pour le backend, et Vue.js pour le frontend.
                        @elseif($i == 18)
                            La plateforme est conçue pour être accessible, y compris pour les étudiants en situation de handicap, en respectant les normes d'accessibilité.
                        @elseif($i == 19)
                            Les bugs sont gérés via un processus de gestion des incidents dans GitHub. Lorsqu'un bug est signalé, il est assigné, corrigé, puis testé avant d’être déployé.
                        @elseif($i == 20)
                            La sécurité des données des étudiants et des entreprises est prise en charge par l’équipe DevOps et le responsable de la sécurité des systèmes, avec des mesures strictes telles que le cryptage des données et la mise à jour régulière des systèmes.
                        @elseif($i == 21)
                            La plateforme respecte la réglementation RGPD en matière de protection des données personnelles, en veillant à ce que les données des utilisateurs soient collectées et traitées de manière transparente et sécurisée.
                        @elseif($i == 22)
                            La plateforme sera disponible pour les étudiants de CESI à partir de la rentrée académique prochaine.
                        @elseif($i == 23)
                            Les étudiants peuvent créer un profil en se rendant sur la page d'inscription de la plateforme et en fournissant leurs informations personnelles et professionnelles.
                        @elseif($i == 24)
                            Non, les enseignants ne peuvent pas modifier directement les offres de stage. Ils peuvent seulement suivre les candidatures des étudiants.
                        @elseif($i == 25)
                            Pour toute question ou suggestion, vous pouvez contacter notre support à l'adresse <a href="mailto:contact@cts.fr" class="text-yellow-500 hover:underline">contact@cts.fr</a>.
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
@endsection

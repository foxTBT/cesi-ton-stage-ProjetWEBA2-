<!-- Vérifie si une session 'success' existe, ce qui signifie qu'il y a un message de succès à afficher -->
@if (session('success'))
    <!-- Si 'success' existe, affiche un message de succès avec une bordure verte, un fond blanc et du texte vert -->
    <p class="text-center border-2 border-green-600 bg-white text-green-600 shadow-lg rounded-lg py-2">
        <!-- Le message de succès est affiché en gras à l'intérieur de la balise <strong> -->
        <strong>{{ session('success') }}</strong>
    </p>
<!-- Si aucune session 'success', vérifie si une session 'error' existe -->
@elseif (session('error'))
    <!-- Si 'error' existe, affiche un message d'erreur avec une bordure rouge, un fond blanc et du texte rouge -->
    <p class="text-center border-2 border-red-600 bg-white text-red-600 shadow-lg rounded-lg py-2">
        <!-- Le message d'erreur est affiché en gras à l'intérieur de la balise <strong> -->
        <strong>{{ session('error') }}</strong>
    </p>
<!-- Si aucune session 'success' ni 'error', rien ne sera affiché -->
@endif

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Provision - Avitaillement de navires</title>
    <!-- Utilisation de Tailwind CSS pour un style moderne et minimaliste -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0d0d0d;
            color: #ffffff;
            overflow: hidden;
        }
        .logo-container {
            height: 30px;
            width: auto;
        }
        .hero-title .glow {
            color: #00ff73; /* Couleur de la lueur verte */
            text-shadow: 0 0 10px #00ff73, 0 0 20px #00ff73;
        }
        .cta-button {
            border: 1px solid #00ff73;
            box-shadow: 0 0 15px rgba(0, 255, 115, 0.4);
            transition: all 0.3s ease-in-out;
        }
        .cta-button:hover {
            box-shadow: 0 0 25px rgba(0, 255, 115, 0.7);
            transform: translateY(-2px);
        }
        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
        }
                /* Style pour l'effet néon au survol sur le mot "simple" */
        .neon-effect {
            position: relative;
            transition: all 0.3s ease-in-out;
        }
        .neon-effect:hover {
            color: #fff;
            text-shadow: 0 0 5px #fff,
                         0 0 10px #fff,
                         0 0 15px #00ff73,
                         0 0 20px #00ff73,
                         0 0 25px #00ff73;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <img src="{{ asset('assets/images/bg.jpg') }}" alt="Background Image" class="absolute opacity-20 inset-0 w-full h-full object-cover z-0">

    <!-- En-tête de navigation -->
    <header class="relative w-full py-4 px-8 flex justify-between items-center bg-transparent">
        <a href="#" class="flex items-center space-x-2">
            <!-- Remplacement du chemin d'accès au logo -->
            <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo Global Provision" class="logo-container mx-auto" />
            <span class="text-white font-bold text-xl">Global Provision</span>
        </a>
        <nav class="hidden sm:flex space-x-6 text-gray-400">
            <a href="#" class="hover:text-white transition-colors">Produits</a>
            <a href="#" class="hover:text-white transition-colors">Solutions</a>
            <a href="#" class="hover:text-white transition-colors">Ressources</a>
            <a href="#" class="hover:text-white transition-colors">Prix</a>
        </nav>
        <a href="#" class="text-white border border-gray-500 rounded-full px-4 py-1 text-sm hidden sm:block">Pour les Clients</a>
    </header>

    <!-- Contenu principal - Section Héro -->
    <main class="relative flex-grow flex items-center justify-center text-center px-4">
        <div class="max-w-4xl">
            <!-- Titre inspiré du style HackerRank -->
            <h1 class="hero-title text-5xl sm:text-7xl lg:text-8xl font-bold mb-6 leading-tight tracking-tighter">
                La logistique de l'avitaillement est <br class="hidden md:block">
                <span class="text-gray-400">devenue</span> <span class="glow neon-effect">simple</span>.
            </h1>
            <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                Nous rationalisons vos opérations et comblons les lacunes pour vous permettre de prospérer dans un monde de la chaîne d'approvisionnement rapide et efficace.
            </p>
            <!-- Bouton d'action avec effet lumineux -->
            <a href="#" class="cta-button inline-block px-8 py-4 text-lg font-medium text-white rounded-full">
                Demander un devis
            </a>
        </div>
    </main>

    <!-- Bannière de cookies simple -->
    <div class="relative cookie-banner p-4 bg-gray-950 text-gray-400 text-xs sm:text-sm flex justify-center items-center">
        <div class="max-w-3xl flex flex-col sm:flex-row items-center sm:space-x-4 space-y-2 sm:space-y-0 text-center sm:text-left">
            <span>Nous utilisons des cookies essentiels pour assurer le bon fonctionnement de notre site.</span>
            <div class="flex space-x-2 mt-2 sm:mt-0">
                <button class="text-sm px-4 py-2 rounded-full border border-gray-500 hover:text-white transition-colors">
                    Décliner
                </button>
                <button class="text-sm px-4 py-2 rounded-full border border-gray-500 hover:text-white transition-colors bg-[#00ff73] text-gray-900 border-none hover:bg-[#00e667]">
                    Accepter
                </button>
            </div>
        </div>
    </div>

</body>
</html>

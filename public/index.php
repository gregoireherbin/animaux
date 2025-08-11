<?php

use Symfony\Component\Dotenv\Dotenv;
use App\Kernel;

// Charger les variables d'environnement seulement si le fichier .env existe
if (file_exists(__DIR__.'/../.env')) {
    (new Dotenv())->loadEnv(__DIR__.'/../.env');
}

// Retourner la fonction anonyme qui crée le Kernel en fonction du contexte
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

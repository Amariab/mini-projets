<?php

// Déclare l’espace de nom (namespace) du contrôleur
namespace App\Controllers;

// Importe la classe CURLRequest (même si ici on utilise le service directement) et pas 
//besoin car le service de curlrequest est utilisé directement en interne via \Config\Services::curlrequest()
use CodeIgniter\HTTP\CURLRequest;

// Déclaration du contrôleur Home qui hérite de BaseController
class Home extends BaseController
{
    // Méthode appelée lorsque l'on accède à la route "/"
    public function index()
    {
        // Redirige automatiquement vers l’URL /home/weather
        return redirect()->to('/home/weather');
    }

    // Méthode appelée lorsque l'on accède à la route "weather"
    public function weather()
    {
        // Crée un client HTTP CURL via le service intégré de CodeIgniter
        $client = \Config\Services::curlrequest();

        // Effectue une requête GET vers l'API OpenWeatherMap
        $response = $client->get('https://api.openweathermap.org/data/2.5/weather', [
            
            // Paramètres envoyés dans l’URL (?q=...&appid=...)
            'query' => [
                
                // Ville demandée (avec code pays pour éviter les ambiguïtés)
                'q' => 'Aix-en-Provence,fr',

                // Clé API personnelle fournie par OpenWeatherMap
                'appid' => '7be5f643bb24c412d8caa64af2e235f5',

                // Unité de température en degrés Celsius
                'units' => 'metric',

                // Langue des descriptions météo (français)
                'lang' => 'fr'
            ]
        ]);

        // Récupère le corps de la réponse (JSON)
        // et le convertit en tableau associatif PHP
        $data = json_decode($response->getBody(), true);

        // Envoie les données météo à la vue "weather.php"
        // sous le nom de variable $weather
        return view('weather', ['weather' => $data]);
    }
}
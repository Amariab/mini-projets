<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Stripe\Stripe; // Importe la classe Stripe de la bibliothèque
use Stripe\Checkout\Session; // Importe la classe Session pour Stripe Checkout

use PayPal\Auth\OAuthTokenCredential; // Classe PayPal pour l'authentification OAuth
use PayPal\Rest\ApiContext; // Classe PayPal pour configurer l'API
use PayPal\Api\Transaction; // Classe PayPal pour définir une transaction
use PayPal\Api\Payer; // Classe PayPal pour définir le payeur
use PayPal\Api\Amount; // Classes PayPal pour définir le montant
use PayPal\Api\RedirectUrls; // Classe PayPal pour les URLs de redirection
use PayPal\Api\Payment; // Classe PayPal pour créer un paiement





class PaymentController extends Controller
{
    protected $helpers = ['form', 'url']; // Charge les helpers URL et Form

    public function index()
    {
        // Affiche la page d'accueil avec les options de paiement
        return view('payments/index');
    }

    // Méthode pour le paiement Stripe
    public function payWithStripe()
    {
        // Récupère la clé secrète Stripe depuis la configuration .env
        Stripe::setApiKey(env('stripe.api_key_secret'));


        // Crée une session de paiement Stripe Checkout
    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Produit Test',
                ],
                'unit_amount' => 2000,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment', // Mode de la session : paiement unique
        'success_url' => site_url('payment/stripe/success') . '?session_id={CHECKOUT_SESSION_ID}',

        // URL de succès après paiement
        'cancel_url' => base_url('payment/stripe/cancel'), // URL d'annulation
    ]);

        // Redirige l'utilisateur vers la page de paiement Stripe Checkout
        return redirect()->to($session->url);
    }

    // Méthode de callback en cas de succès du paiement Stripe
    public function stripeSuccess()
    {
        // Récupère la clé secrète Stripe
        Stripe::setApiKey(env('stripe.api_key_secret'));


        // Récupère l'ID de session depuis l'URL
        $session_id = $this->request->getGet('session_id');

        try {
            // Récupère les détails de la session Stripe
            $session = Session::retrieve($session_id);

            // Vérifie si le paiement a été réussi
            if ($session->payment_status == 'paid') {
                $data['message'] = "Paiement Stripe réussi ! ID de session: " . $session->id;
                $data['status'] = 'success';
            } else {
                $data['message'] = "Le paiement Stripe n'a pas été confirmé. Statut : " . $session->payment_status;
                $data['status'] = 'error';
            }
        } catch (\Exception $e) {
            $data['message'] = "Erreur lors de la récupération de la session Stripe : " . $e->getMessage();
            $data['status'] = 'error';
        }

        return view('payments/status', $data);
    }

    // Méthode de callback en cas d'annulation du paiement Stripe
    public function stripeCancel()
    {
        $data['message'] = "Paiement Stripe annulé.";
        $data['status'] = 'warning';
        return view('payments/status', $data);
    }

    // Méthode pour le paiement PayPal
    public function payWithPaypal()
    {
        // Configure l'API PayPal avec les identifiants depuis .env
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('paypal.client_id'), // ID Client PayPal
                env('paypal.secret')     // Secret PayPal
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => env('paypal.mode'), // Mode : sandbox ou live
            )
        );

        // Définition du montant du paiement
        $amount = new Amount();
        $amount->setCurrency('EUR') // Devise en Euros
            ->setTotal(20.00); // Montant total (20.00 EUR)

        // Définition de la transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Description du produit test'); // Description de la transaction

        // Définition du payeur (type de paiement)
        $payer = new Payer();
        $payer->setPaymentMethod('paypal'); // Méthode de paiement : PayPal

        // Définition des URLs de redirection après paiement
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('payment/paypal/success')) // URL de succès
            ->setCancelUrl(base_url('payment/paypal/cancel')); // URL d'annulation

        // Création de l'objet Payment
        $payment = new Payment();
        $payment->setIntent('sale') // Intention du paiement : vente
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            // Création du paiement sur PayPal
            $payment->create($apiContext);

            // Redirige l'utilisateur vers l'URL d'approbation de PayPal
            return redirect()->to($payment->getApprovalLink());
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // Gestion des erreurs de connexion PayPal
            $data['message'] = "Erreur de connexion PayPal : " . $ex->getData();
            $data['status'] = 'error';
            return view('payments/status', $data);
        } catch (\Exception $ex) {
            // Autres erreurs générales
            $data['message'] = "Erreur PayPal : " . $ex->getMessage();
            $data['status'] = 'error';
            return view('payments/status', $data);
        }
    }

    // Méthode de callback en cas de succès du paiement PayPal
    public function paypalSuccess()
    {
        // Récupère le Payment ID et le Payer ID depuis l'URL de retour de PayPal
        $paymentId = $this->request->getGet('paymentId');
        $payerId = $this->request->getGet('PayerID');

        if (empty($paymentId) || empty($payerId)) {
            $data['message'] = "Données de paiement PayPal manquantes.";
            $data['status'] = 'error';
            return view('payments/status', $data);
        }

        // Configure l'API PayPal
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('paypal.client_id'),
                env('paypal.secret')
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => env('paypal.mode'),
            )
        );

        // Récupère l'objet Payment depuis PayPal
        $payment = Payment::get($paymentId, $apiContext);

        // Exécute le paiement
        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $apiContext);

            if ($result->getState() == 'approved') {
                $data['message'] = "Paiement PayPal réussi ! ID de transaction : " . $result->getId();
                $data['status'] = 'success';
            } else {
                $data['message'] = "Le paiement PayPal n'a pas été approuvé. Statut : " . $result->getState();
                $data['status'] = 'error';
            }
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            $data['message'] = "Erreur de connexion PayPal lors de l'exécution : " . $ex->getData();
            $data['status'] = 'error';
        } catch (\Exception $ex) {
            $data['message'] = "Erreur PayPal lors de l'exécution : " . $ex->getMessage();
            $data['status'] = 'error';
        }

        return view('payments/status', $data);
    }

    // Méthode de callback en cas d'annulation du paiement PayPal
    public function paypalCancel()
    {
        $data['message'] = "Paiement PayPal annulé.";
        $data['status'] = 'warning';
        return view('payments/status', $data);
    }
}

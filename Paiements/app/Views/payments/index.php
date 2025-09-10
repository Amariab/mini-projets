<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options de Paiement</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        h1 { text-align: center; color: #333; }
        .payment-options { display: flex; justify-content: space-around; margin-top: 30px; }
        .option { text-align: center; padding: 20px; border: 1px solid #eee; border-radius: 5px; width: 45%; }
        .option a { display: block; margin-top: 15px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .option a:hover { background-color: #0056b3; }
        .stripe-logo { width: 100px; height: auto; }
        .paypal-logo { width: 120px; height: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Choisissez votre méthode de paiement</h1>
        <p>Produit : Test de paiement - Prix : 20.00 EUR</p>

        <div class="payment-options">
            <div class="option">
                <h2>Payer avec Stripe</h2>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Stripe_Logo%2C_revised_2016.svg/2560px-Stripe_Logo%2C_revised_2016.svg.png" alt="Stripe Logo" class="stripe-logo">
                <p>Paiement sécurisé par carte bancaire.</p>
                <a href="<?= base_url('payment/stripe') ?>">Payer 20.00 EUR avec Stripe</a>
            </div>

            <div class="option">
                <h2>Payer avec PayPal</h2>
                <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/na/us/logo-long-shadow-285x73.png" alt="PayPal Logo" class="paypal-logo">
                <p>Paiement via votre compte PayPal.</p>
                <a href="<?= base_url('payment/paypal') ?>">Payer 20.00 EUR avec PayPal</a>
            </div>
        </div>
    </div>
</body>
</html>
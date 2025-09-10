CREATE TABLE factures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_facture VARCHAR(50) NOT NULL,
    date_facture DATE NOT NULL,
    client_nom VARCHAR(100) NOT NULL,
    client_adresse TEXT NOT NULL,
    total_ht DECIMAL(10,2) NOT NULL,
    total_tva DECIMAL(10,2) NOT NULL,
    total_ttc DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
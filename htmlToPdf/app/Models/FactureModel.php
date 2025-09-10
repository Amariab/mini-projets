<?php

namespace App\Models;
use CodeIgniter\Model;

class FactureModel extends Model
{
    protected $table = 'factures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['numero', 'client', 'date_facture', 'montant_total', 'statut'];






}


///////////
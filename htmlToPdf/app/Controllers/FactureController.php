<?php namespace App\Controllers;

use App\Models\FactureModel;
use Dompdf\Dompdf;

class FactureController extends BaseController
{
    public function index()
    {
        $model = new FactureModel();
        $data['factures'] = $model->findAll();
        return view('facture/liste', $data);
    }

    public function creer()
    {
          // Charge le helper Form
        helper('form');
       

        return view('facture/creer');
    }

    public function enregistrer()
    {
        $model = new FactureModel();
        $model->save([
            'numero_facture' => $this->request->getPost('numero_facture'),
            'date_facture' => $this->request->getPost('date_facture'),
            'client_nom' => $this->request->getPost('client_nom'),
            'client_adresse' => $this->request->getPost('client_adresse'),
            'total_ht' => $this->request->getPost('total_ht'),
            'total_tva' => $this->request->getPost('total_tva'),
            'total_ttc' => $this->request->getPost('total_ttc')
        ]);

        return redirect()->to('/facture');
    }

    public function voir($id)
    {
        $model = new FactureModel();
        $data['facture'] = $model->find($id);
        return view('facture/voir', $data);
    }

    public function pdf($id)
    {
        $model = new FactureModel();
        $data['facture'] = $model->find($id);

        $html = view('facture/voir', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("facture_{$data['facture']['numero_facture']}.pdf", ['Attachment' => 0]);
    }
}

<?php
use libs\system\Controller;

use src\model\PaysRepository;

class PaysController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function liste()
    {
        $paysdb = new PaysRepository();
        $data["listePays"] = $paysdb->getAll();
        return $this->view->load("pays/liste", $data);
    }

    public function insert()
    {
        extract($_POST);
        $pays = new Pays();
        $pays->setNom($nom);
        $pays->setLatitude($latitude);
        $pays->setLongitude($longitude);

        $paysdb = new PaysRepository();
        $paysdb->insert($pays);

        return $this->liste();
    }

    public function edit($id)
    {
        $paysdb = new PaysRepository();
        $data["pays"] = $paysdb->get($id);
        $data["listePays"] = $paysdb->getAll();
        return $this->view->load("pays/edit", $data);
    }
    public function update()
    {
        extract($_POST);
        $pays = new Pays();
        $pays->setId($id);
        $pays->setNom($nom);
        $pays->setLatitude($latitude);
        $pays->setLongitude($longitude);

        $paysdb = new PaysRepository();
        $paysdb->update($pays);

        return $this->liste();
    }

    public function delete($id)
    {
        $paysdb = new PaysRepository();
        $paysdb->delete($id);

        return $this->liste();
    }
}
?>

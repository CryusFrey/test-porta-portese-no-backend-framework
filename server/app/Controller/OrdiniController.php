<?php
namespace App\Controller;
use App\Database\Mysqli;


class OrdiniController
{
    public function getOrdini()
    {
        $db = new Mysqli();
        $data = $db->query('SELECT cliente, data FROM ordini ORDER BY data ASC');
        var_dump($data);
        return json_encode($data);
    }

    public function getOrdiniInverse()
    {
        $db = new Mysqli();
        $data = $db->query('SELECT cliente, data FROM ordini ORDER BY data DESC');
        return json_encode($data);
    }
}
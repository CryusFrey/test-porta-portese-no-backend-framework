<?php

namespace App\Controller;

use App\DB\Mysqli;

class OrdiniController
{
    public function getOrdini()
    {
        $db = new Mysqli();
        $data = $db->query('
            SELECT cliente, data FROM ordini ORDER BY data ASC
        ');
        return json($data);
    }

    public function getOrdiniInverse()
    {
        $db = new Mysqli();
        $data = $db->query('
            SELECT cliente, data FROM ordini ORDER BY data DESC
        ');
        return json($data);
    }
}
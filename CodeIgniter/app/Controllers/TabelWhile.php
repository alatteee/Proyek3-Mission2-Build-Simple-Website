<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class TabelWhile extends BaseController
{
    public function index()
    {
        // Data contoh array
        $data = [
            ['nim' => '2023001', 'nama' => 'Budi', 'umur' => 20],
            ['nim' => '2023002', 'nama' => 'Ani',  'umur' => 21],
            ['nim' => '2023003', 'nama' => 'Siti', 'umur' => 19],
        ];

        // Rangkai tabel HTML dengan looping while
        $html  = "<h2>Contoh Tabel HTML dengan Looping WHILE</h2>";
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $html .= "<tr><th>NIM</th><th>Nama</th><th>Umur</th></tr>";

        $i = 0;
        $count = count($data);
        while ($i < $count) {
            $html .= "<tr>";
            $html .= "<td>{$data[$i]['nim']}</td>";
            $html .= "<td>{$data[$i]['nama']}</td>";
            $html .= "<td>{$data[$i]['umur']}</td>";
            $html .= "</tr>";
            $i++;
        }

        $html .= "</table>";

        return $html;
    }
}

<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Tabel extends BaseController
{
    public function index()
    {
        $html  = "<h2>Contoh Tabel HTML di Controller (tanpa looping)</h2>";
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $html .= "<tr><th>NIM</th><th>Nama</th><th>Umur</th></tr>";
        $html .= "<tr><td>2023001</td><td>Budi</td><td>20</td></tr>";
        $html .= "<tr><td>2023002</td><td>Ani</td><td>21</td></tr>";
        $html .= "<tr><td>2023003</td><td>Siti</td><td>19</td></tr>";
        $html .= "</table>";

        return $html;
    }
}

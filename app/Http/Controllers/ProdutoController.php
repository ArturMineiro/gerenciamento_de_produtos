<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Em App\Http\Controllers\ProdutoController.php

public function index()
{
    return view('produto.index');
}

}

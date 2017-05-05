<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\ImportBook;
use App\Models\BillDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfBooks = Book::count();
        $numberOfSelledBooks = BillDetail::sum('amount');
        $numberOfImportBooks = ImportBook::sum('amount');
        $numberOfUsers = User::count()-1;
        return view('home', compact('numberOfBooks', 'numberOfSelledBooks', 'numberOfImportBooks', 'numberOfUsers'));
    }
}

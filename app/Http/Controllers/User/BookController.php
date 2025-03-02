<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        $books = Book::latest()->get();
        return view('user.books-media', compact('books'));
    }
    
}

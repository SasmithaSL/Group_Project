<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        // Paginate the books, you can adjust the number (10) to control the number of books per page
        $books = Book::latest()->paginate(9);
        return view('user.books-media', compact('books'));
    }
}

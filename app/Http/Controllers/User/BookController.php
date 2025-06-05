<?php
// app\Http\Controllers\User\BookController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    public function index(Request $request) {
        $query = Book::query();
        
        // Check if there's a search keyword
        if ($request->has('keywords') && !empty($request->keywords)) {
            $keywords = $request->keywords;
            
            // Search in title, author, description, and ISBN
            $query->where(function($q) use ($keywords) {
                $q->where('title', 'LIKE', '%' . $keywords . '%')
                  ->orWhere('author', 'LIKE', '%' . $keywords . '%')
                  ->orWhere('description', 'LIKE', '%' . $keywords . '%')
                  ->orWhere('isbn', 'LIKE', '%' . $keywords . '%');
            });
        }
        
        // Paginate the results and append search parameters to pagination links
        $books = $query->latest()->paginate(9)->appends($request->query());
        
        return view('user.books-media', compact('books'));
    }
}
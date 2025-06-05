<?php
// app\Http\Controllers\Admin\BookController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    
    // Add this method to show the manage books page with book list
    public function index() {
        $books = Book::latest()->get(); // Get all books ordered by latest first
        return view('admin.manage-books', compact('books'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imageData = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image));
        }
    
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'image' => $imageData
        ]);
    
        // Redirect to the index route instead of back
        return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
    }
    
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('delete', 'Book deleted successfully!');
    }
    public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required|string',
        'isbn' => 'required|string|unique:books,isbn,' . $book->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $book->title = $request->title;
    $book->author = $request->author;
    $book->description = $request->description;
    $book->isbn = $request->isbn;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $book->image = base64_encode(file_get_contents($image));
    }

    $book->save();

    return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
}

}
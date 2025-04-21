<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
    
        return response()->json([
            'message' => "Book '{$book->title}' has been added successfully."
            // 'book' => $book
        ], 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }
}
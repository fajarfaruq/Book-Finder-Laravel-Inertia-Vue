<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Books/Index');
    }

    public function listBooks()
    {
        // Retrieve all books
        $books = Books::all();

        // Prepare the response
        $response = [
            'data' => $books,
            'totalCount' => $books->count(), // Total number of books
            'groupCount' => 1, // You can modify this based on your grouping logic if needed
            'summary' => null, // Optional summary field, set to null if not used
        ];

        // Return JSON response
        return response()->json($response);
    }

    public function searchBooks(Request $request)
    {
        $keyword = $request->query('name');
        
        if (!$keyword) {
            return response()->json(['books' => []]);
        }

        $books = Books::where('title', 'like', "%{$keyword}%")->get();

        return response()->json(['books' => $books]);
    }


    public function voteBooks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:books,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 400);
        }

        // Find the book by its ID
        $book = Books::find($request->input('id'));

        if (!$book) {
            return response()->json([
                'error' => 'Book not found'
            ], 404);
        }

        // Increment the vote count
        $book->vote_count += 1;
        $book->save();

        // Return updated vote count
        return response()->json([
            'vote_count' => $book->vote_count
        ], 200);
    }

    public function insertBooks(Request $request) {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'values' => 'required|json', // Ensure 'values' is a JSON string
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 400);
        }

        // Decode the JSON string from the 'values' field
        $data = json_decode($request->input('values'), true);

        // Validate the decoded data
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string',
            'vote_count' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid book data',
                'messages' => $validator->errors()
            ], 400);
        }

        // Create a new book record
        $book = Books::create($data);

        // Return the book as JSON response
        return response()->json($book, 201);
    }

    public function updateBooks(Request $request) {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'key' => 'required|integer|exists:books,id',
            'values' => 'required|string', // Ensure 'values' is a JSON string
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 400);
        }

        // Extract key and JSON values from the request
        $key = $request->input('key');
        $jsonValues = $request->input('values');

        // Decode the JSON string
        $values = json_decode($jsonValues, true);

        // Check if JSON decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json([
                'error' => 'Invalid JSON format'
            ], 400);
        }

        // Validate the decoded data
        $validator = Validator::make($values, [
            'title' => 'sometimes|string',
            'author' => 'sometimes|string',
            'genre' => 'sometimes|string',
            'vote_count' => 'sometimes|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid update data',
                'messages' => $validator->errors()
            ], 400);
        }

        // Find the book by its key (ID)
        $book = Books::find($key);

        if (!$book) {
            return response()->json([
                'error' => 'Book not found'
            ], 404);
        }

        // Update the book with the provided values
        $book->update($values);

        // Return success response with updated book details
        return response()->json([
            'title' => $book->title,
            'author' => $book->author,
            'genre' => $book->genre,
            'vote_count' => $book->vote_count,
            'id' => $book->id,
            'created_at' => $book->created_at->toIso8601String(),
            'updated_at' => $book->updated_at->toIso8601String(),
        ], 200);
    }

    public function deleteBooks(Request $request) {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'key' => 'required|integer|exists:books,id', // Ensure 'key' is an integer and exists in the 'books' table
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 400);
        }

        // Extract the ID from the request
        $key = $request->input('key');

        // Find the book by its ID
        $book = Books::find($key);

        if (!$book) {
            return response()->json([
                'error' => 'Book not found'
            ], 404);
        }

        // Delete the book
        $book->delete();

        // Return 204 No Content response
        return response()->noContent();
    }
}

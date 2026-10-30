<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%'.$request->query('judul').'%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->query('category_id'));
        }

        $books = $query->paginate(10);

        return BookResource::collection($books);
    }

    // GET /api/books/{id}
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);

        return new BookResource($book);
    }

    // POST /api/books
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return (new BookResource($book->load('category')))
            ->response()
            ->setStatusCode(201);
    }

    // PUT /api/books/{id}
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'penulis' => 'required|string|max:100',
            'penerbit' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|string|max:20',
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $book->update($validated);

        return new BookResource($book->load('category'));
    }

    // DELETE /api/books/{id}
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Buku berhasil dihapus.']);
    }
}

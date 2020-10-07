<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //native : select * from books;
        $book = Book::all();
        if($book && $book->count() >0){
            return response(["message" => "Show data success", "data" => $book],200);
        }else{
            return response(["message" => "Data not found", "data" => null],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::create([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);

            return response(['message' => 'Create data success', 'data' => $data], 201);
        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if($book && $book->count()>0){
            return response(["message" => "Show data success", "data" => $book],200);
        }else{
            return response(["message" => "Data not found", "data" => null],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::find($id)->update([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);
            return response(['message' => 'Update data success', 'data' => $data], 201);

        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::destroy($id);
            return response(['message' => 'Delete data success', 'data' => $data], 201);

        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
        }
    }
}

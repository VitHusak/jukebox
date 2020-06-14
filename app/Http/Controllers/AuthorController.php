<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        // vytvoří novou řádku v table Author
        $author = new Author;

        // old vezme hodnotu z minulého pokusu odeslání formuláře nebo defoultní hodnotu 
        // old('minulá hodnota', 'defaultní hodnota')
        $authorName = \old('name');
        $authorAge = \old('age');
        $submit = 'create';

        return \view('admin.author.edit', [
            'author' => $author,
            'authorName' => $authorName,
            'authorAge' => $authorAge,
            'submit' => $submit
            ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required'
        ]);


        $author = new Author;
        $author->name = $request->name;
        $author->age = $request->age;
        $author->save();

        session()->flash('success_message', 'New author ' . $author->name . ' was successfully saved!');

        
        return \redirect('/author/' . $author->id . '/edit');
    }

    public function show($id)
    {
        //
    }

    public function edit($author_id)
    {
        $author = Author::findOrFail($author_id);
        $authorName = \old('name', $author->name);
        $authorAge = \old('age', $author->age);
        $submit = 'edit';

        return \view('admin.author.edit', [
            'author' => $author,
            'authorName' => $authorName,
            'authorAge' => $authorAge,
            'submit' => $submit
            ]);
    }

    public function update(Request $request, $author_id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required'
        ]);

        $author = Author::findOrFail($author_id);
        $author->name = $request->name;
        $author->age = $request->age;
        $author->save();

        session()->flash('success_message', 'Author ' . $author->name . ' was successfully edited!');
        
        return \redirect('/author/' . $author->id . '/edit');
    }

    public function destroy($id)
    {
        //
    }
}

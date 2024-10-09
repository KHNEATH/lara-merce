<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Table;

class TableController extends Controller
{
    public function index(){
        $tables = Table::get();
        return view ('backends.tables.index')->with('tables', $tables);
    }

    public function create(){
        return view('backends.tables.create');
    }

    public function store(Request $request) {
        $tableData = $request->all();
        $file = $request->file('image');
        if(!$file) {
            return back();
        }

        $filename = time() . '_' . $file-> getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filenameAndPath = 'tables/' . $filename . '.' . $extension;

        $file->storeAs('public/' . $filenameAndPath);
        $tableData['image_url'] = 'storage/'. $filenameAndPath;

        Table::create($tableData);
        return redirect(route('backends.tables.index'));
    }

    public function edit(Table $table){
        return view('backends.tables.edit', [
            'table' => $table
        ]);
    }

    public function update(Table $table, Request $request){
        $tableData = $request->all();

        $file = $request->file('image');
        if($file) {
            $filename = time() . '_' . $file-> getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameAndPath = 'tables/' . $filename . '.' . $extension;

            $file->storeAs('public/' . $filenameAndPath);
            $tableData['image_url'] = 'storage/'. $filenameAndPath;
            // Delete old image
            File::delete($table->image_url);
        }
        $table->update($tableData);
        return redirect(route('backends.tables.index'));

    }

    public function destroy(Table $table){
        $imageUrl = $table->image_url;
        $table->delete();
        // Delete old image
        File::delete($imageUrl);
        return redirect(route('backends.tables.index'));
    }
}

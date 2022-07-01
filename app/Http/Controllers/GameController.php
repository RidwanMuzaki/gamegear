<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class GameController extends Controller
{
    public function index()
    {
        $game = Game::all();
        return view('dashboard.admin', compact('game'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $game = new game;
        $game->name = $request->input('name');
        $game->price = $request->input('price');
        $game->description = $request->input('description');
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/game/', $filename);
            $game->profile_image = $filename;
        }
        $game->save();
        return redirect()->back()->with('status', 'Game Data Added Successfully');
    }

    public function edit($id)
    {
        $game = game::find($id);
        return view('dashboard.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = game::find($id);
        $game->name = $request->input('name');
        $game->price = $request->input('price');
        $game->description = $request->input('description');

        if ($request->hasfile('profile_image')) {
            $destination = 'uploads/game/' . $game->profile_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/game/', $filename);
            $game->profile_image = $filename;
        }

        $game->update();
        return redirect()->back()->with('status', 'Game Data Updated Successfully');
    }

    public function destroy($id)
    {
        $game = game::find($id);
        $destination = 'uploads/game/' . $game->profile_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $game->delete();
        return redirect()->back()->with('status', 'Game Data Deleted Successfully');
    }

    public function exportpdf()
    {
        $game = game::all();
        return view('game', compact('game'));
    }

    public function downloadpdf()
    {
        $game = game::all();
        $pdf = PDF::loadView('game',compact('game'));
        return $pdf->download('game.pdf');
    }
}

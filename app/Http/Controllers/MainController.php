<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{

    public function index()
    {
        // Futuramente, aqui iremos carregar as notas do usuário
        // Load Users Notes
        // Carrega e exibe a view 'home.blade.php'
        // $username = session('user')['username'];
        // // return view('home', compact([$username => 'username']));
        // return view('home');
        // Carrega as notas do usuário logado através da relação
        $notes = User::find(session('user')['id'])->notes;
        // Passa a variável 'notes' para a view 'home'
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        $request->validate([
            'text_title' => 'required|min:3|max:200',
            'text_note' => 'required|min:3|max:3000',
        ], [
            'text_title.required' => 'O título é obrigatório.',
            'text_title.min' => 'O título deve ter pelo menos :min caracteres.',
            'text_title.max' => 'O título deve ter no máximo :max caracteres.',
            'text_note.required' => 'A nota é obrigatória.',
            'text_note.min' => 'A nota deve ter pelo menos :min caracteres.',
            'text_note.max' => 'A nota deve ter no máximo :max caracteres.',
        ]);
        $id = session('user')['id'];

        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();
        return redirect()->route('home')->with('success', 'Nota criada com sucesso!');
    }

    public function editNote($id)
    {
        $decrypted_id = Operations::decryptId($id);
        // Se deu tudo certo, exibe o ID real
        $note = Note::find($decrypted_id);
        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
    {
        if ($request->note_id === null) {
            return redirect()->route('home');
        }

        $request->validate([
            'text_title' => 'required|min:3|max:200',
            'text_note' => 'required|min:3|max:3000',
        ], [
            'text_title.required' => 'O título é obrigatório.',
            'text_title.min' => 'O título deve ter pelo menos :min caracteres.',
            'text_title.max' => 'O título deve ter no máximo :max caracteres.',
            'text_note.required' => 'A nota é obrigatória.',
            'text_note.min' => 'A nota deve ter pelo menos :min caracteres.',
            'text_note.max' => 'A nota deve ter no máximo :max caracteres.',
        ]);

        // Desencriptar o ID
        $id = Operations::decryptId($request->note_id); // ou: $id = Crypt::decrypt($request->note_id);

        // Carregar a nota
        $note = Note::find($id);
        if (!$note) {
            return redirect()->route('home');
        }

        $note->title = $request->text_title;
        $note->text  = $request->text_note;
        $note->save();

        return redirect()->route('home');
    }


    public function deleteNote($id)
    {
        $noteId = Operations::decryptId($id);
        $note = Note::find($noteId);
        return view('delete_note', ['note' => $note]);
    }

    public function deleteNoteConfirm($id)
    {
        $noteId = Operations::decryptId($id);
        $note = Note::find($noteId);
        if (!$note) {
            return redirect()->route('home');
        }
        // Soft delete automático
        $note->delete();
        return redirect()->route('home');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules() {
        return [
            'nome' => 'required|unique:marcas,nome,'.$this->id.'|min:3',
            'imagem' => 'required|file|mimes:png'
        ]; 
    
    }

    public function Feedback() {
        return [
            'required' => 'O campo: attribute é obrigatório!',
            'imagem.mimes' => 'Imagem apenas do tipo: PNG',
            'nome.unique' => 'O nome de marca, já existente!',
            'nome.min' => 'O nome deve ter um mínimo 3 caracteres!'
        ];
    }
}

   

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{	
	//campos editables
	protected $fillable = ['name','description'];
	//reglas de validación y mensajes
	public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoria.',
        'name.min' => 'El nombre de la  debe tener almenos 3 caracteres.',
        
        'description.max' => 'La descripción la categoria solo admite hasta 250 caractes.',
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:250',
        
    ];
    //relacion con productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;

    }
}

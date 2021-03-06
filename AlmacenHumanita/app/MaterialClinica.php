<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialClinica extends Model
	{

	protected $table = 'materialclinica';

	protected $primaryKey = 'id';

	 protected $fillable = ['nombre', 'descripcion', 'maximo', 'minimo', 'existencia', 'fecha_caducidad', 'area', 
	 'inmunologia', 'uroanalisis','hematologia','bacteriologia','bioquimica','hormonas','unidad_medida', 'numero_referencia', 'presentacion'];

	 	public function pedidos()
		{

	    return $this->belongsToMany('App\Pedidos')
	      ->withTimestamps();
		}

	public function users()
		{
	    return $this->belongsToMany('App\User')
	      ->withTimestamps();
		}

	 public function proveedors()
		{
	    return $this->belongsToMany('App\Proveedor')
	      ->withTimestamps();
		}

		public function entrada_matrizs()
		{
	    return $this->belongsToMany('App\EntradaMatris')
	      ->withTimestamps();
		}

		public function InventarioSucursal()
{
    return $this->belongsToMany('App\InventarioSucursal')
      ->withTimestamps();
}

        public function faltante()
        {

        return $this->belongsToMany('App\Faltante')
          ->withTimestamps();
        }

        		public function cotizacion()
		{
	    return $this->belongsToMany('App\Cotizacion')
	      ->withTimestamps();
		}


		public function scopeName($query, $name){
			if (trim($name) != ""){
				$query->where(\DB::raw('nombre'), 'LIKE', "%$name%");
			}
			
		}


}

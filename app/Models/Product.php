<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * <b>Tabela</b>  Atributo responsável em definir qual respectiva tabela no banco de dados representa
     */
    protected $table = 'products';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'unitary_value',
        'stock_quantity',
        'available',
        'photo',
    ];

    /**
     * <b>order</b> Método responsável em definir o relacionamento entre as Models de Order e Product e suas
     * respectivas tabelas.
     */
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}

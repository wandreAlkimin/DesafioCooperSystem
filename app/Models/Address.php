<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    /**
     * <b>Tabela</b>  Atributo responsável em definir qual respectiva tabela no banco de dados representa
     */
    protected $table = 'addresses';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uf',
        'county',
        'neighborhood',
        'street',
        'number',
        'cep'
    ];

    /**
     * <b>order</b> Método responsável em definir o relacionamento entre as Models de Address e Order e suas
     * respectivas tabelas.
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }

}

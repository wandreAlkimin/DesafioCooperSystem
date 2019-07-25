<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /**
     * <b>Tabela</b>  Atributo responsável em definir qual respectiva tabela no banco de dados representa
     */
    protected $table = 'orders';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity_products',
        'unitary_value',
        'status',
        'requester',
        'forwarding_agent',
        'code',
        'address_id',
    ];

    /**
     * <b>address</b> Método responsável em definir o relacionamento entre as Models de Address e Order e suas
     * respectivas tabelas.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * <b>product</b> Método responsável em definir o relacionamento entre as Models de Product e Order e suas
     * respectivas tabelas.
     */
    public function product()
    {
        return $this->belongsToMany(Product::class,'orders_products');
    }
}

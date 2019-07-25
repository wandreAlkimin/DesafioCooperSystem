<?php

namespace App\Http\Controllers\Compra;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Order::with('product:name')->orderBy('id','desc')->get();

        return view('order.index',compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $address = Address::create([
           'street'       => $dados['street'],
           'number'       => $dados['number'],
           'neighborhood' => $dados['neighborhood'],
           'city'         => $dados['city'],
           'uf'           => $dados['uf'],
           'county'       => $dados['county'],
           'cep'          => $dados['cep'],
        ]);

        $pedido = Order::find($dados['idpedido']);
        $pedido->requester = $dados['requester'];
        $pedido->address_id = $address->id;
        $pedido->save();


        Session::flash('msg', 'Pedido realizado com sucesso');
        return redirect("/pedido");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Order::with('product','address')->find($id);

        return view('order.showOrder',compact('pedido'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->updateTrait($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ;
    }


    public  function newOrder($idProduto){

        $produto = Product::find($idProduto);

        if($produto == null ){
            Session::flash('msgErro', 'Produto indisponivel');
            return redirect("/");
        }


        $order = Order::create([
            'quantity_products' => 0,
            'forwarding_agent' => 'Wandre Alkimin',
            'status' => 'PENDENTE',
            'unitary_value' => $produto->unitary_value
        ]);

        $order->product()->attach($produto->id);

        $produto->total_value  = $produto->total_value + $produto->unitary_value;

        return view('order.cart', compact('produto','order'));
    }


    public function qtdProduct(Request $request){

        $dados = $request->all();

        $produto = Product::find($dados['idProduct']);
        $order = Order::find($dados['idOrder']);

        if(isset($dados['status']) && $dados['status'] == 'add'){
            if($produto->stock_quantity <= 0){
                Session::flash('msgErro', 'Não há mais produtos no estoque');
                return view('order.cart', compact('produto','order'));
            }

            $produto->stock_quantity  = $produto->stock_quantity -1;
            $order->quantity_products = $order->quantity_products+1;
        }

        if(isset($dados['status']) && $dados['status'] == 'remove'){

            if($order->quantity_products <= 0){
                Session::flash('msgErro', 'Não é possivel diminuir a quantidade');
                return view('order.cart', compact('produto','order'));
            }

            $produto->stock_quantity  = $produto->stock_quantity +1;
            $order->quantity_products = $order->quantity_products-1;
        }


        $produto->save();

        $order->unitary_value = $order->quantity_products*$produto->unitary_value;
        $order->save();

        return view('order.cart', compact('produto','order'));
    }

    public function checkout($idPedido){
        return view('order.checkout',compact('idPedido'));
    }


}

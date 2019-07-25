<?php

namespace App\Http\Controllers\Compra;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Product::all();

        return view('product.index',compact('results'));
    }

    public function indexAdmin()
    {
        $results = Product::all();

        return view('product.indexAdmin',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add');
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

        Product::create([
            "name" => $dados['name'],
            "description" => $dados['description'],
            "unitary_value" => $dados['unitary_value'],
            "stock_quantity" => $dados['stock_quantity'],
            "available" => 1,
            "photo" => $dados['photo'],
        ]);

        Session::flash('msg', 'Novo produto criado com sucesso');
        return redirect('/admin/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Product::find($id);

        if(empty($dados)){
            Session::flash('msgErro', 'Não existe esse produto');
            return redirect("/admin/produtos");
        }

        return view('product.edit',compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $produto = Product::find($id);
        $produto->name           = $dados['name'];
        $produto->description    = $dados['description'];
        $produto->unitary_value  = $dados['unitary_value'];
        $produto->stock_quantity = $dados['stock_quantity'];
        $produto->photo          = $dados['photo'];
        $produto->save();

        Session::flash('msg', 'Produto Atualizado com sucesso');
        return redirect("/admin/produtos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Product::find($id);
        if(empty($produto)){
            Session::flash('msgErro', 'Não existe esse produto');
            return redirect("/admin/produtos");
        }
        $produto->available = 0;
        $produto->save();

        Session::flash('msg', 'Produto excluido com sucesso');
        return redirect("/admin/produtos");
    }



}

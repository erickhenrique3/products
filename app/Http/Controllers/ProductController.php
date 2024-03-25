<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //listagemmm
        // jeito burro a seguir--> 

        // return response()->json(Product::all());

        //jeito inteligente a seguir -->>>

        return response()->json(Product::paginate($request->input('per_page') ?? 15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //validaçaoo--->>
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:30|unique:products,name',
                'amount' => 'required|numeric'
            ],
            // aqui e para mudar a mensagem no caso da verificação->>> abaixo
            [
                'name.required' => 'O campo nome é obrigatório',
                'name.unique' => 'O nome ja está sendo utilizado'
            ]
        );

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }


        $product = Product::create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description')
        ]);

        return response()->json([
            'message' => 'Product created!',
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // (find) ele espera o id que vai passar pela model no caso o prdoduto
        return response()->json(($product));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // $update = $this->product->where('id', $id)->update($request->except(['_token', '_method']));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produto excluido com sucesso!'], 200);
    }
}

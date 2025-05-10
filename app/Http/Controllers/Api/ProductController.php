<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
     $products = $this->product;
     $productRepository  = new ProductRepository($products);

     if($request->has('coditions')){
         $productRepository->selectCoditions($request->get('coditions'));
       }

       if($request->has('fields')){

         $productRepository->selectFilter($request->get('fields'));
       }

        return new ProductCollection($productRepository->getResult()->paginate(10));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = $this->product->create($data);

        return response()->json($product);
    }

    public function show($id)
    {
        $product = $this->product->findOrFail($id);

        return new ProductResource($product);
    }
    public function update(ProductRequest $request)
    {
        $data = $request->all();

        $product = $this->product->find($data['id']);
        $product->update($data);

        return response()->json($product);
    }
    public function delete($id)
    {
        $product = $this->product->find($id);

        $product->delete();

        return Response()->json(['data'=>['msg'=>'Produto removido com sucesso!']]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        try {
            $product = new Product();

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->status = $request->status;

            if($product->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product saved successfully',
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error save',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->status = $request->status;

            if($product->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product updated successfully',
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error save',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if($product->delete()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product deleted successfully',
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error save',
                'message' => $e->getMessage(),
            ]);
        }
    }
}

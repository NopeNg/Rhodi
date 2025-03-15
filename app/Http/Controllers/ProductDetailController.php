<?php
namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function create()
    {
        return view('product_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'product_code' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'brand' => 'nullable',
            'stock_quantity' => 'required|integer',
            'size' => 'nullable',
            'color' => 'nullable',
            'cost' => 'required|numeric',
            'profit_margin' => 'nullable|numeric',
            'discount_rate' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'status' => 'required',
        ]);

        ProductDetail::create($request->all());
        return redirect()->route('product-details.index')->with('success', 'Product detail created successfully.');
    }

    public function edit($id)
    {
        $productDetail = ProductDetail::findOrFail($id);
        return view('product_details.edit', compact('productDetail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'product_code' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'brand' => 'nullable',
            'stock_quantity' => 'required|integer',
            'size' => 'nullable',
            'color' => 'nullable',
            'cost' => 'required|numeric',
            'profit_margin' => 'nullable|numeric',
            'discount_rate' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'status' => 'required',
        ]);

        $productDetail = ProductDetail::findOrFail($id);
        $productDetail->update($request->all());
        return redirect()->route('product-details.index')->with('success', 'Product detail updated successfully.');
    }
}
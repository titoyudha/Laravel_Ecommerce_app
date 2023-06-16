<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    //
    public function loadAttributes()
    {
        $attributes = AttributeValue::all();

        return response()->json($attributes);
    }

    public function loadValues(Request $request)
    {
        $attributes = AttributeValue::findOrFail($request->id);

        return response()->json($attributes->values);
    }

    public function addAttributes(Request $request)
    {
        $productAttribute = ProductAttribute::create($request->data);

        if($productAttribute){
            return response()->json(['message' => 'Product attribute added successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting product attribute.']);
        }
    }

    public function deleteAttributes(Request $request)
    {
        $productAttribute = ProductAttribute::findOrFail($request->id);
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute deleted successfully.']);

    }
}

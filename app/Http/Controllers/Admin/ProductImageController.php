<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;
use App\Models\ProductImage;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    //
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
     $this->productRepository = $productRepository;
    }

    public function upload(Request $request)
    {
        $products = $this->productRepository->findProductById($request->product_id);

        if($request->has('image')){
            $image = $this->uploadOne($request->image, 'products');
            $productImage = new ProductImage([
                'full'  => $image,
            ]);
            $products->images()->save($productImage);
        }
        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if($image->full != ''){
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}

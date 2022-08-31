<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public $brands;

    public function __construct()
    {
        $this->brands = ShopBrand::paginate(24);
    }

    public function index()
    {
        dd($this->brands);
        return view(
            'admin.shop.brands.index',
            [
                'title' => 'admin.shop.brand.manage',
                'brands' => $this->brands,
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }

    public function restore($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

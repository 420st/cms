<?php

namespace Fourtwenty\Cms;

use Redirect,
    View,
    Session,
    Validator,
    Input;

class ProductCategoryController extends BaseController
{

    protected $sidebar = 'cms::layouts.sidebars.shop';
    protected $perPage = 8;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page = Input::get('page', 1);

        $category = new ProductCategory();
        $paginatedCategories = $category->getByPage($page, $this->perPage);

        $categories = \Paginator::make($paginatedCategories->items, $paginatedCategories->totalItems, $paginatedCategories->limit);

        $this->layout->content = View::make('cms::product-category.index', array('categories' => $categories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make('cms::product-category.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['path'] . '.product.category.create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $category = new ProductCategory();
            $category->name = Input::get('name');
            $category->save();

            Session::flash('success', 'Successfully created product category!');

            return Redirect::route($this->config['path'] . '.product.category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product_category_id
     * @return Response
     */
    public function edit($product_category_id)
    {
        $product_category = ProductCategory::find($product_category_id);

        $this->layout->content = View::make('cms::product-category.edit', ['product_category' => $product_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $product_category_id
     * @return Response
     */
    public function update($product_category_id)
    {
        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['path'] . '.product.category.edit', $product_category_id)
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $product_category = ProductCategory::find($product_category_id);
            $product_category->name = Input::get('name');
            $product_category->save();

            Session::flash('success', 'Successfully updated product category!');

            return Redirect::route($this->config['path'] . '.product.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_category_id
     * @return Response
     */
    public function destroy($product_category_id)
    {
        ProductCategory::find($product_category_id)->delete();

        Session::flash('success', 'Successfully deleted the product category!');

        return Redirect::route($this->config['path'] . '.product.category.index');
    }

}

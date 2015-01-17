<?php

class ProductController extends BaseController
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

        $product = new Product();
        $paginatedProducts = $product->getByPage($page, $this->perPage);

        $products = Paginator::make($paginatedProducts->items, $paginatedProducts->totalItems, $paginatedProducts->limit);

        $this->layout->content = View::make('cms::product.index', array('products' => $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = [];
        foreach (ProductCategory::get() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $merchants = [];
        foreach (ProductMerchant::get() as $mer) {
            $merchants[$mer->id] = $mer->name;
        }

        $this->layout->content = View::make('cms::product.create', ['categories' => $categories, 'merchants' => $merchants]);
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
            'product_category_id' => 'required|integer',
            'selling_price' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['cms_path'] . '.product.create')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $product = new Product();
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->product_category_id = Input::get('product_category_id');
            $product->product_merchant_id = Input::get('product_merchant_id', 0);
            $product->marked_price = Input::get('marked_price');
            $product->selling_price = Input::get('selling_price');
            $product->save();

            // upload attachments
            $attachments = new AttachmentController;
            $errors = $attachments->upload($product);

            if ($errors) {
                Session::flash('errors', $errors);
            }

            Session::flash('success', 'Successfully created product!');

            return Redirect::route($this->config['cms_path'] . '.product.index');
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
     * @param  int  $product_id
     * @return Response
     */
    public function edit($product_id)
    {
        $product = Product::find($product_id);

        $categories = [];
        foreach (ProductCategory::get() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $merchants = [];
        foreach (ProductMerchant::get() as $mer) {
            $merchants[$mer->id] = $mer->name;
        }

        $this->layout->content = View::make('cms::product.edit', ['product' => $product, 'categories' => $categories, 'merchants' => $merchants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $product_id
     * @return Response
     */
    public function update($product_id)
    {

        $rules = array(
            'name' => 'required',
            'product_category_id' => 'required|integer',
            'selling_price' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['cms_path'] . '.product.edit', $product_id)
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $product = Product::find($product_id);
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->product_category_id = Input::get('product_category_id');
            $product->product_merchant_id = Input::get('product_merchant_id', 0);
            $product->marked_price = Input::get('marked_price');
            $product->selling_price = Input::get('selling_price');
            $product->save();

            // upload attachments
            $attachments = new AttachmentController;
            $errors = $attachments->upload($product);

            if ($errors) {
                Session::flash('errors', $errors);
            }

            Session::flash('success', 'Successfully updated product!');

            return Redirect::route($this->config['cms_path'] . '.product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @return Response
     */
    public function destroy($product_id)
    {
        Product::find($product_id)->delete();

        Session::flash('success', 'Successfully deleted the product!');

        return Redirect::route($this->config['cms_path'] . '.product.index');
    }

}

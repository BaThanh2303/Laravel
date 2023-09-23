<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("pages.home");
    }
    public function aboutUs(){
        return view("pages.aboutus");
    }
    public function shop(){
//        $products = Product::where("qty",">",30)
//            ->where("price",">",500)
//            //->where("name","like","%Olson%")
//            ->orderBy("created_at","desc")
//            ->limit(12)
//            ->get();
        $products = Product::orderBy("created_at","desc")->paginate(12);
        return view("pages.shop",compact("products"));
    }
    public function blog(){
        return view("pages.blog");
    }
    public function contact(){
        return view("pages.contact");
    }
    public function shop_detail(Product $product){
        $relateds = Product::where("category_id",$product->category_id)
            ->where("id","!=",$product->id)
            ->where("qty",">",0)
            ->orderBy("created_at","desc")
            ->limit(4)
            ->get();
        return view("pages.shop_detail",compact("product","relateds"));
    }
    public function checkout(){
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            $subtotal += $item->price * $item->buy_qty;
            if($item->buy_qty > $item->qty)
                $can_checkout = false;
        }
        $total = $subtotal*1.1; // vat: 10%
        if (count($cart)==0 || !$can_checkout){
            return  redirect()->to("cart");
        }
        return view("pages.checkout",compact("cart","subtotal","total","can_checkout"));
    }
    public function blog_detail(){
        return view("pages.blog_detail");
    }
    public function shopping_cart(Product $product){
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            $subtotal += $item->price * $item->buy_qty;
            if($item->buy_qty > $item->qty)
                $can_checkout = false;
        }
        $total = $subtotal*1.1; // vat: 10%
        return view("pages.shopping_cart",compact("cart","subtotal","total","can_checkout","product"));
    }
    public function category(Category $category){
        //dựa vào id tìm category
        //nếu không tồn tại- ->404
//        $category = Category::find($id);
//        if($category == null){
//            return abort(404);
//        }
//        $category = Category::findOrFail($id);
        $products = Product::where("category_id",$category->id)
            ->orderBy("created_at","desc")
            ->paginate(12);
        return view("pages.shop",compact("products"));
    }
    public function addToCart(Product $product, Request $request){
        $buy_qty = $request->get("buy_qty");
        $cart = session()->has("cart")?session("cart"):[];
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty = $item->buy_qty + $buy_qty;
                session(["cart"=>$cart]);
                return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
            }
        }
        $product->buy_qty = $buy_qty;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
    }
    public function RemoveCart(Product $product){
        $cart = session()->has("cart")?session("cart"):[];
        foreach ($cart as $item => $carts){
            if($carts->id == $product->id){
                unset($cart[$item]);
                session(["cart"=>$cart]);
                return redirect()->back()->with("remove","đã xóa sản phẩm");
            }
        }
        return redirect()->back();
    }
    public function placeOrder(Request $request){
        $request->validate([
           "full_name"=>"required|min:6",
           "address"=>"required",
           "tel"=>"required|min:9|max:11",
           "email"=>"required",
            "shipping_method"=>"required",
            "payment_method"=>"required",

        ],[
            "required"=>"Vui lòng nhập thông tin"
        ]);
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        foreach ($cart as $item){
            $subtotal += $item->price * $item->buy_qty;
        }
        $total = $subtotal*1.1; // vat: 10%
        Order::create([
            "grand_total"=>$total,
            "full_name"=>$request->get("full_name"),
            "tel"=>$request->get("tel"),
            "address"=>$request->get("address"),
            "shipping_method"=>$request->get("shipping_method"),
            "payment_method"=>$request->get("payment_medthod"),

        ]);
    }

}

<?php

namespace App\Http\Controllers;
use DateTime;
use App\User;
use DateTimeZone;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\CartCondition;
use Illuminate\Notifications\Notifiable;
use App\Notifications\email;

class ProductController extends Controller
{
    public function notif()
    {
        $user = new User();
        $user->email = 'raflylesmana111@gmail.com';   // This is the email you want to send to.
        $user->notify(new email());
        # code...
    }

    public function uploadbukti(Request $request)
    {

        // dd('http://127.0.0.1:8000/storage//app/public/file'));
        $uploaded = $request->bukti;
        if ($uploaded === "undefined")
        {
        }
        else
        {
            $file_parts = pathinfo($uploaded);


                $photo = "bukti" . time() . $uploaded->getClientOriginalName();

                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                $uploaded->move(storage_path('/app/public/file') , $photo);
               
                DB::table('penjualans')
                ->where('code', $request->code)
                ->update(['buktipembayaran' => $photo,'status' => 1]);
        }
        $user = new User();
        $user->email = 'raflylesmana111@gmail.com';   // This is the email you want to send to.
        $user->notify(new email());
        // $user = new User();
        // $user->email = 'raflylesmana111@gmail.com';   // This is the email you want to send to.
        // $user->notify(new email());
        // $user = new User();
        // $user->email = 'raflylesmana111@gmail.com';   // This is the email you want to send to.
        // $user->notify(new email());
        // $user = new User();
        // $user->email = 'raflylesmana111@gmail.com';   // This is the email you want to send to.
        // $user->notify(new email());
        return $request->code;
        
    }
    public function pembayaran($code)
    {
        # code...
        $penjualan = DB::table('penjualans')->where("code","=",$code)->get();
        $pembayarans = DB::table('pembayarans')->where("code","=",$code)->get();
        $resi = DB::table('penjualans')->where("code","=",$code)->select('resi')->first();
        // dd($resi);
        foreach ($penjualan as $key) {
            $product = explode(",",$key->product); 
        }
        foreach ($product as $products) {
         $products = DB::table('products')->where([['id', '=',$products]])->get();
         $productss[] = $products[0];
        }
        return view('product/pembayaran',['penjualan' => $penjualan,'pembayarans' => $pembayarans,'resi' => $resi,'product' => $productss]);
    }
    public function track()
    {
        # code...
        return view('product/track');
    }

    public function order(request $request)
    {
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        // dd(date("Y-m-d H:i", strtotime('+3 hours',strtotime($date->format('Y-m-d H:i:s')))));
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });
        $i=0;
        $productid;
        foreach ($items as $item) {
            # code...
            $productid[$i] = $items[$i]->id;
            $i++;
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 5; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        DB::table('penjualans')->insert([[
            'nama' => $request->get('nama'),
            'nomor' => $request->get('nomor'),
            'email' => $request->get('email'),
            'alamat' => $request->get('alamat'),
            'total' => $request->get('total'),
            'status' => "0",
            'code' => $request->get('nomor').$randomString,
            'product' => implode(",",$productid),
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i", strtotime('+3 hours',strtotime($date->format('Y-m-d H:i:s')))),
            ]]);

        DB::table('pembayarans')->insert([[
            'code' => $request->get('nomor').$randomString,
            'status' => "belum mengirim bukti bayar",
            'deskripsi' => "dimohon segera melakukan transfer",
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i", strtotime('+3 hours',strtotime($date->format('Y-m-d H:i:s')))),

            ]]);

        foreach ($productid as $productids) {
            DB::table('products')
            ->where('id', $productids)
            ->update(['stok' => 0]);
        \Cart::session($userId)->remove($productids);
        }

            
return $request->get('nomor').$randomString;
    }

    public function checkout()
    {$userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });
        $i=0;
        if ($items) {
            foreach ($items as $key) {
                $items1[] = $items[$i]['price'];
                $i++;
                }
                $ongkir = 25000;

                    if (count($items1) == 1 || count($items1) == 2) {
                        // dd($ongkir);

                    }else{
                        if (count($items1) % 2 == 0) {
                            for ($i=0; $i < count($items1); $i += 2) { 
                                
                            }
                             
                            $sisa = $i / 2 - 1;
                            $ongkir = 15000 * $sisa + $ongkir;
                            // dd($ongkir);
                        }else{
                            for ($i=0; $i < count($items1); $i += 2) { 
                                
                            }
                             
                            $sisa = $i / 2 - 1;
                            $ongkir = 15000 * $sisa + $ongkir;
                            // dd($ongkir);
                        }
                    }

                $subtotal = array_sum($items1);
                $total = $subtotal + $ongkir;
                $data[0] = array(
                    'subtotal' => $subtotal,
                    'ongkir' => $ongkir,
                    'total' => $total,
                );
        }else {
            return view('product/checkout', ['data' => $data], 404);   
        }
        
        

        // dd($data[]);
    return view('product/checkout', ['item' => $items,'data' => $data]);    

    }

    public function delete(request $request)
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->remove($request->id);

        return response(array(
            'success' => true,
            'data' => $request->id,
            'message' => "cart item {$request->id} removed."
        ),200,[]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listproduct()
    {
        # code...
        return view('product/list');
    }
    public function Detailproduct()
    {
         # code...
        $userId = 1; // get this from session or wherever it came from

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

    



        // dd($data);
        return view('product/detail', ['item' => $items]);
        # code...
    }
    
    public function Cartproduct()
    {
        # code...
        $userId = 1; // get this from session or wherever it came from

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });
            $i=0;
            if ($items) {
                foreach ($items as $key) {
                    $items1[] = $items[$i]['price'];
                    $i++;
                    }
                    $ongkir = 25000;

                    if (count($items1) == 1 || count($items1) == 2) {
                        // dd($ongkir);

                    }else{
                        if (count($items1) % 2 == 0) {
                            for ($i=0; $i < count($items1); $i += 2) { 
                                
                            }
                             
                            $sisa = $i / 2 - 1;
                            $ongkir = 15000 * $sisa + $ongkir;
                            // dd($ongkir);
                        }else{
                            for ($i=0; $i < count($items1); $i += 2) { 
                                
                            }
                             
                            $sisa = $i / 2 - 1;
                            $ongkir = 15000 * $sisa + $ongkir;
                            // dd($ongkir);
                        }
                    }

                    $subtotal = array_sum($items1);
                    $total = $subtotal + $ongkir;
                    $data[0] = array(
                        'subtotal' => $subtotal,
                        'ongkir' => $ongkir,
                        'total' => $total,
                    );
            }else {
                $data[0] = 1;
            }
            
            

            // dd($data[]);
        return view('product/cart', ['item' => $items,'data' => $data]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Modules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $data = [
            'user'=>$user
        ];
        return view('modules.test.index', $data);
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $v1a=null;
        $v1b=null;
        $v1c=null;
        $v1d=null;
        $v1e=null;
        if ($id==1){
            $v1a = DB::select("
            SELECT a.id, a.customer_id, c.name, b.product_name, b.quantity, b.unit_price, 
            b.quantity * b.unit_price AS Total
            FROM orders a, order_items b, customers c
            WHERE a.id = b.order_id AND a.customer_id = c.id
            ORDER BY Total DESC");

            $v1b = DB::select("select d.* from ( 
            SELECT b.order_id,a.customer_id,c.name,count(b.product_name) as byk
            FROM `orders` a, `order_items` b, `customers` c 
            where a.id=b.order_id and a.customer_id=c.id 
            group by b.order_id,a.customer_id,c.name ) as d where d.byk>=3");

            $v1c = DB::select("
            select d.customer_id,d.name,d.byk_bulan,d.jml_order, d.jml_order/d.byk_bulan as rata2 from (
            SELECT a.customer_id,c.name,COUNT(a.order_date) as byk_bulan,count(a.id) as jml_order
            FROM `orders` a, `order_items` b, `customers` c
            where a.id=b.order_id and a.customer_id=c.id  
            GROUP BY a.customer_id,c.name) as d");

            $v1d = DB::select("
            SELECT a.id,a.customer_id,c.name,b.product_name,b.quantity,b.unit_price, b.quantity*b.unit_price as Total,FN_TOTAL(),
            ((b.quantity*b.unit_price)/FN_TOTAL())*100 as percent
            FROM `orders` a, `order_items` b, `customers` c
            where a.id=b.order_id and a.customer_id=c.id
            order by total desc LIMIT 0,3;");

            $v1e = DB::select("
            SELECT * FROM (
            SELECT a.id,a.customer_id,c.name,b.product_name,c.registered_date,a.order_date,a.order_date-c.registered_date as hari
            FROM `orders` a, `order_items` b, `customers` c
            where a.id=b.order_id and a.customer_id=c.id ) AS d where d.hari>=90");
            $viewname = 'modules.test.nomor1';
        }else if($id==2){
            $v1a = DB::select("
            CALL GetUserOrderSummary(5)");
$v1b = DB::select("
            CALL GetUserOrderSummary(1)");
            $viewname = 'modules.test.nomor2';
        }else if($id==3){
            $viewname = 'modules.test.nomor3';
        }else if($id==4){
            $varray = $this->nomor4();
            $v1a=$varray['a'];
            $v1b=$varray['b'];
            $viewname = 'modules.test.nomor4';
        }else if($id==5){
            $varray = $this->nomor5();
            
            $v1a=$varray['rumus'];
            $v1b=$varray['hitung'];
            $v1c=$varray['totaljuli'];
            $v1d=$varray['prediksi'];
            
            //$v1a=$varray;

            $viewname = 'modules.test.nomor5';
        }
        
        $result = [
            'user'=>$user,
            'data1'=>$v1a,
            'data2'=>$v1b,
            'data3'=>$v1c,
            'data4'=>$v1d,
            'data5'=>$v1e,
        ];
        return view($viewname, $result);
    }

    public function nbulan(int $bln){
        $bulan=[
            1=>'Januari',
            2=>'Febuari',
            3=>'Maret',
            4=>'April',
            5=>'Mei',
            6=>'Juni',
            7=>'Juli',
            8=>'Agustus',
            9=>'September',
            10=>'Oktober',
            11=>'November',
            12=>'Desember'
        ];
        return $bulan[$bln];
    }
    public function nomor5()
    {
        $sell = [
            "Januari" => 120,
            "Februari" => 130,
            "Maret" => 140,
            "April" => 135,
            "Mei" => 150,
            "Juni" => 160
        ];

         $nbln3 = $sell[$this->nbulan(7-3)];
         $nbln2 = $sell[$this->nbulan(7-2)];
         $nbln1 = $sell[$this->nbulan(7-1)];
        
        $ma_juli= ($nbln3 + $nbln2 + $nbln1) / 3;
        $varray=[
            'rumus'=>"MA = (April + Mei + Juni) / 3",
            'hitung' => "MA = (" . ($nbln3 + $nbln2 + $nbln1) . ") / 3",
            'totaljuli' => "MA = $ma_juli",
            'prediksi' => round($ma_juli) . ' unit'
        ];
        return $varray;

    }
    public function nomor4()
    {
        $input = [12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60];
        $a = [];
        $b = [];
        $c = [];

        foreach ($input as $i) {
            if (($i / 3) % 2 == 0) {
                $a[] = $i; // bilangan genap
            } else {
                $b[] = $i; // bilangan ganjil
            }
        }
        $array=[
            'a'=>$a,
            'b'=>$b
        ];
        return $array;
    }

    public function exec(string $id)
    {
        $user = Auth::user();
        
        

        $data = [
            'user'=>$user,
            'data'=>$variable
        ];
        return view('modules.test.nomor1', $data);
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}

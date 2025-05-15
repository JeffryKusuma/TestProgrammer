@extends('app')

@section('title', 'Soal Test')

@section('content')
    
    <div class="col-md-12">
            <h2>Nomor 1.1 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Tampilkan daftar customer beserta tanggal order terakhir mereka, dan total belanja keseluruhan. Urutkan dari total belanja tertinggi.
                </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    SELECT a.id, a.customer_id, c.name, b.product_name, b.quantity, b.unit_price, 
                        b.quantity * b.unit_price AS Total
                    FROM orders a, order_items b, customers c
                    WHERE a.id = b.order_id AND a.customer_id = c.id
                    ORDER BY Total DESC
                </h4>
            </div>

            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $items)
                        <tr class="align-middle">
                            <td>{{$items->id}}</td>
                            <td>{{$items->customer_id}}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->product_name}}</td>
                            <td>{{$items->quantity}}</td>
                            <td>{{$items->unit_price}}</td>
                            <td>{{$items->Total}}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

    </div>
    
    <div class="col-md-12">
            <h2>Nomor 1.2 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Tampilkan nama customer yang dalam satu order memiliki lebih dari 3 item berbeda, beserta id order-nya. 
                </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    select d.* from ( 
                        SELECT b.order_id,a.customer_id,c.name,count(b.product_name) as byk
                        FROM `orders` a, `order_items` b, `customers` c 
                        where a.id=b.order_id and a.customer_id=c.id 
                        group by b.order_id,a.customer_id,c.name ) as d where d.byk>=3
                </h4>
            </div>

            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $items)
                        <tr class="align-middle">
                            <td>{{$items->order_id}}</td>
                            <td>{{$items->customer_id}}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->byk}}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

    </div>

     <div class="col-md-12">
            <h2>Nomor 1.3 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Buatlah query untuk menghitung rata-rata order per bulan per customer. Hint: Hitung jumlah order per customer, dibagi jumlah bulan sejak pertama order hingga order terakhir mereka.
                </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    select d.customer_id,d.name,d.byk_bulan,d.jml_order, d.jml_order/d.byk_bulan as rata2 from (
                        SELECT a.customer_id,c.name,COUNT(a.order_date) as byk_bulan,count(a.id) as jml_order
                        FROM `orders` a, `order_items` b, `customers` c
                        where a.id=b.order_id and a.customer_id=c.id  
                        GROUP BY a.customer_id,c.name) as d
                </h4>
            </div>
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Total Bulan</th>
                        <th>Total Order</th>
                        <th>Avarage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data3 as $items)
                        <tr class="align-middle">
                            <td>{{$items->customer_id}}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->byk_bulan}}</td>
                            <td>{{$items->jml_order}}</td>
                            <td>{{$items->rata2}}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

    </div>

    <div class="col-md-12">
            <h2>Nomor 1.4 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Tampilkan 3 customer dengan total belanja terbesar, serta hitung persentase kontribusi masing-masing terhadap total penjualan. Hint: Gunakan window function. </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    SELECT a.id,a.customer_id,c.name,b.product_name,b.quantity,b.unit_price,
                     b.quantity*b.unit_price as Total,FN_TOTAL(),((b.quantity*b.unit_price)/FN_TOTAL())*100 as percent 
                    FROM `orders` a, `order_items` b, `customers` cwhere a.id=b.order_id and a.customer_id=c.id order by total desc LIMIT 0,3;
                </h4>
            </div>
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Percent</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data4 as $items)
                        <tr class="align-middle">
                            <td>{{$items->id}}</td>
                            <td>{{$items->customer_id}}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->product_name}}</td>
                            <td>{{$items->quantity}}</td>
                            <td>{{$items->unit_price}}</td>
                            <td>{{$items->Total}}</td>
                            <td>{{$items->percent}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

    </div>

      <div class="col-md-12">
            <h2>Nomor 1.5 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Tampilkan nama customer yang pertama kali melakukan order setelah 90 hari sejak tanggal mereka terdaftar. Hint: Hitung selisih hari antara registered_date dan order_date pertama mereka.
                </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    SELECT * FROM (
                        SELECT a.id,a.customer_id,c.name,b.product_name,c.registered_date,a.order_date,a.order_date-c.registered_date as hari
                        FROM `orders` a, `order_items` b, `customers` c
                        where a.id=b.order_d and a.customer_id=c.id ) AS d where d.hari>=90
                </h4>
            </div>
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Register Customer</th>
                        <th>Order Date</th>
                        <th>Days</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data5 as $items)
                        <tr class="align-middle">
                            <td>{{$items->id}}</td>
                            <td>{{$items->customer_id}}</td>
                            <td>{{$items->name}}</td>
                            <td>{{$items->product_name}}</td>
                            <td>{{$items->registered_date}}</td>
                            <td>{{$items->order_date}}</td>
                            <td>{{$items->hari}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

    </div>
@endsection

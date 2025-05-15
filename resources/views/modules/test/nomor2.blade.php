@extends('app')

@section('title', 'Soal Test')

@section('content')
    
    <div class="col-md-12">
            <h2>Nomor 2.1 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                    Buat sebuah Stored Procedure dengan nama `GetUserOrderSummary` yang menerima 
                    parameter `p_user_id` (integer). 
                    Procedure ini harus melakukan: 
                    1. Menghitung jumlah order `success` dan total `total_amount` untuk user tersebut. 
                    2. Jika user tidak memiliki order `success`, kembalikan informasi 'No success order'.
                </h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    CREATE PROCEDURE GetUserOrderSummary(IN p_user_id INT)
                    BEGIN 
                        DECLARE PTOTAL INT;
                        SELECT COUNT(status) INTO PTOTAL 
                            FROM orders1 
                                    WHERE user_id = p_user_id AND status = "success";
                        IF PTOTAL>0 THEN
                                    SELECT 
                                        IFNULL(total_amount, 0) AS total_amount,
                                        COUNT(status) AS total,
                                        IFNULL(status, "No success order") AS status
                                    FROM orders1 
                                    WHERE user_id = p_user_id AND status = "success"
                            group by total_amount,status;
                        ELSE
                            SELECT 0 AS total_amount,0 as total,"No success order" as status;
                        END IF;
                    END

                    CALL GetUserOrderSummary(5);
                    CALL GetUserOrderSummary(1);
                </h4>
            </div>

            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Status</th>
                        <th>Total Success</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $items)
                        <tr class="align-middle">
                            <td>{{$items->status}}</td>
                            <td>{{$items->total}}</td>
                            <td>{{$items->total_amount}}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Status</th>
                        <th>Total Success</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $items)
                        <tr class="align-middle">
                            <td>{{$items->status}}</td>
                            <td>{{$items->total}}</td>
                            <td>{{$items->total_amount}}</td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
@endsection

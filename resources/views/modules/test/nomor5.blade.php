@extends('app')

@section('title', 'Soal Test')

@section('content')
    
    <div class="col-md-12">
            <h2>Nomor 5 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                   Permintaan: 
                   1. Buat algoritma dalam PHP untuk menghitung prediksi penjualan bulan Juli 
                   menggunakan rata-rata 3 bulan terakhir. 
                   2. Tampilkan proses perhitungan. 
                   3. Pastikan hasil ditampilkan dalam format: 
                    Prediksi penjualan bulan Juli: xxx unit 
                    Rumus Moving Average (MA): 
                    MA = (Penjualan bulan (n) + Penjualan bulan (n-1) + Penjualan bulan (n-2)) / 3</h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
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
       
                </h4>
            </div>

         
 
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Rumus</th>
                        <th>Hasil</th>
                        <th>Juli</th>
                        <th>Prediksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <tr class="align-middle">
                            <td>{{$data1}}</td>
                            <td>{{$data2}}</td>
                            <td>{{$data3}}</td>
                            <td>{{$data4}}</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
       
    </div>
    
@endsection

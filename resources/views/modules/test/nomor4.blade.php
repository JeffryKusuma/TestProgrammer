@extends('app')

@section('title', 'Soal Test')

@section('content')
    
    <div class="col-md-12">
            <h2>Nomor 4 </H2>
            <div class="input-group mb-3">
                <h4 class="card-title">
                   Diberikan sebuah daftar bilangan sebagai berikut: 
                   [12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60] 
                   Terdapat aturan untuk memisahkan bilangan menjadi dua kelompok, yaitu: 
                   1. Kelompok A: Bilangan yang jika dibagi 3 hasilnya genap. 
                   2. Kelompok B: Bilangan yang jika dibagi 3 hasilnya ganjil. 
                   Tugas Anda: 
                   1. Buatlah algoritma sederhana (pseudocode atau dalam PHP) untuk memisahkan 
                   bilangan di atas menjadi Kelompok A dan Kelompok B sesuai aturan. 
                   2. Tampilkan hasil kelompok tersebut. 
                   3. Berikan penjelasan logika sederhana Anda.</h4>
            </div>
            <div class="input-group mb-3">
                <h3>Jawaban</H2>
                <h4 class="card-title">
                    
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
       
                </h4>
            </div>

         
 
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Bilangan</th>
                        <th>Angka</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $items)
                        <tr class="align-middle">
                            <td>Genap</td>
                            <td>{{$items}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
             <div class="input-group mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Bilangan</th>
                        <th>Angka</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $items)
                        <tr class="align-middle">
                            <td>Ganjil</td>
                            <td>{{$items}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
@endsection

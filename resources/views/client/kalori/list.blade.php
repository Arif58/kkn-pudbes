{{-- <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head> --}}

{{-- <body> --}}
@extends('client.layout.template')
@section('content')
    <header class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="w-full md:h-[200px] h-[100px] flex justify-center items-center bg-food bg-cover bg-center">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Kalkulator Kalori Makanan
            </h1>
        </div>
    </header>
    <div class="bg-putih min-h-screen text-hijau font-poppins">
        <div class="md:my-10 md:mx-48 m-8 text-sm md:text-lg">
            <p>Selamat datang di website Kalkulator Kalori Makanan!</p>
            <p class="text-justify py-5">
                Laman website ini dapat membantu Anda untuk menghitung total kalori pada makanan yang Anda konsumsi.
                Anda hanya perlu mencari kata kunci makanan yang Anda inginkan, kemudian klik tombol tambah.
                Selanjutnya, kami akan menghitung kalori berdasarkan informasi nutrisi yang tersedia.
                Jika Anda ingin menghitung AKG, silahkan klik
                <a href="/akg" class="underline text-oren">
                    tautan ini.
                </a>
            </p>

            <div class="relative w-full">
                <input type="text" id="search-input"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-5 p-2.5"
                    placeholder="Cari makanan..." required>
            </div>

            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Pencarian Makanan
            </h2>

            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table id="data-table" class="w-full text-sm text-left text-hijau">
                    <thead class="text-xs uppercase bg-hijau text-putih">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Makanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kalori (kal)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat (gram)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @csrf --}}
                        @foreach ($food as $data)
                            <tr class="bg-white border-b">
                                <td class="px-3 py-4 text-right">
                                    <button class="add-food-btn text-green-600">Tambah</button>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $data->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->calorie }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->weight }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="no-data-message" class="text-hijau bg-white p-4 text-center font-semibold" style="display: none;">
                </div>
            </div>
            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Pilihan Makanan
            </h2>
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table id="selected-foods" class="w-full text-sm text-left text-hijau">
                    <thead class="text-xs uppercase bg-hijau text-putih">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Makanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kalori (kal)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tabel pilihan makanan akan ditampilkan di sini -->
                    </tbody>
                </table>
            </div>
            <div class="text-right font-bold mt-3" id="total-calorie-display">
                Total Kalori: <span id="total-calorie">0</span> kal
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener untuk tombol "Tambah" di tabel seluruh data kalori makanan
            $('#data-table').on('click', '.add-food-btn', function() {
                var foodRow = $(this).closest('tr');
                var foodName = foodRow.find('th').text();
                var calorie = parseInt(foodRow.find('td:eq(1)').text());
                var row = `
                    <tr class="bg-white border-b">
                        <td class="px-3 py-4 text-right">
                            <button class="remove-food-btn text-red-600">Hapus</button>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            ${foodName}
                        </th>
                        <td class="px-6 py-4">
                            ${calorie}
                        </td>
                    </tr>
                `;
                $('#selected-foods tbody').append(row);
                calculateTotalCalorie(); // Recalculate total calorie after adding food
            });

            // Event listener untuk tombol "Hapus" di tabel pilihan makanan
            $('#selected-foods').on('click', '.remove-food-btn', function() {
                $(this).closest('tr').remove();
                calculateTotalCalorie(); // Recalculate total calorie after removing food
            });

            // Attach event listener to the search input
            $('#search-input').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                var $tableRows = $('#data-table tbody tr');
                var $noDataMessage = $('#no-data-message');

                // Show or hide "silahkan cari makanan" message
                // if (searchText === '') {
                //     $tableRows.hide();
                //     $noDataMessage.text('Silahkan cari makanan').show();
                //     return;
                // }

                // Loop through each table row
                var dataFound = false;
                $tableRows.each(function() {
                    var rowData = $(this).text().toLowerCase();

                    // Show or hide the row based on the search text
                    if (rowData.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                        dataFound = true;
                    }
                });

                // Show "data tidak ditemukan" message
                if (!dataFound) {
                    $noDataMessage.text('Data tidak ditemukan').show();
                } else {
                    $noDataMessage.hide();
                }
            });

            // Function to calculate total calorie
            function calculateTotalCalorie() {
                var totalCalorie = 0;

                // Loop through each row in the selected-foods table
                $('#selected-foods tbody tr').each(function() {
                    var calorie = parseInt($(this).find('td:eq(1)').text());
                    totalCalorie += calorie;
                });

                // Update the total calorie display
                $('#total-calorie').text(totalCalorie);
            }
        });
    </script>
@endsection
{{-- </body>
</html> --}}
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="bg-putih min-h-screen text-hijau font-poppins">
        <div class="w-full md:h-[200px] h-[100px] flex justify-center items-center bg-food2 md:bg-food1">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Kalkulator Kalori Makanan
            </h1>
        </div>
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

            <label for="simple-search" class="sr-only">Cari</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                </div>
                <input type="text" id="search-input"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5"
                    placeholder="Cari makanan..." required>
            </div>


            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Pencarian Makanan
            </h2>

            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <form id="calorie-calculator-form">
                    <table id="data-table" class="w-full text-sm text-left text-hijau">
                        <thead class="text-xs uppercase bg-hijau text-putih">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kuantitas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Berat (gram)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kalori (kal)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @csrf --}}
                            @foreach ($food as $data)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $data->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->weight }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->calorie }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        {{-- <a href="#" class="font-medium text-oren hover:underline">Tambah</a> --}}
                                        {{-- <button onclick="addFood()"
                                        class="font-medium text-oren hover:underline">Tambah</button> --}}
                                        <input type="checkbox" class="food-checkbox" value="{{ $data->calorie }}"
                                            data-id="{{ $data->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-4 text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">Hitung Total Kalori</button>
                    </div>
                </form>
            </div>
            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Hasil Kalkulasi
            </h2>

            {{-- <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-left text-hijau">
                    <thead class="text-xs uppercase bg-hijau text-putih">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Makanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kuantitas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat (gram)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kalori (kal)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                Dada Ayam
                            </th>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                100
                            </td>
                            <td class="px-6 py-4">
                                144
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-oren hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <tfoot class="font-semibold bg-kuning border-b text-xs uppercase">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            TOTAL
                        </th>
                        <td class="px-6 py-4">
                            2
                        </td>
                        <td class="px-6 py-4">
                            175
                        </td>
                        <td class="px-6 py-4">
                            222
                        </td>
                        <td class="px-6 py-4 text-right">

                        </td>
                    </tfoot>
                    </tbody>
                </table>
            </div> --}}
            <div id="calorie-result-container"></div>
        </div>
        <footer class="text-sm text-center">© KKN PPM UGM 2023 - PUDING BESAR PERIODE II</footer>
    </div>
    <script>
        // Assuming you have jQuery included in your project

        // Assuming you have jQuery included in your project

        $(document).ready(function() {
            // Submit event handler for the form
            $('#calorie-calculator-form').submit(function(event) {
                event.preventDefault();

                // Get selected checkboxes and their values
                var selectedFoods = [];
                $('.food-checkbox:checked').each(function() {
                    selectedFoods.push(parseInt($(this).val()));
                });

                // Calculate total calories
                var totalCalories = selectedFoods.reduce(function(acc, curr) {
                    return acc + curr;
                }, 0);

                // Display the result
                $('#calorie-result-container').text('Total Calories: ' + totalCalories);
            });

            // Attach event listener to the search input
            $('#search-input').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();

                // Loop through each table row
                $('#data-table tbody tr').each(function() {
                    var rowData = $(this).text().toLowerCase();

                    // Show or hide the row based on the search text
                    if (rowData.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
</body>

</html>

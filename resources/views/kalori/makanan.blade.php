<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-putih min-h-screen text-hijau">
        <div class="w-full md:h-[150px] h-[75px] flex justify-center items-center bg-hijau">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Kalkulator Kalori Makanan
            </h1>
        </div>
        <div class="md:my-10 md:mx-48 m-8 text-sm md:text-lg">
            <p>Selamat datang di website Kalkulator Kalori Makanan!</p>
            <p class="text-justify py-5">
                Laman website ini dapat membantu Anda untuk menghitung total kalori pada makanan yang Anda konsumsi. 
                Kalkulator ini dapat membantu Anda untuk menjaga pola makan sehat, mengelola berat badan, atau hanya ingin mengetahui informasi nutrisi pada makanan.
                Anda hanya perlu mencari kata kunci makanan yang Anda inginkan, kemudian klik tombol tambah. Selanjutnya, kami akan menghitung
                kalori berdasarkan informasi nutrisi yang tersedia
            </p>
                        
            <form class="flex items-center">   
                <label for="simple-search" class="sr-only">Cari</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        
                    </div>
                    <input type="text" id="simple-search" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5" placeholder="Cari makanan..." required>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-oren rounded-lg border border-oren">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Cari</span>
                </button>
            </form>

            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Pencarian Makanan
            </h2>
               
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                <a href="#" class="font-medium text-oren hover:underline">Tambah</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                Tempe
                            </th>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                50
                            </td>
                            <td class="px-6 py-4">
                                60
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-oren hover:underline">Tambah</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                Tahu
                            </th>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                75
                            </td>
                            <td class="px-6 py-4">
                                78
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-oren hover:underline">Tambah</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="md:text-2xl text-lg font-bold text-oren py-3">
                Hasil Kalkulasi
            </h2>
                        
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                Tahu
                            </th>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                75
                            </td>
                            <td class="px-6 py-4">
                                78
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-oren hover:underline">Hapus</a>
                            </td>
                        </tr>
                        <tr class="font-bold bg-kuning border-b">
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="text-sm text-center">© KKN PPM UGM 2023 - PUDING BESAR PERIODE II</footer>
    </div>
</body>
</html>

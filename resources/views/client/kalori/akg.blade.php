{{-- <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body> --}}
@extends('client.layout.template')
@section('content')
    <header class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="w-full md:h-[200px] h-[100px] flex justify-center items-center bg-akg bg-cover bg-center">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Hitung Angka Kecukupan Gizi
            </h1>
        </div>
    </header>
    <div class="bg-putih min-h-screen text-hijau font-poppins flex flex-col">

        <div class="md:my-10 md:mx-48 m-8 text-sm md:text-lg">
            <p>Selamat datang di website Kalkulator AKG (Angka Kecukupukan Gizi)!</p>
            <p class="text-justify py-5">
                Laman website ini dapat membantu Anda untuk menghitung Angka Kecukupan Gizi harian.
                AKG dihitung berdasarkan BB (Berat Badan), TB (Tinggi Badan), usia, jenis kelamin, dan tingkat aktivitas
                Anda.
                Jika Anda ingin menghitung AKG, silahkan klik
                <a href="/kalori" class="underline text-oren">
                    tautan ini.
                </a>
            </p>
            {{-- <form action="/akg/calculator" method="POST">
                @csrf
                <div class="flex-row text-sm md:text-lg">
                    <div class="flex justify-center mb-4">
                        <div class="md:basis-1/4"></div>
                        <div class="basis-1/4">
                            <label for="tb">Tinggi Badan (cm):</label>
                        </div>
                        <div class="basis-1/2">
                            <input type="text" id="tb" name="tb" required>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <div class="md:basis-1/4"></div>
                        <div class="basis-1/4">
                            <label for="bb">Berat Badan (kg):</label>
                        </div>
                        <div class="basis-1/2">
                            <input type="text" id="bb" name="bb" required>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <div class="md:basis-1/4"></div>
                        <div class="basis-1/4">
                            <label for="usia">Usia:</label>
                        </div>
                        <div class="basis-1/2">
                            <input type="text" id="usia" name="usia" required>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <div class="md:basis-1/4"></div>
                        <div class="basis-1/4">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                        </div>
                        <div class="basis-1/2">
                            <select id="jenis_kelamin" name="jenis_kelamin" required
                                class="w-[176px] border border-black-400 md:w-auto">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <div class="md:basis-1/4"></div>
                        <div class="basis-1/4">
                            <label for="tingkat_aktivitas">Tingkat Aktivitas:</label>
                        </div>
                        <div class="basis-1/2">
                            <select id="tingkat_aktivitas" name="tingkat_aktivitas" required
                                class="w-[176px] border border-gray-400 md:w-auto">
                                <option value="1.2">Sangat jarang berolahraga</option>
                                <option value="1.375">Jarang olahraga (1-3 kali per minggu)</option>
                                <option value="1.55">Cukup olahraga (3-5 kali per minggu)</option>
                                <option value="1.725">Sering olahraga (6-7 kali per minggu)</option>
                                <option value="1.9">Sangat sering olahraga (2 kali dalam sehari)</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-center items-center mb-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded"
                            type="submit">Hitung</button>
                    </div>
                </div>
            </form> --}}
            <form id="giziCalculator" class="bg-white p-6 shadow-xl rounded-lg">
                <div class="mb-4">
                    <label for="gender" class="block text-gray-700 font-semibold">Jenis Kelamin:</label>
                    <select id="gender" name="gender" class="form-select mt-1 w-full" required>
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="age" class="block text-gray-700 font-semibold">Usia:</label>
                    <input type="number" id="age" name="age" class="form-input mt-1 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="weight" class="block text-gray-700 font-semibold">Berat Badan (kg):</label>
                    <input type="number" id="weight" name="weight" class="form-input mt-1 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="height" class="block text-gray-700 font-semibold">Tinggi Badan (cm):</label>
                    <input type="number" id="height" name="height" class="form-input mt-1 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="activity" class="block text-gray-700 font-semibold">Tingkat Aktivitas:</label>
                    <select id="activity" name="activity" class="form-select mt-1 w-full" required>
                        <option value="1.2">Sangat jarang berolahraga</option>
                        <option value="1.375">Jarang olahraga (1-3 kali per minggu)</option>
                        <option value="1.55">Cukup olahraga (3-5 kali per minggu)</option>
                        <option value="1.725">Sering olahraga (6-7 kali per minggu)</option>
                        <option value="1.9">Sangat sering olahraga (2 kali dalam sehari)</option>
                    </select>
                </div>
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Hitung</button>
                </div>
            </form>
            <div id="result" class="mt-4"></div>
            <div id="result" class="mt-4"></div>
            <div id="result" class="mt-4"></div>
            {{-- <div id="result" class="mt-4"></div>
            <div id="result"></div> --}}
            <div class="flex justify-center items-center">
                @if (isset($akg))
                    <div
                        class="bg-white py-2 md:w-1/2 w-full flex flex-col justify-center items-center rounded-md relative overflow-x-auto shadow-md rounded-lg">
                        <b>Kebutuhan per Hari</b>
                        <p>Angka Kecukupan Gizi (AKG): <b class="text-oren">{{ round($akg) }}</b> kalori</p>
                        <p>Kebutuhan Karbohidrat: <b class="text-oren">{{ round($karbohidratGram) }}</b> gram</p>
                        <p>Kebutuhan Protein: <b class="text-oren">{{ round($proteinGram) }}</b> gram</p>
                        <p>Kebutuhan Lemak: <b class="text-oren">{{ round($lemakGram) }}</b> gram</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#giziCalculator').submit(function(e) {
                e.preventDefault();

                let gender = $('#gender').val();
                let age = parseInt($('#age').val());
                let weight = parseFloat($('#weight').val());
                let height = parseFloat($('#height').val());
                let activity = $('#activity').val();

                // Hitung kecukupan gizi sesuai rumus yang sesuai dengan jenis kelamin dan tingkat aktivitas
                let bmr = (gender === 'male') ? (66 + (13.75 * weight) + (5.003 * height) - (6.755 * age)) :
                    (655 + (9.563 * weight) + (1.850 * height) - (4.676 * age));
                let maintenanceCalories = bmr * activity

                let proteinCalorie = (0.15 * maintenanceCalories) / 4
                let lemakCalorie = (0.20 * maintenanceCalories) / 9
                let karbohidratCalorie = (0.65 * maintenanceCalories) / 4
                $('#result').html(
                    `<h5 class="text-lg font-bold">Kecukupan Gizi Anda: ${maintenanceCalories.toFixed(2)} kalori</h5>
                    <p class="text-lg font-semibold">Kebutuhan Karbohidrat: ${karbohidratCalorie.toFixed(2)} gram</p>
                    <p class="text-lg font-semibold">Kebutuhan Protein: ${proteinCalorie.toFixed(2)} gram</p>
                    <p class="text-lg font-semibold">Kebutuhan Lemak: ${lemakCalorie.toFixed(2)} gram</p>`
                );
            });
        });
    </script>
@endsection
{{-- </body>

</html> --}}

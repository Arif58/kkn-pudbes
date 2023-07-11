<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-putih min-h-screen text-hijau font-poppins">
        <div class="w-full md:h-[200px] h-[100px] flex justify-center items-center bg-akg2 md:bg-akg1">
            <h1 class="md:text-5xl text-2xl font-bold text-putih">
                Hitung Angka Kecukupan Gizi
            </h1>
        </div>
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
        </div>
        <form action="/akg/calculator" method="POST">
            @csrf
            <div class="flex-row">
                <div class="flex justify-center mb-4">
                    <div class="basis-1/4"></div>
                    <div class="basis-1/4">
                        <label for="tb">Tinggi Badan (cm):</label>
                    </div>
                    <div class="basis-1/2">
                        <input type="text" id="tb" name="tb" required>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="basis-1/4"></div>
                    <div class="basis-1/4">
                        <label for="bb">Berat Badan (kg):</label>    
                    </div>
                    <div class="basis-1/2">
                        <input type="text" id="bb" name="bb" required>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="basis-1/4"></div>
                    <div class="basis-1/4">
                        <label for="usia">Usia:</label>
                    </div>
                    <div class="basis-1/2">
                        <input type="text" id="usia" name="usia" required>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="basis-1/4"></div>
                    <div class="basis-1/4">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                    </div>
                    <div class="basis-1/2">
                        <select id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="basis-1/4"></div>
                    <div class="basis-1/4">
                        <label for="tingkat_aktivitas">Tingkat Aktivitas:</label>
                    </div>
                    <div class="basis-1/2">
                        <select id="tingkat_aktivitas" name="tingkat_aktivitas" required>
                            <option value="1.2">Sangat jarang berolahraga</option>
                            <option value="1.375">Jarang olahraga (1-3 kali per minggu)</option>
                            <option value="1.55">Cukup olahraga (3-5 kali per minggu)</option>
                            <option value="1.725">Sering olahraga (6-7 kali per minggu)</option>
                            <option value="1.9">Sangat sering olahraga (sekitar 2 kali dalam sehari)</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center items-center mb-4">
                    <button class="text-white bg-hijau font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2" type="submit">Hitung</button>
                </div>
            </div>
        </form>
        <div class="flex justify-center items-center">
            @if (isset($akg))
                <p>Angka Kecukupan Gizi (AKG): <b>{{ $akg }}</b></p>
            @endif
        </div>
        <footer class="text-sm text-center fixed bottom-0 left-0 w-full flex justify-center items-center">© KKN PPM UGM 2023 - PUDING BESAR PERIODE II</footer>
    </div>
</body>

</html>

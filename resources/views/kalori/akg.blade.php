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
            <label for="tb">Tinggi Badan (cm):</label>
            <input type="text" id="tb" name="tb" required>
            <br>
            <label for="bb">Berat Badan (kg):</label>
            <input type="text" id="bb" name="bb" required>
            <br>
            <label for="usia">Usia:</label>
            <input type="text" id="usia" name="usia" required>
            <br>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            <br>
            <label for="tingkat_aktivitas">Tingkat Aktivitas:</label>
            <select id="tingkat_aktivitas" name="tingkat_aktivitas" required>
                <option value="1.2">Sangat jarang berolahraga</option>
                <option value="1.375">Jarang olahraga (1-3 kali per minggu)</option>
                <option value="1.55">Cukup olahraga (3-5 kali per minggu)</option>
                <option value="1.725">Sering olahraga (6-7 kali per minggu)</option>
                <option value="1.9">Sangat sering olahraga (sekitar 2 kali dalam sehari)</option>
            </select>
            <br>
            <button type="submit">Hitung</button>
        </form>
        <div>
            @if (isset($akg))
                <p>Angka Kecukupan Gizi (AKG): {{ $akg }}</p>
            @endif
        </div>
        <footer class="text-sm text-center">© KKN PPM UGM 2023 - PUDING BESAR PERIODE II</footer>
    </div>
</body>

</html>

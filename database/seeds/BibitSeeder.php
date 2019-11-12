<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BibitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bibits')->insert([
            'bibit' => 'Sengon',
            'kuota' => 1000000,
            'panen' => Carbon::create('2020', '09', '01'),
            'deskripsi' => 'Sengon (Albizia chinensis) adalah sejenis pohon anggota suku Fabaceae. Sengon menghasilkan kayu yang ringan sampai agak ringan, dengan densitas 320–640 kg/m³ pada kadar air 15%. Agak padat, berserat lurus dan agak kasar, namun mudah dikerjakan. Pohon ini menjadi bahan yang sangat baik untuk industri karena kecepatan tumbuh yang baik, dapat hidup di berbagai kondisi tanah, serta bahan baku yang baik untuk industri panel kayu dan kayu lapis.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Sirsat',
            'kuota' => 80000,
            'panen' => Carbon::create('2020', '09', '01'),
            'deskripsi' => 'Nama sirsak sendiri berasal dari bahasa Belanda. Zuurzak. yang berarti "kantung yang asam". Tanaman ini ditanam secara komersial atau sambilan untuk diambil buahnya. Tanaman ini ditanam secara komersial untuk diambil daging buahnya. Tumbuhan ini dapat tumbuh di sembarang tempat, paling baik ditanam di daerah yang cukup berair'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Nangka',
            'kuota' => 70000,
            'panen' => Carbon::create('2020', '09', '01'),
            'deskripsi' => 'Nangka adalah nama sejenis pohon, sekaligus buahnya. Pohon nangka termasuk ke dalam suku Moraceae; nama ilmiahnya adalah Artocarpus heterophyllus. Dalam bahasa Inggris, nangka dikenal sebagai jackfruit. Faktor-faktor yg mempengaruhi pertumbuhan tanaman nangka seperti gulma, genangan air, struktur serta pola tekstur tanah harus dibenahi/dikendalikan agar tanaman nangka mampu berbuah'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Durian',
            'kuota' => 60000,
            'panen' => Carbon::create('2020', '08', '01'),
            'deskripsi' => 'Durian adalah nama tumbuhan tropis yang berasal dari wilayah Asia Tenggara, sekaligus nama buahnya yang bisa dimakan.  Curah hujan yang disukai sekurang-kurangnya 1500 mm, yang tersebar merata sepanjang tahun.Tanaman ini memerlukan tanah yang dalam, ringan dan berdrainase baik. Derajat keasaman optimal adalah 6-6,5. Pemupukan dilakukan dengan membuat parit kecil di sekeliling pohon lalu ditaburi pupuk kimia. Pupuk kandang diberikan pada waktu penanaman bibit.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Petai',
            'kuota' => 60000,
            'panen' => Carbon::create('2020', '09', '01'),
            'deskripsi' => 'Petai, pete (IPA:pətɛ), atau mlanding (Parkia speciosa) merupakan pohon tahunan tropika dari suku polong-polongan (Fabaceae), anak-suku petai-petaian (Mimosoidae). Tanaman petai tumbuh baik di daerah daratan rendah sampai dengan daerah pegunungan dengan ketinggian 1.500 mdpl. Tanaman ini dapat tumbuh baik di daerah yang tanahnya bertekstur halus dengan Ph antara 5,5 sampai 6,5 dengan daerah yang mempunyai tipe iklim basah dan tipe iklim agak basah, dan juga dapat tumbuh baik di tempat yang terbuka karena tanaman petai sangat membutuhkan sinar matahari sepanjang hari.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Jati',
            'kuota' => 30000,
            'panen' => Carbon::create('2020', '10', '01'),
            'deskripsi' => 'Jati adalah sejenis pohon penghasil kayu bermutu tinggi. Pohon besar, berbatang lurus, dapat tumbuh mencapai tinggi 30-40 m. Berdaun besar, yang luruh di musim kemarau. Iklim yang cocok adalah yang memiliki musim kering yang nyata, namun tidak terlalu panjang, dengan curah hujan antara 1200–3000 mm pertahun dan dengan intensitas cahaya yang cukup tinggi sepanjang tahun. Ketinggian tempat yang optimal adalah antara 0 – 700 m dpl; meski jati bisa tumbuh hingga 1300 m dpl.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Cemara udang',
            'kuota' => 30000,
            'panen' => Carbon::create('2020', '10', '01'),
            'deskripsi' => 'Cemara udang (Casuarina equisetifolia) adalah tumbuhan yang memiliki daun dengan ujung lancip seperti jarum dan memiliki batang yang besar serta keras. Tanaman ini mampu tumbuh didaerah dekat pantai'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Kelengkeng',
            'kuota' => 27000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Lengkeng (juga disebut kelengkeng, matakucing, longan,[butuh rujukan] Dimocarpus longan, suku lerak-lerakan atau Sapindaceae) adalah tanaman buah-buahan yang berasal dari daratan Asia Tenggara. Tumbuhan ini dapat berkembang secara baik pada dataran rendah meskipun pada dataran tinggi ia juga dapat berkembang'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Matowa',
            'kuota' => 15000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Matowa adalah tanaman buah khas Papua, tergolong pohon besar dengan tinggi rata-rata 18 meter dengan diameter rata-rata maksimum 100 cm. Umumnya berbuah sekali dalam setahun. Berbunga pada bulan Juli sampai Oktober dan berbuah 3 atau 4 bulan kemudian. Tanaman ini mudah beraptasi dengan kondisi panas maupun dingn. Pohon ini juga tahan terhadap serangga, yang pada umumnya merusak buah.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Gmelina',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Salah satu jenis tanaman kayu yang memiliki potensi pertumbuhan cepat. Gmelina dapat tumbuh baik di daerah dengan musim kemarau yang basah maupun kering, yaitu pada tipe curah hujan A sampai D. Jenis ini tumbuh pada tanah yang agak liat dan kurus dengan ketinggian sampai 1000 mdpl. Permudaan dilakukan secara buatan dengan bibit yang berasal dari penyemaian biji.  Jarak tanam 2x2m atau 3x3m atau 2x3m.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Trembesi',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Ki hujan, pohon hujan, atau trembesi (Albizia saman (Jacq.) Merr. sinonim Samanea saman (Jacq.) Merr.) merupakan sebuah tumbuhan pohon besar, tinggi, dengan tajuk yang sangat melebar. Tumbuhan ini pernah populer sebagai tumbuhan peneduh. Pohon ini memang diperuntukkan bagi ruang publik yang sangat luas seperti taman atau taman, halaman sekolah ataupun pekarangan rumah yang mempunyai area tanah yang sangat luas.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Mahoni',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '10', '01'),
            'deskripsi' => 'Mahoni termasuk pohon besar dengan tinggi pohon mencapai 35–40 m dan diameter mencapai 125 cm. Mahoni dapat tumbuh dengan subur di pasir payau dekat dengan pantai dan menyukai tempat yang cukup sinar matahari langsung. Tanaman ini termasuk jenis tanaman yang mampu bertahan hidup di tanah gersang sekalipun. Syarat lokasi untuk budi daya mahoni diantaranya adalah ketinggian lahan maksimum 1.500 meter dpl, curah hujan 1.524-5.085 mm/tahun, dan suhu udara 11-36 C.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Glodokan Tiang',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Polyalthia longifolia, asli ashoka palsu dari India, adalah pohon yang selalu hijau, biasanya ditanam karena efektivitasnya dalam mengurangi polusi udara'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Asem',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '09', '01'),
            'deskripsi' => 'Asam jawa, asam atau asem adalah sejenis buah yang masam rasanya; biasa digunakan sebagai campuran bumbu dalam banyak masakan Indonesia sebagai perasa atau penambah rasa asam dalam makanan. Pohon asam dapat tumbuh baik hingga ketinggian sekitar 1.000 m (kadang-kadang hingga 1.500 m) dpl, pada tanah berpasir atau tanah liat, khususnya di wilayah yang musim keringnya jelas dan cukup panjang.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Bambu',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Bambu adalah tanaman jenis rumput-rumputan dengan rongga dan ruas di batangnya. Bambu memiliki banyak tipe. Nama lain dari bambu adalah buluh, aur, dan eru. Banyak spesies bambu tropis akan mati pada temperatur mendekati titik beku, sementara beberapa bambu di iklim sedang mampu bertahan hingga temperatur −29 °C (−20 °F).'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Akasia',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Akasia adalah genus dari semak-semak dan pohon yang termasuk dalam subfamili Mimosoideae dari familia Fabaceae'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Ketapang',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Ketapang atau katapang (Terminalia catappa) adalah nama sejenis pohon tepi pantai yang rindang. Lekas tumbuh dan membentuk tajuk indah bertingkat-tingkat, ketapang kerap dijadikan pohon peneduh di taman-taman dan tepi jalan. Pohon ini cocok dengan iklim pesisir dan dataran rendah hingga ketinggian sekitar 400 m dpl.; curah hujan antara 1.000–3.500 mm pertahun, dan bulan kering hingga 6 bulan'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Jambu biji merah',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Jambu batu (Psidium guajava) atau sering juga disebut jambu biji, jambu siki dan jambu klutuk adalah tanaman tropis yang berasal dari Brasil, disebarkan ke Indonesia melalui Thailand. Jambu batu memiliki buah yang berwarna hijau dengan daging buah berwarna putih atau merah dan berasa asam-manis. Buah jambu batu dikenal mengandung banyak vitamin C. Jambu ini dapat tumbuh subur pada daerah tropis dengan ketinggian antara 5-1200 m dpl.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Salam',
            'kuota' => 10000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Salam adalah nama pohon penghasil daun rempah yang digunakan dalam masakan Nusantara. Dalam bahasa Inggris dikenal sebagai Indonesian bay-leaf atau Indonesian laurel, sedangkan nama ilmiahnya adalah Syzygium polyanthum. Pohon ini ditemukan tumbuh liar di hutan-hutan primer dan sekunder, mulai dari tepi pantai hingga ketinggian 1.000 m (di Jawa), 1.200 m (di Sabah) dan 1.300 m dpl (di Thailand); kebanyakan merupakan pohon penyusun tajuk bawah.[4] Di samping itu salam ditanam di kebun-kebun pekarangan dan lahan-lahan wanatani yang lain, terutama untuk diambil daunnya. '
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Alpukat',
            'kuota' => 5000,
            'panen' => Carbon::create('2020', '08', '01'),
            'deskripsi' => 'Avokad (Persea americana) ialah buah yang berasal berasal dari Meksiko dan Amerika Tengah dan kini banyak dibudidayakan di Amerika Selatan dan Amerika Tengah sebagai tanaman perkebunan monokultur dan sebagai tanaman pekarangan di daerah-daerah tropika lainnya di dunia.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Tanjung',
            'kuota' => 5000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Tanjung (Mimusops elengi) adalah sejenis pohon yang berasal dari India, Sri Lanka dan Burma. Pohon tanjung berbunga harum semerbak dan bertajuk rindang, biasa ditanam di taman-taman dan sisi jalan.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Sawo kecik',
            'kuota' => 5000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Sawo kecik (Manilkara kauki) adalah sejenis tanaman penghasil buah pangan anggota suku sawo-sawoan atau Sapotaceae. Tumbuhan berbentuk pohon ini biasanya berfungsi sebagai tanaman hias pekarangan dan pelindung. Pohon ini menyukai dataran rendah hingga sedang.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Tabebuya',
            'kuota' => 5000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Tabebuya (Handroanthus chrysotrichus), Tabebuya kuning atau Pohon terompet emas adalah sejenis tanaman yang berasal dari negara Brasil dan termasuk jenis pohon besar. Seringkali tanaman ini dikira sebagai tanaman Sakura oleh kebanyakan orang, karena bila berbunga bentuknya mirip seperti bunga sakura. Habitat asli Tabebuya di Brasil berada di daerah dengan iklim kering, sehingga tanaman ini memiliki ketahanan hidup yang tinggi dalam cuaca kering. Hal ini sangat sesuai karena tanaman penghijauan umumnya dihadapkan pada kurangnya penyiraman disaat musim kemarau. '
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Juwet',
            'kuota' => 5000,
            'panen' => Carbon::create('2019', '12', '01'),
            'deskripsi' => 'Jamblang, jambu keling atau duwet (Syzygium cumini) adalah sejenis pohon buah dari suku jambu-jambuan (Myrtaceae). Jamblang dapat ditemui di baik dibudidayakan/liar di hutan jati dan dibudidayakan sebagai pohon buah di pekarangan, dari dataran rendah hingga 500 mdpl. Walaupun demikian, ia dapat tumbuh pada ketinggian 1800 mdpl. Curah hujan yang dibutuhkan untuk pertumbuhan yang bagus adalah lebih dari 1000 mm per tahun dengan musim kering yang nyata. Jamblang tumbuh di dataran banjir'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Jambu mete',
            'kuota' => 1000,
            'panen' => Carbon::create('2020', '10', '01'),
            'deskripsi' => 'Jambu monyet atau jambu mede (Anacardium occidentale) adalah sejenis tanaman dari suku Anacardiaceae yang berasal dari Brasil dan memiliki "buah" yang dapat dimakan. '
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Keluwak',
            'kuota' => 1000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Kepayang atau keluak (Pangium edule Reinw. ex Blume; suku Achariaceae, dulu dimasukkan dalam Flacourtiaceae) adalah pohon yang tumbuh liar atau setengah liar penghasil bahan bumbu masak sejumlah masakan Nusantara. '
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'Sukun',
            'kuota' => 1000,
            'panen' => Carbon::create('2020', '11', '01'),
            'deskripsi' => 'Sukun,[1] keluih,[2] kulur,[3] ketimbul[4] atau timbul[5] (Artocarpus altilis) adalah nama sejenis pohon yang berbuah. Buah sukun tidak berbiji dan memiliki bagian yang empuk, yang mirip roti setelah dimasak atau digoreng. Sukun menyukai iklim tropis: suhu panas (20-40˚C), banyak hujan (2000–3000 mm pertahun) dan lembap (lengas nisbi 70-90%), dan lebih cocok di dataran rendah, di bawah 600 m dpl., meski dijumpai sampai sekitar 1500 m dpl. Anakan pohon lebih baik tumbuh di bawah naungan, tetapi kemudian membutuhkan matahari penuh untuk tumbuh besar.'
        ]);

    }
}

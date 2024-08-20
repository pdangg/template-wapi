<!-- resources/views/bc.blade.php -->
@extends('welcome')

@section('title', 'Template Msg')

@section('content')
    <div class="flex flex-col flex-1 p-6">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold">Template Message</h1>
            <div class="flex items-center">
                <div class="mr-6">
                    <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full">1000 credit</span>
                </div>
                <div class="relative">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6.002 6.002 0 00-5-5.917V5a2 2 0 10-4 0v.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m8 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full px-1 text-xs">2</span>
                </div>
                <div class="ml-6">
                    <img src="{{ asset('images/about.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full">
                    <span class="ml-2">Mr. Paijo</span>
                </div>
            </div>
        </header>

        <section class="mt-14">
            <!-- Template Section -->
            <div class="flex flex-wrap justify-center">
                <!-- Template 1 Informasi Promo -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 mb-10 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Informasi Promo</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">
                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Ada promo menarik spesial hanya untuk Anda!</p> <br>
                            <p>Anda dapat menikmati spesial discount 20% untuk periode transaksi bulan ini.</p> <br>
                            <p>Jangan lewatkan kesempatan ini atau promo akan hangus. Click button di bawah ini untuk
                                informasi lebih lanjut</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">USE DISCOUNT NOW!</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 1]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Template 2: Promo Produk (Tas) -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 mb-10 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Promo Produk</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">
                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Ada promo eksklusif untuk Anda!</p> <br>
                            <p>Dapatkan tas favorit Anda dengan potongan harga hingga 25% hanya bulan ini.</p> <br>
                            <p>Segera manfaatkan kesempatan ini sebelum promonya berakhir. Click button di bawah ini untuk
                                informasi lebih lanjut.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">BUY NOW!</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 2]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template 3: Promo Pengguna Baru -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 mb-10 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Promo Pengguna Baru</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">

                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Selamat datang! Kami punya sesuatu yang spesial hanya untuk Anda.</p> <br>
                            <p>Nikmati diskon 30% untuk pembelian pertama Anda sebagai pengguna baru di toko kami.</p> <br>
                            <p>Jangan lewatkan kesempatan ini, klik tombol di bawah untuk memulai belanja sekarang.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">BUY NOW!</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 3]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template 4: Pengenalan Produk Baru (Sepatu) -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Pengenalan Produk Baru</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">
                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Kami sangat senang memperkenalkan produk terbaru kami kepada Anda!</p> <br>
                            <p>Temukan koleksi sepatu terbaru kami dengan desain modern dan kenyamanan yang luar biasa.</p>
                            <br>
                            <p>Jangan lewatkan kesempatan untuk menjadi yang pertama memilikinya. Click button di bawah ini
                                untuk informasi lebih lanjut.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">CHECK NOW!</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 4]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template 5: Informasi Maintenance (Toko) -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Informasi Maintenance</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">
                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Kami ingin memberitahukan bahwa toko kami akan mengalami maintenance.</p> <br>
                            <p>Maintenance akan berlangsung pada tanggal 15 Agustus dari pukul 10:00 hingga 14:00. Mohon
                                maaf atas ketidaknyamanannya.</p> <br>
                            <p>Untuk informasi lebih lanjut, silakan klik tombol di bawah ini.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">CHECK COUNTDOWN</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 5]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template 6: Informasi Produk Best Seller (Ransel Merk Puma) -->
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                    <div class="max-w-xs p-4 bg-white border rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-center mb-4">Informasi Produk Best Seller</h2>
                        <img src="{{ asset('assets/bigsale.png') }}" alt="Big Sale" class="w-full rounded-lg">
                        <div class="p-4 bg-gray-100 rounded-lg my-4">
                            <p>Hallo Jennie,</p>
                            <p>Bagaimana kabar Anda?</p>
                            <p>Kami punya kabar baik untuk Anda!</p> <br>
                            <p>Ransel merk Puma, produk best seller kami, kembali tersedia. Jangan lewatkan kesempatan untuk
                                memilikinya.</p> <br>
                            <p>Click button di bawah ini untuk melakukan pembelian sekarang sebelum kehabisan.</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-4">
                            <button
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                style="pointer-events: none;">BUY NOW!</button>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('bc', ['template' => 6]) }}">
                                    <button
                                        class="w-20 px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75">Use</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- Modal Add-->
        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
                <h2 class="text-2xl font-bold mb-4">Buat Template Message</h2>
                <form>
                    <div class="mb-4">
                        <label for="templateName" class="block text-sm font-medium text-gray-700">Nama Template</label>
                        <input type="text" id="templateName" name="templateName"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="templateMessage" class="block text-sm font-medium text-gray-700">Isi Pesan</label>
                        <textarea id="templateMessage" name="templateMessage" rows="5"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                            required></textarea>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-red-600 text-white py-2 px-4 rounded"
                            onclick="toggleModal()">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function toggleModal() {
                const modal = document.getElementById('modal');
                modal.classList.toggle('hidden');
            }
        </script>

        <!-- Modal Edit-->
        <div id="edit" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
                <h2 class="text-2xl font-bold mb-4">Edit Template Message</h2>
                <form>
                    <div class="mb-4">
                        <label for="templateName" class="block text-sm font-medium text-gray-700">Nama Template</label>
                        <input type="text" id="templateName" name="templateName" placeholder="Promo Produk"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="templateMessage" class="block text-sm font-medium text-gray-700">Isi Pesan</label>
                        <textarea id="templateMessage" name="templateMessage" rows="5"
                            placeholder="Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                            required></textarea>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-red-600 text-white py-2 px-4 rounded"
                            onclick="toggleEdit()">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function toggleEdit() {
                const modal = document.getElementById('edit');
                modal.classList.toggle('hidden');
            }
        </script>

    </div>
    </div>
@endsection

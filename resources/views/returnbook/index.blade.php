
<title>Pengembalian Barang</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengembalian Barang') }}
        </h2>
    </x-slot>


    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info')

            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">

                <div
                    class="mb-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    @if(auth()->user()->role !== 'admin')
                    <x-secondary-button href="{{ route('pengembalian-buku.create') }}">
                        Tambah
                    </x-secondary-button>
                    @endif

                    <form action="{{ route('pengembalian-buku.index') }}" method="GET"
                    class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0 space-y-2 sm:space-y-0 sm:space-x-4">
                    <input type="text" name="search" placeholder="Cari judul barang..."
                        value="{{ request('search') }}"
                        class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2 w-full sm:w-auto">
                    <input type="text" name="name" placeholder="Cari nama peminjam..."
                        value="{{ request('name') }}"
                        class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2 w-full sm:w-auto">
                    <select name="status"
                        class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2 w-full sm:w-auto">
                        <option value="">Semua Status</option>
                        <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam</option>
                        <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                            Dikembalikan</option>
                        <option value="ACC" {{ request('status') == 'ACC' ? 'selected' : '' }}>ACC</option>
                        <option value="PENDING" {{ request('status') == 'PENDING' ? 'selected' : '' }}>
                            PENDING</option>
                    </select>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Cari
                    </button>
                </form>

                </div>

                <div class="mt-4 overflow-x-auto">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nomor Peminjaman
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Peminjam
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Judul Buku
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Keterangan
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($pengembalian as $item)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->peminjaman->no_peminjaman }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->peminjaman->user->nama }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->peminjaman->buku->nama_buku }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->deskripsi }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->status }}</td>

                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 flex space-x-2">
                                            @if(auth()->user()->role !== 'siswa')
                                            <a href="{{ route('pengembalian-buku.edit', $item->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                            <x-confirm-delete-modal>
                                                <x-slot name="trigger">
                                                    <button @click="isOpen = true"
                                                        class="text-red-600 hover:text-red-900">Hapus</button>
                                                </x-slot>

                                                <x-slot name="title">
                                                    Konfirmasi Hapus
                                                </x-slot>

                                                <x-slot name="content">
                                                    Apakah Anda yakin ingin menghapus pengembalian ini?
                                                </x-slot>

                                                <x-slot name="footer">
                                                    <form id="deleteForm-{{ $item->id }}"
                                                        action="{{ route('pengembalian-buku.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-primary-button type="submit"
                                                            class="bg-red-600 hover:bg-red-700">
                                                            Hapus
                                                        </x-primary-button>
                                                        <x-secondary-button @click="isOpen = false">
                                                            Batal
                                                        </x-secondary-button>
                                                    </form>

                                                </x-slot>
                                            </x-confirm-delete-modal>
                                            @endif
                                            <a href="{{ route('pengembalian-buku.show', $item->id) }}"
                                                class="text-gray-600 hover:text-gray-900">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500" colspan="6">
                                            Tidak ada data yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $pengembalian->appends(request()->input())->links() }}
                </div>



            </div>
        </div>
    </div>
</x-app-layout>

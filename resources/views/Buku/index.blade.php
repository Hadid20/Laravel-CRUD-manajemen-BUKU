<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            /* Red */
            color: white;
            margin-bottom: 15px;
        }

        body {
            padding: 0;
            margin: 0;
            font-family: "Montserrat", sans-serif;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            border: 1px solid black;
            width: 100%;
            border-radius: 10px;
        }

        th,
        td {
            border-bottom: 1px solid black;
            text-align: center;
            padding: 5px 10px;
        }

        /* form */

        .col,
        form {
            width: 100%;
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, auto);
            gap: 10px 30px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid black;
        }

        .formBtn {
            display: grid;
            grid-template-columns: repeat(2, auto);
            gap: 10px;
            padding: 10px;
        }

        .formBtn button[type='submit'] {
            background: greenyellow;
            border: 1px solid black;
            color: black;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 500ms ease-in-out;
            height: 40px;
        }

        .formBtn button[type='reset'] {
            background: yellow;
            border: 1px solid black;
            color: black;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 500ms ease-in-out;

        }

        .formBtn button[type='submit']:hover {
            background-color: rgb(138, 206, 37);
            cursor: pointer;
        }

        .formBtn button[type='reset']:hover {
            background-color: rgb(196, 196, 1);
            cursor: pointer;

        }
    </style>
</head>

<body>
    @if (session('success'))
    <div class="alert">
        <p>{{session('success') }}</p>
    </div>
    @endif
    <div class="container">
        <h1>Tambah Data</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('Buku.store') }}" enctype="multipart/form-data" method="POST">
                    @method('POST')
                    @csrf
                    <div>
                        <label for="">Judul Buku</label>
                        <input type="text" name="BookTitle">
                    </div>

                    <div>
                        <label for="">Penulis Buku</label>
                        <input type="text" name="BookAuthor">

                    </div>

                    <div>
                        <label for="">Tahun Terbit Buku</label>
                        <input type="date" name="BookYearAdd">
                    </div>
                    <div>
                        <label for="">Cover Buku</label>
                        <input type="file" name="cover">
                    </div>
                    <div class="formBtn">
                        <button type="submit">Simpan</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h1>ListData</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <table>
                    <thead>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal Terbit</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>contoh Cover</td>
                            <td>contoh judul</td>
                            <td>contoh penulis</td>
                            <td>contoh Tahun</td>
                            <td>contoh Action</td>
                        </tr>
                        @forelse ($dataBuku as $item)
                        <tr>
                            <td><img width="100px" src="{{ asset('storage/covers/'. $item->cover) }}" alt=""></td>
                            <td>{{ $item->BookTitle }}</td>
                            <td>{{ $item->BookAuthor }}</td>
                            <td>{{ $item->BookYearAdd }}</td>
                            <td>
                                <form action="{{ route('Buku.edit', $item->id) }}">
                                    <button type="submit">Edit Data</button>
                                </form>
                                <form action="{{ route('Buku.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus Data</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 10px 0">
                                Data Tidak Tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- <script>
        const form = document.querySelector("form")
        const table = document.querySelector("table tbody")

        form.addEventListener('submit', (e)=>{
            e.preventDefault();
            const judul = form.BookTitle.value.trim();
            const penulis = form.BookAuthor.value.trim();
            const Tahun = form.BookYearAdd.value;

            if(!judul||!penulis||!Tahun){
                return alert ("data belum lengkap")
            }

            const row = document.createElement("tr")
            row.innerHTML = `
                        <tr>
                            <td>${judul}</td>
                            <td>${penulis}</td>
                            <td>${new Date(Tahun).getFullYear()}</td>
                        </tr>
            `
            table.appendChild(row);
            form.reset();
        })
    </script> --}}


</body>

</html>
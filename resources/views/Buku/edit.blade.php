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

        }

        .formBtn button[type='submit'] {
            background: greenyellow;
            border: 1px solid black;
            color: black;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 500ms ease-in-out;
            height: 50px;
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
    <div class="container">
        <h1>Edit data</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('Buku.update', $dataOld->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="">Judul Buku</label>
                        <input type="text" name="BookTitle" value="{{ $dataOld->BookTitle }}">

                    </div>

                    <div>
                        <label for="">Penulis Buku</label>
                        <input type="text" name="BookAuthor" value="{{ $dataOld->BookAuthor }}">
                    </div>

                    <div>
                        <label for="">Tahun Terbit Buku</label>
                        <input type="date" name="BookYearAdd" value="{{ $dataOld->BookYearAdd }}">
                    </div>
                    <div>
                        <label for="">Cover Buku</label>
                        <input type="file" name="cover" value="{{ $dataOld->cover }}">
                    </div>
                    <div class=" formBtn">
                        <button type="submit">Simpan</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






</body>

</html>
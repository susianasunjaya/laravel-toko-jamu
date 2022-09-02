<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('jamus.update', $jamu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                <!-- error message untuk title -->
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk', $jamu->merk) }}" placeholder="Masukkan Merk Jamu">

                                <!-- error message untuk merk -->
                                @error('merk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">VARIETY</label>
                                <select class="form-control @error('variety') is-invalid @enderror" name="variety">{{ old('variety') }}
                                    <option value="Beras Kencur">Beras Kencur</option>
                                    <option value="Kunyit Asam">Kunyit Asam</option>
                                    <option value="Temulawak">Temulawak</option>
                                    <option value="Galian Singset">Galian Singset</option>
                                    <option value="Brotowali">Brotowali</option>
                                    <option value="Others">Others</option>
                                </select>

                                <!-- error message untuk variety -->
                                @error('variety')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">STOCK</label>
                                <input type="number" min="0" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $jamu->stock) }}" placeholder="Stock Jamu">

                                <!-- error message untuk stock -->
                                @error('stock')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PRICE</label>
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $jamu->price) }}" placeholder="Harga Jamu">

                                <!-- error message untuk price -->
                                @error('price')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="submit" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace('content');
    </script>
</body>

</html>
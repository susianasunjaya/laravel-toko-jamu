<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Jamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('jamus.create') }}" class="btn btn-md btn-success mb-3">ADD JAMU</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">MERK</th>
                                    <th scope="col">VARIETY</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">ACTION</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jamus as $jamu)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/jamus/').$jamu->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $jamu->merk }}</td>
                                    <td>{!! $jamu->variety !!}</td>
                                    <td>{!! $jamu->stock !!}</td>
                                    <td>{!! $jamu->price !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jamus.destroy', $jamu->id) }}" method="POST">
                                            <a href="{{ route('jamus.edit', $jamu->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Jamu belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $jamus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // $(document).ready(function(){
        // message with toastr
        // @if(session()->has('success'))

        //     toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        // @elseif(session()->has('error'))

        //     toastr.error('{{ session('error') }}', 'GAGAL!'); 

        // @endif
        // })
    </script>

</body>

</html>
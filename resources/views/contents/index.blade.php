@extends('contents.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Obsahy</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('contents.create') }}"> Vytvořit nový obsah</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Por.č.</th>
        <th>Název</th>
        <th>Soubor</th>
        <th width="280px">Akce</th>
    </tr>
    @foreach ($contents as $content)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $content->name }}</td>
        <td>{{ $content->file}}</td>
        <td>
            <form action="{{ route('contents.destroy',$content->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('contents.show',$content->id) }}">Ukázat</a>

                <a class="btn btn-primary" href="{{ route('contents.edit',$content->id) }}">Editovat</a>

                @csrf
                @method('DELETE')

                <button type="Přidat" class="btn btn-danger">Vymazat</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $contents->links() !!}

@endsection
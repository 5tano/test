@extends('contents.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editace obsahu</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contents.index') }}"> Spět</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Hops!</strong> Je tady problém s Vaším vstupem.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('contents.update',$content->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Název:</strong>
                <input type="text" name="name" value="{{ $content->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Soubor:</strong>
                <textarea class="form-control" style="height:150px" name="file"
                    placeholder="Soubor">{{ $content->file}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="Přidat" class="btn btn-primary">Přidat</button>
        </div>
    </div>

</form>
@endsection
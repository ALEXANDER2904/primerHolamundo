@extends('layouts.app')

@section('titulo')
    CREAR NUEVA PUBICACION
@endsection
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@section('contenido')
    <div class="md:flex md:items-center">

        <div class="md:w-6/12 px-10">
            <form method="POST" action="{{ route('imagenes.store') }}" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-6/12 px-10 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo" class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500 @enderror" value="{{ old('titulo') }}">
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion de la publicacion</label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion" class="border p-3 w-full rounded-lg @error('descripcion')
                        border-red-500 @enderror" value="{{ old('titulo') }}">
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl">
                </div>

            </form>
        </div>
    </div>
@endsection
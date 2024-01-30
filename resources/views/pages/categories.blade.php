@extends('layouts.master')

{{-- @section('cate')
<h2>ajouter une categorie</h2>
<form action="{{route('categories.save')}}" method="post">
    @csrf
    @method('post')

    <label for="name categorie"></label>
    <input type="text" name="nomCategorie" required>
    <input type="submit" value="create categorie">
</form>
    
@endsection --}}

@section('editcat')
<h2>ajouter une categorie</h2>
<form action="{{route('categories.update',['categorie'=>$categorie])}}" method="post">
    @csrf
    @method('put')

    <label for="name categorie"></label>
    <input type="text" name="nomCategorie" value={{$categorie->nomCategorie}} required>
    <input type="submit" value="create categorie">
</form>
    
@endsection
@section('title')
    All Phones
@endsection

@extends('layouts.master')

@section('main')
    <h1 class="display-4 m-3">All Phones</h1>
    <div class="col-18 offset-1">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_phones as $phone)
                    <tr>
                        <td>{{ $phone->name }}</td>
                        <td>{{ $phone->brand }}</td>
                        <td>{{ $phone->price }}</td>
                        <td>
                            <a href="/phones/{{$phone->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="/phones/{{$phone->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
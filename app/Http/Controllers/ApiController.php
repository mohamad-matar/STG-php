<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        // return json_decode(Http::get('https://jsonplaceholder.typicode.com/posts'));
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function store()
    {
        return json_decode(Http::post('https://jsonplaceholder.typicode.com/posts',  [
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1,
        ]));
    }

    public function show($id)
    {
        return json_decode(Http::get(
            'https://jsonplaceholder.typicode.com/posts/' . $id
        ));
    }

    public function update($id)
    {
        return json_decode(Http::put('https://jsonplaceholder.typicode.com/posts/' . $id,  [
            'title' => 'aamal',
            'body' => 'bar',
            'userId' => 1,
        ]));
    }

    public function destroy($id)
    {
        return json_decode(Http::delete(
            'https://jsonplaceholder.typicode.com/posts/' . $id
        ));
    }
}
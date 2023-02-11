<?php
namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface AbstractRepositoryInterface
{

    public function index();
    public function show($id);
    public function store($attributes);
    public function destroy($id);
    public function update($id, $update_array);
}
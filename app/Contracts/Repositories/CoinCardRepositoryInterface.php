<?php
namespace App\Contracts\Repositories;

interface CoinCardRepositoryInterface extends AbstractRepositoryInterface{
    public function update( $id, $coin );
}
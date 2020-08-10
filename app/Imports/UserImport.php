<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {   
        //dd("pare");
       // dd($row);
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'cpf' => $row['cpf'],
            'idade' => $row['idade'], 
            'sexo' => $row['sexo'],
            'gestante' => $row['gestante'],
        ]);
    }
   
}

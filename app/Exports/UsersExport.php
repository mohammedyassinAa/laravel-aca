<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection , withHeadings
{
    public function collection()
    {
        return User::select("name", "email", "username")->get();
    }
    public function headings(): array
    {
        return ["name", "Email", "username"];   
    }
}
<?php

namespace App\Actions\Benefit;

use App\Models\Benefit;
use Illuminate\Support\Facades\File;

class DeleteBenefit
{
    public function handle(Benefit $benefit)
    {
        File::delete(public_path("images/$benefit->file"));
        $benefit->delete();
    }
}

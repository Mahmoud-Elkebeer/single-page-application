<?php

namespace App\Models;

use App\Constants\Countries;
use App\Constants\States;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $appends = ['country', 'state', 'country_code'];

    public function getCountryCodeAttribute(): string
    {
        preg_match('#\((.*?)\)#', $this->phone, $countryCode);

        return $countryCode[1];
    }

    public function getCountryAttribute(): string
    {
        return Countries::getLabel($this->country_code);
    }

    public function getStateAttribute(): string
    {
        $regex = Countries::getRegex($this->country_code);

        return preg_match($regex, $this->phone) === 1 ? States::VALID : States::INVALID;
    }
}

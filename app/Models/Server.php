<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'model','ram', 'hdd', 'location', 'price'
    ];


    /**
     * Get the server's HDD data.
     */
    protected function hdd(): Attribute
    {
        return $this->sliceStringAttributes();
    }

    /**
     * Get the Location data.
     */
    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) =>
                substr($value, 0, strlen($value) - 6) . ' ' .
                substr($value, strlen($value) - 6),
        );
    }

    /**
     * Get the server's Ram data.
     */
    protected function ram(): Attribute
    {
        return $this->sliceStringAttributes();
    }

    /**
     * Add space between the capacity and type data
     */
    private function sliceStringAttributes()
    {
        $pattern = '/(\d+)(GB|TB)([A-Za-z0-9]+)/i';
        $replacement = '$1$2 $3';

        return Attribute::make(
            get: fn (string $value) => preg_replace($pattern, $replacement, $value),
        );
    }

}

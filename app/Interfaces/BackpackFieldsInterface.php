<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

/**
 * Interface BackpackFieldsInterface
 * For laravel backpack we need to define the fields that are available for the create form and the list table.
 * list_fields() and create_fields() are used in the BackpackFieldsTrait
 * the fields() method is used in each helper class to define the list|create fields
 * @package App\Interfaces
 */
interface BackpackFieldsInterface
{
    public static function create_fields(): array;
    public static function list_fields(): array;
    public static function fields(): Collection;
}

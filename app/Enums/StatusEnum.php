<?php
  
namespace App\Enums;
 
enum StatusEnum {
    case true;
    case false;

    /**
     * get enum status
     */
    public function status(): string
    {
        return match($this) 
        {
            statusEnum::true => '1',   
            statusEnum::false => '0',   
        };
    }
}
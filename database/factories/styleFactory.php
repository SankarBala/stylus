<?php

namespace Database\Factories;

use App\Models\style;
use Illuminate\Database\Eloquent\Factories\Factory;

class styleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = style::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'content' => '
            /* ==UserStyle==
            @name        anonymous
            @namespace      USO Archive
            @author         {{ auth()->user() }}
            @description     \'\'
            @version       1.0.0
            @preprocessor     uso
            ==/UserStyle== */
        
            @-moz-document url("localhost")  {  
                /* Styles should start here */
                
                
                /* Styles should end here */
            } 
            ',
            'image' => $this->faker->imageUrl(640, 480),
        ];
    }
}

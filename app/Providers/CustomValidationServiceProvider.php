<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('validnumber', function ($attribute, $value, $parameters, $validator) {
            // Check if the value is numeric and starts with "017"
            return is_numeric($value) && strpos($value, '018') === 0 || strpos($value, '016') || strpos($value, '019') === 0;
        });
      
        Validator::replacer('validnumber', function ($message, $attribute, $rule, $parameters) {
            // Customize the validation error message
            return str_replace(':attribute', $attribute, 'The :attribute must be numeric and start with "018 / 019".');
        });

        // Validator::extend('blnumber', function ($attribute, $value, $parameters, $validator) {
        //     // Check if the value is numeric and starts with "017"
        //     return is_numeric($value) && strpos($value, '019') === 0;
        // });
      
        // Validator::replacer('blnumber', function ($message, $attribute, $rule, $parameters) {
        //     // Customize the validation error message
        //     return str_replace(':attribute', $attribute, 'The :attribute must be numeric and start with "019".');
        // });
 
    }
}

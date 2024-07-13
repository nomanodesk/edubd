<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class MobileNumberValidationProvider extends ServiceProvider
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
        Validator::extend('gpnumber', function ($attribute, $value, $parameters, $validator) {
            // Check if the value is numeric and starts with "017"
            return is_numeric($value) && strpos($value, '017') === 0;
        });
      
        Validator::replacer('gpnumber', function ($message, $attribute, $rule, $parameters) {
            // Customize the validation error message
            return str_replace(':attribute', $attribute, 'The :attribute must be numeric and start with "017".');
        });

        Validator::extend('blnumber', function ($attribute, $value, $parameters, $validator) {
            // Check if the value is numeric and starts with "017"
            return is_numeric($value) && strpos($value, '019') === 0;
        });
      
        Validator::replacer('blnumber', function ($message, $attribute, $rule, $parameters) {
            // Customize the validation error message
            return str_replace(':attribute', $attribute, 'The :attribute must be numeric and start with "019".');
        });
 
    }
}

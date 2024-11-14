<?php
    
    namespace TaskManagementSystem\Core;
    
    class Validate
    {
        public static function str($value): bool
        {
            return is_string($value);
        }
        
        public static function charLength($value, int $min, int $max = 256): bool
        {
            return strlen($value) >= $min && strlen($value) <= $max;
        }
        
        public static function email($value): bool
        {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        
        public static function username($value): bool
        {
            return Validate::str($value) && Validate::charLength($value, 2, 16);
        }
        
        public static function password($value): bool
        {
            return Validate::str($value) && Validate::charLength($value, 8, 32);
        }
    }
<?php

class Hash{
    
    /**
     *
     * @param string $algo
     * @param string $data
     * @param string $salt
     * @return string 
     */
    public static function create($algo,$data){
        $context = hash_init($algo, HASH_HMAC, HASH_KEY);
        hash_update($context, $data);
        return hash_final($context);
    }
}
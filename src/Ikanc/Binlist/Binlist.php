<?php namespace Ikanc\Binlist;

class Binlist {

    public static function get($bin = null) {
        if (!is_numeric($bin)) {
            $_result = new \StdClass();

            $_result->error = 'no bin provided or not numeric';
            return $_result;
        }
        return self::fetch($bin);
    }

    private static function fetch($bin) {
        if(!is_callable('curl_init')){
            return ['error' => 'no bin or not numeric'];
        }
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://www.binlist.net/json/{$bin}");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output = curl_exec($ch);
        curl_close($ch);

        $_result = new \StdClass();
        try {
            $_result = json_decode($output);
        } catch (\Exception $e) {
            $_result->error = 'failed fetching information';
            return $_result;
        }

        // Got result
        if (is_object($_result)) { return $_result; }

        // Could not find bin
        $_result = new \StdClass();
        $_result->error = 'bin not found';
        return $_result;
    }

}
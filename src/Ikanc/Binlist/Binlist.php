<?php namespace Ikanc\Binlist;

class Binlist {

    private $error, $data = null;

    public static function get($bin = null) {
        $_bl = new self();
        if (!is_numeric($bin)) {
            $_bl->setError('no bin provided or not numeric');
            return $_bl;
        }
        return $_bl->fetch($bin);
    }

    private function fetch($bin) {

        if(!is_callable('curl_init')){
            return $this->setError('Please verify that CURL is installed');
        }
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://www.binlist.net/json/{$bin}");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT_MS,700);
        curl_setopt($ch,CURLOPT_TIMEOUT_MS,1000);
        $output = curl_exec($ch);
        curl_close($ch);

        try {
            $this->setData(json_decode($output));
        } catch (\Exception $e) {
            return $this->setError('failed receiving information from binlist');
        }

        if (!$this->getData()) {
            return $this->setError('Could not match the requested Bin');
        }

        return $this;
    }

    private function setError($reason) {
        $this->error = $reason;
        return $this;
    }

    private function setData($jsonObj) {
        if (is_object($jsonObj)) { $this->data = $jsonObj; }
    }

    public function getData() {
        return $this->data;
    }

}
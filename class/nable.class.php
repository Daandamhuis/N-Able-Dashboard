<?php

/* ================================
+ 
+     N-Able Class which provides easy access to N-Central, for more information on how to use this class see backend/php2json.php
+     This class is created by; Michael Dale, mdale@dalegroup.net
+     Edited by; Daan Damhuis, info@daandamhuis.nl
+         - Made the create array function some what more "dynamic"
+ 
=================================== */

class nable {

    private $base_url;
    private $username;
    private $password;
    private $session_id;
    private $ip_address;
    private $version;

    function __construct() {

        //login details		
        $this->ip_address = '';
        $this->username = '';
        $this->password = '';
        $this->base_url = 'https://serverurl' . '/dms/services/ServerEI?wsdl';

        //version 1 = 8.2
        //$this->version 		= 1;


        return true;
    }

    private function create_array($result, $type) {
        $ncentral_array = array();

        if (is_array($result)) {
            foreach ($result as $index => $item) {
                if (isset($item[$type]) && is_array($item[$type])) {
                    foreach ($item[$type] as $value) {
                        if (isset($value['Value'])) {
                            if (is_array($value['Value']) && isset($value['Value'][0])) {
                                $ncentral_array[$index][$value['Key']] = $value['Value'][0];
                            } else {
                                $ncentral_array[$index][$value['Key']] = $value['Value'];
                            }
                        }
                    }
                }
            }
        }

        return $ncentral_array;
    }

    public function get_customer_list($array = NULL) {
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Username' => (string) $this->username,
            'Password' => (string) $this->password,
            'Settings' => array()
        );

        $result = $client->call('CustomerList', $params);
        $return = $this->create_array($result, 'Info');
        return $return;
    }

    public function get_issues($array) {
        $customer_id = (int) $array['customer_id'];
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Username' => (string) $this->username,
            'Password' => (string) $this->password,
            'Settings' => array(array('Key' => 'customerid', 'Value' => $customer_id))
        );

        $result = $client->call('ActiveIssuesList', $params);
        $return = $this->create_array($result, 'Issue');
        return $return;
    }

    public function get_machine_list($array = NULL) {
        $customer_id = (int) $array['customer_id'];
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Username' => (string) $this->username,
            'Password' => (string) $this->password,
            'Settings' => array(array('Key' => 'customerID', 'Value' => $customer_id))
        );

        $result = $client->call('DeviceList', $params);
        $return = $this->create_array($result, 'Info');
        return $return;
    }

    public function get_machine_status($array = NULL) {
        $device_id = (int) $array['device_id'];
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Username' => (string) $this->username,
            'Password' => (string) $this->password,
            'Settings' => array(array('Key' => 'deviceID', 'Value' => $device_id))
        );

        $result = $client->call('DeviceGetStatus', $params);
        $return = $this->create_array($result, 'Info');
        return $return;
    }

    public function device_asset_info($array = NULL) {
        $device_id = (int) $array['device_id'];
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Version' => '0.0',
            'Username' => (string) $this->username,
            'Password' => (string) $this->password
        );

        $result = $client->call('DeviceAssetInfoExport2', $params);
        $return = $this->create_array($result, 'Info');
        return $return;
    }

    public function get_machine($array) {
        $device_id = (int) $array['device_id'];
        $client = new nusoap_client($this->base_url, true);

        $params = array(
            'Username' => (string) $this->username,
            'Password' => (string) $this->password,
            'Settings' => array(array('Key' => 'deviceID', 'Value' => $device_id))
        );

        $result = $client->call('DeviceGet', $params);
        $return = $this->create_array($result, 'Info');
        return $return;
    }

}

?>
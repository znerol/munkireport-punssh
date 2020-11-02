<?php
class Punssh_model extends \Model
{

    public function __construct($serial = '')
    {
        parent::__construct('id', 'punssh'); //primary key, tablename
        $this->rs['id'] = '';
        $this->rs['serial_number'] = $serial;
        $this->rs['destination'] = '';
        $this->rs['name'] = '';
        $this->rs['status'] = '';
        $this->rs['pubkey'] = '';

        if ($serial) {
            $this->retrieve_record($serial);
        }

        $this->serial = $serial;
    }

    /**
     * Process data sent by postflight
     *
     * @param string data
     **/
    public function process($json)
    {
        // Check if data was uploaded
        if (! $json ) {
            throw new Exception("Error Processing Request: No JSON file found", 1);
        }

        // Nuke previous data
        $this->deleteWhere('serial_number=?', $this->serial_number);

        // Matches strings of the form "Tunnel(destination:name)".
        $service_pattern = '|^Tunnel\((?<destination>[^:]+):(?<name>[^\)]+)\)$|';

        // Create one entry per reported service.
        $services = json_decode($json, true) ?? [];
        foreach ($services as $service) {
            $service_name = $service['service'] ?? '';
            $matches = [];
            if (preg_match($service_pattern, $service_name, $matches)) {
                $status = $service['status'] ?? [];

                $this->rs['id'] = '';
                $this->rs['destination'] = $matches['destination'] ?? '';
                $this->rs['name'] = $matches['name'] ?? '';
                $this->rs['status'] = $status['status'] ?? '';
                $this->rs['pubkey'] = $status['pubkey'] ?? '';
                $this->save();
            }
        }
    }
}


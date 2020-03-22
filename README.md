PunSSH module
=============

Reports status of PunSSH tunnels and the SSH public keys they are using.

The table provides the following information per 'item':

* id (int) Unique id
* serial_number (string) Serial Number
* destination (string) Address of the SSH jump host / tunnel concentrator
* name (string) Tunnel name
* status (string) One of `absent`, `ready`, `error`, `up`
* pubkey (string) The SSH public key

<?php

$this->view('listings/default',
[
  "i18n_title" => 'punssh.title',
  "table" => [
    [
      "column" => "machine.computer_name",
      "i18n_header" => "listing.computername",
      "formatter" => "clientDetail",
    ],
    [
      "column" => "reportdata.serial_number",
      "i18n_header" => "serial",
    ],
    [
      "column" => "reportdata.long_username",
      "i18n_header" => "username",
    ],
    [
      "column" => "reportdata.console_user",
      "i18n_header" => "punssh.currentuser",
    ],
    [
      "column" => "punssh.destination",
      "i18n_header" => "punssh.destination",
    ],
    [
      "column" => "punssh.status",
      "i18n_header" => "punssh.status",
    ],
    [
      "column" => "punssh.pubkey",
      "i18n_header" => "punssh.pubkey",
    ],
  ]
]);

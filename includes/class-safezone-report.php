<?php

class Safezone_Report
{
    public static function add($message, $step, $state, $scan_type, $path, $ip): void
    {
        global $wpdb;
        $check = $wpdb->get_row("SELECT * FROM wp_sz_reports WHERE path= '$path' AND message = '$message' AND state = '$state' AND scan_type = '$scan_type'");
        if(!$check){
            $wpdb->insert('wp_sz_reports', [
                'path' => $path,
                'message' => str_replace(['//'],['/'],$message),
                'state' => $state ?? null,
                'step' => $step ?? null,
                'scan_type' => $scan_type ?? null,
                'ip_address' => $ip['ip'] ?? null,
                'country_code' => $ip['country_code'] ?? null,
                'country_name' => $ip['country_name'] ?? null,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
            ]);
        }
    }
}
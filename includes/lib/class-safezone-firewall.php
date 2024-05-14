<?php

if (!class_exists('Safezone_Firewall')) {
    class Safezone_Firewall
    {
        // .htaccess dosyasına satırları eklemek için fonksiyon
        public static function add_htaccess_lines() {
            $htaccess_file = ABSPATH . '.htaccess';
            $htaccess_content = "
<Files .htaccess>
<IfModule mod_authz_core.c>
Require all denied
</IfModule>
<IfModule !mod_authz_core.c>
Order deny,allow
Deny from all
</IfModule>
</Files>
ServerSignature Off
LimitRequestBody 104857600
<Files wp-config.php>
<IfModule mod_authz_core.c>
Require all denied
</IfModule>
<IfModule !mod_authz_core.c>
Order deny,allow
Deny from all
</IfModule>
</Files>
";
            $current_content = file_get_contents($htaccess_file);

            // Eğer eklemek istediğiniz satırlar zaten dosyada bulunmuyorsa ekle
            if (!str_contains($current_content, $htaccess_content)) {
                $file_handle = fopen($htaccess_file, 'a');
                if ($file_handle) {
                    fwrite($file_handle, $htaccess_content);
                    fclose($file_handle);
                    return true;
                } else {
                    return false;
                }
            } else {
                return true; // Satırlar zaten dosyada bulunuyor, eklemeye gerek yok
            }
        }

        // .htaccess dosyasından satırları kaldırmak için fonksiyon
        public static function remove_htaccess_lines() {
            $htaccess_file = ABSPATH . '.htaccess';
            $htaccess_content = "
<Files .htaccess>
<IfModule mod_authz_core.c>
Require all denied
</IfModule>
<IfModule !mod_authz_core.c>
Order deny,allow
Deny from all
</IfModule>
</Files>
ServerSignature Off
LimitRequestBody 104857600
<Files wp-config.php>
<IfModule mod_authz_core.c>
Require all denied
</IfModule>
<IfModule !mod_authz_core.c>
Order deny,allow
Deny from all
</IfModule>
</Files>
";
            $current_content = file_get_contents($htaccess_file);

            // Eğer eklemek istediğiniz satırlar dosyada bulunuyorsa kaldır
            if (str_contains($current_content, $htaccess_content)) {
                $new_content = str_replace($htaccess_content, '', $current_content);
                $file_handle = fopen($htaccess_file, 'w');
                if ($file_handle) {
                    fwrite($file_handle, $new_content);
                    fclose($file_handle);
                    return true;
                } else {
                    return false;
                }
            } else {
                return true; // Satırlar zaten dosyada bulunmuyor, kaldırmaya gerek yok
            }
        }

        public static function get_user_info_check($ip)
        {
            $response = wp_remote_post(API_URL. '/initials/check', [
                'body' => json_encode([
                    'ip' => $ip['ip'],
                    'user_agent' => $_SERVER['HTTP_USER_AGENT']
                ]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ]
            ]);
            $response_body = wp_remote_retrieve_body($response);
            $response_data = json_decode($response_body, true);

            if($response_data['success']){
                foreach($response_data['data'] as $data){
                    Safezone_Report::add($data['message'], null, $data['state'], 'Firewall', '', [
                        'ip' => $ip['ip'],
                        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                        'country_code' => $ip['loc']
                    ]);
                }
                return true;
            }else{
                return false;
            }
        }
    }
}
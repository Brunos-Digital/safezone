<?php

if (!class_exists('Safezone_Anti_Spam')) {
    class Safezone_Anti_Spam
    {

        // constructor
        public function comment_status_blocked($comment_ID, $comment_approved, $old_comment_approved)
        {
            if ( $comment_approved != $old_comment_approved ) {
                if ( 'spam' == $comment_approved ) { // Eğer yorum spam olarak işaretlenmişse
                    $this->addReport("Spam comment blocked: $comment_ID", "Comment");
                }
            }
        }

        private function addReport($message, $state): void
        {
            global $wpdb;

            // varsa aynisini koyma
            $check = $wpdb->get_row("SELECT * FROM wp_sz_reports WHERE message = '$message' AND state = '$state' AND scan_type = 'Anti-Spam'");
            if(!$check){
                $wpdb->insert('wp_sz_reports', [
                    'message' => str_replace(['//'],['/'],$message),
                    'state' => $state,
                    'is_fixed' => false,
                    'scan_type' => 'Anti-Spam'
                ]);
            }
        }
    }
}
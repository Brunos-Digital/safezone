<?php

if (!class_exists('Safezone_Login_Protection')) {
    class Safezone_Login_Protection
    {

        protected int $attempts;
        protected int $seconds_locked;

        public function __construct()
        {
            $this->attempts = 10;
            $this->seconds_locked = 60;
            add_action('wp_login_failed', [$this, 'login_failed'], 10, 3);
            add_filter('authenticate', [$this, 'authentication'], 30, 3);

            add_action('login_form', [$this, 'add_math_problem_to_login']);
            add_filter('wp_authenticate_user', [$this, 'validate_math_problem_on_login'], 10, 1);
            add_filter('login_errors', [$this, 'customize_error_message_for_incorrect_math_answer']);

            add_action('wp_login_failed', [$this, 'login_failed'], 10, 3);

        }

        public function authentication($user, $username, $password)
        {
            $transient = get_transient('limit_login_attempt');
            if ($transient && $transient > $this->attempts) {
                $transient_expiration = get_option('_transient_timeout_limit_login_attempt');
                $waiting_seconds = abs($transient_expiration - time());
                // $ip = $this->ip_details();
                return new WP_Error('limit_login_attempt', sprintf(__('You are blocked for %1$s seconds'), $waiting_seconds));
            }
            return $user;
        }

        public function login_failed($username): void
        {
            $transient = get_transient('limit_login_attempt');
            if ($transient) {
                $attempts = $transient + 1;
                set_transient('limit_login_attempt', $attempts);
            } else {
                set_transient('limit_login_attempt', 1, $this->seconds_locked);
            }
        }

        public function add_math_problem_to_login(): void
        {
            $num1 = rand(1, 30);
            $num2 = rand(1, 30);
            $result = $num1 + $num2;

            echo '<p>';
            echo '<label for="math_answer">' . __('Math problem for security', 'safezone') . '</label>';
            echo '<input placeholder="' . $num1 . ' + ' . $num2 . ' = ?" type="number" name="math_answer" id="math_answer" class="input" value="" size="20" autocapitalize="off" autocorrect="off" />';
            echo '<input type="hidden" name="math_result" value="' . $result . '">';
            echo '</p>';
        }

        public function validate_math_problem_on_login($user)
        {
            if (!isset($_POST['math_answer']) || !isset($_POST['math_result'])) {
                return $user;
            }

            $math_answer = (int)$_POST['math_answer'];
            $correct_answer = (int)$_POST['math_result'];

            if ($math_answer != $correct_answer) {
                return new WP_Error('incorrect_math_answer', __('<strong>Error:</strong> Incorrect answer to the math problem. Please try again.', 'safezone'));
            }
            return $user;
        }

        public function customize_error_message_for_incorrect_math_answer($errors, $redirect_to = null)
        {
            if (isset($errors->errors['incorrect_math_answer'])) {
                $errors->add('incorrect_math_answer', __('<strong>Error:</strong> Incorrect answer to the math problem. Please try again.', 'safezone'));
            }
            return $errors;
        }

        private function getUserIP() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }
        public function ip_details()
        {
            $ip = $this->getUserIP();
            $json = file_get_contents("https://ipinfo.io/{}/geo");
            return json_decode($json, true);
        }

    }
}